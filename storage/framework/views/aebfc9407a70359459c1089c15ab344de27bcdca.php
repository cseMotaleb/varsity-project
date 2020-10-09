<?php $__env->startSection('content'); ?>
    <div class="dc-haslayout dc-manage-account la-setting-holder" id="account_settings">
        <div class="dc-preloader-section" v-if="is_loading" v-cloak>
            <div class="dc-preloader-holder">
                <div class="dc-loader"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <?php if(Session::has('error')): ?>
                    <div class="flash_msg float-right">
                        <flash_messages :message_class="'danger'" :time='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
                    </div>
                <?php endif; ?>
                <div class="dc-dashboardbox dc-dashboardtabsholder dc-accountsettingholder">
                    <div class="dc-dashboardtabs">
                        <ul class="dc-tabstitle nav navbar-nav">
                            <?php if(Helper::getAuthRoleType() != 'admin'): ?>
                                <li class="nav-item">
                                    <a class="<?php echo e(Helper::getAuthRoleType() != 'admin' ? 'active' : ''); ?>" data-toggle="tab" href="#dc-delete-account"><?php echo e(trans('lang.delete_account')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(Helper::getAuthRoleType() === 'admin' || Helper::getAuthRoleType() === 'doctor' || Helper::getAuthRoleType() === 'hospital' || Helper::getAuthRoleType() === 'regular'): ?>
                                <li class="nav-item">
                                    <a class="<?php echo e(Helper::getAuthRoleType() == 'admin' ? 'active' : ''); ?>" data-toggle="tab" href="#dc-reset-pass"><?php echo e(trans('lang.reset_pass')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(Helper::getAuthRoleType() === 'admin'): ?>
                                <li class="nav-item">
                                    <a class="" data-toggle="tab" href="#dc-email-notifications"><?php echo e(trans('lang.email_notifications')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="dc-tabscontent tab-content">
                        <div class="dc-securityhold tab-pane la-section-settings <?php echo e(Helper::getAuthRoleType() != 'admin' ? 'active' : ''); ?>" id="dc-delete-account">
                            <?php echo $__env->make('back-end.account-settings.delete-account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-securityhold tab-pane <?php echo e(Helper::getAuthRoleType() === 'admin' ? 'active' : ''); ?> la-section-settings" id="dc-reset-pass">
                            <?php echo $__env->make('back-end.account-settings.reset-password.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="dc-securityhold tab-pane  la-section-settings" id="dc-email-notifications">
                            <?php echo $__env->make('back-end.account-settings.email-notifications.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/account-settings/index.blade.php ENDPATH**/ ?>