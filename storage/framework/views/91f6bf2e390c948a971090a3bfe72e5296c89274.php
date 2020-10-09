<div class="dc-haslayout">
    <div class="dc-dashboardbox">
        <div class="dc-dashboardboxtitle">
            <h2><?php echo e(trans('lang.appointment_locations')); ?></h2>
        </div>
        <div class="dc-dashboardboxcontent dc-clinicloc-holder">
            <div class="dc-tabscontenttitle">
                <h3><?php echo e(trans('lang.avaiable_locations')); ?></h3>
            </div>
            <div class="dc-content-holder">
                <?php if(!empty($doctor_info) && $doctor_info->count() > 0): ?>
                    <?php $__currentLoopData = $doctor_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $team = \App\Team::findOrFail($info->id);
                            $hospital_obj = App\User::findOrFail($team->hospital->id);
                            $slots = unserialize($team->slots);
                            $appointment_days = !empty($slots['days']) ? $slots['days'] : array();
                        ?>
                        <div class="dc-clinics">
                            <div>
                                <figure class="dc-clinicsimg">
                                    <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$team->hospital->id, $team->hospital->profile->avatar, 'small-', 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                                </figure>
                            </div>
                            <div class="dc-clinics-content">
                                <div class="dc-clinics-title">
                                    <a href="javascript:void(0);"><?php echo e($team->status); ?></a>
                                    <h4><?php echo e(Helper::getUserName($team->hospital->id)); ?> <?php echo e(Helper::verifyUser(intVal(clean($team->hospital->id)))); ?></h4>
                                    <span>
                                        <?php if(!empty($appointment_days)): ?>
                                            <span>
                                                <?php $__currentLoopData = Helper::getAppointmentDays(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!in_array($key, $appointment_days)): ?>
                                                       <em class="dc-dayon"><?php echo e(html_entity_decode(clean($day['title']))); ?></em>
                                                    <?php else: ?>
                                                       <?php echo e(html_entity_decode(clean($day['title']))); ?>,
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="dc-btnarea">
                                    <a href="<?php echo e(route('editLocation', ['id' => intVal(clean($team->id))])); ?>" class="dc-btn dc-btn-sm">
                                        <?php echo e(trans('lang.view_details')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if( method_exists($doctor_info,'links') ): ?>
                        <div class="dc-categoriescontentholder">
                            <?php echo e($doctor_info->links('pagination.custom')); ?>

                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/appointment_locations/create/locations.blade.php ENDPATH**/ ?>