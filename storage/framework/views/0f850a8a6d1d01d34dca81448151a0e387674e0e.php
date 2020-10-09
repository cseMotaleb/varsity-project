<div class="dc-emailnoti">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.manage_email_notifications')); ?></h3>
    </div>
    <div class="dc-settingscontent dc-sidepadding">
        <div class="dc-description">
            <p><?php echo e(trans('lang.desc_email')); ?></p>
        </div>
        <?php echo Form::open(['class' => 'dc-formtheme dc-userform']); ?>

            <fieldset>
                <div class="form-group form-disabeld">
                    <?php echo Form::email('email', e(Auth::user()->email), ['class' => 'form-control', 'placeholder' => trans('lang.your_email'), 'disabled' => 'disabled'] ); ?>

                </div>
            </fieldset>
        <?php echo Form::close();; ?>

    </div>
</div>
<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/account-settings/email-notifications/index.blade.php ENDPATH**/ ?>