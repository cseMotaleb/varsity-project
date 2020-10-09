<div class="dc-settingscontent dc-tabsinfo">
    <?php if(!empty($avatar)): ?>
        <upload-media
        :title="'<?php echo e(trans('lang.profile_photo')); ?>'"
        :img="'<?php echo e($avatar); ?>'"
        :img_id="'avatar_img'"
        :img_name="'avatar_img'"
        :img_ref="'avatar_img'"
        :img_hidden_name="'avatar_img'"
        :img_hidden_id="'hidden_avatar_img'"
        :existed_img="'<?php echo e($avatar); ?>'"
        :url="'<?php echo e(url("media/upload-temp-image/users/avatar_img/profile_img")); ?>'"
        :existing_img_url="'<?php echo e(url('uploads/users/'.Auth::user()->id.'/'.$avatar.'')); ?>'"
        :size = "'<?php echo e(Helper::getImageDetail( $avatar, 'size', 'uploads/users/'.Auth::user()->id)); ?>'"
        :existing_img_name = "'<?php echo e(Helper::getImageDetail( $avatar, 'name', 'uploads/users/'.Auth::user()->id)); ?>'"
        >
        </upload-media>
    <?php else: ?>
        <div class = "dc-formtheme dc-userform">
            <upload-media
            :title="'<?php echo e(trans('lang.profile_photo')); ?>'"
            :img="'avatar_img'"
            :img_id="'avatar_img'"
            :img_name="'avatar_img'"
            :img_ref="'avatar_img'"
            :img_hidden_name="'avatar_img'"
            :img_hidden_id="'hidden_avatar_img'"
            :url="'<?php echo e(url("media/upload-temp-image/users/avatar_img/profile_img")); ?>'"
            >
            </upload-media>
        </div>
    <?php endif; ?>
</div>
<div class="dc-settingscontent dc-tabsinfo">
    <?php if(!empty($banner)): ?>
        <upload-media
        :title="'<?php echo e(trans('lang.banner_photo')); ?>'"
        :img="'<?php echo e($banner); ?>'"
        :img_id="'avatar_banner_img'"
        :img_name="'avatar_banner_img'"
        :img_ref="'avatar_banner_img'"
        :img_hidden_name="'avatar_banner_img'"
        :img_hidden_id="'hidden_avatar_banner_img'"
        :existed_img="'<?php echo e($banner); ?>'"
        :url="'<?php echo e(url("media/upload-temp-image/users/avatar_banner_img/profile_banner")); ?>'"
        :existing_img_url="'<?php echo e(url('uploads/users/'.Auth::user()->id.'/'.$banner.'')); ?>'"
        :size = "'<?php echo e(Helper::getImageDetail( $banner, 'size', 'uploads/users/' .Auth::user()->id)); ?>'"
        :existing_img_name = "'<?php echo e(Helper::getImageDetail( $banner, 'name', 'uploads/users/' .Auth::user()->id)); ?>'"
        >
        </upload-media>
    <?php else: ?>
    <div class = "dc-formtheme dc-userform">
        <upload-media
        :title="'<?php echo e(trans('lang.banner_photo')); ?>'"
        :img="'avatar_banner_img'"
        :img_id="'avatar_banner_img'"
        :img_name="'avatar_banner_img'"
        :img_ref="'avatar_banner_img'"
        :img_hidden_name="'avatar_banner_img'"
        :img_hidden_id="'hidden_avatar_banner_img'"
        :url="'<?php echo e(url("media/upload-temp-image/users/avatar_banner_img/profile_banner")); ?>'"
        >
        </upload-media>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/profile-settings/personal-detail/media.blade.php ENDPATH**/ ?>