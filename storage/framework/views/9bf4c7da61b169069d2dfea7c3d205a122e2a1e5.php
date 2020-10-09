<?php echo Form::open(['url' => '', 'class' => 'dc-formtheme dc-services-holder', 'id' => 'manage-services-form', '@submit.prevent' => 'submitServices']); ?>

    <profile-speciality></profile-speciality>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-btn-setting">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>


<?php $__env->startPush('backend_scripts'); ?>
    <script src="<?php echo e(asset('js/vendor/bootstrap.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/services/index.blade.php ENDPATH**/ ?>