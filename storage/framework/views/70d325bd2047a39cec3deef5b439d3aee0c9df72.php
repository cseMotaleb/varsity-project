<div class="dc-contentdoctab dc-articles-holder tab-pane" id="doc-articles">
    <?php if(!empty($articles) && $articles->count() > 0 ): ?>
        <div class="dc-articles">
            <div class="dc-searchresult-head">
                <div class="dc-title"><h4><?php echo e(trans('lang.articles_by')); ?>&nbsp;"<?php echo e(Helper::getUserName($user->id)); ?>"</h4></div>
            </div>
            <div class="dc-articleslist-content dc-articles-list">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="dc-article">
                        <figure class="dc-articleimg">
                            <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$user->id.'/articles/', $article->image, 'list-', 'list-article-default.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                            <figcaption>
                                <div class="dc-articlesdocinfo">
                                    <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$user->id, $user->profile->avatar, 'extra-small-', 'user-login.png'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                                    <span><?php echo e(Helper::getUserName($user->id)); ?></span>
                                </div>
                            </figcaption>
                        </figure>
                        <div class="dc-articlecontent">
                            <div class="dc-title">
                                <?php if(!empty($article->categories) && $article->categories->count() > 0): ?>
                                    <?php $__currentLoopData = $article->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('articleListing', clean($category->slug))); ?>" class="dc-articleby"><?php echo e(html_entity_decode(clean($category->title))); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <h3><a href="<?php echo e(route('articleDetail', ['slug' => clean($article->slug)])); ?>"><?php echo e(html_entity_decode(clean($article->title))); ?></a></h3>
                                <span class="dc-datetime"><i class="ti-calendar"></i> <?php echo e(Carbon\Carbon::parse($article->created_at)->format('M d, Y')); ?></span>
                            </div>
                            <ul class="dc-moreoptions">
                                <li>
                                    <a href="javascript:void(0);" class="<?php echo e((in_array($article->id, $saved_articles) ? 'dc-clicksave dc-btndisbaled' : '')); ?>"
                                        id="article-<?php echo e($article->id); ?>" @click.prevent="add_wishlist('article-<?php echo e($article->id); ?>', '<?php echo e($article->id); ?>', 'saved_articles', '')">
                                        <i class="ti-heart"></i>
                                        <span v-if=show_likes>{{article_likes}}</span>
                                        <span v-else><?php echo e(!empty($article->likes) ? clean($article->likes) : 0); ?></span>
                                    </a>
                                </li>
                                
                                <li><a href="javascript:void(0);"><i class="ti-eye"></i> <?php echo e(!empty($article->views) ? clean($article->views) : 0); ?></a></li>
                                <li id="dc-share-<?php echo e($article->id); ?>" @click="socialPopup('<?php echo e($article->id); ?>')" class="la-shareicon">
                                    <a href="javascript:void(0);"><i class="ti-share"></i> <?php echo e(trans('lang.share')); ?></a>
                                    <ul class="dc-simplesocialicons dc-socialiconsborder">
                                        <li class="dc-facebook">
                                            <a href="javascript:void()" @click="socialShare('https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('articleDetail', ['slug' => $article->slug]))); ?>')" class="social-share">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="dc-twitter">
                                            <a href="javascript:void()" @click="socialShare('https://twitter.com/intent/tweet?url=<?php echo e(urlencode(route('articleDetail', ['slug' => $article->slug]))); ?>')" class="social-share">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="dc-linkedin">
                                            <a href="javascript:void()" @click="socialShare('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(route('articleDetail', ['slug' => $article->slug]))); ?>')" class="social-share">
                                                <i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="dc-googleplus">
                                            <a href="javascript:void()" @click="socialShare('https://plus.google.com/share?url=<?php echo e(urlencode(route('articleDetail', ['slug' => $article->slug]))); ?>')" class="social-share">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if( method_exists($articles,'links') ): ?>
                    <?php echo e($articles->links('pagination.custom')); ?>

                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('front-end.doctors.profile-details.share-profile.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/articles/index.blade.php ENDPATH**/ ?>