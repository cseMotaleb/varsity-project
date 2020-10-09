<div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.your_loc')); ?></h3>
    </div>
    <div class="dc-sidepadding dc-tabsinfo">
        <div class="dc-formtheme dc-userform">
            <fieldset>
                <div class="form-group form-group-half">
                    <span class="dc-select">
                        <?php echo Form::select('location', $locations, e(Auth::user()->location_id) , array('class' => '', 'placeholder' => trans('lang.select_locations'))); ?>

                    </span>
                </div>
                <div class="form-group form-group-half">
                    <?php echo Form::text( 'address', e($address), ['class' =>'form-control', 'placeholder' => trans('lang.your_address')] ); ?>

                </div>
                <?php if(!empty($longitude) && !empty($latitude)): ?>
                    <div class="form-group dc-formmap">
                        <div class="dc-locationmap">
                            <custom-map :latitude="<?php echo e(($latitude)); ?>" :longitude="<?php echo e($longitude); ?>"></custom-map>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group form-group-half">
                    <?php echo Form::text( 'longitude', e($longitude), ['class' =>'form-control', 'placeholder' => trans('lang.enter_longitude')]); ?>

                </div>
                <div class="form-group form-group-half">
                    <?php echo Form::text( 'latitude', e($latitude), ['class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]); ?>

                </div>
            </fieldset>
        </div>
    </div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/personal-detail/location.blade.php ENDPATH**/ ?>