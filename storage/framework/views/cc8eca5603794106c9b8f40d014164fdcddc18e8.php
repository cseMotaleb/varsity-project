<?php echo Form::open(['url' => '', 'class' => 'dc-formtheme dc-socials-form', 'id'=>'social-settings-form', '@submit.prevent'=>'submitSocialSettings']); ?>

    <fieldset class="social-icons-content dc-socialiconscontent">
        <?php if(!empty($socials_array)): ?>
            <?php $counter = 0 ?>
            <?php $__currentLoopData = $socials_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unserializeKey =>$unserializevalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="wrap-social-icons dc-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <span class="dc-select dc-select-half">
                                <select name="social[<?php echo e($counter); ?>][title]" class="form-control">
                                    <option value="null" selected><?php echo e(trans('lang.select_social_icons')); ?></option>
                                    <?php $__currentLoopData = $social_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $selected = 'selected';
                                            $selected_value = $unserializevalue['title'] === $key ? $selected : '';
                                        ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($selected_value); ?>><?php echo e(html_entity_decode(clean($value['title']))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </span>
                            <?php echo Form::text('social['.$counter.'][url]', $unserializevalue['url'],
                                ['class' => 'form-control dc-social-url-half']); ?>

                        </div>
                        <div class="form-group dc-rightarea">
                            <?php if($unserializeKey == 0 ): ?>
                                <span class="dc-addinfobtn" @click="addSocial"><i class="fa fa-plus"></i></span> <?php else: ?>
                                <span class="dc-addinfobtn dc-deleteinfo delete-social" data-check="<?php echo e($counter); ?>">
                                    <i class="fa fa-trash"></i>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="wrap-social-icons dc-haslayout">
                <div class="form-group">
                    <div class="form-group-holder">
                        <span class="dc-select dc-select-half">
                            <select name="social[0][title]" class="form-control">
                                <option value="null" selected><?php echo e(trans('lang.select_social_icons')); ?></option>
                                <?php $__currentLoopData = $social_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e(html_entity_decode(clean($value['title']))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </span>
                        <?php echo Form::text('social[0][url]', null, ['class' => 'form-control dc-social-url-half',
                            'placeholder' => trans('lang.ph.social_url'),'v-model' => 'first_social_url']); ?>

                    </div>
                    <div class="form-group dc-rightarea">
                        <span class="dc-addinfo dc-addinfobtn" @click="addSocial"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <div v-for="(social, index) in socials" v-cloak>
                <div class="wrap-social-icons dc-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <span class="dc-select dc-select-half">
                                <select class="form-control" v-bind:name="'social['+[social.count]+'][title]'">
                                    <option><?php echo e(trans('lang.select_social_icons')); ?></option>
                                    <?php $__currentLoopData = $social_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e(html_entity_decode(clean($value['title']))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </span>
                            <input placeholder="<?php echo e(trans('lang.ph.social_url')); ?>" v-bind:name="'social['+[social.count]+'][url]'" type="text"
                                class="form-control dc-social-url-half" v-model="social.social_url">
                        </div>
                        <div class="form-group dc-rightarea">
                            <span class="dc-addinfo dc-deleteinfo dc-addinfobtn" @click="removeSocial(index)"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
    </fieldset>
    <div class="dc-updatall la-updateall-holder">
        <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/socials.blade.php ENDPATH**/ ?>