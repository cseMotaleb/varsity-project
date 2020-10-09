<div class="dc-emaillogo dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.email_logo')); ?></h3>
    </div>
    <div class="dc-settingscontent">
        <?php if(!empty($email_logo)): ?> 
            <upload-media
                :img="'<?php echo e($email_logo); ?>'"
                :img_id="'email_logo'"
                :img_name="'email_logo'"
                :img_ref="'email_logo'"
                :img_hidden_name="'email_logo'"
                :img_hidden_id="'hidden_email_logo'"
                :existed_img="'<?php echo e($email_logo); ?>'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/email_logo")); ?>'"
                :existing_img_url="'<?php echo e(url("uploads/settings/email-settings/".$email_logo)); ?>'"
                :size = "'<?php echo e(Helper::getImageDetail( $email_logo, 'size', 'uploads/settings/email-settings')); ?>'"
                >
            </upload-media>
        <?php else: ?>
            <upload-media
                :img="'email_logo'"
                :img_id="'email_logo'"
                :img_name="'email_logo'"
                :img_ref="'email_logo'"
                :img_hidden_name="'email_logo'"
                :img_hidden_id="'hidden_email_logo'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/email_logo")); ?>'"
                >
            </upload-media>
        <?php endif; ?>
    </div>
</div><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/email-settings/logo.blade.php ENDPATH**/ ?>