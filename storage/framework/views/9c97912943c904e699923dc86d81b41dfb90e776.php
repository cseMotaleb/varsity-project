<?php $__env->startSection('content'); ?>
    <div class="dc-haslayout" id="settings">
        <div class="dc-preloader-section" v-if="is_loading" v-cloak>
            <div class="dc-preloader-holder">
                <div class="dc-loader"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <div class="dc-dashboardbox dc-dashboardtabsholder">
                    <div class="dc-dashboardtabs">
                        <ul class="dc-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="active" data-toggle="tab" href="#dc-general-settings"><?php echo e(trans('lang.general_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-email-settings"><?php echo e(trans('lang.email_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-payment-settings"><?php echo e(trans('lang.payment_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-registration"><?php echo e(trans('lang.registration_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-topbar"><?php echo e(trans('lang.topbar_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-inner-pages"><?php echo e(trans('lang.inner_page_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-socials"><?php echo e(trans('lang.social_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-dashboard-icons"><?php echo e(trans('lang.dashboard_icons')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-footer"><?php echo e(trans('lang.footer_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-roles"><?php echo e(trans('lang.role_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-sidebar"><?php echo e(trans('lang.sidebar_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-cache"><?php echo e(trans('lang.clear_cache')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-demo-content"><?php echo e(trans('lang.demo_content')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-chat-setting"><?php echo e(trans('lang.chat_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-forum-setting"><?php echo e(trans('lang.forum_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-booking-setting"><?php echo e(trans('lang.booking_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#dc-import-update"><?php echo e(trans('lang.import_update')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="dc-tabscontent tab-content">
                        <div class="dc-personalskillshold tab-pane active fade show" id="dc-general-settings">
                            <?php echo $__env->make('back-end.admin.settings.general.general-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-email-settings">
                            <?php echo $__env->make('back-end.admin.settings.general.email-settings.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-payment-settings">
                            <?php echo $__env->make('back-end.admin.settings.general.payment-settings.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-registration">
                            <?php echo $__env->make('back-end.admin.settings.general.registration-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-topbar">
                            <?php echo $__env->make('back-end.admin.settings.general.topbar-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-inner-pages">
                            <?php echo $__env->make('back-end.admin.settings.general.inner-page-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-socials">
                            <?php echo $__env->make('back-end.admin.settings.general.socials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-dashboard-icons">
                            <?php echo $__env->make('back-end.admin.settings.general.dashboard-icon-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-footer">
                            <?php echo $__env->make('back-end.admin.settings.general.footer-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-roles">
                            <?php echo $__env->make('back-end.admin.settings.general.role-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-sidebar">
                            <?php echo $__env->make('back-end.admin.settings.general.sidebar-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-cache">
                            <?php echo $__env->make('back-end.admin.settings.general.clear-cache', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-demo-content">
                            <?php echo $__env->make('back-end.admin.settings.general.demo-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-chat-setting">
                            <?php echo $__env->make('back-end.admin.settings.general.chat-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-forum-setting">
                            <?php echo $__env->make('back-end.admin.settings.general.forum-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-booking-setting">
                            <?php echo $__env->make('back-end.admin.settings.general.booking-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-personalskillshold tab-pane fade show" id="dc-import-update">
                            <?php echo $__env->make('back-end.admin.settings.general.import-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        tinymce.init({
            selector: 'textarea.dc-tinymceeditor',
            height: 300,
            theme: 'modern',
            plugins: ['code advlist autolink lists link image charmap print preview hr anchor pagebreak'],
            menubar: false,
            statusbar: false,
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify code',
            image_advtab: true,
            remove_script_host: false,
            })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/index.blade.php ENDPATH**/ ?>