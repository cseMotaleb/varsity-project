<?php $__env->startPush('front_end_stylesheets'); ?>
    <link href="<?php echo e(asset('css/chosen.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Helper::displayBreadcrumbs('forumQuestions'); ?>

    <?php $columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'; ?>
    <?php if($display_sidebar == 'true'): ?>
        <?php 
            $columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9';
        ?>
    <?php endif; ?>
    <div class="dc-haslayout dc-main-section">
        <div class="container" id="forum">
            <div class="dc-preloader-section" v-if="loading" v-cloak>
                <div class="dc-preloader-holder">
                    <div class="dc-loader"></div>
                </div>
            </div>
            <div class="row">
                <div class="dc-twocolumns dc-haslayout">
                    <div class="<?php echo e($columns); ?> float-left">
                        <div class="dc-questionsection">
                            <div class="dc-askquery">
                                <div class="dc-postquestion">
                                    <div class="dc-title">
                                        <span href="javascript:void(0)"><?php echo e(html_entity_decode(clean($forum_banner_subtitle))); ?></span>
                                        <h2><?php echo e(html_entity_decode(clean($forum_banner_title))); ?></h2>
                                    </div>
                                    <div class="dc-description">
                                        <p><?php echo e(html_entity_decode(clean($forum_banner_desc))); ?></p>
                                    </div>
                                    <div class="dc-btnarea">
                                        <a href="javascript:void(0);" class="dc-btn" v-on:click="showModal('postQuestion')"><?php echo e(trans('lang.post_question')); ?></a>
                                    </div>
                                </div>
                                <?php if(!empty($forum_banner_image)): ?>
                                    <figure>
                                        <img src="<?php echo e(asset('uploads/settings/general/'.html_entity_decode(clean($forum_banner_image)))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                                    </figure>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="dc-innerbanner">
                            <form class="dc-formtheme  dc-forumform" action="<?php echo e(route('searchQueryFilter')); ?>" method="GET">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="keyword" class="form-control" value="<?php echo e(!empty(request()->keyword) ? clean(request()->keyword) : ''); ?>" placeholder="<?php echo e(trans('lang.type_query')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="dc-select">
                                            <select name = "speciality">
                                                <option value="" selected><?php echo e(trans('lang.select_specialties')); ?></option>
                                                <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $selected = !empty(request()->speciality) && request()->speciality == clean($key) ? 'selected' : ''; ?>
                                                    <option value="<?php echo e(clean($key)); ?>" <?php echo e($selected); ?>><?php echo e(html_entity_decode(clean($speciality))); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="dc-btnarea">
                                        <button type="submit" class="dc-btn"><?php echo e(trans('lang.search')); ?></button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="dc-docsingle-holder">
                            <div class="tab-content dc-haslayout">
                                <div class="dc-contentdoctab dc-feedback-holder" id="feedback">
                                    <div class="dc-feedback">
                                        <div class="dc-searchresult-head">
                                            <div class="dc-title"><h4><?php echo e(trans('lang.health_forum_for_all')); ?></h4></div>
                                            <div class="dc-rightarea">
                                                <form action="<?php echo e(route('searchQueryFilter')); ?>" method="GET">
                                                    <div class="dc-select">
                                                        <select name="sort_by" id="forum_sort" v-on:change="resultSortBy()">
                                                            <option value='null'><?php echo e(trans('lang.sort_by')); ?></option>
                                                            <?php $__currentLoopData = Helper::sortByArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e(html_entity_decode(clean($key))); ?>" <?php echo e(!empty($_GET['sort_by']) && $_GET['sort_by'] == $key ? 'selected' : ''); ?>><?php echo e(html_entity_decode(clean($value))); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="dc-consultation-content">
                                            <?php if(!empty($questions) && $questions->count() > 0): ?>
                                                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $speciality = App\Speciality::find($question->speciality_id);
                                                        $speciality_image = !empty($speciality) && !empty($speciality->image) ? $speciality->image : '';
                                                        $forum = App\Forum::findOrFail($question->id);
                                                    ?>
                                                    <div class="dc-consultation-details">
                                                        <figure class="dc-consultation-img dc-imgcolor1">
                                                            <img src="<?php echo e(asset(Helper::getImage('uploads/specialities', $speciality_image, 'extra-small-', 'default-speciality.png'))); ?>" alt="<?php echo e(trans('lang.ing_desc')); ?>">
                                                        </figure>
                                                        <div class="dc-consultation-title">
                                                            <h5><a href="<?php echo e(route('getForumAnswers', ['slug' => clean($question->slug)])); ?>"><?php echo e(html_entity_decode(clean($question->question_title))); ?></a><em><?php echo e(Carbon\Carbon::parse(html_entity_decode(clean($question->created_at)))->format('M d, Y')); ?></em></h5>
                                                            <span><?php echo e(clean($forum->answers->count())); ?> <?php echo e(trans('lang.answers')); ?></span>
                                                        </div>
                                                        <div class="dc-description">
                                                            <p><?php echo e(html_entity_decode(clean($question->question_description))); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(method_exists($questions,'links')): ?>
                                                    <?php echo e($questions->links('pagination.custom')); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($display_sidebar == 'true'): ?>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 float-left">
                            <?php echo $__env->make('front-end.sidebar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <b-modal ref="postQuestion" id="la-postquestion" hide-footer title="<?php echo e(trans('lang.post_question')); ?>" class="la-pay-stripe">
                        <div class="modal-body">
                            <?php echo Form::open(['class' => 'dc-formtheme dc-formhelp', 'id' => 'post-question-form', '@submit.prevent'=>'postQuestion']); ?>

                                <fieldset>
                                    <div class="form-group">
                                        <span class="dc-select">
                                            <select name = "speciality">
                                                <option value="" disabled selected><?php echo e(trans('lang.select_specialties')); ?></option>
                                                <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(html_entity_decode(clean($key))); ?>"><?php echo e(html_entity_decode(clean($speciality))); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::text('question_title', null, ['class' => 'form-control', 'placeholder' => trans('lang.ph.question_title')]); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::textarea('question_desc', null, ['class' => 'form-control', 'placeholder' => trans('lang.ph.question_desc')]); ?>

                                    </div>
                                    <div class="form-group dc-btnarea">
                                        <?php echo Form::submit(trans('lang.ask_free_query'), ['class' => 'dc-btn']); ?>

                                    </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </b-modal>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('front_end_scripts'); ?>
    <script src="<?php echo e(asset('js/chosen.jquery.js')); ?>"></script>
    <script>
        jQuery('.chosen-select').chosen();
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/forum/post-questions.blade.php ENDPATH**/ ?>