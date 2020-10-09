<?php $__env->startPush('backend_stylesheets'); ?>
    <link href="<?php echo e(asset('css/basictable.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="dc-haslayout" id="account_settings">
        <?php if(Session::has('message')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='500' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <div class="dc-preloader-section" v-if="is_loading" v-cloak>
            <div class="dc-preloader-holder">
                <div class="dc-loader"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-right">
                <?php if(Session::has('message')): ?>
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
                    </div>
                <?php endif; ?>
                <div class="dc-dashboardbox">
                    <div class="dc-dashboardboxtitle dc-titlewithsearch">
                        <h2><?php echo e(trans('lang.manage_users')); ?></h2>
                        <div class="dc-rightarea"><a href="<?php echo e(route('adminAddUser')); ?>" class="dc-btn">Add new user</a></div>
                    </div>
                    <div class="dc-dashboardboxcontent dc-categoriescontentholder">
                        <?php if($users->count() > 0): ?>
                            <table class="dc-tablecategories dc-table-responsive">
                                <thead>
                                    <tr>
                                        <th><?php echo e(trans('lang.user_name')); ?></th>
                                        <th><?php echo e(trans('lang.ph_email')); ?></th>
                                        <th><?php echo e(trans('lang.role')); ?></th>
                                        <th><?php echo e(trans('lang.medical_verified')); ?></th>
                                        <th><?php echo e(trans('lang.user_verified')); ?></th>
                                        <th><?php echo e(trans('lang.action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                            $user = \App\User::find($user_data['id']); 
                                            $verify_medical = Helper::getUnserializeData($user->profile->verify_medical); 
                                        ?>
                                        <?php if(Helper::getRoleTypeByUserID($user->id) != 'admin'): ?>
                                            <tr class="del-<?php echo e($user->id); ?>">
                                                <td><?php echo e(ucwords(\App\Helper::getUserName($user->id))); ?></td>
                                                <td><?php echo e(clean($user->email)); ?></td>
                                                <td><?php echo e($user->getRoleNames()->first()); ?></td>
                                                <?php if(!empty($verify_medical)): ?> 
                                                    <td>
                                                        <?php echo e(html_entity_decode(clean($verify_medical['registration_number']))); ?></br>
                                                        <a href="<?php echo e(route('getfile', ['type'=>'users', 'id'=>clean($user->id), 'attachment'=>$verify_medical['registration_document']])); ?>">
                                                            <?php echo e(trans('lang.download')); ?>

                                                        </a>
                                                    </td>
                                                <?php elseif(Helper::getRoleTypeByUserID($user->id) == 'regular'): ?>
                                                    <td><?php echo e(trans('lang.not_available')); ?></td>
                                                <?php else: ?>
                                                    <td><?php echo e(trans('lang.not_uploaded')); ?></td>
                                                <?php endif; ?>
                                                <td id="verify_cell-<?php echo e($user->id); ?>">
                                                    <?php if($user->profile->verify_registration == 1): ?>
                                                        <a href="javascript:;" class="" v-on:click.prevent="verifiedUser('verify_cell-<?php echo e($user->id); ?>', '<?php echo e($user->id); ?>', 'not_verify')"><?php echo e(trans('lang.verified')); ?></a>
                                                    <?php elseif(Helper::getRoleTypeByUserID($user->id) == 'regular'): ?>                                                        
                                                        <a href="javascript:;"><?php echo e(trans('lang.not_available')); ?></a>
                                                    <?php else: ?>
                                                        <a href="javascript:;" class="" v-on:click.prevent="verifiedUser('verify_cell-<?php echo e($user->id); ?>', '<?php echo e($user->id); ?>', 'verify')"><?php echo e(trans('lang.not_verified')); ?></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="dc-actionbtn">
                                                        <a href="<?php echo e(route('adminEditUser',$user->id)); ?>" class="dc-addinfo dc-skillsaddinfo">
                                                            <i class="lnr lnr-pencil"></i>
                                                        </a>
                                                        <delete :title="'<?php echo e(trans("lang.ph.delete_confirm_title")); ?>'" :id="'<?php echo e($user->id); ?>'" :message="'<?php echo e(trans("lang.user_deleted")); ?>'" :url="'<?php echo e(url('admin/delete-user')); ?>'"></delete>
                                                        <?php if(Helper::getRoleTypeByUserID($user->id) != 'regular'): ?>
                                                            <a href="<?php echo e(url('profile/'.clean($user->slug))); ?>" class="dc-addinfo dc-skillsaddinfo"><i class="lnr lnr-eye"></i></a>
                                                        <?php else: ?>
                                                            <a href="javascript:;" class="dc-addinfo dc-skillsaddinfo disable-eye"><i class="lnr lnr-eye"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?>
                                <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if( method_exists($users,'links') ): ?>
                            <?php echo e($users->links('pagination.custom')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php echo $__env->yieldPushContent('backend_scripts'); ?>
<script src="<?php echo e(asset('js/jquery.basictable.min.js')); ?>"></script>
<script type="text/javascript">
    jQuery('.dc-table-responsive').basictable({
            breakpoint: 767,
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/users/index.blade.php ENDPATH**/ ?>