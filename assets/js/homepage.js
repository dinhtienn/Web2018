var subjectTab = document.getElementsByClassName('subject-tab');
var tabPost = document.getElementsByClassName('tab-post');
var viewAllTag = document.getElementsByClassName('view-all-tag');

for (let i = 0; i < subjectTab.length; i++) {
    if (i == 0 || i == 4) {
        subjectTab[i].classList.add('subject-active');
    }
    subjectTab[i].onclick = function() {
        var subjectActive = document.getElementsByClassName('subject-active');
        for (let j = 0; j < subjectActive.length; j++) {
            if (j == parseInt(i/4)) {
                subjectActive[j].classList.remove('subject-active');
            }
        }
        subjectTab[i].classList.add('subject-active');
        for (let k = 0; k < tabPost.length; k++) {
            if (k == parseInt(i/4)) {
                axios({
                    method: 'GET',
                    url: `/miny/controllers/contentHomepage.php`,
                    params: {
                        "subjectId": subjectTab[i].dataset.subjectid,
                    }
                }).then((data) => {
                    console.log(data);
                })
            }
        }
    }
}

for (let i = 0; i < viewAllTag.length; i++) {
    viewAllTag[i].onclick = function() {
        var subjectActive = document.getElementsByClassName('subject-active');
        for (let j = 0; j < subjectActive.length; j++) {
            if (j == parseInt(i/4)) {
                window.location.href = `/miny/category.php?class=${viewAllTag[i].dataset.classname}&subject=${subjectActive[j].innerHTML}&page=1`;
            }
        }
    }
}