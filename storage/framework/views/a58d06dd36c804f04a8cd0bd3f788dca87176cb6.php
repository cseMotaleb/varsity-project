<div class="dc-consultation">
    <div class="dc-searchresult-head">
        <div class="dc-title"><h4>“<?php echo e(!empty($user->profile->gender_title) ? clean($user->profile->gender_title) : ''); ?> <?php echo e(Helper::getUserName($user->id)); ?>” <?php echo e(trans('lang.answers')); ?></h4></div>
    </div>
    <div class="dc-consultation-content">
        <?php if(!empty($user->answers) && $user->answers->count() > 0): ?>
            <?php $__currentLoopData = $user->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $speciality = App\Speciality::find($forum->speciality_id); ?>
                <?php if(!empty($speciality)): ?>
                    <div class="dc-consultation-details">
                        <figure class="dc-consultation-img dc-imgcolor1">
                            <img src="<?php echo e(asset(Helper::getImage('uploads/specialities', $speciality->image, '-extra-small', 'default-speciality.png'))); ?>" alt="<?php echo e(trans('lang.ing_desc')); ?>">
                        </figure>
                        <div class="dc-consultation-title">
                            <h5><a href="<?php echo e(route('getForumAnswers', ['slug' => $forum->slug])); ?>"><?php echo e(html_entity_decode(clean($forum->question_title))); ?></a><em><?php echo e(Carbon\Carbon::parse($forum->created_at)->format('M d, Y')); ?></em></h5>
                            <span><?php echo e(trans('lang.answered_by')); ?> “<?php echo e(Helper::getUserName($user->id)); ?>”</span>
                        </div>
                        <div class="dc-description">
                            <p><?php echo e(html_entity_decode(clean($forum->pivot->answer))); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if( method_exists($user->answers,'links') ): ?>
                <?php echo e($user->answers->links('pagination.custom')); ?>

            <?php endif; ?>
        <?php else: ?>
            <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/consultation/index.blade.php ENDPATH**/ ?>