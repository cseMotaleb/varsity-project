<div class="dc-yourdetails dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3> <?php echo e(trans('lang.user_details')); ?> </h3>
    </div>
    <div class="dc-formtheme dc-userform">
        <fieldset>
            <?php if($user_role == 'doctor'): ?>
                <div class="dc-name-wrapper">
                    <div class="form-group form-group-half gender-input">
                        <span class="dc-select">
                            <?php echo Form::select('base_name', Helper::getDoctorArray(), $gender_title, array()); ?>

                        </span>
                    </div>
            <?php endif; ?>
                <div class="form-group form-group-half">
                    <?php echo Form::text( 'first_name', e($user->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph.first_name')] ); ?>

                </div>
                <div class="form-group form-group-half">
                    <?php echo Form::text( 'last_name', e($user->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph.last_name')] ); ?>

                </div>
            <?php if($user_role == 'doctor'): ?>
                </div>
            <?php endif; ?>
            <div class="form-group form-group-half">
                <?php echo Form::email( 'email', e($user->email), ['class' =>'form-control', 'placeholder' => trans('lang.ph.email')] ); ?>

            </div>
            <div class="form-group form-group-half">
                <?php echo Form::password('password', ['class' => 'form-control','placeholder' => trans('lang.ph.newpass')]); ?>

            </div>
            <?php if($user_role != 'regular'): ?>
                <div class="form-group">
                    <?php echo Form::text( 'subheading', e($sub_heading), ['class' =>'form-control', 'placeholder' => trans('lang.ph.sub_heading_optional')] ); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::text( 'short_desc', e($short_desc), ['class' =>'form-control', 'placeholder' => trans('lang.ph.short_description')] ); ?>

                </div>
            <?php endif; ?>
            <div class="form-group">
                <?php if(!empty($roles)): ?>
                    <ul class="dc-startoption">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!in_array($role['id'] == 1, $roles)): ?>
                                <li>
                                    <span class="dc-radio">
                                        <input id="dc-company-<?php echo e($key); ?>" type="radio" v-on:change="changeRole('dc-company-<?php echo e($key); ?>', '<?php echo e($user_role); ?>')" name="role" value="<?php echo e($role['role_type']); ?>" <?php echo e($user_role == $role['role_type'] ? 'checked' : ''); ?>>
                                        <label for="dc-company-<?php echo e($key); ?>"><?php echo e($role['name']); ?></label>
                                    </span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="dc-description dc-update-role">
                        <p><?php echo e(trans('lang.update_role_note')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </fieldset>
    </div>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/users/edit/detail.blade.php ENDPATH**/ ?>