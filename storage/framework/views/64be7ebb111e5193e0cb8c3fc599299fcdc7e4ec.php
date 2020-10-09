<div class="dc-haslayout">
    <div class="dc-dashboardbox">
        <div class="dc-dashboardboxtitle">
            <h2><?php echo e(trans('lang.appointment_setting')); ?></h2>
        </div>
        <div class="dc-dashboardboxcontent dc-doc-appointment la-doc-appointment">
            <div class="dc-tabscontenttitle">
                <h3><?php echo e(trans('lang.add_new_location')); ?></h3>
            </div>
            <?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform dc-form-appointment', 'id'=>'appointment-location-form', 
                '@submit.prevent'=>'submitAppointmentLocation']); ?>

            <fieldset>
                <div class="form-group dc-inputwithicon">
                    <search-hospital 
                        :placeholder="'<?php echo e(trans('lang.ph.search_hospital')); ?>'"
                        :no_record_message="'no record found'">
                    </search-hospital>
                </div>
                <div class="form-group dc-datepicker form-group-half">
                    <a-time-picker use12Hours @change="onChangeStartTime" format="h:mm a" />
                </div>
                <input type="hidden" id="location_start_time" name="slots[start_time]" value="">
                <input type="hidden" id="start_time_obj" value="">
                <div class="form-group form-group-half">
                    <span class="dc-select">
                        <select name="slots[duration]" v-model="duration" @change="onChangeDuration">
                            <option value="Select Duration" disabled hidden><?php echo e(trans('lang.select_duration')); ?></option>
                            <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </span>
                </div>
                <div class="form-group form-group-half">
                    <span class="dc-select">
                        <select id="number_of_slots" name="slots[number_of_slots]" class="form-control" v-model="no_of_slot"
                            @change="onChangeDuration">
                            <?php for($i = 1; $i <= 30; $i++): ?> 
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e($i > 1 ? 'slots' : 'slot'); ?></option>
                            <?php endfor; ?>
                        </select>
                    </span>
                </div>
                <div class="form-group form-group-half">
                    <span class="dc-select">
                        <select name="slots[intervals]" v-model="intervals" @change="onChangeDuration">
                            <option value="Select Interval"><?php echo e(trans('lang.select_interval')); ?></option>
                            <?php $__currentLoopData = $intervals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </span>
                </div>
                <div class="form-group dc-datepicker form-group-half">
                    <input type="text" :value="end_time" name="slots[end_time]" readonly
                        placeholder="<?php echo e(trans('lang.end_time')); ?>">
                </div>
            </fieldset>
            <?php if(!empty($doctor_specialities)): ?>
                <fieldset>
                    <div id="dc-accordion" class="dc-accordion dc-accordion dc-moreservice" role="tablist" aria-multiselectable="true">
                        <?php $__currentLoopData = $doctor_specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctor_speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $speciality = Helper::getSpecialityByID($doctor_speciality['speciality_id']); ?>
                            <?php if(!empty($speciality)): ?>
                                <div class="dc-panel">
                                    <input type="hidden" name="services[<?php echo e($key); ?>][speciality_id]" value="<?php echo e($speciality->id); ?>">
                                    <div class="dc-paneltitle">
                                        <figure class="dc-titleicon">
                                            <img src="<?php echo e(asset(Helper::getImage('uploads/specialities', $speciality->image, '', 'default-speciality.png'))); ?>"
                                                alt="img description">
                                        </figure>
                                        <span><?php echo e(html_entity_decode(clean($speciality->title))); ?><em><?php echo e($speciality->services()->count()); ?> <?php echo e(trans('lang.services')); ?></em></span>
                                    </div>
                                    <div class="dc-panelcontent dc-moreservice-content">
                                        <div class="dc-subtitle">
                                            <h4><?php echo e(trans('lang.services')); ?>:</h4>
                                        </div>
                                        <?php if(!empty($doctor_speciality['services'])): ?>
                                            <div class="dc-checkbox-holder">
                                                <?php $__currentLoopData = $doctor_speciality['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_key => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $service = Helper::getServiceByID($services['service']); ?>
                                                    <?php if(!empty($service)): ?>
                                                        <span class="dc-checkbox">
                                                            <input id="dc-mo-<?php echo e(intVal(clean($service->id))); ?>" type="checkbox" name='services[<?php echo e($key); ?>][service][<?php echo e($service_key); ?>][service]' value="<?php echo e(intVal(clean($service->id))); ?>">
                                                            <label for="dc-mo-<?php echo e(intVal(clean($service->id))); ?>"><?php echo e(html_entity_decode(clean($service->title))); ?></label>
                                                        </span>
                                                    <?php endif; ?>
                                                    <input type="hidden" name="services[<?php echo e($key); ?>][service][<?php echo e($service_key); ?>][price]" value="<?php echo e($services['price']); ?>">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </fieldset>
            <?php endif; ?>
            <fieldset class="dc-spacesholder">
                <legend><?php echo e(trans('lang.assign_apointment_spaces')); ?></legend>
                <div class="form-group form-group-half dc-radio-holder">
                    <?php $__currentLoopData = $spaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="dc-radio">
                            <input id="dc-spaces<?php echo e($key); ?>" type="radio" name="slots[appointment_spaces]"
                                value="<?php echo e($value['value']); ?>" checked="" v-model="appointment_space"
                                v-on:change="selectedSpace(appointment_space)">
                            <label for="dc-spaces<?php echo e($key); ?>"><?php echo e($value['value']); ?></label>
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span class="dc-radio">
                        <input id="dc-spaces" type="radio" value="other" checked="" v-model="appointment_space"
                            v-on:change="selectedSpace(appointment_space)">
                        <label for="dc-spaces"><?php echo e(trans('lang.other')); ?></label>
                    </span>
                </div>
                <div class="form-group form-group-half" v-if="is_show">
                    <input type="text" id="custom_appt_spaces" name="slots[appointment_spaces]" class="form-control"
                        placeholder="<?php echo e(trans('lang.ph.appointment_spaces')); ?>">
                </div>
            </fieldset>
            <fieldset class="dc-offer-holder">
                <legend><?php echo e(trans('lang.days_offer_services')); ?></legend>
                <div class="form-group dc-checkbox-holder">
                    <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day_key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="dc-checkbox">
                            <input id="day-mo-<?php echo e($day_key); ?>" type="checkbox" name="slots[appointment_days][]"
                                v-model="appointment_days" value="<?php echo e($day_key); ?>">
                            <label for="day-mo-<?php echo e($day_key); ?>"><?php echo e($day['title']); ?></label>
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="form-group">
                    <?php echo Form::number('slots[consultation_fee]', null, ['min' => 0, 'class' => 'form-control', 'id' => 'consultation_fee','placeholder'=>trans('lang.consultancy_fee')]); ?>

                </div>
                <div class="form-group dc-btnarea">
                    <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

                </div>
            </fieldset>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/appointment_locations/create/settings.blade.php ENDPATH**/ ?>