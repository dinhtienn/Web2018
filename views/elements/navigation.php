<nav>
    <div class="nav-mobile-container">
        <div class="logo">
            <a class="d-none" href=""><img src="./images/all/logo.png" alt=""></a>
            <i class="close-nav-mobile d-none fas fa-arrow-left"></i>
        </div>
        <div class="d-none menu-name">
            <p>Danh mục</p>
        </div>
        <div class="container d-flex f-medium-15">
            <?php foreach(array_reverse($all_class) as $class) { ?>
                <div class="sub-menu">
                    <div class="sub-title">
                        <a href="/miny/category.php?class=<?php echo $class->class ?>"><?php echo "$class->class"; ?></a>
                        <i class="icon-down icon-plus d-none fas fa-plus"></i>
                        <i class="icon-down icon-minus d-none fas fa-minus"></i>
                    </div>
                    <?php $list_subject = findSubjectById($class->id);
                    if ( !empty($list_subject) && sizeof($list_subject) != 0 ) { ?>
                        <div class="subject f-regular-13">
                            <div class="subject-column1">
                                <?php for ($i = 0; $i < sizeof($list_subject) - intval(sizeof($list_subject) / 2); $i++) { ?>
                                    <div><a href="/miny/category.php?class=<?php echo $class->class ?>&subject=<?php echo $list_subject[$i]->subject ?>&page=1"><?php echo $list_subject[$i]->subject; ?></a></div>
                                <?php } ?>
                            </div>
                            <div class="subject-column2">
                                <?php for ($i = intval(sizeof($list_subject) / 2) + 1; $i < sizeof($list_subject); $i++) { ?>
                                    <div><a href="/miny/category.php?class=<?php echo $class->class ?>&subject=<?php echo $list_subject[$i]->subject ?>&page=1"><?php echo $list_subject[$i]->subject; ?></a></div>
                                <?php } ?>
                            </div>
                            <?php $class_split = explode(" ", $class->class); ?>
                            <div class="subject-column3">
                                <img src="./images/all/<?php echo $class_split[1]; ?>.png" alt="menu<?php echo $class_split[1]; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>