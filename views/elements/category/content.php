<div class="content">
    <div class="container d-flex">
        <?php if ($view == "basic") {
            require_once 'contentBasic.php';
        } else {
            require_once 'contentSubject.php';
        } ?>
        <?php require_once 'sideBar.php'?>
    </div>
</div>