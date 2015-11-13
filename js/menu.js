/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Global variables

var menuContens = {}; //Global Menu Content Array(Key-value pair)
var curMenu; //Current Menu
var defaultMenuHtml; // Default body html of the current template
var allImages = {};
var imageObjects = {};
var imageCounter = -1;
var imageArrayLength = 0;
var curMenuForImage;

// onload functionalities
$(document).ready(function() {
    onLoadMenus();
});

/*
 * Sets the initial menu contents to menu array and initialize the global variables
 */
function onLoadMenus() {
    //alert(user_menu_content_array);
    $ul = $('#menu');
    $lis = $ul.find('li'); /* Finds all sub li under menu ul(find all menus) */
    var curLi = $lis[0];
    $ahref = $(curLi).find('a');
    curMenu = $ahref.text();
    if (typeof isEdit !== 'undefined' && isEdit) {
        getSavedMenuContents();
        makeTemplateComponetsEditable();
        //onTemplateMenuLoad();
    } else if(typeof isView !== 'undefined' && isView){
        getSavedMenuContents();
        //makeTemplateComponetsNotEditable();
    } else {
        menuContens[curMenu] = getBodyHtmlString();
    }
    defaultMenuHtml = getBodyHtmlString();
}

/*
 * Save current menu context while switching to another menu
 */
function saveCurrentMenuText() {
    menuContens[curMenu] = getBodyHtmlString();
}

/*
 * Get the body html string
 * @returns {String}
 */
function getBodyHtmlString() {
    var bodyHtml = $('#body').html();
    return bodyHtml;
}

/*
 * Set the html content of menu body
 * @param {type} bodyHtml
 */
function setBodyHtmlString(bodyHtml) {
    $('#body').html(bodyHtml);
}

/*
 * Reset the menu contents while initializing a menu
 */
function resetMenuContent() {
    setBodyHtmlString(defaultMenuHtml);
}

/*
 * Function executes while clicking any menu
 * @param {type} menu
 */
function onMenuClick(menu) {
	closeAllEditDialogPanel();
    saveCurrentMenuText();
    saveCurrentPageImages();
    var menuText = $(menu).text();
    curMenu = menuText;
    if(menuContens[menuText] === null || typeof menuContens[menuText] === 'undefined') {
        resetMenuContent();
    } else {
        setBodyHtmlString(menuContens[menuText]);       
    }
    console.log("menu is clicked");
    if(typeof isView !== 'undefined' && isView){
        //makeTemplateComponetsNotEditable();
    } else {
        makeTemplateComponetsEditable();
        onTemplateMenuLoad();
    }
}


function getSavedMenuContents() {
    //menuContens = user_menu_content_array;
    setBodyHtmlString(menuContens[curMenu]);
}
var _user_id, _template_id;

var imageType = "png";
var _callbackFn = null;

function uploadImage(images, i, srcList) {

    sendRequest(binary, i);

    //console.log("[WB]Saving ...###" + images[i].src + "###");
}

function loadImages(user_id, template_id, callbackFunc)
{
    _user_id = user_id;
    _template_id  = template_id;
    _callbackFn = callbackFunc;

    var images = document.getElementsByTagName('img');

    var srcList = {};

    for(var i = 0; i < images.length; i++) {

        var binary = getBase64Image(images[i], "hidden-canvas");

        //console.log("[WB] image-type: " + imageType);

        // TODO: Image Type is set after above line is executed [getBase64Image(images[i], "hidden-canvas");]
        srcList[i] = '{ "src": "' + images[i].src + '", "index": ' + i + ', "type": "' + imageType + '", "id": "' + images[i].id + '", "data": "' + binary + '", "menu": "' + curMenu + '" }';
        //var image = JSON.parse(srcList[i]);
        //console.log("[WB] ALL images of " + curMenu + " image-info is: " + image.type + "#" + image.index);
    }
    allImages[curMenu] = srcList;
}

function saveCurrentPageImages(isEdit, imageObj) {

    if(!isEdit) {
        sendRequest(imageObj);
        console.log("[WB] on insert image-menu: " + imageObj.menu);
    }
    else
    {
        if(imageObj.src.indexOf("blob") < 0 || imageObj.src.indexOf("localhost") < 0)
        {
            sendRequest(imageObj);
            console.log("[WB] on update image-menu: " + imageObj.menu);
        }
    }
}

function test_upload_image(){
    var image = document.getElementsByTagName("img");
    if(image.src.indexOf("localhost") > -1 )
    {
        var binary = getBase64Image(image, "hidden-canvas");

        //sendRequest(binary, 0);
    }

}


function getBase64Image(img, id) {

    // Create an empty canvas element
    var canvas = document.getElementById(id);

    canvas.width = img.width;
    canvas.height = img.height;

    // Copy the image contents to the canvas
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);

    // Get the data-URL formatted image
    // Firefox supports PNG and JPEG. You could check img.src to
    // guess the original format, but be aware the using "image/jpg"
    // will re-encode the image.

    var s = img.src.split('.').pop();

    if(s.indexOf("png")>-1){
        var dataURL = canvas.toDataURL("image/png");
        imageType = "png";
        return dataURL;
    }

    if(s.indexOf("jpg")>-1 || s.indexOf("jpeg")>-1){
        var dataURL = canvas.toDataURL("image/jpeg");
        imageType = "jpeg";
        return dataURL;
    }
    console.log("[WB] image-type: " + "WoW!");

	//if(s.indexOf("jpeg")>-1){
	//		 var dataURL = canvas.toDataURL("image/jpeg");
	//		 return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
	//	}
    return null;
}


function createXHR()
{

    try { return new XMLHttpRequest(); } catch(e) { alert(e);}
    try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); } catch (e) {alert(e);}
    try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); } catch (e) {alert(e);}
    try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {alert(e);}
    try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {alert(e);}

    return null;
}

function sendRequest(imageObj)
{
    var xhr = createXHR();

    if (xhr)
    {
        var url = "http://localhost/webbuilder/views/content_views/uploader.php";
        var payload = "image=" + imageObj.data + "&type=" + imageObj.type + "&userId=" + _user_id + "&templateId=" + _template_id + "&image_src=" + imageObj.src + "&image_id=" + imageObj.index + "&menu_id=" + imageObj.menu;
        xhr.open("POST",url,true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded ');
        xhr.setRequestHeader("Content-length", payload.length);
        xhr.setRequestHeader("Connection", "close");
        xhr.onreadystatechange = function(){handleResponse(xhr);};
        xhr.send(payload);
    }
    else
    {
        console.log('Upload error: Something went wrong!!');
    }
}

function handleResponse(xhr)
{

    if (xhr.readyState == 4  && xhr.status == 200)
    {
        //alert(xhr.responseText);
        //console.log("[WB]" + xhr.readyState + '#' + xhr.status + '#' + _template_id);
        //var responseImage = document.getElementById("responseImage");
        //responseImage.src = (imageType == "png" ? "data:image/png;base64," : "data:image/jpeg;base64,") + xhr.responseText;
        //responseImage.style.display = "";
        console.log("[WB]Saved! " + xhr.responseText);

        var imageObj = JSON.parse(xhr.responseText);

        console.log("[WB] RESP " + imageObj.image_id);
        _callbackFn(imageObj);
    }
}
