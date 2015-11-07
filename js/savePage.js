/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// onload functionalities
$(document).ready(function() {
    hideSavingIcon();
});


function executeBeforeSend() {
    if(isUserLoggedIn === null || isUserLoggedIn === "0") {
        alert("Please sign in to save the template");
        var redirectURL = getBaseUrl();
        window.location.href = redirectURL;
        return;
    }
    saveCurrentMenuText();
    saveCurrentPageImages();
    var menuList = getMenuList();
    
    if (typeof menuList.length !== 'undefined' && menuList.length > 1) {
        showSavingIcon();
        var savedName; 
        if(!isEdit) {
            var url = getPageSaverUrl();
            savedName = prompt("Enter webpage name : ", "Enter page name");
            //insertPage(url, menuList, savedName);
        } else {
            var url = getPageUpdaterUrl();
            if(typeof template_saved_name !== 'undefined' && template_saved_name.length>0) {
                savedName = prompt("Enter webpage name : ", template_saved_name);
            } else {
                savedName = prompt("Enter webpage name : ", "Enter page name");
            }
            //updatePage(url, menuList, savedName);
        }
    }
}

/*
 * Finds the base url of the current page
 * @returns {String}
 */
function getBaseUrl() {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    return baseUrl;
}

/*
 * Generates the page saver url with concatenating the base url
 * @returns {String}
 */
function getPageSaverUrl() {
    return getBaseUrl()+'/views/content_views/pageSaver.php';
}


/*
 * Generates the page 0updater url with concatenating the base url
 * @returns {String}
 */
function getPageUpdaterUrl() {
    return getBaseUrl()+'/views/content_views/pageUpdater.php';
}
/*
 * Find all the menus created by user
 * @returns {Array|getMenuList.menuList}
 */
function getMenuList() {
    $ul = $('#menu');
    $lis = $ul.find('li'); /* Finds all sub li under menu ul(find all menus) */

    var menuList = [];
    $lis.each(function () {
        var menu = {};
        $curLi = $(this);
        $curUls = $curLi.find('ul');/* Finds all sub ul under li(find all submenus) */
        var len = $curUls.length;
        if (len !== 0) {
            alert('Found Submenu');
            // TODO need to add codes for handling submenus
        }
        $curA = $curLi.find('a');
        var a_href = $curA.attr('href');
        var menu_text = $curA.text();
        /*if(a_href === 'undefined'){
         
         }*/
        menu['menuTitle'] = menu_text;
        menu['aHref'] = a_href;
        menuList.push(menu);
    });
    return menuList;
}

/*
 * Calls ajax to save the page contents(menu, submenu, contents etc)
 * @returns {undefined}
 */
function savePage(user_id, template_id) {
    //var user_id = 'id', template_id = '87349q64';

    if(isUserLoggedIn === null || isUserLoggedIn === "0") {
        alert("Please sign in to save the template");
        var redirectURL = getBaseUrl();
        window.location.href = redirectURL;
        return;
    }
    makeTemplateComponetsNotEditable();
    saveCurrentMenuText();

    //var images = [];
    //var imagesCurList = allImages[curMenu];
    //images = allImages;
    var menuList = getMenuList();
    
    if (typeof menuList.length !== 'undefined' && menuList.length > 1) {
        showSavingIcon();
        var savedName; 
        if(!isEdit) {
            var url = getPageSaverUrl();
            savedName = prompt("Enter webpage name : ", "Enter page name");

            console.log("[WB]" + user_id + " " + template_id + " SAVING...");
            saveCurrentPageImages(user_id, template_id, isEdit);
            console.log("[WB]" + user_id + " " + template_id + " SAVED!");

            insertPage(url, menuList, allImages, savedName);

        } else {
            var url = getPageUpdaterUrl();
            if(typeof template_saved_name !== 'undefined' && template_saved_name.length > 0) {
                savedName = prompt("Enter webpage name : ", template_saved_name);
            } else {
                savedName = prompt("Enter webpage name : ", "Enter page name");
            }

            console.log("[WB]" + user_id + " " + template_id + " SAVING...");
            saveCurrentPageImages(user_id, template_id, isEdit);
            console.log("[WB]" + user_id + " " + template_id + " SAVED!");

            updatePage(url, menuList, allImages, savedName);
        }
    }
    
    var x = 0;
    x++;
}



function insertPage(url, menuList, images, savedName) {
    $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {
                menulists: menuList,
                images: images,
                menucontentlist: menuContens, 
                templateid: template_id, 
                savedname: savedName, 
                categoryname:currentCategory, 
                templatename:currentTemplate,
                images: images
            },
            success: function (obj, textstatus) {
                hideSavingIcon();
                if (!('error' in obj)) {
                    //yourVariable = obj.result;
                    if(obj.saveUserTemplate === '1' && 'savedTemplateId' in obj) {
                        alert('Saved Successfully!!!');
                        var savedTemplateID = obj.savedTemplateId;
                        var redirectURL = getBaseUrl()+'/views/content_views/template_editor.php?category='+currentCategory+'&template='+currentTemplate+'&templateid='+savedTemplateID;
                        window.location.href = redirectURL;
                    } else {
                        alert('Error occured during saving!!!');
                    }
                    
                }
                else {
                    console.log(obj.error);
                    alert('Error: ' + obj.error);
                }
            },
            error: function(xhr, status, error) {
                hideSavingIcon();
                var err =  xhr.responseText;
                alert(err);
            }
        });
}

function updatePage(url, menuList, imagesList, savedName) {
    $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {menulists: menuList, images: imagesList, menucontentlist: menuContens, templateid: template_id, savedname: savedName, categoryname:currentCategory, templatename:currentTemplate, menuidlist:user_menu_id_array},
            success: function (obj, textstatus) {
                console.log("[WB]" + textstatus + "%%%####");
                hideSavingIcon();
                if (!('error' in obj)) {
                    if(obj.saveUserTemplate === '1') {
                        alert('Updated Successfully!!!');
                        ///views/content_views/template_editor.php?category=uncategorized&template=part1&templateid=uncategorized_part1_1_2015_08_13_04_56_32_pm
                        var redirectURL = getBaseUrl()+'/views/content_views/template_editor.php?category='+currentCategory+'&template='+currentTemplate+'&templateid='+template_id;
                        window.location.href = redirectURL;
                    } else {
                        alert('Error occured during saving!!!');
                    }
                    
                }
                else {
                    alert('Error: ' + obj.error);
                }
            },
            error: function(xhr, status, error) {
                hideSavingIcon();
                var err =  xhr.responseText;
                alert(err);
            }
        });
}
/*
 * Shows loading icons while saving operation is ongoing
 */
function showSavingIcon() {
    $('#showsaveicon').show();
}
/*
 * Hides loading icon after finishing saving operation
 */
function hideSavingIcon() {
    $('#showsaveicon').hide();
}