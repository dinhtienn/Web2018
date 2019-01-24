<div class="user-body-homepage">
    <div class="container">
        <ul id="user-menu" class="f-regular-25">
            <li><a href="#user-infomation">Thông tin cá nhân</a></li>
            <li><a href="#post-management">Quản lý bài viết</a></li>
            <li><a href="#post-create">Đăng bài</a></li>
        </ul>
        <div class="content-container f-regular-16">
            <div id="user-infomation" class="panel">
                <?php foreach ($list_info as $key => $value) { ?>
                    <div class="info-element d-flex">
                        <div class="info-name"><?php echo $key ?></div>
                        <div class="info-content"><?php echo $value ?></div>
                    </div>
                <?php } ?>
                <div class="update-button"><button class="f-medium-17">Cập nhật thông tin</button></div>
            </div>
            <div id="post-management" class="panel">
                <table>
                    <tr class="table-heading f-regular-15">
                        <th>Tiêu đề</th>
                        <th>Lớp</th>
                        <th>Chủ đề</th>
                        <th>Lượt xem</th>
                        <th>Lượt thích</th>
                        <th style="width: 30%">Nội dung</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php foreach ($all_posts as $post) {
                        $post_id = "'$post->id'" ?>
                        <tr class="f-regular-14">
                            <td><?php echo $post->title ?></td>
                            <td><?php echo $post->class ?></td>
                            <td><?php echo $post->subject ?></td>
                            <td><?php echo $post->view_num ?></td>
                            <td><?php echo $post->like_num ?></td>
                            <td>Có xu hướng công khai đe dọa các đồng minh lâu năm, nhưng lại gần gũi với kẻ thù và cự tuyệt mọi lời tư vấn có xu hướng công khai đe dọa các đồng minh lâu năm</td>
                            <td>
                                <a href="editPost.php?postID=<?php echo $post_id ?>">Sửa</a>
                                <a href="deletePost.php?postID=<?php echo $post_id ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
            <div id="post-create" class="panel">
                <form method="post">
                    <div class="post-banner">
                        <h1 class="f-regular-25">Đăng bài viết</h1>
                        <hr>
                        <h6 class="f-regular-15">Đóng góp cho cộng đồng những bài viết bổ ích</h6>
                    </div>
                    <div class="form-element">
                        <label for="title">Tiêu đề</label>
                        <input class="title-input" type="text" name="title" placeholder="Tiêu đề" required>
                    </div>
                    <div class="form-element double-element">
                        <div>
                            <label for="class">Lớp</label>
                            <input class="class-input" type="text" name="class" placeholder="Lớp" required>
                        </div>
                        <div>
                            <label for="subject">Chủ đề</label>
                            <input class="subject-input" type="text" name="subject" placeholder="Chủ đề" required>
                        </div>
                    </div>
                    <div class="form-element">
                        <label for="content">Nội dung</label>
                        <textarea class="content-input" name="content" placeholder="Nội dung" required></textarea>
                        <script>CKEDITOR.replace( 'content' )</script>
                    </div>
                    <button type="submit" name="submit">Đăng bài</button>
                </form>
            </div>
        </div>
    </div>
</div>