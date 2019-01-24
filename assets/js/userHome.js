var menuUser = document.getElementsByTagName('li');

for (let i = 0; i < 3; i++) {
    if (menuUser[i]) {
        menuUser[i].onclick = function() {
            if (i == 0) {
                window.location.href = '/miny/userHome.php#user-infomation';
            }
            else if (i == 1) {
                window.location.href = '/miny/userHome.php#post-management';
            }
            else if (i == 2) {
                window.location.href = '/miny/userHome.php#post-create';
            }
        }
    }
}
