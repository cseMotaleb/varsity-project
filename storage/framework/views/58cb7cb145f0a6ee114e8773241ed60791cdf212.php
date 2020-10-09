<div class="dc-doc-membership dc-tabsinfo dc-formtheme dc-socials-form la-membership-content">
    <fieldset class="membership-content">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.memberships')); ?></h3>
        </div>
        <?php if(!empty($memberships)): ?>
            <?php $counter = 0 ?>
            <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership_key => $mem_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="wrap-membership dc-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <?php echo Form::text('membership['.$counter.'][title]', e($mem_value['title']),
                            ['class' => 'form-control author_title']); ?>

                        </div>
                        <div class="form-group dc-rightarea">
                            <?php if($membership_key == 0 ): ?>
                                <span class="dc-addinfobtn" @click="addMembership"><i class="fa fa-plus"></i></span> 
                            <?php else: ?>
                                <span class="dc-addinfobtn dc-deleteinfo delete-membership" data-check="<?php echo e($counter); ?>">
                                    <i class="fa fa-trash"></i>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="wrap-membership dc-haslayout">
                <div class="form-group">
                    <div class="form-group-holder">
                        <?php echo Form::text('membership[0][title]', null, ['class' => 'form-control author_title',
                        'placeholder' => trans('lang.ph.membership_title')]); ?>

                    </div>
                    <div class="form-group dc-rightarea">
                        <span class="dc-addinfo dc-addinfobtn" @click="addMembership"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div v-for="(membership, index) in memberships" v-cloak>
            <div class="wrap-membership dc-haslayout">
                <div class="form-group">
                    <div class="form-group-holder">
                        <input v-bind:name="'membership['+[membership.count]+'][title]'" type="text" class="form-control"
                            v-model="membership.membership_title">
                    </div>
                    <div class="form-group dc-rightarea">
                        <span class="dc-addinfo dc-deleteinfo dc-addinfobtn" @click="removeMembership(index)"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/personal-detail/membership.blade.php ENDPATH**/ ?>