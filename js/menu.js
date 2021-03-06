/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Global variables

var menuContens = {}; //Global Menu Content Array(Key-value pair)
var curMenu; //Current Menu
var defaultMenuHtml; // Default body html of the current template-*+
var allImages = [];
var imageObjects = {};
var imageCounter = -1;
var imageArrayLength = 0;
var curMenuForImage;

// onload functionalities
$(document).ready(function() {
    onLoadMenus();
});

function handleReceivedImageData(xhr) {
    //alert( "replied:: " + xhr.readyState + "/"+ xhr.status);
    if (xhr.readyState == 4  && xhr.status == 200)
    {
        var dataset = JSON.parse(xhr.responseText);
        //alert("replied->:" + dataset);

        var data_rows = Object.keys(dataset);
        data_rows.forEach(function(data_row) {

            var media = dataset[data_row];

            //alert(media.id);

            if(media.user_id == user_id)
            {
                var user_template_id = media.user_id + '_' + media.template_id + '_';
                var image_tree = media.res_name.replace( user_template_id ,'');
                var image_name_parsed_array = image_tree.split('_');
                var menu = image_name_parsed_array[0];
                var id_hashed = image_name_parsed_array[image_name_parsed_array.length - 1];
                var image_id = image_tree.replace(menu + '_', '').replace('_' + id_hashed, '');
                //alert('[WB-D] [image-id]: ' + image_id);

                var src = getBaseUrl() + "/archive/" + media.res_name;

                //alert($('#' + image_id)[0].nodeName);
                var parts = image_id.split('_');
                var tagName = parts[parts.length - 1].split('-')[0];
                //alert(tagName);
                // Change image source
                if(tagName == "img")
                {
                    $('#' + image_id).attr("src", src);
                    //alert("[WB-D] RESP SRC:" +  $('#' + image_id).attr("src"));
                }
                else
                {
                    $('#' + image_id).css("background-image", "url(" + src  + ")");
                    //alert("[WB-D] RESP URL:" + $('#' + image_id).css("background-image"));
                }
            }// end-if for user checking

        });
    }
}

function loadMediasOfPages() {
    var xhr = createXHR();
    if (xhr)
    {
        var url = getBaseUrl() + "/views/content_views/media_info_loader.php";
        //alert(template_id);
        var payload = "template_id=" + template_id;
        xhr.open("POST",url,true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded ');
        xhr.setRequestHeader("Content-length", payload.length);
        xhr.setRequestHeader("Connection", "close");
        xhr.onreadystatechange = function()
        {
            handleReceivedImageData(xhr);
        };
        xhr.send(payload);
    }
}

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

    loadMediasOfPages();

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
    //menuContens[curMenu] = defaultMenuHtml;
}

//var menuClickHistory = [];
//var menuClickHistoryIndex = 0;

/*
 * Function executes while clicking any menu
 * @param {type} menu
 */
function onMenuClick(menu) {
	closeAllEditDialogPanel();
    saveCurrentMenuText();

    traverseImages();

    var menuText = $(menu).text();
    curMenu = menuText;
    //menuClickHistory[menuClickHistoryIndex] = menuText;
    if(menuContens[menuText] === null || typeof menuContens[menuText] === 'undefined') {
        //alert("RESETTING MENU CONTENT!!! ALERT!!" + menuContens[menuText]);
        resetMenuContent();
    } else {
        //var previousMenuClicked = menuClickHistory[menuClickHistoryIndex - 1];
        //alert("SAVING PREVIOUS MENU CONTENT!!! -> " + menuText + "###" + menuContens[menuText]);
        setBodyHtmlString(menuContens[menuText]);
    }
    //console.log("menu is clicked history count: " + menuClickHistoryIndex);
    //menuClickHistoryIndex++;
    if(typeof isView !== 'undefined' && isView){
        makeTemplateComponetsNotEditable();
    } else {
        makeTemplateComponetsEditable();
        onTemplateMenuLoad();
    }
}


function getSavedMenuContents() {
    menuContens = user_menu_content_array;
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
}

function saveCurrentPageImages(isEdit, imageObj) {

    if(!isEdit) {
        sendRequest(imageObj);
        if(imageObj.src.indexOf("blob") != -1)
        {
            alert("[WB] on insert image-menu: " + imageObj.src);
        }
    }
    else
    {
        //if(!isEmpty(imageObj.src))
        //    alert("[WB] on update image-src: \"" + imageObj.src + "\"");

        if(imageObj.src.indexOf("localhost") == -1)
        {
            sendRequest(imageObj);
            //console.log("[WB] on update image-menu: " + imageObj.src);
            // alert("[WB] on update image-menu: " + imageObj.src);
        }
    }
}

function isImageExists(id, menu_item)
{
    if(allImages[menu_item] == null) return false;
    var image_items = Object.keys(allImages[menu_item]);
    image_items.forEach(function(image){

        var imageObj = JSON.parse(allImages[menu_item][image]);
        if(id == imageObj.id) return true;

    });
    return false;
}

function saveImages(user_id, template_id) {

    console.log("[WB-D] saveImages: " + user_id + "$##$" + template_id);

    loadImages(user_id, template_id, function(imageObj){

        console.log("[WB-D] [REPLIED] image-src: " + imageObj.src_arch );

    });

    var menu_items = Object.keys(allImages);
    //menu_items.sort(); // sort the array of keys
    menu_items.forEach(function(menu_item) {
        var image_items = Object.keys(allImages[menu_item]);
        //items.sort();
        image_items.forEach(function(image){

            //console.log('[WB-D] json: ' + allImages[menu_item][image]);

            var imageObj = JSON.parse(allImages[menu_item][image]);

            //console.log("[WB-D] info: " + user_id + "#" + template_id + "#" + imageObj.id + " SAVING...");

            saveCurrentPageImages(isEdit, imageObj);

            //console.log("[WB-D] info: " + user_id + "#" + template_id + "#" + imageObj.id + " SAVED!!!");
        });
        //alert("images count: " + image_items.length);
    });
    //alert("menu count: " + menu_items.length);
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

    //console.log('[WB][size]:' + canvas.width + 'x' + canvas.height);
    //console.log('[WB][size]:' + img.attr("width") + 'x' + img.attr("height"));

    var imageData = document.getElementById(img.attr("id"));
    //console.log('[WB][object]:' + imageData.id);
    //console.log('[WB][id]:' +  img.attr("id"));
    //console.log('[WB][src]:' +  imageData.src);
    //console.log('[WB][width]:' +  imageData.width);
    //console.log('[WB][height]:' +  imageData.height);

    canvas.width = imageData.width;
    canvas.height = imageData.height;

    // Copy the image contents to the canvas
    var ctx = canvas.getContext("2d");
    ctx.drawImage(imageData, 0, 0);

    // Get the data-URL formatted image
    // Firefox supports PNG and JPEG. You could check img.src to
    // guess the original format, but be aware the using "image/jpg"
    // will re-encode the image.

    var s = img.attr("src").split('.').pop();
    //console.log('[WB][type]:' + s);

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

function getBase64Image(img, id)
{
    // Create an empty canvas element
    var canvas = document.getElementById(id);

    var imageData = new Image();
    imageData.onload = function(){

        canvas.width = img.css("width").replace("px", "").trim();
        canvas.height = img.css("height").replace("px", "").trim();

        //console.log('[WB-D][size]:' + canvas.width + 'x' + canvas.height);
        //console.log('[WB-D][size]:' + img.css("width") + 'x' + img.css("height"));

        // Copy the image contents to the canvas
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0);

        //console.log('[WB-D][src]:' + imageData.src);
        //console.log('[WB-D][size]:' + imageData.width + 'x' + imageData.height);
    };
    imageData.src = img.css("background-image").replace("url", "").replace("(","").replace(")","").replace("\"","").replace("\"","").trim();

    // Get the data-URL formatted image
    // Firefox supports PNG and JPEG. You could check img.src to
    // guess the original format, but be aware the using "image/jpg"
    // will re-encode the image.

    var s = imageData.src.split('.').pop();

    console.log('[WB-D][type]:' + s);

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
        //alert("[WB]Saved! " + xhr.responseText);

        var imageObj = JSON.parse(xhr.responseText);

        //console.log("[WB] RESP " + imageObj.image_id);
        // Change image source
        if($('#' + imageObj.image_id)[0].nodeName == "IMG")
        {
            $('#' + imageObj.image_id).attr("src", imageObj.src_arch);
            //console.log("[WB] RESP SRC:" +  $('#' + imageObj.image_id).attr("src"));
            alert("[WB] RESP SRC:" +  $('#' + imageObj.image_id).attr("src"));
        }
        else
        {
            $('#' + imageObj.image_id).css("background-image", "url(" + imageObj.src_arch  + ")");
            //console.log("[WB] RESP URL:" + $('#' + imageObj.image_id).css("background-image"));
            alert("[WB] RESP URL:" + $('#' + imageObj.image_id).css("background-image"));
        }
        _callbackFn(imageObj);
    }
}
