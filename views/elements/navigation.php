<nav id="nav">
    <div class="nav-mobile-container">
        <div class="logo">
            <a class="d-none" href=""><img src="./assets/images/all/logo.png" alt=""></a>
            <i id="close-nav-mobile" class="d-none fas fa-arrow-left" onclick="isHidden()"></i>
        </div>
        <div class="d-none menu-name">
            <p>Danh mục</p>
        </div>
        <div class="container d-flex f-medium-15">
            <?php foreach(array_reverse($all_classes) as $class) { ?>
                <div class="sub-menu" onmousemove="menuAppear()" onmouseout="menuDisappear()">
                    <div class="sub-title">
                        <a href="/miny/category.php?class=<?php echo $class->class ?>"><?php echo "$class->class"; ?></a>
                        <i class="icon-down icon-plus d-none fas fa-plus"></i>
                        <i class="icon-down icon-minus d-none fas fa-minus"></i>
                    </div>
                    <?php $list_subjects = findSubjectByClass($class->class);
                    if ( !empty($list_subjects) && sizeof($list_subjects) != 0 ) { ?>
                        <div class="subject f-regular-13">
                            <div class="subject-column1">
                                <?php for ($i = 0; $i < sizeof($list_subjects) - intval(sizeof($list_subjects) / 2); $i++) { ?>
                                    <div class="menu-item" data-location="/miny/category.php?class=<?php echo $class->class ?>&subject=<?php echo $list_subjects[$i]->subject ?>&page=1"><a href="/miny/category.php?class=<?php echo $class->class ?>&subject=<?php echo $list_subjects[$i]->subject ?>&page=1"><?php echo $list_subjects[$i]->subject; ?></a></div>
                                <?php } ?>
                            </div>
                            <div class="subject-column2">
                                <?php for ($i = intval(sizeof($list_subjects) / 2) + 1; $i < sizeof($list_subjects); $i++) { ?>
                                    <div class="menu-item" data-location="/miny/category.php?class=<?php echo $class->class ?>&subject=<?php echo $list_subjects[$i]->subject ?>&page=1"><a href="/miny/category.php?class=<?php echo $class->class ?>&subject=<?php echo $list_subjects[$i]->subject ?>&page=1"><?php echo $list_subjects[$i]->subject; ?></a></div>
                                <?php } ?>
                            </div>
                            <?php $class_split = explode(" ", $class->class); ?>
                            <div class="subject-column3">
                                <img src="./assets/images/all/<?php echo $class_split[1]; ?>.png" alt="menu<?php echo $class_split[1]; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>