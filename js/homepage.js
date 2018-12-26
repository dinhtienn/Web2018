// Opacity when hovering navBar
var layerOpacity = document.getElementsByClassName("layer_opacity")[0];
var subMenu = document.getElementsByClassName("sub-menu");
for (i = 0; i < subMenu.length; i++) {
    subMenu[i].onmouseover = function() {
        layerOpacity.style.height = document.getElementsByTagName('body')[0].clientHeight + "px";
    };
    subMenu[i].onmouseout = function() {
        layerOpacity.style.height = "0px";
    }
}

// Color iconSearch when focusing searchBar
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