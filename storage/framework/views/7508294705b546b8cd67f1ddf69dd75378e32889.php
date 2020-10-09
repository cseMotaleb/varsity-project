<?php $__env->startSection('header'); ?>
    <?php 
        $locations = App\Location::all(); 
        $roles     = Spatie\Permission\Models\Role::all()->toArray();
    ?>
    <header id="dc-header" class="dc-header dc-haslayout dc-header-dashboard">
        <div class="dc-navigationarea">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <strong class="dc-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset(Helper::getGeneralSettings('site_logo'))); ?>" alt="<?php echo e(trans('lang.site_logo')); ?>"></a></strong>
                        <div class="dc-rightarea">
                            <nav id="dc-nav" class="dc-nav navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="lnr lnr-menu"></i>
                                </button>
                                <div class="collapse navbar-collapse dc-navigation" id="navbarNav">
                                    <?php echo $__env->make('includes.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </nav>
                            <?php if(auth()->guard()->check()): ?>
                                <?php echo $__env->make('includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                <div class="dc-loginarea">
                                    <div class="dc-loginoption">
                                        <a href="javascript:void(0);" id="dc-loginbtn" class="dc-loginbtn"><?php echo e(trans('lang.login')); ?></a>
                                        <div class="dc-loginformhold">
                                            <div class="dc-loginheader">
                                                <span><?php echo e(trans('lang.login')); ?></span>
                                                <a href="javascript:;"><i class="fa fa-times"></i></a>
                                            </div>
                                            <form method="POST" action="<?php echo e(route('login')); ?>" class="dc-formtheme dc-loginform do-login-form">
                                                <?php echo csrf_field(); ?>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input id="email" type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                            placeholder="<?php echo e(trans('lang.ph_email')); ?>" required autofocus>
                                                        <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="password" type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                            placeholder="<?php echo e(trans('lang.ph_pass')); ?>" required>
                                                        <?php if($errors->has('password')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="dc-logininfo">
                                                        <span class="dc-checkbox">
                                                            <input id="remember" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                            <label for="remember"><?php echo e(trans('lang.remember')); ?></label>
                                                        </span>
                                                        <button type="submit" class="dc-btn do-login-button"><?php echo e(trans('lang.login')); ?></button>
                                                    </div>
                                                </fieldset>
                                                <div class="dc-loginfooterinfo">
                                                    <?php if(Route::has('password.request')): ?>
                                                        <a href="<?php echo e(route('password.request')); ?>" class="dc-forgot-password"><?php echo e(trans('lang.forget_pass')); ?></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('lang.create_account')); ?></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(route('register')); ?>" class="dc-btn"><?php echo e(trans('lang.join_now')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="dc-headerform-holder">
                            <div class="dc-search-headerform">
                                <div class="closeform-holder">
                                    <a href="javascript:void(0);" class="dc-removeform"><?php echo e(trans('lang.cancel')); ?></a>
                                    <a href="javascript:void(0);" class="dc-removeform"> <i class="fa fa-close"></i></a>
                                </div>
                                <?php echo Form::open(['url' => url('search-results'), 'method' => 'get', 'id' =>'dc_search_bar', 'class' => 'dc-formtheme dc-form-advancedsearch dc-headerform']); ?>

                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="search" value="<?php echo e(!empty(request()->search) ? request()->search : ''); ?>" class="form-control" placeholder="<?php echo e(trans('lang.ph.hospitals_clinic_etc')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="dc-select">
                                                <select class="locations" data-placeholder="<?php echo e(trans('lang.select_country')); ?>" name="locations">
                                                    <option value=""><?php echo e(trans('lang.select_country')); ?></option>
                                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($location->id); ?>"><?php echo e($location->title); ?>*</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="dc-formbtn">
                                            <?php echo e(Form::button('<i class="ti-arrow-right"></i>', ['type' => 'submit', 'class' => 'btn-sm'] )); ?>

                                        </div>
                                    </fieldset>
                                <?php echo form::close();; ?>

                            </div>
                            <a href="javascript:void(0);" class="dc-searchbtn"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/includes/header.blade.php ENDPATH**/ ?>