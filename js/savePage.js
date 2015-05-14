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
    saveCurrentMenuText();
    var menuList = getMenuList();
    var url = getPageSaverUrl();
    if (menuList.length !== 'undefined' && menuList.length > 1) {
        showSavingIcon();
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {menulists: menuList, menucontentlist: menuContens, templateid: template_id},
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
    var x = 0;
    x++;
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