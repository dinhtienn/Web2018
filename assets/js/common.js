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

// Login
var formContainer = document.getElementsByClassName('login-container')[0];
var loginForm = document.getElementsByClassName('login-form')[0];
var closeFormButton = document.getElementsByClassName('close-form')[0];

function showForm() {
    formContainer.style.display = "block";
    formContainer.style.background = "rgba(94, 120, 153, 0.9)";
    document.getElementsByTagName('body')[0].style.overflow = "hidden";
    setTimeout(function() {
        loginForm.style.opacity = "1.0"
    }, 100);
}

function closingForm(value) {
    if (value == true) {
        loginForm.style.opacity = "0";
        setTimeout(function() {
            formContainer.style.display = "none";
            formContainer.style.background = "#ffffff";
            document.getElementsByTagName('body')[0].style.overflow = "unset";
        }, 200);
    }
}

function closeForm(event) {
    let isClose = false;
    if (event.clientX < loginForm.offsetLeft
        || event.clientX > loginForm.offsetLeft + loginForm.clientWidth
        || event.clientY < loginForm.offsetTop
        || event.clientY > loginForm.offsetTop + loginForm.clientHeight
        || (
            event.clientX > closeFormButton.offsetLeft + loginForm.offsetLeft
            && event.clientX < closeFormButton.offsetLeft + loginForm.offsetLeft + closeFormButton.clientWidth
            && event.clientY > closeFormButton.offsetTop + loginForm.offsetTop
            && event.clientY < closeFormButton.offsetTop + loginForm.offsetTop + closeFormButton.clientHeight
        )
    ) { isClose = true }
    closingForm(isClose);
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