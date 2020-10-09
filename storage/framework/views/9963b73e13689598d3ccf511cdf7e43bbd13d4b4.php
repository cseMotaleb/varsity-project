<div class="dc-searchresult-grid dc-searchresult-list dc-searchvlistvtwo">
    <?php if(!empty($teams) && $teams->count() > 0): ?>
        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hospital_team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $slots = unserialize($hospital_team->slots);
                $team = App\Team::findOrFail($hospital_team->id);
                $hospital_obj = App\User::findOrFail($team->hospital->id);
                $services = !empty($slots['services']) ? $slots['services'] : array();
                $appointment_days = !empty($slots['days']) ? $slots['days'] : array();
                $specialities = '';
                if (DB::table('user_service')->select('speciality')
                    ->where('user_id', $hospital_obj->id)->count() > 0) {
                    $specialities =    DB::table('user_service')->select('speciality')
                    ->where('user_id', $hospital_obj->id)->groupBy('speciality')->get()->pluck('speciality')->random(1)->toArray();
                    }
                $role_type = Helper::getRoleTypeByUserID($team->hospital->id);
                $hospital_profile = $role_type == 'hospital' ? url('profile/'.$team->hospital->slug) : 'javascript:;';
            ?>
            <div class="dc-docpostholder">
                <div class="dc-docpostcontent">
                    <div class="dc-searchvtwo">
                        <figure class="dc-docpostimg">
                            <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$team->hospital->id, $team->hospital->profile->avatar, 'small-', 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                        </figure>
                        <div class="dc-title">
                            <?php if(!empty($specialities)): ?>
                                <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user_speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $speciality = Helper::getSpecialityByID($user_speciality); ?>
                                    <?php if(!empty($speciality)): ?>
                                        <a href="<?php echo e(url('/search-results?speciality='.$speciality->slug)); ?>" class="dc-docstatus"><?php echo e(html_entity_decode(clean($speciality->title))); ?></a>  
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <h3>
                                <a href="javascript:void(0);"><?php echo e(Helper::getUserName($team->hospital->id)); ?> </a>
                                <?php echo e(Helper::verifyUser(clean($team->hospital->id))); ?> 
                                <?php echo e(Helper::verifyMedical(clean($team->hospital->id))); ?> 
                            </h3>
                            <ul class="dc-docinfo">
                                <li><em><?php echo e($hospital_obj->profile->sub_heading ?? ''); ?></em></li>
                            </ul>
                        </div>
                        <?php if(!empty($hospital_obj->services)): ?>
                            <div class="dc-tags">
                                <ul>
                                    <?php $__currentLoopData = $hospital_obj->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key <= 4): ?>
                                            <li>
                                                <a href="javascript:void(0);"><?php echo e(html_entity_decode(clean($service->title))); ?></a>
                                            </li> 
                                        <?php else: ?>
                                            <li style="display:none">
                                                <a href="javascript:void(0);"><?php echo e(html_entity_decode(clean($service->title))); ?></a>
                                            </li>    
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($hospital_obj->services->count() >= 6): ?>
                                        <li class="dc-viewall-services">
                                            <a href="javascript:;" id="view-service-<?php echo e($hospital_obj->id); ?>" class="dc-tagviewall" v-on:click="displayServices('view-service-<?php echo e($hospital_obj->id); ?>')"><?php echo e(trans('lang.view_all')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="dc-doclocation dc-doclocationvtwo">
                        <?php if(!empty($hospital_obj->location->title)): ?>
                            <span><i class="ti-direction-alt"></i> <?php echo e(html_entity_decode(clean($hospital_obj->location->title)) ?? ''); ?></span>
                        <?php endif; ?>
                        <?php if(!empty($appointment_days)): ?>
                            <span><i class="ti-calendar"></i>
                                <?php $__currentLoopData = Helper::getAppointmentDays(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!in_array($key, $appointment_days)): ?>
                                        <em class="dc-dayon"><?php echo e(html_entity_decode(clean($day['title']))); ?></em>
                                    <?php else: ?>
                                        <?php echo e(html_entity_decode(clean($day['title']))); ?>,
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        <?php endif; ?>
                        <span><i class="ti-thumb-up"></i><?php echo e(trans('lang.doctors_onboard')); ?>: <?php echo e(clean($hospital_obj->approvedTeams()->count())); ?></span>
                        <span>
                            <i class="ti-wallet"></i>
                            <?php echo e($hospital_obj->profile->working_time == '24_hours' ? trans('lang.24_hours') : clean($hospital_obj->profile->working_time)); ?>

                        </span>
                        <div class="dc-btnarea">
                            <a href="<?php echo e($hospital_profile); ?>" class="dc-btn"><?php echo e(trans('lang.view_more')); ?></a>
                            <?php if(in_array($team->hospital->id, $saved_hospitals)): ?>
                                <a href="javascrip:void(0);" class="dc-like dc-clicksave dc-btndisbaled">
                                    <i class="fa fa-heart"></i>
                                </a>
                            <?php else: ?>
                                <a href="javascrip:void(0);" class="dc-like" id="location-<?php echo e($team->hospital->id); ?>" @click.prevent="add_wishlist('location-<?php echo e($team->hospital->id); ?>', '<?php echo e($team->hospital->id); ?>', 'saved_hospitals', '')" v-cloak>
                                    <i class="fa fa-heart"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if( method_exists($teams,'links') ): ?>
            <?php echo e($teams->links('pagination.custom')); ?>

        <?php endif; ?>
    <?php else: ?>
        <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/locations/index.blade.php ENDPATH**/ ?>