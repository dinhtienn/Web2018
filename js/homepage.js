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
var navMobileContainer = document.getElementsByClassName("nav-mobile-container")[0];
var closeButton = document.getElementsByClassName("close-nav-mobile")[0];

menuButton.onclick = function() {
    navTag.style.width = "70%";
    setTimeout(function(){
        navMobileContainer.style.display = "block";
        layerOpacity.style.width = "100%";
    }, 200);
    layerOpacity.style.height = document.getElementsByTagName('body')[0].clientHeight + "px";
}

closeButton.onclick = function() {
    navMobileContainer.style.display = "none";
    navTag.style.width = "0%";
    layerOpacity.style.width = "0";
    setTimeout(function(){
        layerOpacity.style.height = "0px";
    }, 200);
}

// Mobile: Menu Accordion
// var iconDown = document.getElementsByClassName("icon-down");
// var subject = document.getElementsByClassName("subject");

// for (let i = 0; i < iconDown.length; i++) {
//     subMenu[i].onclick = function() {
//         if (window.outerWidth <= 768) {
//             if (subject[i].style.display = "none") {
//                 subject[i].style.display = "flex";
//             } 
            
//             else if (subject[i].style.display = "flex") {
//                 subject[i].style.display = "none";
//             }
//         }
//     }
// }