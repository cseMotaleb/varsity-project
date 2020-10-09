<?php if(!empty($specialities)): ?>
    <div class="dc-services-holder dc-aboutinfo">
        <div class="dc-infotitle">
            <h3><?php echo e(trans('lang.offered_services')); ?></h3>
        </div>
        <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $speciality = App\Speciality::find($data['speciality_id']); ?>
            <?php if(!empty($speciality)): ?>
                <div id="dc-accordion" class="dc-accordion" role="tablist" aria-multiselectable="true">
                    <div class="dc-panel">
                        <div class="dc-paneltitle">
                            <figure class="dc-titleicon"><img src="<?php echo e(asset(Helper::getImage('uploads/specialities', $speciality->image, '', 'speciality-default.png'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>"></figure>
                            <span><?php echo e(html_entity_decode(clean($speciality->title))); ?><em><?php echo e(clean($speciality->services->count())); ?> <?php echo e(trans('lang.services')); ?></em></span>
                        </div>
                        <?php if(!empty($data['services'])): ?>
                            <div class="dc-panelcontent">
                                <div id="dc-childaccordion" class="dc-childaccordion" role="tablist" aria-multiselectable="true">
                                <?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_key => $service_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $service_obj = App\Service::find($service_data['service']); ?>
                                    <?php if(!empty($service_obj)): ?>
                                        <div class="dc-subpanel">
                                            <div class="dc-subpaneltitle">
                                                <span><?php echo e(html_entity_decode(clean($service_obj->title)) ?? ''); ?><em><?php echo e(!empty($symbol['symbol']) ? $symbol['symbol'] : '$'); ?><?php echo e(clean($service_data['price'])); ?></em></span>
                                            </div>
                                            <div class="dc-subpanelcontent">
                                                <div class="dc-description">
                                                    <p><?php echo e(html_entity_decode(clean($service_data['description']))); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/offered-services.blade.php ENDPATH**/ ?>