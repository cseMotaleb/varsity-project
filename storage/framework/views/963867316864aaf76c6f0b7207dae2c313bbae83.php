<?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/payment-settings/commision-settings.blade.php'))): ?>
    <?php echo $__env->make('extend.back-end.admin.settings.general.payment-settings.commision-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('back-end.admin.settings.general.payment-settings.commision-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/payment-settings/paypal-settings.blade.php'))): ?>
    <?php echo $__env->make('extend.back-end.admin.settings.general.payment-settings.paypal-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('back-end.admin.settings.general.payment-settings.paypal-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php if(file_exists(resource_path('views/extend/back-end/admin/settings/general/payment-settings/stripe-settings.blade.php'))): ?>
    <?php echo $__env->make('extend.back-end.admin.settings.general.payment-settings.stripe-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('back-end.admin.settings.general.payment-settings.stripe-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/payment-settings/index.blade.php ENDPATH**/ ?>