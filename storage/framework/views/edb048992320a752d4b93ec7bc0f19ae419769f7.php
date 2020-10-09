<?php $__env->startSection('content'); ?>
<?php
    $locations = App\Location::select('title', 'id')->get()->pluck('title', 'id')->toArray();
    $roles = Spatie\Permission\Models\Role::all()->toArray();
    $register_form = App\SiteManagement::getMetaValue('reg_form_settings');
    $reg_one_title = !empty($register_form) && !empty($register_form['step1_title']) ? $register_form['step1_title'] : trans('lang.join_for_good');
    $reg_one_subtitle = !empty($register_form) && !empty($register_form['step1_subtitle']) ? $register_form['step1_subtitle'] : trans('lang.join_for_good_reason');
    $reg_two_title = !empty($register_form) && !empty($register_form['step2_title']) ? $register_form['step2_title'] : trans('lang.pro_info');
    $reg_two_subtitle = !empty($register_form) && !empty($register_form['step2_subtitle']) ? $register_form['step2_subtitle'] : trans('lang.join_for_good_reason');
    $term_note = !empty($register_form) && !empty($register_form['step2_term_note']) ? $register_form['step2_term_note'] : trans('lang.agree_terms');
    $reg_three_title = !empty($register_form) && !empty($register_form['step3_title']) ? $register_form['step3_title'] : trans('lang.almost_there');
    $reg_three_subtitle = !empty($register_form) && !empty($register_form['step3_subtitle']) ? $register_form['step3_subtitle'] : trans('lang.acc_almost_created_note');
    $register_image = !empty($register_form) && !empty($register_form['hidden_register_image']) ? $register_form['hidden_register_image'] : '';
    $term_page_url  = !empty($register_form) && !empty($register_form['term_page_url']) ? $register_form['term_page_url'] : '';
    $reg_four_title = !empty($register_form) && !empty($register_form['step4_title']) ? $register_form['step4_title'] : trans('lang.congrats');
    $reg_four_subtitle = !empty($register_form) && !empty($register_form['step4_subtitle']) ? $register_form['step4_subtitle'] : trans('lang.acc_creation_note');
?>
<div class="dc-haslayout dc-main-section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2" id="registration">
                <div class="dc-preloader-section" v-if="loading" v-cloak>
                    <div class="dc-preloader-holder">
                        <div class="dc-loader"></div>
                    </div>
                </div>
                <div class="dc-registerformhold" v-cloak>
                    <div class="dc-registerformmain">
                        <div class="dc-joinforms">
                            <form method="POST" action="<?php echo e(url('register/form-step1-custom-errors')); ?>" class="dc-formtheme dc-formregister" @submit.prevent="checkStep1" id="register_form">
                                <?php echo csrf_field(); ?>
                                <fieldset class="dc-registerformgroup">
                                    <div class="dc-haslayout" v-if="step === 1" v-cloak>
                                        <div class="dc-registerhead">
                                            <div class="dc-title">
                                                <h3><?php echo e(clean($reg_one_title)); ?></h3>
                                            </div>
                                            <div class="dc-description">
                                                <p><?php echo e(clean($reg_one_subtitle)); ?></p>
                                            </div>
                                        </div>
                                        <ul class="dc-joinsteps">
                                            <li class="dc-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.01')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.02')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                        </ul>
                                        <div class="form-group form-group-half">
                                            <input type="text" name="first_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_first_name')); ?>" v-bind:class="{ 'is-invalid': form_step1.is_first_name_error }" v-model="first_name">
                                            <span class="help-block" v-if="form_step1.first_name_error">
                                                <strong v-cloak>{{form_step1.first_name_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text" name="last_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_last_name')); ?>" v-bind:class="{ 'is-invalid': form_step1.is_last_name_error }" v-model="last_name">
                                            <span class="help-block" v-if="form_step1.last_name_error">
                                                <strong v-cloak>{{form_step1.last_name_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input id="user_email" type="email" class="form-control" name="email" placeholder="<?php echo e(trans('lang.ph_email')); ?>" value="<?php echo e(old('email')); ?>" v-bind:class="{ 'is-invalid': form_step1.is_email_error }" v-model="user_email">
                                            <span class="help-block" v-if="form_step1.email_error">
                                                <strong v-cloak>{{form_step1.email_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="dc-btn"><?php echo e(trans('lang.btn_startnow')); ?></button>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="dc-haslayout" v-if="step === 2" v-cloak>
                                    <fieldset class="dc-registerformgroup">
                                        <div class="dc-registerhead">
                                            <div class="dc-title">
                                                <h3><?php echo e(clean($reg_two_title)); ?></h3>
                                            </div>
                                            <?php if(!empty($reg_two_subtitle)): ?>
                                                <div class="dc-description">
                                                    <p><?php echo e(clean($reg_two_subtitle)); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <ul class="dc-joinsteps">
                                            <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                            <li class="dc-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.02')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                        </ul>
                                        <?php if(!empty($locations)): ?>
                                            <div class="form-group">
                                                <span class="dc-select">
                                                    <?php echo Form::select('locations', $locations, null, array('placeholder' => trans('lang.ph.select_locations'), 'v-bind:class' => '{ "is-invalid": form_step2.is_locations_error }')); ?>

                                                    <span class="help-block" v-if="form_step2.locations_error">
                                                        <strong v-cloak>{{form_step2.locations_error}}</strong>
                                                    </span>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group form-group-half">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(trans('lang.ph_pass')); ?>" v-bind:class="{ 'is-invalid': form_step2.is_password_error }">
                                            <span class="help-block" v-if="form_step2.password_error">
                                                <strong v-cloak>{{form_step2.password_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(trans('lang.ph_retry_pass')); ?>" v-bind:class="{ 'is-invalid': form_step2.is_password_confirm_error }">
                                            <span class="help-block" v-if="form_step2.password_confirm_error">
                                                <strong v-cloak>{{form_step2.password_confirm_error}}</strong>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="dc-formregisterstart">
                                        <div class="dc-title dc-formtitle">
                                            <h4><?php echo e(trans('lang.start_as')); ?></h4>
                                        </div>
                                        <?php if(!empty($roles)): ?>
                                            <ul class="dc-startoption">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!in_array($role['id'] == 1, $roles)): ?>
                                                        <li>
                                                            <span class="dc-radio">
                                                                <input id="dc-company-<?php echo e($key); ?>" type="radio" name="role" value="<?php echo e($role['role_type']); ?>" checked>
                                                                <label for="dc-company-<?php echo e($key); ?>"><?php echo e($role['name']); ?></label>
                                                            </span>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </fieldset>
                                    <fieldset class="dc-termsconditions">
                                        <div class="dc-checkboxholder">
                                            <span class="dc-checkbox">
                                                <input id="termsconditions" type="checkbox" name="termsconditions" checked>
                                                <label for="termsconditions">
                                                    <span><?php echo e($term_note); ?>

                                                        <?php if(!empty($term_page_url)): ?>
                                                            <a href="<?php echo e(url($term_page_url)); ?>"> <?php echo e(trans('lang.terms_conditions')); ?></a>
                                                        <?php endif; ?>
                                                    </span>
                                                </label>
                                                <span class="help-block" v-if="form_step2.termsconditions_error">
                                                    <strong style="color: red;" v-cloak><?php echo e(trans('lang.register_termsconditions_error')); ?></strong>
                                                </span>
                                            </span>
                                            <a href="#" @click.prevent="prev()" class="dc-btn"><?php echo e(trans('lang.previous')); ?></a>
                                            <a href="#" @click.prevent="checkStep2('<?php echo e(trans('lang.email_not_config')); ?>')" class="dc-btn"><?php echo e(trans('lang.continue')); ?></a>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                            <div class="dc-joinformc" v-if="step === 3" v-cloak>
                                <form method="POST" action="" class="dc-formtheme dc-formregister" id="verification_form">
                                    <div class="dc-registerhead">
                                        <div class="dc-title">
                                            <h3><?php echo e(clean($reg_three_title)); ?></h3>
                                        </div>
                                        <div class="dc-description">
                                            <p><?php echo e(clean($reg_three_subtitle)); ?></p>
                                        </div>
                                    </div>
                                    <ul class="dc-joinsteps">
                                        <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                        <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                        <li class="dc-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                        <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                    </ul>
                                    
                                    <figure class="dc-joinformsimg">
                                        <img src="<?php echo e(asset(Helper::getImage('uploads/settings/registration-form', $register_image, '', 'def-reg-form.jpg'))); ?>" alt="<?php echo e(trans('lang.verification_code_img')); ?>">
                                    </figure>
                                    <fieldset>
                                        <div class="form-group">
                                            <label>
                                                <?php echo e(trans('lang.verify_code_note')); ?>

                                                <?php if(!empty($reg_page)): ?>
                                                    <a target="_blank" href="<?php echo e(url($reg_page)); ?>">
                                                        <?php echo e(trans('lang.why_need_code')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)">
                                                        <?php echo e(trans('lang.why_need_code')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </label>
                                            <input type="text" name="code" class="form-control" placeholder="<?php echo e(trans('lang.enter_code')); ?>">
                                        </div>
                                        <div class="form-group dc-btnarea">
                                            <a href="#" @click.prevent="verifyCode()" class="dc-btn"><?php echo e(trans('lang.continue')); ?></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="dc-gotodashboard" v-if="step === 4" v-cloak>
                                <div class="dc-registerhead">
                                    <div class="dc-title">
                                        <h3><?php echo e(clean($reg_four_title)); ?></h3>
                                    </div>
                                    <div class="description">
                                        <p><?php echo e(clean($reg_four_subtitle)); ?></p>
                                    </div>
                                </div>
                                <ul class="dc-joinsteps">
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                </ul>

                                <a href="#" class="dc-btn" @click.prevent="loginRegisterUser()"><?php echo e(trans('lang.goto_dashboard')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="dc-registerformfooter">
                        <span><?php echo e(trans('lang.have_account')); ?><a id="dc-lg" href="javascript:void(0);" @click.prevent='scrollTop()'><?php echo e(trans('lang.btn_login_now')); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/auth/register.blade.php ENDPATH**/ ?>