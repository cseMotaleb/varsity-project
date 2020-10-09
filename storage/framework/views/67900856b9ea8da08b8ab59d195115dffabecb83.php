<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'home-aboutus-section-form', '@submit.prevent'=>'submitHomeAboutUsSettings']); ?>

    <div class="dc-securitysettings dc-tabsinfo dc-about-setting">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.about_us_section_settings')); ?></h3>
            <div class="float-right">
                <switch_button v-model="show_about_sec"><?php echo e(trans('lang.show_or_hide_section')); ?></switch_button>
                <input type="hidden" :value="show_about_sec" name="show_about_sec">
            </div>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('title', e($about_title), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.title')]); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::text('subtitle', e($about_subtitle), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.sub_heading')]); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::textarea('description', e($about_desc), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.desc')]); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('btn_one_title', e($about_btn_one_title), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.btn_one_title')]); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('btn_one_url', e($about_btn_one_url), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.btn_one_url')]); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('btn_two_title', e($about_btn_two_title), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.btn_two_title')]); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('btn_two_url', e($about_btn_two_url), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.btn_two_url')]); ?>

                    </div>
                    <div class="dc-settingscontent dc-dbsectionspace upload-imgresizehold">
                        <div class = "dc-formtheme dc-userform">
                            <?php if(!empty($about_img)): ?>
                                <upload-media
                                :title="'<?php echo e(trans('lang.about_us_section_image')); ?>'"
                                :img="'<?php echo e($about_img); ?>'"
                                :img_id="'about_us_img'"
                                :img_name="'about_us_img'"
                                :img_ref="'about_us_img'"
                                :img_hidden_name="'hidden_about_us_img'"
                                :img_hidden_id="'hidden_about_us_img'"
                                :existed_img="'<?php echo e($about_img); ?>'"
                                :url="'<?php echo e(url("media/upload-temp-image/settings/about_us_img")); ?>'"
                                :existing_img_url="'<?php echo e(url("uploads/settings/home/$about_img")); ?>'"
                                :size = "'<?php echo e(Helper::getImageDetail( $about_img, 'size', 'uploads/settings/home')); ?>'"
                                :existing_img_name = "'<?php echo e(Helper::getImageDetail( $about_img, 'name', 'uploads/settings/home')); ?>'"
                                >
                                </upload-media>
                            <?php else: ?>
                                <upload-media
                                :title="'<?php echo e(trans('lang.about_us_section_image')); ?>'"
                                :img="'about_us_img'"
                                :img_id="'about_us_img'"
                                :img_name="'about_us_img'"
                                :img_ref="'about_us_img'"
                                :img_hidden_name="'hidden_about_us_img'"
                                :img_hidden_id="'hidden_about_us_img'"
                                :url="'<?php echo e(url("media/upload-temp-image/settings/about_us_img")); ?>'"
                                >
                                </upload-media>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('img_title', e($about_img_title), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.img_title')]); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('img_subtitle', e($about_img_subtitle), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.img_subtitle')]); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-btn-setting">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/home-page-settings/about-us-section.blade.php ENDPATH**/ ?>