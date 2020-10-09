<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="dc-haslayout dc-manage-account la-setting-holder" id="settings">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <div class="dc-dashboardbox dc-dashboardtabsholder dc-accountsettingholder">
                <div class="dc-dashboardtabs">
                    <ul class="dc-tabstitle nav navbar-nav">
                        <li class="nav-item">
                            <a class="<?php echo e(\Request::route()->getName() <> 'homeServicesSection'? 'active': ''); ?>" data-toggle="tab" href="#dc-slider"><?php echo e(trans('lang.slider_settings')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-search-banner-settings"><?php echo e(trans('lang.search_banner_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="<?php echo e(\Request::route()->getName()==='homeServicesSection'? 'active': ''); ?>" href="<?php echo e(route('homeServicesSection')); ?>"><?php echo e(trans('lang.services_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-about-us-settings"><?php echo e(trans('lang.about_us_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-how-works-settings"><?php echo e(trans('lang.how_works_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-app-section-settings"><?php echo e(trans('lang.download_app_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-doc-slider-settings"><?php echo e(trans('lang.doctors_slider_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-article-section"><?php echo e(trans('lang.article_section')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#dc-seo-section"><?php echo e(trans('lang.seo')); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="dc-tabscontent tab-content">
                    <div class="dc-securityhold tab-pane <?php echo e(\Request::route()->getName() <> 'homeServicesSection'? 'active': ''); ?> la-banner-settings" id="dc-slider">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.home-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-search-banner-settings">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.search-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-about-us-settings">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.about-us-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-how-works-settings">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.how-it-works-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane <?php echo e(\Request::route()->getName() === 'homeServicesSection'? 'active': ''); ?> la-section-settings" id="dc-services-tabs-settings">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.service-tabs-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-app-section-settings">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.download-app-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-doc-slider-settings">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.doctor-slider-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-article-section">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.article-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="dc-securityhold tab-pane la-section-settings" id="dc-seo-section">
                        <?php echo $__env->make('back-end.admin.settings.home-page-settings.seo-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('backend_scripts'); ?>
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

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/home-page-settings/index.blade.php ENDPATH**/ ?>