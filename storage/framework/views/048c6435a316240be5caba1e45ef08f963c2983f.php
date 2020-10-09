<?php $__env->startPush('backend_stylesheets'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/chosen.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="dc-haslayout" id="doctor_appointments">
        <appointments :type="'doctor'"></appointments>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('backend_scripts'); ?>
    <script src="<?php echo e(asset('js/chosen.jquery.js')); ?>"></script>
    <script>
        jQuery(".dc-chosen-select").chosen();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/appointments/index.blade.php ENDPATH**/ ?>