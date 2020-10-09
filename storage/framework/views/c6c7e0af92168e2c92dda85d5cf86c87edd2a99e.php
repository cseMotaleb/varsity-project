<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-9" id="profile_settings">
            <div class="dc-haslayout">
                <div class="dc-dashboardbox dc-dashboardtabsholder">
                    <div class="dc-dashboardboxtitle">
                        <h2><?php echo e(trans('lang.profile_setting')); ?></h2>
                    </div>
                    <div class="dc-dashboardtabs">
                        <ul class="dc-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="active show" data-toggle="tab" href="#dc-skills"><?php echo e(trans('lang.personal_detail')); ?></a>
                            </li>
                            <li class="nav-item"><a data-toggle="tab" href="#dc-education" class=""><?php echo e(trans('lang.exp_edu')); ?></a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#dc-awards" class=""><?php echo e(trans('lang.awards_downloads')); ?></a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#dc-registration" class=""><?php echo e(trans('lang.registration')); ?></a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#dc-services" class=""><?php echo e(trans('lang.services')); ?></a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#dc-gallery" class=""><?php echo e(trans('lang.gallery')); ?></a></li>
                        </ul>
                    </div>
                    <div class="dc-tabscontent tab-content">
                        <div class="dc-personalskillshold tab-pane active fade show" id="dc-skills">
                            <?php echo $__env->make('back-end.doctors.profile-settings.personal-detail.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-educationholder tab-pane fade" id="dc-education">
                            <?php echo $__env->make('back-end.doctors.profile-settings.experience-education.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-awardsholder tab-pane fade" id="dc-awards">
                            <?php echo $__env->make('back-end.doctors.profile-settings.awards-downloads.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-registration tab-pane fade" id="dc-registration">
                            <?php echo $__env->make('back-end.doctors.profile-settings.registration.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-services tab-pane fade" id="dc-services">
                            <?php echo $__env->make('back-end.doctors.profile-settings.services.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-gallery tab-pane fade" id="dc-gallery">
                            <?php echo $__env->make('back-end.doctors.profile-settings.gallery.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/index.blade.php ENDPATH**/ ?>