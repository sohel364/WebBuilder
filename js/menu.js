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

function uploadImage(images, i, srcList) {
    var binary = getBase64Image(images[i], "hidden-canvas");

    // TODO: Image Type is set after above line is executed [getBase64Image(images[i], "hidden-canvas");]
    srcList[images[i].id] = "{ 'src': " + images[i] + ", 'index': " + i + ", 'type': " + imageType + " }";

    sendRequest(binary, srcList[images[i].id]);

    //console.log("[WB]Saving ...###" + images[i].src + "###");
}

function saveCurrentPageImages(user_id, template_id, isEdit) {
    var images = document.getElementsByTagName('img');
    _user_id = user_id;
    _template_id  = template_id;

    var srcList = {};

    for(var i = 0; i < images.length; i++) {

        if(!isEdit) {
            uploadImage(images, i, srcList);
        }
        else
        {
            if(images[i].src.indexOf("blob") < 0 || images[i].src.indexOf("localhost") < 0)
            {
                uploadImage(images, i, srcList);
            }
        }
    }
    allImages[curMenu] = srcList;
}

function test_upload_image(){
    var image = document.getElementsByTagName("img");
    if(image.src.indexOf("localhost") > -1 )
    {
        var binary = getBase64Image(image, "hidden-canvas");

        sendRequest(binary, 0);
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

    console.log(ctx.canvas === canvas);

    // Get the data-URL formatted image
    // Firefox supports PNG and JPEG. You could check img.src to
    // guess the original format, but be aware the using "image/jpg"
    // will re-encode the image.

    var s = img.src.split('.').pop();

//			alert(s);

    if(s.indexOf("png")>-1){
        var dataURL = canvas.toDataURL("image/png");
        imageType = "png";
        return dataURL;
    }

    if(s.indexOf("jpg")>-1){
        var dataURL = canvas.toDataURL("image/jpeg")
        imageType = "jpeg";
        return dataURL;
    }

	if(s.indexOf("jpeg")>-1){
			 var dataURL = canvas.toDataURL("image/jpeg");
			 return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
		}
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

function sendRequest(data, img_id)
{
    var xhr = createXHR();

    if (xhr)
    {
        var url = "http://localhost/webbuilder/views/content_views/uploader.php";
        var payload = "image=" + data + "&type=" + imageType + "&userId=" + _user_id + "&templateId=" + _template_id + "&image_id=" + img_id + "&menu_id=" + curMenu;
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
        console.log("[WB]Saved!" + xhr.responseText);
    }
}
