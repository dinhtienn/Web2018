<div id="post-create">
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