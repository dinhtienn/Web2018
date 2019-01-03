// Opacity when hovering navBar
var layerOpacity = document.getElementsByClassName("layer-opacity")[0];
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
    document.getElementsByTagName('body')[0].style.overflow = "hidden";
}

closeButton.onclick = function() {
    navTag.style.marginLeft = `-${0.7 * document.getElementsByTagName('body')[0].clientWidth}px`;
    layerOpacity.style.marginLeft = "-100%";
    document.getElementsByTagName('body')[0].style.overflow = "unset";
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

scrollTopButton.onclick = function() {
    scrollToTop(150, 5);
}

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

// ViewMore
var viewMoreButton = document.getElementsByClassName("view-more");
var post = document.getElementsByClassName('post-model');
var showPost = document.getElementsByClassName('tab-post');
var hiddenSubject = document.getElementsByClassName('list-post');
var loading = document.getElementsByClassName('loading')[0];
var pageButton = document.getElementsByClassName('page-button')[0];

for (let i = 0; i <= 1; i++) {
    viewMoreButton[i].onclick = function() {
        viewMoreButton[i].style.display = 'none';
        hiddenSubject[1-i].style.display = 'none';
        post[3].style.opacity = '1.0';
        loading.style.display = 'block';
    
        setTimeout(function() {
            loading.style.display = 'none';
            pageButton.style.display = 'block';
            axios({
                method: 'GET',
                url: 'https://dinhtien12298.github.io/web2018/post.json',
            }).then((data) => {
                const posts = data.data;
                const postHTML = posts.map(
                    post => 
                `    <div class="post-model">
                        <div class="post-title">
                            <a href="" class="f-medium-17">${post.title}</a>
                        </div>
                        <div class="post-heading d-flex">
                            <div class="post-author f-medium-12">
                                ${post.author}
                            </div>
                            <div class="post-info f-regular-13">
                                <div><img src="./images/homepage/icon-view.png" alt="icon-view">${post.view}</div>
                                <div><img src="./images/homepage/icon-heart.png" alt="icon-like">${post.like}</div>
                            </div>
                        </div>
                        <div class="post-content f-regular-13">
                            ${post.content}
                        </div>
                    </div>`
                );
                showPost[i].innerHTML += `${postHTML.join("")}`;
            });
        }, 1300);
    }
}