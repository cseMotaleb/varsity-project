<?php $__env->startPush('PackageStyle'); ?>
    <link href="<?php echo e(asset('css/antd.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('stylesheets'); ?>
<?php echo $__env->yieldPushContent('backend_stylesheets'); ?>
<link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/dbresponsive.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/emojionearea.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/scrollbar.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>
<div class="dc-contentwrapper">
    <?php echo $__env->make('back-end.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<main id="dc-main" class="dc-main dc-haslayout">
        <?php if(auth()->guard()->check()): ?>
            <div id="dc-sidebarwrapper" class="dc-sidebarwrapper">
                <?php echo $__env->make('back-end.includes.dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
		<section class="dc-haslayout dc-dbsectionspace">
			<?php echo $__env->yieldContent('content'); ?>
		</section>
	</main>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php echo $__env->yieldPushContent('backend_scripts'); ?>
<script src="<?php echo e(asset('js/scrollbar.min.js')); ?>"></script>
<script type="text/javascript">
    $(window).scroll(function () {          
        var $pscroll = $(window).scrollTop();                       
            if($pscroll > 76) {
             $('.dc-sidebarwrapper').addClass('dc-fixednav');
            }else{
             $('.dc-sidebarwrapper').removeClass('dc-fixednav');
            }
        });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/master.blade.php ENDPATH**/ ?>