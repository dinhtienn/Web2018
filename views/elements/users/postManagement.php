<div id="post-management">
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
                <td class="content-column"><?php echo $post->content ?></td>
                <td>
                    <a href="/miny/detail.php?post=<?php echo $post->id ?>">Xem</a>
                    <a href="/miny/userHome.php?update=<?php echo $post_id ?>">Sửa</a>
                    <a href="controllers/userDeletePost.php?postID=<?php echo $post_id ?>">Xóa</a>
                </td>
            </tr>
        <?php }?>
    </table>
</div>