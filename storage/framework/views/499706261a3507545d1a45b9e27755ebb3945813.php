<?php echo Form::open(['class' =>'dc-formtheme dc-userform', 'id' =>'home-banner-form', '@submit.prevent'=>'submitHomeSliderSettings']); ?>

    <div class="dc-settingscontent dc-tabsinfo dc-sliderimg-holder">
        <div class = "dc-formtheme dc-userform">
            <?php if(!empty($slider_bg_image)): ?>
                <upload-media
                :title="'<?php echo e(trans('lang.slider_background_image')); ?>'"
                :img="'<?php echo e($slider_bg_image); ?>'"
                :img_id="'slider_bg_img'"
                :img_name="'slider_bg_img'"
                :img_ref="'slider_bg_img'"
                :img_hidden_name="'slider_bg_img'"
                :img_hidden_id="'hidden_slider_bg_img'"
                :existed_img="'<?php echo e($slider_bg_image); ?>'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/slider_bg_img")); ?>'"
                :existing_img_url="'<?php echo e(url("uploads/settings/home/$slider_bg_image")); ?>'"
                :size = "'<?php echo e(Helper::getImageDetail( $slider_bg_image, 'size', 'uploads/settings/home')); ?>'"
                :existing_img_name = "'<?php echo e(Helper::getImageDetail( $slider_bg_image, 'name', 'uploads/settings/home')); ?>'"
                >
                </upload-media>
            <?php else: ?>
                <upload-media
                :title="'<?php echo e(trans('lang.slider_background_image')); ?>'"
                :img="'slider_bg_img'"
                :img_id="'slider_bg_img'"
                :img_name="'slider_bg_img'"
                :img_ref="'slider_bg_img'"
                :img_hidden_name="'slider_bg_img'"
                :img_hidden_id="'hidden_slider_bg_img'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/slider_bg_img")); ?>'"
                >
                </upload-media>
            <?php endif; ?>
        </div>
    </div>
    <div class="dc-tabsinfo dc-addslider-holder">
        <home-slider
            :ph_slide_title_one="'<?php echo e(trans('lang.ph.slide_title_one')); ?>'"
            :ph_slide_title_two="'<?php echo e(trans('lang.ph.slide_title_two')); ?>'"
            :ph_slide_title_three="'<?php echo e(trans('lang.ph.slide_title_three')); ?>'"
            :ph_slide_btn_title_one="'<?php echo e(trans('lang.ph.slide_btn_title_one')); ?>'"
            :ph_slide_btn_url_one="'<?php echo e(trans('lang.ph.slide_btn_url_one')); ?>'"
            :ph_slide_btn_title_two="'<?php echo e(trans('lang.ph.slide_btn_title_two')); ?>'"
            :ph_slide_btn_url_two="'<?php echo e(trans('lang.ph.slide_btn_url_two')); ?>'"
        >
        </home-slider>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-btn-setting">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php $__env->startSection('bootstrap_script'); ?>
    <script src="<?php echo e(asset('js/vendor/bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/home-page-settings/home-slider.blade.php ENDPATH**/ ?>