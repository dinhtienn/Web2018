<div class="content">
    <div class="container">
        <div class="d-flex">
            <?php if ($view == "basic") {
                require_once 'contentBasic.php';
            } else {
                require_once 'contentSubject.php';
            } ?>
            <?php require_once 'sideBar.php'?>
        </div>
        <div class="page-button">
            <?php global $page_button;
            for ($i = 0; $i < $page_button; $i++) {?>
                <a href="/miny/category.php?class=<?php echo $_GET['class'] ?>&subject=<?php echo $_GET['subject'] ?>&page=<?php echo $i + 1 ?>"><button class="paginate-button f-regular-14"><?php echo $i + 1 ?></button></a>
            <?php }?>
        </div>
    </div>
</div>