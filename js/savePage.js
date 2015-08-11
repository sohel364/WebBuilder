/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// onload functionalities
$(document).ready(function() {
    hideSavingIcon();
});

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
 * Generates the page updater url with concatenating the base url
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
function savePage() {
    if(isUserLoggedIn === null || isUserLoggedIn === "0") {
        alert("Please sign in to save the template");
        var redirectURL = getBaseUrl();
        window.location.href = redirectURL;
    }
    saveCurrentMenuText();
    var menuList = getMenuList();
    
    
    
    
    if (menuList.length !== 'undefined' && menuList.length > 1) {
        showSavingIcon();
        if(!isView) {
            var url = getPageSaverUrl();
            var savedName = prompt("Enter webpage name : ", "Enter page name");
            insertPage(url, menuList, savedName);
        } else {
            var url = getPageUpdaterUrl();
            var savedName = prompt("Enter webpage name : ", "Enter page name");
            updatePage(url, menuList, savedName);
        }
    }
    
    var x = 0;
    x++;
}



function insertPage(url, menuList, savedName) {
    $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {menulists: menuList, menucontentlist: menuContens, templateid: template_id, savedname: savedName, categoryname:currentCategory, templatename:currentTemplate},
            success: function (obj, textstatus) {
                hideSavingIcon();
                if (!('error' in obj)) {
                    //yourVariable = obj.result;
                    if(obj.saveUserTemplate === '1') {
                        alert('Saved Successfully!!!');
                    } else {
                        alert('Error occured during saving!!!');
                    }
                    
                }
                else {
                    //console.log(obj.error);
                    alert('Error: ' + obj.error);
                }
            },
            error: function(xhr, status, error) {
                hideSavingIcon();
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
}

function updatePage(url, menuList, savedName) {
    alert("Updating");
    //return;
    $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {menulists: menuList, menucontentlist: menuContens, templateid: template_id, savedname: savedName, categoryname:currentCategory, templatename:currentTemplate, menuidlist:user_menu_id_array},
            success: function (obj, textstatus) {
                hideSavingIcon();
                if (!('error' in obj)) {
                    //yourVariable = obj.result;
                    if(obj.saveUserTemplate === '1') {
                        alert('Updated Successfully!!!');
                    } else {
                        alert('Error occured during saving!!!');
                    }
                    
                }
                else {
                    //console.log(obj.error);
                    alert('Error: ' + obj.error);
                }
            },
            error: function(xhr, status, error) {
                hideSavingIcon();
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
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