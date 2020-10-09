<div class="preloader-section" v-if="is_loading" v-cloak>
    <div class="preloader-holder">
        <div class="loader"></div>
    </div>
</div>
<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform la-dashboard-icons', 'id'
=>'upload_dashboard_icon', '@submit.prevent'=>'uploadDashboardIcons']); ?>

<?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="dc-dashboardicons dc-tabsinfo">
        <div class="dc-selectdesign la-selectthemecolor">
            <?php if(!empty($dash_icons['hidden_'.$key])): ?>
                <dashboard-icon
                :title="'<?php echo e($icon['title']); ?>'"
                :icon="'<?php echo e($icon['value']); ?>'"
                :icon_id="'<?php echo e($icon['value']); ?>'"
                :icon_name="'<?php echo e($icon['value']); ?>'"
                :icon_ref="'<?php echo e($icon['value']); ?>'"
                :icon_hidden_name="'icons[hidden_<?php echo e($icon['value']); ?>][hidden_<?php echo e($icon['value']); ?>]'"
                icon_hidden_id="'hidden_<?php echo e($icon['value']); ?>'"
                :existed_icon="'<?php echo e($dash_icons['hidden_'.$key]); ?>'"
                :size = "'<?php echo e(Helper::getImageDetail( $dash_icons['hidden_'.$key], 'size', 'uploads/settings/icon')); ?>'"
                >
                </dashboard-icon>
            <?php else: ?>
                <dashboard-icon
                :title="'<?php echo e($icon['title']); ?>'"
                :icon="'<?php echo e($icon['value']); ?>'"
                :icon_id="'<?php echo e($icon['value']); ?>'"
                :icon_name="'<?php echo e($icon['value']); ?>'"
                :icon_ref="'<?php echo e($icon['value']); ?>'"
                :icon_hidden_name="'icons[hidden_<?php echo e($icon['value']); ?>][hidden_<?php echo e($icon['value']); ?>]'"
                icon_hidden_id="'hidden_<?php echo e($icon['value']); ?>'"
                >
                </dashboard-icon>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="dc-experienceaccordion">
    <div class="dc-updatall la-updateall-holder">
        <?php echo Form::submit(trans('lang.btn_save'),['class' => 'dc-btn']); ?>

    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/dashboard-icon-settings.blade.php ENDPATH**/ ?>