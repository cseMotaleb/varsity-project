<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9" id="account_settings">
            <div class="dc-preloader-section" v-if="is_loading" v-cloak>
                <div class="dc-preloader-holder">
                    <div class="dc-loader"></div>
                </div>
            </div>
            <div class="dc-dashboardbox dc-dashboardtabsholder">
                <div class="dc-dashboardboxtitle">
                    <h2><?php echo e(Helper::getUserName($id)); ?> <?php echo e(trans('lang.profile_setting')); ?></h2>
                </div>
                <div class="dc-dashboardtabs">
                    <ul class="dc-tabstitle nav navbar-nav">
                        <li class="nav-item">
                            <a class="active show" data-toggle="tab" href="#dc-skills"><?php echo e(trans('lang.personal_detail')); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="dc-tabscontent tab-content">
                    <div class="dc-personalskillshold tab-pane active fade show" id="dc-skills">
                        <?php echo Form::open(['url' => '', 'class' =>'dc-formtheme', 'id' =>'edit-user-details', '@submit.prevent'=>'updateUserProfile("'.$id.'", "'.trans("lang.update_role_war").'", "'.trans("lang.update_role_note").'")']); ?>

                            <?php echo $__env->make('back-end.admin.users.edit.detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('back-end.admin.users.edit.media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="dc-experienceaccordion">
                                <div class="dc-updatall la-updateall-holder">
                                    <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

                                </div>
                            </div>
                        <?php echo Form::close();; ?>

                    </div>    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/users/edit/index.blade.php ENDPATH**/ ?>