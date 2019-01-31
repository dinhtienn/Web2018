<!doctype html>
<html lang="en">
<head>
    <?php require_once 'elements/metaData.php'?>
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="./assets/css/userHome.css">
</head>
<body>
    <?php if (isset($_SESSION['username'])) {
        require_once 'elements/layerOpacity.php';
        require_once 'elements/header.php';
        require_once 'elements/navigation.php';
        require_once 'elements/users/body.php';
        require_once 'elements/footer.php' ?>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="./assets/js/common.js"></script>
        <script src="./assets/js/layoutTest.js"></script>
    <?php } else {
        header('location: homepage.php');
        echo "
            <script>
                alert('Bạn phải đăng nhập trước');
            </script>
        ";
    } ?>
</body>
</html>