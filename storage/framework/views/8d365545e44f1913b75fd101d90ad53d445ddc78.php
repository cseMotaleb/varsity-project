<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id'
    =>'registration-setting-form', '@submit.prevent'=>'submitRegFormSettings']); ?>

    <div class="dc-registrationsettings-1 dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.registration_step1')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-settingscontent">
                <div class="dc-description"><p><?php echo e(trans('lang.reg_step_1')); ?></p></div>
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::text('step1_title', e($reg_one_title), array('class' => 'form-control', 'placeholder' => trans('lang.ph.title'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="dc-settingscontent">
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::textarea('step1_subtitle', e($reg_one_subtitle), array('class' => 'form-control', 'placeholder' => trans('lang.ph.desc'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="dc-registrationsettings-2 dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.registration_step2')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-settingscontent">
                <div class="dc-description"><p><?php echo e(trans('lang.reg_step_2')); ?></p></div>
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::text('step2_title', e($reg_two_title), array('class' => 'form-control', 'placeholder' => trans('lang.ph.title'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="dc-settingscontent">
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::textarea('step2_subtitle', e($reg_two_subtitle), array('class' => 'form-control', 'placeholder' => trans('lang.ph.desc'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="dc-settingscontent">
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::textarea('step2_term_note', e($term_note), array('class' => 'form-control', 'placeholder' => trans('lang.ph.term_note'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('term_page_url', $term_page_url, array('class' => 'form-control', 'placeholder' => trans('lang.ph.term_page_url'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-registrationsettings-3 dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.registration_step3')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-description"><p><?php echo e(trans('lang.reg_step_3')); ?></p></div>
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('step3_title', e($reg_three_title), array('class' => 'form-control', 'placeholder' => trans('lang.ph.title'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::textarea('step3_subtitle', e($reg_three_subtitle), array('class' => 'form-control', 'placeholder' => trans('lang.ph.desc'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-description"><p><?php echo e(trans('lang.step_3_img')); ?></p></div>
            <div class="dc-settingscontent">
                <?php if(!empty($register_image)): ?>
                    <upload-media
                    :img="'<?php echo e($register_image); ?>'"
                    :img_id="'register_image'"
                    :img_name="'register_image'"
                    :img_ref="'register_image'"
                    :img_hidden_name="'hidden_register_image'"
                    img_hidden_id="'hidden_register_image'"
                    :existed_img="'<?php echo e($register_image); ?>'"
                    :url="'<?php echo e(url("media/upload-temp-image/settings/register_image")); ?>'"
                    :existing_img_url="'<?php echo e(url("uploads/settings/registration-form/$register_image")); ?>'"
                    :size = "'<?php echo e(Helper::getImageDetail( $register_image, 'size', 'uploads/settings/registration-form')); ?>'"
                    :existing_img_name = "'<?php echo e(Helper::getImageDetail( $register_image, 'name', 'uploads/settings/registration-form')); ?>'"
                    >
                    </upload-media>
                <?php else: ?>
                    <upload-media
                        :img="'register_image'"
                        :img_id="'register_image'"
                        :img_name="'register_image'"
                        :img_ref="'register_image'"
                        :img_hidden_name="'hidden_register_image'"
                        img_hidden_id="'hidden_register_image'"
                        :url="'<?php echo e(url("media/upload-temp-image/settings/register_image")); ?>'"
                        >
                    </upload-media>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="dc-registrationsettings-4 dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.registration_step4')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-settingscontent">
                <div class="dc-description"><p><?php echo e(trans('lang.reg_step_4')); ?></p></div>
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::text('step4_title', e($reg_four_title), array('class' => 'form-control', 'placeholder' => trans('lang.ph.title'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="dc-settingscontent">
                <div class="dc-formtheme dc-userform">
                    <fieldset>
                        <div class="form-group">
                            <?php echo Form::textarea('step4_subtitle', e($reg_four_subtitle), array('class' => 'form-control', 'placeholder' => trans('lang.ph.desc'))); ?>

                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/registration-form.blade.php ENDPATH**/ ?>