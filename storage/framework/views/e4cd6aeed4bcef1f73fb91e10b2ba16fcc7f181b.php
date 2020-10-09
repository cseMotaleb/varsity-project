<div class="dc-yourdetails dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.your_details')); ?> </h3>
    </div>
    <div class="dc-formtheme dc-userform">
        <fieldset>
            <div class="form-group form-group-half">
                <?php echo Form::text( 'first_name',  e(Auth::user()->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph.first_name')] ); ?>

            </div>
            <div class="form-group form-group-half">
                <?php echo Form::text( 'last_name', e(Auth::user()->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph.last_name')] ); ?>

            </div>
            <div class="form-group form-group-half">
                <?php echo Form::email( 'email', e(Auth::user()->email), ['class' =>'form-control', 'placeholder' => trans('lang.ph.email')] ); ?>

            </div>
        </fieldset>
    </div>
</div><?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/profile-settings/personal-detail/detail.blade.php ENDPATH**/ ?>