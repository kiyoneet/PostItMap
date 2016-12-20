<div class="status">
    <div class="status_content">
        <a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($status['email_address']); ?>">
            <?php echo $this->escape($status['email_address']); ?>
        </a>
        <?php echo $this->escape($status['body']); ?>
    </div>
    <div>
        <a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($status['email_address']);
        ?>/status/<?php echo $this->escape($status['id']); ?>">
            <?php echo $this->escape($status['created_at']); ?>
        </a>
    </div>
</div>
