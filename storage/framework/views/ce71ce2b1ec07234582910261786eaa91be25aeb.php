<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dc-specialities" id="specialities">
        <?php if(Session::has('message')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <section class="dc-haslayout">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="dc-haslayout dc-dbsectionspace">
                        <div class="dc-dashboardbox">
                            <div class="dc-dashboardboxtitle">
                                <h2><?php echo e(trans('lang.update_speciality')); ?></h2>
                            </div>
                            <div class="dc-dashboardboxcontent dc-addservices">
                                <?php echo Form::open(['url' => url('admin/specialities/update/'.$speciality->id), 'class' => 'dc-formtheme dc-formsearch edit-speciality-form', 'id' => 'speclity']); ?>

                                    <fieldset>
                                        <div class="form-group">
                                            <?php echo Form::text( 'title', e($speciality->title), ['class' =>'form-control'.($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph.title')] ); ?>

                                            <?php if($errors->has('title')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo Form::textarea( 'desc', e($speciality->description), ['class' =>'form-control', 'placeholder' => trans('lang.ph.desc')] ); ?>

                                        </div>
                                        <div class="dc-settingscontent">
                                            <?php if(!empty($speciality->image)): ?>
                                                <upload-media
                                                :img="'<?php echo e($speciality->image); ?>'"
                                                :img_id="'speciality_image'"
                                                :img_name="'speciality_image'"
                                                :img_ref="'speciality_image'"
                                                :img_hidden_name="'speciality_image'"
                                                img_hidden_id="'speciality_image'"
                                                :existed_img="'<?php echo e($speciality->image); ?>'"
                                                :url="'<?php echo e(url("media/upload-temp-image/specialities/speciality_image/speciality")); ?>'"
                                                :existing_img_url="'<?php echo e(url("uploads/specialities/$speciality->image")); ?>'"
                                                :size = "'<?php echo e(Helper::getImageDetail($speciality->image, 'size', 'uploads/specialities/')); ?>'"
                                                :existing_img_name = "'<?php echo e(Helper::getImageDetail($speciality->image, 'name', 'uploads/specialities/')); ?>'"
                                                >
                                                </upload-media>
                                                <?php else: ?>
                                                <upload-media
                                                    :img="'speciality_image'"
                                                    :img_id="'speciality_image'"
                                                    :img_name="'speciality_image'"
                                                    :img_ref="'speciality_image'"
                                                    :img_hidden_name="'speciality_image'"
                                                    img_hidden_id="'speciality_image'"
                                                    :url="'<?php echo e(url("media/upload-temp-image/specialities/speciality_image/speciality")); ?>'"
                                                    >
                                                </upload-media>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group dc-btnarea">
                                            <?php echo Form::submit(trans('lang.update_speciality'), ['class' => 'dc-btn']); ?>

                                        </div>
                                    </fieldset>
                                <?php echo Form::close();; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/specialities/edit.blade.php ENDPATH**/ ?>