<div id="user-infomation">
    <?php foreach ($list_info as $key => $value) { ?>
        <div class="info-element d-flex">
            <div class="info-name"><?php echo $key ?></div>
            <div class="info-content"><?php echo $value ?></div>
        </div>
    <?php } ?>
    <div class="update-button"><button class="f-medium-17">Cập nhật thông tin</button></div>
</div>