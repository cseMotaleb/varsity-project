<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'footer-setting-form', '@submit.prevent'=>'submitFooterSettings']); ?>

    <div class="dc-contactarea dc-tabsinfo">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.contact_info_area')); ?></h3>
            <div class="float-right">
                <switch_button v-model="show_contact_info_sec"><?php echo e(trans('lang.show_or_hide_section')); ?></switch_button>
                <input type="hidden" :value="show_contact_info_sec" name="show_contact_info_sec">
            </div>
        </div>
        <div class="dc-imageone dc-tabsinfo">
            <div class="dc-settingscontent">
                <?php if(!empty($c_info_img_one)): ?>
                    <upload-media
                    :title="'<?php echo e(trans('lang.image_one')); ?>'"
                    :img="'<?php echo e($c_info_img_one); ?>'"
                    :img_id="'c_info_img_one'"
                    :img_name="'c_info_img_one'"
                    :img_ref="'c_info_img_one'"
                    :img_hidden_name="'c_info_img_one'"
                    img_hidden_id="'c_info_img_one'"
                    :existed_img="'<?php echo e($c_info_img_one); ?>'"
                    :url="'<?php echo e(url("media/upload-temp-image/settings/c_info_img_one/c_info_img")); ?>'"
                    :existing_img_url="'<?php echo e(url("uploads/settings/general/footer/$c_info_img_one")); ?>'"
                    :size = "'<?php echo e(Helper::getImageDetail( $c_info_img_one, 'size', 'uploads/settings/general/footer')); ?>'"
                    :existing_img_name = "'<?php echo e(Helper::getImageDetail( $c_info_img_one, 'name', 'uploads/settings/general/footer')); ?>'"
                    >
                    </upload-media>
                <?php else: ?>
                    <upload-media
                        :title="'<?php echo e(trans('lang.image_one')); ?>'"
                        :img="'c_info_img_one'"
                        :img_id="'c_info_img_one'"
                        :img_name="'c_info_img_one'"
                        :img_ref="'c_info_img_one'"
                        :img_hidden_name="'c_info_img_one'"
                        img_hidden_id="'c_info_img_one'"
                        :url="'<?php echo e(url("media/upload-temp-image/settings/c_info_img_one/c_info_img")); ?>'"
                        >
                    </upload-media>
                <?php endif; ?>
            </div>
        </div>
        <div class="dc-location dc-tabsinfo">
            <div class="dc-tabscontenttitle">
                <h3><?php echo e(trans('lang.title_one_no')); ?></h3>
            </div>
            <div class="dc-settingscontent">
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group form-group-half">
                            <?php echo Form::text('c_info_title_one', e($c_info_title_one), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.title_one'))); ?>

                        </div>
                        <div class="form-group form-group-half">
                            <?php echo Form::text('c_info_number', e($c_info_number), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.number'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="dc-settingscontent dc-tabsinfo">
            <?php if(!empty($c_info_img_two)): ?>
                <upload-media
                :title="'<?php echo e(trans('lang.image_two')); ?>'"
                :img="'<?php echo e($c_info_img_two); ?>'"
                :img_id="'c_info_img_two'"
                :img_name="'c_info_img_two'"
                :img_ref="'c_info_img_two'"
                :img_hidden_name="'c_info_img_two'"
                img_hidden_id="'hidden_c_info_img_two'"
                :existed_img="'<?php echo e($c_info_img_two); ?>'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/c_info_img_two/c_info_img")); ?>'"
                :existing_img_url="'<?php echo e(url("uploads/settings/general/footer/$c_info_img_two")); ?>'"
                :size = "'<?php echo e(Helper::getImageDetail( $c_info_img_two, 'size', 'uploads/settings/general/footer')); ?>'"
                :existing_img_name = "'<?php echo e(Helper::getImageDetail( $c_info_img_two, 'name', 'uploads/settings/general/footer')); ?>'"
                >
                </upload-media>
            <?php else: ?>
                <upload-media
                    :title="'<?php echo e(trans('lang.image_two')); ?>'"
                    :img="'c_info_img_two'"
                    :img_id="'c_info_img_two'"
                    :img_name="'c_info_img_two'"
                    :img_ref="'c_info_img_two'"
                    :img_hidden_name="'c_info_img_two'"
                    img_hidden_id="'hidden_c_info_img_two'"
                    :url="'<?php echo e(url("media/upload-temp-image/settings/c_info_img_two/c_info_img")); ?>'"
                    >
                </upload-media>
            <?php endif; ?>
        </div>
        <div class="dc-location">
            <div class="dc-tabscontenttitle">
                <h3><?php echo e(trans('lang.title_two_email')); ?></h3>
            </div>
            <div class="dc-settingscontent">
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group form-group-half">
                            <?php echo Form::text('c_info_title_two', e($c_info_title_two), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.title_two'))); ?>

                        </div>
                        <div class="form-group form-group-half">
                            <?php echo Form::text('c_info_email', e($c_info_email), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.email'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="dc-settingscontent dc-tabsinfo">
        <?php if(!empty($footer_logo)): ?>
            <upload-media
            :title="'<?php echo e(trans('lang.footer_logo')); ?>'"
            :img="'<?php echo e($footer_logo); ?>'"
            :img_id="'footer_logo'"
            :img_name="'footer_logo'"
            :img_ref="'footer_logo'"
            :img_hidden_name="'footer_logo'"
            img_hidden_id="'hidden_footer_logo'"
            :existed_img="'<?php echo e($footer_logo); ?>'"
            :url="'<?php echo e(url("media/upload-temp-image/settings/footer_logo")); ?>'"
            :existing_img_url="'<?php echo e(url("uploads/settings/general/footer/$footer_logo")); ?>'"
            :size = "'<?php echo e(Helper::getImageDetail( $footer_logo, 'size', 'uploads/settings/general/footer')); ?>'"
            :existing_img_name = "'<?php echo e(Helper::getImageDetail( $footer_logo, 'name', 'uploads/settings/general/footer')); ?>'"
            >
            </upload-media>
        <?php else: ?>
            <upload-media
                :title="'<?php echo e(trans('lang.footer_logo')); ?>'"
                :img="'footer_logo'"
                :img_id="'footer_logo'"
                :img_name="'footer_logo'"
                :img_ref="'footer_logo'"
                :img_hidden_name="'footer_logo'"
                img_hidden_id="'hidden_footer_logo'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/footer_logo")); ?>'"
                >
            </upload-media>
        <?php endif; ?>
    </div>
    <div class="dc-aboutnote dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.about_us_note')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::textarea('about_us_note', e($footer_about_us_note), array('class' => 'form-control dc-tinymceeditor', 'id' => 'dc-footertinymceeditor', 'placeholder'=>trans('lang.ph.about_us_note'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.address')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('address', e($footer_address), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.address'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.email')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('email', e($footer_email), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.email'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.phone')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('phone', e($footer_phone), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.phone'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-edficons dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.enable_disable_footer_socials')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <ul class="dc-accountinfo">
                <li>
                    <switch_button v-model="enable_footer_socials">
                        <span><?php echo e(trans('lang.enable_footer_socials')); ?></span>
                    </switch_button>
                    <input type="hidden" :value="enable_footer_socials" name="enable_footer_socials">
                </li>
            </ul>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.copyright')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('copyright', e($footer_copyright), array('class' => 'form-control', 'placeholder'=>trans('lang.ph.copyright'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.title_one_no')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('twitter_user_name', e($twitter_user_name), array('class' => 'form-control', 'placeholder'=>trans('lang.twitter_user_name'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('consumer_key', e($consumer_key), array('class' => 'form-control', 'placeholder'=>trans('lang.consumer_key'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('consumer_secret', e($consumer_secret), array('class' => 'form-control', 'placeholder'=>trans('lang.consumer_secret'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('access_token', e($access_token), array('class' => 'form-control', 'placeholder'=>trans('lang.access_token'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('access_token_secret', e($access_token_secret), array('class' => 'form-control', 'placeholder'=>trans('lang.access_token_secret'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::number('number_of_tweets', e($number_of_tweets), array('class' => 'form-control', 'placeholder'=>trans('lang.number_of_tweets'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.footer_links')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('menu_one_title', e($menu_one_title), array('class' => 'form-control', 'placeholder'=>trans('lang.menu_one_title'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('menu_two_title', e($menu_two_title), array('class' => 'form-control', 'placeholder'=>trans('lang.menu_two_title'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('menu_three_title', e($menu_three_title), array('class' => 'form-control', 'placeholder'=>trans('lang.menu_three_title'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('menu_four_title', e($menu_four_title), array('class' => 'form-control', 'placeholder'=>trans('lang.menu_four_title'))); ?>

                    </div>
                    <?php if(!empty($locations)): ?>
                        <div class="form-group">
                            <span class="dc-select">
                                <select class="form-control" name="first_location">
                                    <option value="0"><?php echo e(trans('lang.choose_first_loc')); ?></option>
                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $selected = $location->slug == $footer_first_location ? 'selected' : '' ?>
                                        <option value="<?php echo e($location->slug); ?>" <?php echo e($selected); ?>><?php echo e(html_entity_decode(clean($location->title))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($locations)): ?>
                        <div class="form-group">
                            <span class="dc-select">
                                <select class="form-control" name="second_location">
                                    <option value="0"><?php echo e(trans('lang.choose_second_loc')); ?></option>
                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $selected = $location->slug == $footer_second_location ? 'selected' : '' ?>
                                        <option value="<?php echo e($location->slug); ?>" <?php echo e($selected); ?>><?php echo e(html_entity_decode(clean($location->title))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </span>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>


<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/footer-settings.blade.php ENDPATH**/ ?>