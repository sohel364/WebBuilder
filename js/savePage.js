/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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


function getBodyHtmlString() {
    var bodyHtml = $('#body').html();
    return bodyHtml;
}

function savePage() {
    var menuList = getMenuList();
    var bodyHtmlString = getBodyHtmlString();
    if (menuList.length !== 'undefined' && menuList.length > 1) {
        $.ajax({
            type: "POST",
            url: 'http://localhost/PhpProject2/views/content_views/pageSaver.php',
            dataType: 'json',
            data: {menulists: menuList, bodyhtml: bodyHtmlString, templateid: template_id},
            success: function (obj, textstatus) {
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
            }
        });
    }
    var x = 0;
    x++;
}