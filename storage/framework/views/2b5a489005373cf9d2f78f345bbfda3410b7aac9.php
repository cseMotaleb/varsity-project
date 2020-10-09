<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'home-howworks-section-form', '@submit.prevent'=>'submitHomeHowItWorksSettings']); ?>

    <div class="dc-securitysettings dc-tabsinfo">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.how_it_works_section_settings')); ?></h3>
            <div class="float-right">
                <switch_button v-model="show_how_work_sec"><?php echo e(trans('lang.show_or_hide_section')); ?></switch_button>
                <input type="hidden" :value="show_how_work_sec" name="show_how_work_sec">
            </div>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('title', e($how_works_title), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.title')]); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('subtitle', e($how_works_subtitle), ['class' =>
                            'form-control','placeholder'=>trans('lang.ph.sub_heading')]); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::textarea('hw_desc', $how_works_desc, ['class' =>
                            'form-control dc-tinymceeditor', 'id' => 'dc-hw-desc', 'placeholder'=>trans('lang.ph.desc')]); ?>

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

<?php echo $__env->make('back-end.admin.settings.home-page-settings.how-it-works-tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/home-page-settings/how-it-works-section.blade.php ENDPATH**/ ?>