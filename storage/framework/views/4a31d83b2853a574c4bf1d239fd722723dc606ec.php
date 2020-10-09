<div class="dc-tabscontenttitle">
    <h3><?php echo e(trans('lang.import_demo')); ?></h3>
</div>
<?php echo Form::open(['class' =>'dc-formtheme dc-userform', 'id' =>'import-demo']); ?>

    <div class="dc-selectdesign la-dc-demo">
        <ul>
            <li>
                <div class="dc-templateoption">
                    <div class="dc-designimg"><img src="<?php echo e(asset('images/demo-content/screenshot.jpg')); ?>" alt="<?php echo e(trans('lang.img')); ?>"></div>
                    <div class="la-designtitle-holder">
                        <div class="dc-designtitle">
                            <span><?php echo e(trans('lang.preview_demo')); ?></span>
                            <a target="_blank" href="http://amentotech.com/projects/doctroc" class="dc-btn"><?php echo e(trans('lang.btn_preview')); ?></a>
                        </div>
                        <div class="dc-designtitle">
                            <span><?php echo e(trans('lang.refresh_site')); ?></span>
                            <a href="javascript:void(0)" v-on:click.prevent="importDemo('<?php echo e(trans("lang.import_demo_content")); ?>')" class="dc-btn"><?php echo e(trans('lang.btn_import_demo')); ?></a>
                        </div>
                        <div class="dc-designtitle">
                            <span><?php echo e(trans('lang.remove_demo_content')); ?></span>
                            <a href="javascript:void(0)" v-on:click.prevent="removeDemoContent('<?php echo e(trans("lang.remove_demo_content")); ?>')" class="dc-btn"><?php echo e(trans('lang.btn_remove_demo')); ?></a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/demo-content.blade.php ENDPATH**/ ?>