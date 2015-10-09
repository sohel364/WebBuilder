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

function saveCurrentPageImages() {
    var images = document.getElementsByTagName('img'); 
    
    var srcList = {};
    
    for(var i = 0; i < images.length; i++) {
        
        //if(images[i].id)
        srcList[images[i].id] = images[i];
        
        
    }
    allImages[curMenu] = srcList;
}

/*function saveCurrentPageImages() {
    var dummy = 0;
    while(imageCounter+1 < imageArrayLength) {
        dummy++;
    }
    imageCounter = 0;
    curMenuForImage = curMenu;
    var images = document.getElementsByTagName('img'); 
    imageArrayLength = images.length;
    imageObjects = {};
    //var srcList = {};
    
    for(var i = 0; i < images.length; i++) {
        //srcList.push(images[i].src);
        ///*var img = images[i];
        //var id = '#'+images[i].id;
        //var image = $(id)[0].files[0];
        
        //srcList[images[i].id] = images[i].src;
        createBlobObject(images[i].src, images[i].id);
        
    }
    //allImages[curMenu] = srcList;
}


function createBlobObject(url, key) {
        var xhr = new XMLHttpRequest(); 
        xhr.open("GET", url); 
        xhr.responseType = "blob"; //force the HTTP response, response-type header to be blob
        xhr.onload = function() 
        {
            imageObjects[key] = xhr.response;//xhr.response is now a blob object
            imageCounter++;
            if(imageCounter+1 >= imageArrayLength) {
                allImages[curMenuForImage] = imageObjects;
                var x = 0;
            }
        };
        xhr.send();
}*/

function createImageForm() {
    
}