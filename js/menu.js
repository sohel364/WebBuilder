/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Global variables

var menuContens = {}; //Global Menu Content Array(Key-value pair)
var curMenu; //Current Menu
var defaultMenuHtml; // Default body html of the current template-*+
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

function isEmpty(value) {
    return value == "none" || value == "undefined" || value == "";
}

function loadImages(user_id, template_id, callbackFunc)
{
    _user_id = user_id;
    _template_id  = template_id;
    _callbackFn = callbackFunc;

    //var images = document.getElementsByTagName('img');

    //var containers = [];
    //
    //$(document).ready(function() {
    //
    //    console.log('[WB-EXP][container-id: logging]');
    //
    //    var allElements = $("body").find("*[id^='container_']").each(function(index, element){
    //
    //        var parts = element.id.split('_');
    //
    //        if(parts.length == 3){
    //            var tagName = parts[2].split('-')[0];
    //
    //            if($('#' + element.id)[0].nodeName != "IMG")
    //            {
    //                console.log('[WB][container-parts [child]: ' + parts + ']');
    //
    //                var url =  $('#' + element.id).css("background-image");
    //
    //                if(!isEmpty(url))
    //                {
    //                    var binary = getBase64Image($('#' + element.id), "hidden-canvas");
    //                    console.log('[WB][container-parts [child][style:background(url)]: ' + $('#' + element.id).css("background-image") + ']');
    //                    url = $('#' + element.id).css("background-image").replace("url", "").replace("(","").replace(")","").replace("\"","").replace("\"","").trim();
    //
    //                    // TODO: Image Type is set after above line is executed [getBase64Image(images[i], "hidden-canvas");]
    //                    var parent_id = parts[0] + '_' + parts[1];
    //                    var containerObj = '{ "src": "' + url
    //                        + '", "index": ' + index
    //                        + ', "type": "' + imageType
    //                        + '", "id": "' + element.id
    //                        + '", "data": "' + binary
    //                        + '", "menu": "' + curMenu
    //                        + '", "tag": "' + tagName
    //                        + '" }';
    //                    containers.push(containerObj);
    //                    console.log('[WB-EXP][container-json]: ' + containerObj);
    //                }
    //            }
    //            else
    //            {
    //                console.log('[WB-EXP][container-parts [child]: ' + parts + ']');
    //
    //                var url = $('#' + element.id).attr("src");
    //
    //                if(!isEmpty(url))
    //                {
    //                    var binary = getBase64ImageForImageElement($('#' + element.id), "hidden-canvas");
    //                    console.log('[WB-EXP][container-parts [child][style:src]: ' + $('#' + element.id).attr("src") + ']');
    //
    //                    // TODO: Image Type is set after above line is executed [getBase64Image(images[i], "hidden-canvas");]
    //                    var parent_id = parts[0] + '_' + parts[1];
    //                    var containerObj = '{ "src": "' + url
    //                                    + '", "index": ' + index
    //                                    + ', "type": "' + imageType
    //                                    + '", "id": "' + element.id
    //                                    + '", "data": "' + binary
    //                                    + '", "menu": "' + curMenu
    //                                    + '", "tag": "' + tagName
    //                                    + '" }';
    //                    containers.push(containerObj);
    //                    console.log('[WB-EXP][container-json]: ' + containerObj);
    //                    if(element.id == "container_banner-1_img-1")
    //                    alert('[WB-EXP][container-count]: ' +  containerObj);
    //                }
    //            }
    //        }
    //    });
    //    console.log('[WB-EXP][container-count: ' + allElements.length + ']');
    //});
    //console.log('[WB-EXP][container-count: ' + containers.length + ']');
    //allImages[curMenu] = containers;
}

function saveCurrentPageImages(isEdit, imageObj) {

    if(!isEdit) {
        if(!isEmpty(imageObj.src))
            console.log("[WB] on insert image-src: \"" + imageObj.src + "\"");
        sendRequest(imageObj);
    }
    else
    {
        if(imageObj.src != "")
        {
            console.log("[WB] on update image-src: " + imageObj.src);
            //alert("[WB] on update image-id: " + imageObj.id);
            console.log("[WB] on update image-blob: " + imageObj.src.indexOf("blob"));
            console.log("[WB] on update image-localhost: " + imageObj.src.indexOf("localhost"));
        }
        //if(imageObj.src.indexOf("blob") > -1)
        {
            sendRequest(imageObj);
            console.log("[WB] on update image-menu: " + imageObj.src);
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

function getBase64ImageForImageElement(img, id) {

    // Create an empty canvas element
    var canvas = document.getElementById(id);

    console.log('[WB][size]:' + canvas.width + 'x' + canvas.height);

    console.log('[WB-EXP][size]:' + canvas.width + 'x' + canvas.height);
    console.log('[WB-EXP][size]:' + img.attr("width") + 'x' + img.attr("height"));

    var imageData = document.getElementById(img.attr("id"));
    console.log('[WB-EXP][object]:' + imageData.id);
    console.log('[WB-EXP][id]:' +  img.attr("id"));
    console.log('[WB-EXP][src]:' +  imageData.src);
    console.log('[WB-EXP][width]:' +  imageData.width);
    console.log('[WB-EXP][height]:' +  imageData.height);

    canvas.width = imageData.width;
    canvas.height = imageData.height;

    //imageData = new Image();
    //imageData.src = img.attr("src");

    // Copy the image contents to the canvas
    var ctx = canvas.getContext("2d");

    //imageData.onload(function(){
    //
    //    ctx.drawImage(imageData, 0, 0);
    //});

    ctx.drawImage(imageData, 0, 0);

    // Get the data-URL formatted image
    // Firefox supports PNG and JPEG. You could check img.src to
    // guess the original format, but be aware the using "image/jpg"
    // will re-encode the image.

    var s = img.attr("src").split('.').pop();
    console.log('[WB][type]:' + s);

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
    return null;
}


function getBase64Image(img, id) {

    // Create an empty canvas element
    var canvas = document.getElementById(id);

    canvas.width = img.css("width").replace("px", "").trim();
    canvas.height = img.css("height").replace("px", "").trim();

    console.log('[WB][size]:' + canvas.width + 'x' + canvas.height);
    console.log('[WB][size]:' + img.css("width") + 'x' + img.css("height"));

    // Copy the image contents to the canvas
    var ctx = canvas.getContext("2d");

    var imageData = document.createElement('img');
    imageData.src = img.css("background-image").replace("url", "").replace("(","").replace(")","").replace("\"","").replace("\"","").trim();
    imageData.onload = function(){

        canvas.width = imageData.width;
        canvas.height = imageData.height;
        ctx.drawImage(imageData, 0, 0);
        console.log('[WB][src]:' + imageData.src);
        console.log('[WB][size]:' + imageData.width + 'x' + imageData.height);
    };

    // Get the data-URL formatted image
    // Firefox supports PNG and JPEG. You could check img.src to
    // guess the original format, but be aware the using "image/jpg"
    // will re-encode the image.

    var s = imageData.src.split('.').pop();

    console.log('[WB][type]:' + s);

    if(s.indexOf("png")>-1){
        var dataURL = canvas.toDataURL("image/png", 1.0);
        imageType = "png";
        return dataURL;
    }

    if(s.indexOf("jpg")>-1 || s.indexOf("jpeg")>-1){
        var dataURL = canvas.toDataURL("image/jpeg", 1.0);
        imageType = "jpeg";
        return dataURL;
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

function sendRequest(imageObj)
{
    var xhr = createXHR();

    if (xhr)
    {
        var url = "http://localhost/webbuilder/views/content_views/uploader.php";
        var payload = "image=" + imageObj.data
                    + "&type=" + imageObj.type
                    + "&userId=" + _user_id
                    + "&templateId=" + _template_id
                    + "&image_src=" + imageObj.src
                    + "&image_id=" + imageObj.id
                    + "&menu_id=" + imageObj.menu;
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
        // Change image source
        if($('#' + imageObj.image_id)[0].nodeName == "IMG")
        {
            $('#' + imageObj.image_id).attr("src", imageObj.src_arch);
            console.log("[WB] RESP SRC:" +  $('#' + imageObj.image_id).attr("src"));
        }
        else
        {
            $('#' + imageObj.image_id).css("background-image", "url(" + imageObj.src_arch  + ")");
            console.log("[WB] RESP URL:" + $('#' + imageObj.image_id).css("background-image"));
        }
        _callbackFn(imageObj);
    }
}
