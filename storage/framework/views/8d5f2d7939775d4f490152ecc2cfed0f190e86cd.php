<?php $__env->startPush('backend_stylesheets'); ?>
<link href="<?php echo e(asset('css/basictable.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="dc-locations" id="locations">
    <?php if(Session::has('message')): ?>
        <div class="flash_msg">
            <flash_messages :message_class="'success'" :time='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak>
            </flash_messages>
        </div>
    <?php elseif(Session::has('error')): ?>
        <div class="flash_msg">
            <flash_messages :message_class="'danger'" :time='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak>
            </flash_messages>
        </div>
    <?php endif; ?>
    <section class="dc-haslayout">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-6">
                <div class="dc-dashboardbox">
                    <div class="dc-dashboardboxtitle dc-titlewithsearch dc-titlewithdel">
                        <h2><?php echo e(trans('lang.manage_locations')); ?></h2>
                        <div class="dc-rightarea">
                            <?php echo Form::open(['url' => url('admin/locations/search'),
                            'method' => 'get', 'class' => 'dc-formtheme dc-formsearch']); ?>

                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="keyword"
                                        value="<?php echo e(!empty($_GET['keyword']) ? $_GET['keyword'] : ''); ?>"
                                        class="form-control" placeholder="<?php echo e(trans('lang.search_locations')); ?>">
                                    <button type="submit" class="dc-searchgbtn"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </div>
                            </fieldset>
                            <?php echo Form::close(); ?>

                            <multi-delete v-cloak v-if="this.is_show"
                                :title="'<?php echo e(trans("lang.ph.delete_confirm_title")); ?>'"
                                :message="'<?php echo e(trans("lang.ph.locations_del_delete_message")); ?>'"
                                :url="'<?php echo e(url('admin/delete-checked-locations')); ?>'"
                                :redirect_url="'<?php echo e(url('admin/locations')); ?>'">
                            </multi-delete>
                        </div>
                    </div>
                    <?php if($locations->count() > 0): ?>
                    <div class="dc-dashboardboxcontent dc-categoriescontentholder">
                        <table class="dc-tablecategories dc-table-responsive" id="checked-val">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="dc-checkbox">
                                            <input name="locs[]" id="dc-locs" @click="selectAll" type="checkbox">
                                            <label for="dc-locs"></label>
                                        </span>
                                    </th>
                                    <th><?php echo e(trans('lang.location_icon')); ?></th>
                                    <th><?php echo e(trans('lang.name')); ?></th>
                                    <th><?php echo e(trans('lang.slug')); ?></th>
                                    <th><?php echo e(trans('lang.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 0; ?>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="del-<?php echo e($location->id); ?>">
                                        <td>
                                            <span class="dc-checkbox">
                                                <input name="locs[]" @click="selectRecord" value="<?php echo e(intVal(clean($location->id))); ?>"
                                                    id="wt-check-<?php echo e($counter); ?>" type="checkbox">
                                                <label for="wt-check-<?php echo e($counter); ?>"></label>
                                            </span>
                                        </td>
                                        <td data-th="Icon">
                                            <span class="bt-content">
                                                <figure>
                                                    <img src="<?php echo e(asset(Helper::getImage('uploads/locations', $location->flag))); ?>" alt="<?php echo e(html_entity_decode(clean($location->title))); ?>">
                                                </figure>
                                            </span>
                                        </td>
                                        <td><?php echo e(html_entity_decode(clean($location->title))); ?></td>
                                        <td><?php echo e(html_entity_decode(clean($location->slug))); ?></td>
                                        <td>
                                            <div class="dc-actionbtn">
                                                <a href="<?php echo e(url('admin/locations/edit')); ?>/<?php echo e(html_entity_decode(clean($location->slug))); ?>"
                                                    class="dc-addinfo dc-skillsaddinfo">
                                                    <i class="lnr lnr-pencil"></i>
                                                </a>
                                                <delete :title="'<?php echo e(trans("lang.ph_delete_confirm_title")); ?>'"
                                                    :id="'<?php echo e(intVal(clean($location->id))); ?>'"
                                                    :message="'<?php echo e(trans("lang.ph_loc_delete_message")); ?>'"
                                                    :url="'<?php echo e(url('admin/locations/delete')); ?>'"
                                                    :redirect_url="'<?php echo e(url('admin/locations')); ?>'">
                                                </delete>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $counter++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if( method_exists($locations,'links') ): ?>
                            <?php echo e($locations->links('pagination.custom')); ?>

                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-6 dc-responsive-mt mt-lg-0 mt-xl-0">
                <div class="dc-dashboardbox dc-offered-holder dc-addnewlocation">
                    <div class="dc-dashboardboxtitle">
                        <h2><?php echo e(trans('lang.add_new_location')); ?></h2>
                    </div>
                    <div class="dc-dashboardboxcontent">
                        <?php echo Form::open([
                        'url' => url('admin/store-location'),
                        'class' =>'dc-formtheme dc-formprojectinfo dc-formcategory dc-formtheme dc-userform', 'id'=>
                        'locations-form'
                        ]); ?>

                        <fieldset>
                            <div class="form-group">
                                <?php echo Form::text( 'title', null, ['class' =>'form-control'.($errors->has('title') ? '
                                is-invalid' : ''), 'placeholder' => trans('lang.ph.title')] ); ?>

                                <?php if($errors->has('title')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($locations)): ?>
                                <div class="form-group">
                                    <span class="dc-select">
                                        <select class="form-control" name="parent_location">
                                            <option value="0"><?php echo e(trans('lang.choose_parent_loc')); ?></option>
                                            <?php \App\Helper::listTreeCategories('location'); ?>
                                        </select>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <?php echo Form::textarea( 'loc_desc', null, ['class' =>'form-control', 'placeholder' =>
                                trans('lang.ph.loc_desc')] ); ?>

                            </div>
                            <div class="dc-settingscontent form-group">
                                <div class="dc-formtheme dc-userform">
                                    <upload-media :img="'location_image'" :img_id="'location_image'"
                                        :img_name="'location_image'" :img_ref="'location_image'"
                                        :img_hidden_name="'hidden_location_image'"
                                        img_hidden_id="'hidden_location_image'"
                                        :url="'<?php echo e(url("media/upload-temp-image/locations/location_image/location")); ?>'">
                                    </upload-media>
                                </div>
                            </div>
                            <div class="form-group dc-btnarea">
                                <?php echo Form::submit(trans('lang.add_loc'), ['class' => 'dc-btn']); ?>

                            </div>
                        </fieldset>
                        <?php echo Form::close();; ?>

                    </div>
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
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/locations/index.blade.php ENDPATH**/ ?>