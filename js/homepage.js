// Opacity when hovering navBar
var layerOpacity = document.getElementsByClassName("layer_opacity")[0];
var subMenu = document.getElementsByClassName("sub-menu");
for (i = 0; i < subMenu.length; i++) {
    subMenu[i].onmouseover = function() {
        if (window.outerWidth > 768) {
            layerOpacity.style.height = document.getElementsByTagName('body')[0].clientHeight + "px";
        }
    };
    subMenu[i].onmouseout = function() {
        if (window.outerWidth > 768) {
            layerOpacity.style.height = "0px";
        }
    }
}

// iconSearch change color and searchBar scale when focusing searchBar
var searchField = document.getElementById("search");
var iconSearch = document.getElementsByTagName("i")[0];
searchField.onfocus = function() {
    iconSearch.style.color = "#ff9900";
    iconSearch.style.transform = "scale(1.3)";
}
searchField.onblur = function () {
    iconSearch.style.color = "#7088a9";
    iconSearch.style.transform = "scale(1)";
}

// Mobile: Menu CanVas
var menuButton = document.getElementById("icon-nav");
let navTag = document.getElementsByTagName("nav")[0];
var closeButton = document.getElementsByClassName("close-nav-mobile")[0];

if (window.outerWidth <= 768) {
    layerOpacity.style.height = document.getElementsByTagName('body')[0].clientHeight + "px";
}

menuButton.onclick = function() {
    navTag.style.marginLeft = "0";
    layerOpacity.style.marginLeft = "0";
}

closeButton.onclick = function() {
    navTag.style.marginLeft = `-${0.7 * document.getElementsByTagName('body')[0].clientWidth}px`;
    layerOpacity.style.marginLeft = "-100%";
}

// Mobile: Menu Accordion
var subject = document.getElementsByClassName("subject");
var iconPlus = document.getElementsByClassName("icon-plus");
var iconMinus = document.getElementsByClassName("icon-minus");

for (let i = 0; i < subMenu.length; i++) {
    subMenu[i].addEventListener("click", function() {
        var current = subMenu[i];
        var list_menu_active = document.getElementsByClassName('menu-active');
        if (list_menu_active.length) {
            for (let i = 0; i < list_menu_active.length; i++) {
                if (current == list_menu_active[i]) { continue };
                list_menu_active[i].classList.remove('menu-active');
            }
        }
        
        if(current.classList.contains('menu-active')){
           current.classList.remove('menu-active'); 
        }
        else {
            current.classList.add('menu-active');
        }
    })
}