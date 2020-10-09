<div class="dc-changepassword dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.change_password')); ?></h3>
    </div>
    <?php echo Form::open(['url' => url('profile/settings/request-password'), 'class' =>'dc-formtheme dc-userform dc-sidepadding']); ?>

        <fieldset>
            <div class="form-group form-group-half">
                <?php echo Form::password('old_password', ['class' => 'form-control'.($errors->has('old_password') ? ' is-invalid' : ''),
                    'placeholder' => trans('lang.ph.oldpass')]); ?>

                <?php if($errors->has('old_password')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('old_password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group form-group-half">
                <?php echo Form::password('confirm_password', ['class' => 'form-control','placeholder' => trans('lang.ph.newpass')]); ?>

            </div>
            <div class="form-group">
                <?php echo Form::password('confirm_new_password', ['class' => 'form-control','placeholder' => trans('lang.ph.confirm_new_pass')]); ?>

            </div>
            <?php echo Form::hidden('user_id', !empty(Auth::user()) ? Auth::user()->id : null); ?>

        </fieldset>
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/account-settings/reset-password/index.blade.php ENDPATH**/ ?>