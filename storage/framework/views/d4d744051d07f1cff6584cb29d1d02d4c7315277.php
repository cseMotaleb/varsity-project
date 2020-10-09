<?php $__env->startPush('backend_stylesheets'); ?>
    <link href="<?php echo e(asset('css/basictable.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="packages-listing" id="packages">
        <section class="dc-haslayout la-addpackages">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 float-left">
                    <div class="dc-dashboardbox">
                        <div class="dc-dashboardboxtitle">
                            <h2><?php echo e(trans('lang.add_packages')); ?></h2>
                        </div>
                        <div class="dc-dashboardboxcontent">
                            <?php echo Form::open(['class' =>'dc-formtheme dc-formprojectinfo dc-formcategory', 'id' => 'package_form', '@submit.prevent' => 'submitPackage']); ?>

                                <fieldset>
                                    <div class="form-group">
                                        <?php echo Form::text( 'package_title', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_pkg_title')] ); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::text( 'package_subtitle', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_pkg_subtitle')] ); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number( 'package_price', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_pkg_price')] ); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number('options[no_of_services]', null, array('class' => 'form-control', 'placeholder' => trans('lang.no_of_services'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number('options[no_of_brochures]', null, array('class' => 'form-control', 'placeholder' => trans('lang.no_of_brochures'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number('options[no_of_articles]', null, array('class' => 'form-control', 'placeholder' => trans('lang.no_of_articles'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number('options[no_of_awards]', null, array('class' => 'form-control', 'placeholder' => trans('lang.no_of_awards'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number('options[no_of_memberships]', null, array('class' => 'form-control', 'placeholder' => trans('lang.no_of_memberships'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <span class="dc-select">
                                            <select name="options[duration]" v-model="package.duration" @change="packageDuration">
                                                <option value="" disabled=""><?php echo e(trans('lang.select_duration')); ?></option>
                                                    <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $options['duration']): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e(Helper::getPackageDurationList($key)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                        <input type="text" name="options[duration]" v-if="duration" placeholder="<?php echo e(trans('lang.make_other_duration')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <switch_button v-model="bookings"><?php echo e(trans('lang.bookings')); ?></switch_button>
                                        <input type="hidden" :value="bookings" name="options[bookings]">
                                    </div>
                                    <div class="form-group">
                                        <switch_button v-model="private_chat"><?php echo e(trans('lang.enabale_disable_pvt_chat')); ?></switch_button>
                                        <input type="hidden" :value="private_chat" name="options[private_chat]">
                                    </div>
                                    <div class="form-group">
                                        <switch_button v-model="featured"><?php echo e(trans('lang.featured')); ?></switch_button>
                                        <input type="hidden" :value="featured" name="options[featured]">
                                    </div>
                                    <?php if($doctor_trial->count() == 0): ?>
                                        <div class="form-group">
                                            <span class="dc-checkbox">
                                                <input id="trial" type="checkbox" name="trial">
                                                <label for="trial"><span><?php echo e(trans('lang.enable_trial')); ?></span></label>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group dc-btnarea">
                                        <?php echo Form::submit(trans('lang.add_packages'), ['class' => 'dc-btn']); ?>

                                    </div>
                                </fieldset>
                            <?php echo Form::close();; ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 dc-responsive-mt mt-lg-0 float-right">
                    <div class="dc-dashboardbox">
                        <div class="dc-dashboardboxtitle dc-titlewithsearch">
                            <h2><?php echo e(trans('lang.packages')); ?></h2>
                            <?php echo Form::open(['url' => url('admin/packages/search'), 'method' => 'get', 'class' => 'dc-formtheme dc-formsearch']); ?>

                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="keyword" value="<?php echo e(!empty($_GET['keyword']) ? $_GET['keyword'] : ''); ?>" class="form-control" placeholder="<?php echo e(trans('lang.ph_search_packages')); ?>">
                                        <button type="submit" class="dc-searchgbtn"><i class="lnr lnr-magnifier"></i></button>
                                    </div>
                                </fieldset>
                            <?php echo Form::close(); ?>

                        </div>
                        <?php if(!empty($packages) || $packages->count() > 0): ?>
                            <div class="dc-dashboardboxcontent dc-categoriescontentholder">
                                <table class="dc-tablecategories dc-table-responsive">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(trans('lang.name')); ?></th>
                                            <th><?php echo e(trans('lang.slug')); ?></th>
                                            <th><?php echo e(trans('lang.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="del-<?php echo e($package->id); ?>" v-bind:id="packageID">
                                                <td><?php echo e(html_entity_decode(clean($package->title))); ?></td>
                                                <td><?php echo e(html_entity_decode(clean($package->slug))); ?></td>
                                                <td>
                                                    <div class="dc-actionbtn">
                                                        <a href="<?php echo e(url('admin/packages/edit')); ?>/<?php echo e(intVal(clean($package->id))); ?>" class="dc-addinfo dc-packagesaddinfo">
                                                            <i class="lnr lnr-pencil"></i>
                                                        </a>
                                                        <?php if($package->trial != 1): ?>
                                                            <delete :title="'<?php echo e(trans("lang.ph_delete_confirm_title")); ?>'" :id="'<?php echo e(intVal(clean($package->id))); ?>'" :message="'<?php echo e(trans("lang.ph_pkg_delete_message")); ?>'" :url="'<?php echo e(url('admin/packages/delete-package')); ?>'"></delete>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $counter++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php if( method_exists($packages,'links') ): ?> <?php echo e($packages->links('pagination.custom')); ?> <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?> 
                                <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/packages/index.blade.php ENDPATH**/ ?>