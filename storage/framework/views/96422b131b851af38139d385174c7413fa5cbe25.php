<?php $__env->startSection('title'); ?><?php echo e(Helper::getUserName($user->id)); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', clean($user->profile->description)); ?>
<?php $__env->startPush('PackageStyle'); ?>
    <link href="<?php echo e(asset('css/antd.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/prettyPhoto.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.pre-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Helper::displayBreadcrumbs('userProfile', $user); ?>

    <div class="dc-haslayout dc-main-section" id="user-profile">
        <?php if(Session::has('message')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <div class="dc-preloader-section" v-if="loading" v-cloak>
            <div class="dc-preloader-holder">
                <div class="dc-loader"></div>
            </div>
        </div>
        <?php if($display_chat == true): ?>
            <?php if(Auth::user()): ?>
                <?php if($user->id != Auth::user()->id && $role_type != 'hospital'): ?>
                    <chat 
                        :trans_image_alt="'<?php echo e(trans('lang.img')); ?>'" 
                        :ph_new_msg="'<?php echo e(trans('lang.ph_new_msg')); ?>'" 
                        :trans_placeholder="'<?php echo e(trans('lang.ph_type_msg')); ?>'" 
                        :receiver_id="'<?php echo e($user->id); ?>'" 
                        :receiver_profile_image="'<?php echo e(asset(Helper::getImage('uploads/users/'.$user->id.'/', $user->profile->avatar, 'medium-', 'user.jpg'))); ?>'"
                        :empty_error="'<?php echo e(trans('lang.empty_fields_not_allowed')); ?>'">
                    </chat>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php $columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'; ?>
        <?php if($display_sidebar == 'true'): ?>
            <?php 
                $columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9';
            ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="dc-twocolumns dc-haslayout">
                    <div class="<?php echo e($columns); ?> float-left">
                        <div class="dc-docsingle-header">
                            <figure class="dc-docsingleimg">
                                <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$user->id.'/', $user->profile->avatar, 'medium-', 'user.jpg'))); ?>" alt="img description">
                                <?php if($featured == 'true'): ?>
                                    <figcaption>
                                        <span class="dc-featuredtag"><i class="fa fa-bolt"></i></span>
                                    </figcaption>
                                <?php endif; ?>
                            </figure>
                            <div class="dc-docsingle-content">
                                <div class="dc-title">
                                    <h2>
                                        <a href="javascript:void(0);">
                                            <?php echo e(!empty($gender_title) ? Helper::getDoctorArray(clean($gender_title)) : ''); ?> <?php echo e(Helper::getUserName($user->id)); ?> 
                                        </a> 
                                        <?php echo e(Helper::verifyUser(intVal(clean($user->id)), true)); ?>

                                        <?php echo e(Helper::verifyMedical(intVal(clean($user->id)), true)); ?> 
                                    </h2>
                                    <ul class="dc-docinfo">
                                        <li><em><?php echo e(html_entity_decode(clean($user->profile->sub_heading)) ?? ''); ?></em></li>
                                        <li>
                                            <span class="dc-stars"><span style="width: <?php echo e($stars); ?>%;"></span></span><em><?php echo e(clean($user->feedbacks->count())); ?> <?php echo e(trans('lang.feedbacks')); ?></em>
                                        </li>
                                    </ul>
                                    <?php if(in_array($user->id, $saved_doctors)): ?>
                                        <a href="javascrip:void(0);" class="dc-like dc-clicksave dc-btndisbaled">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="javascrip:void(0);" class="dc-like" id="doctor-<?php echo e(intVal(clean($user->id))); ?>" @click.prevent="add_wishlist('doctor-<?php echo e(intVal(clean($user->id))); ?>', '<?php echo e(intVal(clean($user->id))); ?>', 'saved_doctors', '')" v-cloak>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="dc-description">
                                    <p><?php echo e(html_entity_decode(clean($user->profile->description)) ?? ''); ?></p>
                                </div>
                                <div class="dc-btnarea">
                                    <a href="javascript:void(0);" class="dc-btn feedback-btn" v-b-modal.modal-md v-on:click="showModal('feedback_modal', '<?php echo e((Auth::check() && Helper::getRoleTypeByUserID(Auth::user()->id) == 'regular' ? 'authorise' : 'not_authorise' )); ?>')"><?php echo e(trans('lang.add_feedback')); ?></a>
                                    <a href="javascript:void(0);" class="dc-btn" v-b-modal.modal-sm v-on:click="showModal('appointment_modal', '<?php echo e((Auth::check() && Helper::getRoleTypeByUserID(Auth::user()->id) == 'regular' ? 'authorise' : 'not_authorise' )); ?>', '<?php echo e(count($teams)); ?>' )"><?php echo e(trans('lang.book_now')); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="dc-docsingle-holder">
                            <ul class="dc-navdocsingletab nav navbar-nav">
                                <li class="nav-item">
                                    <a class="active" id="locations-tab" data-toggle="tab" href="#location_tab"><?php echo e(trans('lang.available_locs')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a id="userdetails-tab" data-toggle="tab" href="#userdetails"><?php echo e(trans('lang.detail_gallery')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a id="consultation-tab" data-toggle="tab" href="#consultation"><?php echo e(trans('lang.online_consultation')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a id="feedback-tab" data-toggle="tab" href="#feedback"><?php echo e(trans('lang.feedback')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a id="articles-tab" data-toggle="tab" href="#doc-articles"><?php echo e(trans('lang.articles')); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content dc-haslayout">
                                <div class="dc-contentdoctab dc-location-holder tab-pane fade active show" id="location_tab">
                                    <div class="dc-searchresult-holder">
                                        <div class="dc-searchresult-head">
                                            <div class="dc-title"><h4>“<?php echo e(!empty($gender_title) ? Helper::getDoctorArray(clean($gender_title)) : ''); ?> <?php echo e(Helper::getUserName($user->id)); ?>” <?php echo e(trans('lang.locations')); ?></h4></div>
                                        </div>
                                        <?php echo $__env->make('front-end.doctors.profile-details.locations.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <?php echo $__env->make('front-end.doctors.profile-details.share-profile.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="dc-contentdoctab dc-userdetails-holder tab-pane" id="userdetails">
                                    <div class="dc-aboutdoc dc-aboutinfo">
                                        <div class="dc-infotitle">
                                            <h3>
                                                <?php echo e(trans('lang.about')); ?> 
                                                “<?php echo e(!empty($gender_title) ? Helper::getDoctorArray(clean($gender_title)) : ''); ?> <?php echo e(Helper::getUserName($user->id)); ?>”
                                            </h3>
                                        </div>
                                        <div class="dc-description"><p><?php echo e(html_entity_decode(clean($user->profile->description))); ?></p></div>
                                    </div>
                                <?php if(!empty($gallery_images)): ?>
                                    <div class="dc-aboutgallery-holder dc-aboutinfo">
                                        <div class="dc-infotitle">
                                            <h3><?php echo e(trans('lang.gallery')); ?></h3>
                                        </div>
                                        <div class="dc-aboutgallery">
                                            <div class="dc-aboutgallery-img">
                                                <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <figure>
                                                        <a data-rel="prettyPhoto[video]" href="<?php echo e(asset('/uploads/users/'.$user->id.'/gallery/images/'.$gallery_image)); ?>" rel="prettyPhoto[video]">
                                                            <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$user->id.'/gallery/images/', $gallery_image, 'small-', ''))); ?>" alt="image description"><i class="ti-plus"></i>
                                                        </a>
                                                    </figure>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($gallery_videos)): ?>
                                    <div class="dc-aboutgallery-video dc-aboutinfo">
                                        <div class="dc-infotitle">
                                            <h3><?php echo e(trans('lang.gallery_videos')); ?></h3>
                                        </div>
                                        <div class="dc-aboutgallery">
                                            <div class="dc-aboutgallery-img">
                                                <?php $__currentLoopData = $gallery_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <figure>
                                                        <?php 
                                                            $width 	= 367;
                                                            $height 		= 206;
                                                            $url = parse_url($gallery_video['url']);
                                                            if ( isset( $url['host'] ) && ( $url['host'] == 'vimeo.com' || $url['host'] == 'player.vimeo.com' ) ) {
                                                                $content_exp = explode("/", $media);
                                                                $content_vimo = array_pop($content_exp);
                                                                echo '<iframe width="' . intval($width) . '" height="' . intval($height) . '" src="https://player.vimeo.com/video/' . $content_vimo . '" 
                                                        ></iframe>';
                                                            } elseif ( isset( $url['host'] ) && $url['host'] == 'soundcloud.com') {
                                                                $video = wp_oembed_get($media, array('height' => intval($height)));
                                                                $search = array('webkitallowfullscreen', 'mozallowfullscreen', 'frameborder="no"', 'scrolling="no"');
                                                                $video = str_replace($search, '', $video);
                                                                echo str_replace('&', '&amp;', $video);
                                                            } else {
                                                                echo '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.str_replace("v=", '', $url['query']).'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                            }
                                                        ?>
                                                    </figure>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.offered-services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.experience', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.awards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.memberships', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.registrations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.user-details.downloads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.share-profile.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="dc-contentdoctab dc-consultation-holder tab-pane" id="consultation">
                                    <?php echo $__env->make('front-end.doctors.profile-details.consultation.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('front-end.doctors.profile-details.share-profile.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="dc-contentdoctab dc-feedback-holder tab-pane" id="feedback">
                                    <div class="dc-feedback">
                                        <div class="dc-searchresult-head">
                                            <div class="dc-title"><h4><?php echo e(trans('lang.patient_feedback')); ?></h4></div>
                                        </div>
                                        <div class="dc-consultation-content dc-feedback-content">
                                            <?php if(!empty($user->feedbacks) && $user->feedbacks->count() > 0 ): ?>
                                                <?php $__currentLoopData = $user->feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="dc-consultation-details">
                                                        <?php if($feedback->keep_anonymous == 'off'): ?>
                                                            <?php $patient = App\User::findOrFail($feedback->patient_id); ?>
                                                            <figure class="dc-consultation-img">
                                                                <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.$patient->id.'/', $patient->profile->avatar, 'small-', 'user-logo-def.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                                                            </figure>
                                                            <div class="dc-consultation-title">
                                                                <h5><a href="javascript:void(0);"><em><?php echo e(Helper::getUserName($feedback->patient_id)); ?> <?php echo e(Helper::verifyUser(clean($feedback->patient_id))); ?></em></a></h5>
                                                                <span><?php echo e(\Carbon\Carbon::parse($feedback->created_at)->format('M d, Y')); ?></span>
                                                            </div>
                                                        <?php else: ?>
                                                            <figure class="dc-consultation-img">
                                                                <img src="<?php echo e(asset(Helper::getImage('', '', '', 'user-logo-def.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
                                                            </figure>
                                                            <div class="dc-consultation-title">
                                                                <h5><a href="javascript:void(0);"><em><?php echo e(trans('lang.anonymous')); ?></em></h5>
                                                                <span><?php echo e(\Carbon\Carbon::parse($feedback->created_at)->format('M d, Y')); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="dc-description">
                                                            <p><?php echo e(html_entity_decode(clean($feedback->comment))); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if( method_exists($user->feedbacks,'links') ): ?>
                                                    <?php echo e($user->feedbacks->links('pagination.custom')); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo $__env->make('front-end.doctors.profile-details.share-profile.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <?php echo $__env->make('front-end.doctors.profile-details.articles.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <?php if($display_sidebar == 'true'): ?>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 float-left">
                            <?php echo $__env->make('front-end.sidebar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <b-modal ref="feedback_modal" class="dc-feedbackpopup" id="la-addfeedbackpopup" size="md" hide-footer title="<?php echo e(trans('lang.add_feedback')); ?>" no-close-on-backdrop>
            <div class="dc-appointmentpopup">
                <div class="dc-modalcontent modal-content">
                    <div class="modal-body">
                        <?php echo Form::open(['class' => 'dc-formtheme dc-formfeedback', 'id' => 'submit-feedback', '@submit.prevent' => 'submitFeedback("'.$user->id.'")']); ?>

                            <div class="dc-popupsubtitle dc-subtitlewithbtn">
                                <h3><?php echo e(trans('lang.i_recomend')); ?></h3>
                                <div class="dc-btnarea dc-tabbtns">
                                   <div class="dc-radio">
                                        <?php echo Form::radio('votes', 1, 1, ['id' => 'yes', 'class' => 'dc-btn']); ?>

                                        <?php echo Html::decode(Form::label('yes', '<i class="ti-thumb-up"></i> Yes', [])); ?>

                                    </div>
                                    <div class="dc-radio">
                                        <?php echo Form::radio('votes', 0, 0, ['id' => 'no', 'class' => 'dc-btn']); ?>

                                        <?php echo Html::decode(Form::label('no', '<i class="ti-thumb-down"></i> No', [])); ?>

                                    </div>
                                </div>
                            </div>
                            <fieldset class="dc-improvedinfo">
                                <div class="dc-popupsubtitle"><h3><?php echo e(trans('lang.long_waite')); ?></h3></div>
                                <div id="dc-productrangeslider" class="dc-productrangeslider dc-themerangeslider">
                                <ul class="dc-timerange">
                                    <?php $__currentLoopData = Helper::getWaitingTime(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li id="time"><span><?php echo e(html_entity_decode(clean($value))); ?></span></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                </div>
                                <div class="dc-popupsubtitle"><h3><?php echo e(trans('lang.rate_doc')); ?></h3></div>
                                <?php if(!empty($feedback_questions)): ?>
                                    <?php $__currentLoopData = $feedback_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group dc-rating-holder">
                                            <div class="dc-ratingtitle">
                                                <h3><span><?php echo e(html_entity_decode(clean($option->title))); ?></h3>
                                            </div>
                                            <div class="dc-ratingarea">
                                                <div class="dc-jrate">
                                                    <vue-stars
                                                        :name="'rating[<?php echo e($key); ?>][rate]'"
                                                        :active-color="'#fecb02'"
                                                        :inactive-color="'#999999'"
                                                        :shadow-color="'#ffff00'"
                                                        :hover-color="'#dddd00'"
                                                        :max="5"
                                                        :value="0"
                                                        :readonly="false"
                                                        :char="'★'"
                                                        id="rating-<?php echo e($key); ?>"
                                                    />
                                                    <div class="counter wt-pointscounter"></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="rating[<?php echo e($key); ?>][reason]" value="<?php echo e(clean($option->id)); ?>">
                                            <span class="dc-rating-content"></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <div class="form-group">
                                    <textarea class="form-control" name="comments" placeholder="<?php echo e(trans('lang.share_exp')); ?>"></textarea>
                                </div>
                            </fieldset>
                            <fieldset class="dc-formsubmit">
                                <div class="dc-btnarea">
                                    <span class="dc-checkbox">
                                        <input id="feedbackpublicly" type="checkbox" name="feedbackpublicly">
                                        <label for="feedbackpublicly"><span><?php echo e(trans('lang.keep_anonymous')); ?></span></label>
                                    </span>
                                    <?php echo Form::submit(trans('lang.submit_now'), ['class' => 'dc-btn']); ?>

                                </div>
                            </fieldset>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </b-modal>
        
        <?php if(auth()->guard()->check()): ?>
        <b-modal ref="appointment_modal" size="lg" class="dc-feedbackpopup" id="dc-feedbackpopup" hide-footer title="<?php echo e(trans('lang.book_appointment')); ?>" no-close-on-backdrop>
            <div class="dc-appointmentpopup">
                <div class="dc-modalcontent modal-content">
                    <section id="sec1" class="sec1">
                        <?php echo Form::open(['class' => 'dc-formtheme', 'id' => 'submit_appointment_form', '@submit.prevent'=>'checkAppointmentStep1()']); ?>

                            <div class="dc-visitingdoctor" v-if="step === 1" v-cloak>
                                <ul class="dc-joinsteps">
                                    <li class="dc-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.01')); ?></a></li>
                                    <li><a href="javascrip:void(0);"><?php echo e(trans('lang.02')); ?></a></li>
                                    <li><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                    <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                </ul>
                                <book-appointment 
                                    :hospitals="'<?php echo e(json_encode($doctor_hospitals)); ?>'" 
                                    :user_id="<?php echo e($user->id); ?>"
                                    :currency="'<?php echo e(!empty($symbol['symbol']) ? $symbol['symbol'] : '$'); ?>'"
                                >
                                </book-appointment>
                                <div class="modal-footer dc-modal-footer">
                                    <?php echo Form::submit(trans('lang.continue'), ['class' => 'btn dc-btn btn-primary']); ?>

                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                            <div class="dc-visitingdoctor dc-popup-doc dc-popup-step2" v-if="step === 2" v-cloak>
                                <ul class="dc-joinsteps">
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.02')); ?></a></li>
                                    <li><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                    <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                </ul>
                                <div class="dc-visit">
                                    <span><?php echo e(trans('lang.verify_you')); ?></span>
                                </div>
                                <?php echo Form::open(); ?>

                                    <div class="form-row dc-popup-row">
                                        <div class="form-group col-6">
                                            <input type="password" id="appointment_password" class="form-control" placeholder="<?php echo e(trans('lang.pass')); ?>" v-model="appointment.password">
                                        </div>
                                        <div class="form-group col-6">
                                            <input type="password" id="appointment_retypassword" class="form-control" placeholder="<?php echo e(trans('lang.ph_retry_pass')); ?>" v-model="appointment.retry_password">
                                        </div>
                                    </div>
                                    <div class="modal-footer dc-modal-footer">
                                        <a href="javascript:void(0);" v-on:click="checkAppointmentStep2('<?php echo e(Auth::user()->id); ?>')" class="btn dc-btn btn-primary"><?php echo e(trans('lang.continue')); ?></a>
                                    </div>
                                <?php echo Form::close(); ?>

                            </div>
                            <div class="dc-visitingdoctor dc-popup-doc dc-popup-step3" v-if="step === 3" v-cloak>
                                <ul class="dc-joinsteps">
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                    <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                </ul>
                                <h5><?php echo e(trans('lang.enter_auth_code')); ?></h5>
                                <p><?php echo e(trans('lang.verify_code_sent')); ?><a href="javascript:void(0)"> <?php echo e(Auth::user()->email); ?></a></p>
                                <input type="text" placeholder="Authentication Code Here" v-model="appointment.code">
                                <div class="modal-footer dc-modal-footer">
                                    <a href="javascript:void(0);" v-on:click="checkAppointmentStep3('<?php echo e($user->id); ?>')" class="btn dc-btn btn-primary"><?php echo e(trans('lang.continue')); ?></a>
                                </div>
                            </div>
                            <div class="dc-visitingdoctor dc-popup-doc dc-popup-step4" v-if="step === 4" v-cloak>
                                <ul class="dc-joinsteps">
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="dc-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                </ul>
                                <div class="dc-modal-body4-title">
                                    <h6><?php echo e(trans('lang.congrats')); ?></h6>
                                    <?php if(!empty($appointment_confirm)): ?>
                                        <h4><?php echo e($appointment_confirm); ?></h4>
                                    <?php endif; ?>
                                </div>
                                <div class="dc-modal-body4-description">
                                    <p><?php echo e($appointment_detail_text); ?></p>
                                </div>
                                <div class="modal-footer dc-modal-footer">
                                    <a href="javascript:void(0);" v-on:click="finalStep(<?php echo e($online_appointment); ?>)" class="btn dc-btn btn-primary"><?php echo e($appointment_btn_text); ?></a>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </b-modal>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('front_end_scripts'); ?>
<script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('js/prettyPhoto.js')); ?>"></script>
<script>
    jQuery("a[data-rel]").each(function () {
		jQuery(this).attr("rel", jQuery(this).data("rel"));
	});
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'normal',
		theme: 'dark_square',
		slideshow: 3000,
		default_width: 800,
        default_height: 500,
        allowfullscreen: true,
		autoplay_slideshow: false,	
		social_tools: false,
		iframe_markup: "<iframe src='{path}' width='{width}' height='{height}' frameborder='no' allowfullscreen='true'></iframe>", 
		deeplinking: false
	})
    $(".feedback-btn").on('click', function(event) {
        $(function() {
            jQuery("#dc-productrangeslider").slider({
            range: "max",
            min: 1,
            max: 4,
            value: 1,
            slide: function( event, ui ) {
                $("#time").val( ui.value );
            }
            });
            jQuery("#time").val( jQuery("#dc-productrangeslider").slider("value"));
        } );
    });

    jQuery(document).ready(function (){
            /* THEME ACCORDION */
        function themeAccordion() {
            jQuery('.dc-panelcontent').hide();
            jQuery('.dc-accordion .dc-paneltitle:first').addClass('active').next().slideDown('slow');
            jQuery('.dc-accordion .dc-paneltitle').on('click',function() {
                if(jQuery(this).next().is(':hidden')) {
                    jQuery('.dc-accordion .dc-paneltitle').removeClass('active').next().slideUp('slow');
                    jQuery(this).toggleClass('active').next().slideDown('slow');
                }
            });
        }
        themeAccordion();
        function childAccordion() {
            jQuery('.dc-subpanelcontent').hide();
            jQuery('.dc-childaccordion .dc-subpaneltitle:first').addClass('active').next().slideDown('slow');
            jQuery('.dc-childaccordion .dc-subpaneltitle').on('click',function() {
                if(jQuery(this).next().is(':hidden')) {
                    jQuery('.dc-childaccordion .dc-subpaneltitle').removeClass('active').next().slideUp('slow');
                    jQuery(this).toggleClass('active').next().slideDown('slow');
                }
            });
        }
        childAccordion();
        });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/show.blade.php ENDPATH**/ ?>