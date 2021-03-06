<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'elements/metaData.php'?>
    <link rel="stylesheet" href="./assets/css/detail.css">
</head>
<body>
    <?php require_once 'elements/signup.php' ?>
    <?php require_once 'elements/login.php'?>
    <?php require_once 'elements/layerOpacity.php'?>
    <?php require_once 'elements/scrollTop.php'?>
    <?php require_once 'elements/header.php'?>
    <?php require_once 'elements/mobileHeader.php' ?>
    <?php require_once 'elements/navigation.php'?>
    <?php require_once 'elements/detail/banner.php'?>
    <?php require_once 'elements/detail/content.php' ?>
    <?php require_once 'elements/footer.php'?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./assets/js/common.js"></script>
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="./assets/js/layoutTest.js"></script>
</body>
</html>