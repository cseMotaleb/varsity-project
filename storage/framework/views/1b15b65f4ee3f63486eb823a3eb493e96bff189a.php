<div class="dc-emailavatar dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.email_sender_avatar')); ?></h3>
    </div>
    <div class="dc-settingscontent">
        <?php if(!empty($sender_avatar)): ?>
            <upload-media
                :img="'<?php echo e($sender_avatar); ?>'"
                :img_id="'sender_avatar'"
                :img_name="'sender_avatar'"
                :img_ref="'sender_avatar'"
                :img_hidden_name="'sender_avatar'"
                :img_hidden_id="'hidden_sender_avatar'"
                :existed_img="'<?php echo e($sender_avatar); ?>'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/sender_avatar")); ?>'"
                :existing_img_url="'<?php echo e(url("uploads/settings/email-settings/".$sender_avatar)); ?>'"
                :size = "'<?php echo e(Helper::getImageDetail( $sender_avatar, 'size', 'uploads/settings/email-settings')); ?>'"
                >
            </upload-media>
        <?php else: ?>
            <upload-media
                :img="'sender_avatar'"
                :img_id="'sender_avatar'"
                :img_name="'sender_avatar'"
                :img_ref="'sender_avatar'"
                :img_hidden_name="'sender_avatar'"
                :img_hidden_id="'hidden_sender_avatar'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/sender_avatar")); ?>'"
                >
            </upload-media>
        <?php endif; ?>
    </div>
</div><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/email-settings/sender-avatar.blade.php ENDPATH**/ ?>