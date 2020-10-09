<?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/email-settings/sender-avatar.blade.php'))): ?> 
    <?php echo $__env->make('extend.back-end.admin.settings.general.email-settings.sender-avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?> 
    <?php echo $__env->make('back-end.admin.settings.general.email-settings.sender-avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<div class="dc-emailname dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.email_sender_name')); ?></h3>
    </div>
    <div class="dc-settingscontent dc-sidepadding">
        <div class="dc-formtheme dc-userform">
            <fieldset>
                <div class="form-group">
                    <?php echo Form::text('email_data[sender_name]', e($sender_name), array('class' => 'form-control')); ?>

                </div>
            </fieldset>
        </div>
    </div>
</div>
<div class="dc-emailtagline dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.email_sender_tagline')); ?></h3>
    </div>
    <div class="dc-settingscontent dc-sidepadding">
        <div class="dc-formtheme dc-userform">
            <fieldset>
                <div class="form-group">
                    <?php echo Form::text('email_data[sender_tagline]', e($sender_tagline), array('class' => 'form-control')); ?>

                </div>
            </fieldset>
        </div>
    </div>
</div>
<div class="dc-emailurl dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.email_sender_url')); ?></h3>
    </div>
    <div class="dc-settingscontent dc-sidepadding">
        <div class="dc-formtheme dc-userform">
            <fieldset>
                <div class="form-group">
                    <?php echo Form::text('email_data[sender_url]', e($sender_url), array('class' => 'form-control')); ?>

                </div>
            </fieldset>
        </div>
    </div>
</div>
<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/email-settings/signature.blade.php ENDPATH**/ ?>