<div class="dc-location dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.email_banner')); ?></h3>
    </div>
    <div class="dc-settingscontent">
        <?php if(!empty($email_banner)): ?> 
            <upload-media
                :img="'<?php echo e($email_banner); ?>'"
                :img_id="'email_banner'"
                :img_name="'email_banner'"
                :img_ref="'email_banner'"
                :img_hidden_name="'email_banner'"
                :img_hidden_id="'hidden_email_banner'"
                :existed_img="'<?php echo e($email_banner); ?>'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/email_banner")); ?>'"
                :existing_img_url="'<?php echo e(url("uploads/settings/email-settings/".$email_banner)); ?>'"
                :size = "'<?php echo e(Helper::getImageDetail( $email_banner, 'size', 'uploads/settings/email-settings')); ?>'"
                :width="600"
                >
            </upload-media>
        <?php else: ?>
            <upload-media
                :img="'email_banner'"
                :img_id="'email_banner'"
                :img_name="'email_banner'"
                :img_ref="'email_banner'"
                :img_hidden_name="'email_banner'"
                :img_hidden_id="'hidden_email_banner'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/email_banner")); ?>'"
                :width="600"
                >
            </upload-media>
        <?php endif; ?>
    </div>
</div><?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/email-settings/banner.blade.php ENDPATH**/ ?>