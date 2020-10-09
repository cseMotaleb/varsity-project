<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'email-setting-form', '@submit.prevent'=>'submitEmailSettings']); ?>

    <div class="dc-emailid dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.from_email_id')); ?></h3>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('email_data[from_email]', e($from_email), array('class' => 'form-control')); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-mailname dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.from_email_name')); ?></h3>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('email_data[from_email_id]', e($from_email_id), array('class' => 'form-control')); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/email-settings/logo.blade.php'))): ?>
        <?php echo $__env->make('extend.back-end.admin.settings.general.email-settings.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('back-end.admin.settings.general.email-settings.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/email-settings/banner.blade.php'))): ?>
        <?php echo $__env->make('extend.back-end.admin.settings.general.email-settings.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('back-end.admin.settings.general.email-settings.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/email-settings/signature.blade.php'))): ?>
        <?php echo $__env->make('extend.back-end.admin.settings.general.email-settings.signature', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('back-end.admin.settings.general.email-settings.signature', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'),['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/email-settings/index.blade.php ENDPATH**/ ?>