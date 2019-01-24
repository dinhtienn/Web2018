var subMenu = document.getElementsByClassName("sub-menu");
var layerOpacity = document.getElementById("layer-opacity");
var subject = document.getElementsByClassName("subject");
let body = document.getElementsByTagName("body")[0];

for (i = 0; i < subMenu.length; i++) {
    if (i != 0) {
        if (window.outerWidth > 768) {
            subMenu[i].style.marginLeft = "-1px";
        }
    }
}

function menuAppear() {
    if (window.outerWidth > 768) {
        layerOpacity.style.height = body.clientHeight + "px";
    }
}

function menuDisappear() {
    if (window.outerWidth > 768) {
        layerOpacity.style.height = "0px";
    }
}

function isDisplay() {
    layerOpacity.style.height = body.clientHeight + "px";
    setTimeout(function() {
        document.getElementById("nav").style.marginLeft = "0";
        layerOpacity.style.marginLeft = "0";
        body.style.overflow = "hidden";
    }, 1);
}

function isHidden() {
    document.getElementById("nav").style.marginLeft = `-${0.7 * body.clientWidth}px`;
    layerOpacity.style.marginLeft = "-100%";
    body.style.overflow = "unset";
    setTimeout(function() {
        layerOpacity.style.height = "0";
    }, 1000);
}

for (let i = 0; i < subMenu.length; i++) {
    if (i < subMenu.length && i > subMenu.length - 4 && window.outerWidth > 768) {
        subject[i].style.marginLeft = "-222%";
    }
    subMenu[i].onclick = function() {
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
    }
}

// Scroll to Top
if (document.getElementById("scroll-top")) {
    var scrollTopButton = document.getElementById("scroll-top");
    var html = document.documentElement;

    window.onscroll = function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
        } else {
            scrollTopButton.style.display = "none";
        }
    };

    function scrollToTop(totalTime, easingPower) {
        var timeLeft = totalTime;
        var scrollByPixel = setInterval(function () {
            var percentSpent = (totalTime - timeLeft) / totalTime;
            if (timeLeft >= 0) {
                var newScrollTop = html.scrollTop * (1 - Math.pow(percentSpent, easingPower));
                html.scrollTop = newScrollTop;
                timeLeft--;
            } else {
                clearInterval(scrollByPixel);
            }
        }, 1);
    }
}

// Border in Footer Menu Tab
var footerMenuItem = document.getElementsByClassName("footer-menu-item");
for (i = 0; i < footerMenuItem.length; i++) {
    if (i != 0 && i != footerMenuItem.length - 1) {
        footerMenuItem[i].classList.add('border-footer');
        if (i != 1) {
            footerMenuItem[i].style.marginLeft = "-1px";
        }
    }
}

// Click on PostModel
var postModel = document.getElementsByClassName('post-model');
for (let i = 0; i < postModel.length; i++) {
    postModel[i].onclick = function () {
        window.location.href = postModel[i].dataset.location;
    }
}

// Click on MenuItems
var menuItem = document.getElementsByClassName('menu-item');
for (let i = 0; i < menuItem.length; i++) {
    menuItem[i].onclick = function () {
        window.location.href = menuItem[i].dataset.location;
    }
}

// Login
var formContainer = document.getElementsByClassName('login-container');
var loginForm = document.getElementsByClassName('login-form');
var closeFormButton = document.getElementsByClassName('close-form');
var loginButton = document.getElementsByClassName('login-button');

for (let i = 0; i < loginButton.length; i++) {
    loginButton[i].onclick = function() {
        formContainer[i].style.display = "block";
        formContainer[i].style.background = "rgba(94, 120, 153, 0.9)";
        document.getElementsByTagName('body')[0].style.overflow = "hidden";
        setTimeout(function() {
            loginForm[i].style.opacity = "1.0"
        }, 100);
    }
}

for (let i = 0; i < closeFormButton.length; i++) {
    formContainer[i].onclick = function(event) {
        if (event.clientX < loginForm[i].offsetLeft
            || event.clientX > loginForm[i].offsetLeft + loginForm[i].clientWidth
            || event.clientY < loginForm[i].offsetTop
            || event.clientY > loginForm[i].offsetTop + loginForm[i].clientHeight
            || (
                event.clientX > closeFormButton[i].offsetLeft + loginForm[i].offsetLeft
                && event.clientX < closeFormButton[i].offsetLeft + loginForm[i].offsetLeft + closeFormButton[i].clientWidth
                && event.clientY > closeFormButton[i].offsetTop + loginForm[i].offsetTop
                && event.clientY < closeFormButton[i].offsetTop + loginForm[i].offsetTop + closeFormButton[i].clientHeight
            )
        ) {
            loginForm[i].style.opacity = "0";
            setTimeout(function() {
                formContainer[i].style.display = "none";
                formContainer[i].style.background = "#ffffff";
                document.getElementsByTagName('body')[0].style.overflow = "unset";
            }, 200);
        }
    }
}

var openOther = document.getElementsByClassName('open-other');

for (let i = 0; i < openOther.length; i++) {
    openOther[i].onclick = function() {
        // Closing
        loginForm[i].style.opacity = "0";
        setTimeout(function() {
            formContainer[i].style.display = "none";
            formContainer[i].style.background = "#ffffff";
            document.getElementsByTagName('body')[0].style.overflow = "unset";
        }, 200);
        // Opening
        setTimeout(function() {
            formContainer[1-i].style.display = "block";
            formContainer[1-i].style.background = "rgba(94, 120, 153, 0.9)";
            document.getElementsByTagName('body')[0].style.overflow = "hidden";
            setTimeout(function() {
                loginForm[1-i].style.opacity = "1.0"
            }, 100);
        }, 200)
    }
}

// Link breadcrumbs
var breadcrumbTags = document.getElementsByClassName('breadcrumb-tag');

for (let i = 0; i < breadcrumbTags.length; i++) {
    breadcrumbTags[i].onclick = function() {
        if (i == 0) {
            window.location.href = `/miny/homepage.php`;
        }
        else if (i == 1) {
            window.location.href = `/miny/category.php?class=${breadcrumbTags[1].innerHTML}`;
        }
        else if (i == 2) {
            window.location.href = `/miny/category.php?class=${breadcrumbTags[1].innerHTML}&subject=${breadcrumbTags[2].innerHTML}&page=1`;
        }
    }
}

// Click Logout
document.getElementById('logout-button').onclick = function() {
    window.location.href = `${document.getElementById('logout-button').dataset.location}`;
}

// Click User Homepage
document.getElementById('user-homepage').onclick = function () {
    window.location.href = `${document.getElementById('user-homepage').dataset.location}`;
}