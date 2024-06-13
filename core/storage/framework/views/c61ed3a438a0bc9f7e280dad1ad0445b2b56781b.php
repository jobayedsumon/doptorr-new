<?php if(Auth::guard('web')->check()): ?>
    <div class="navbar-right-content show-nav-content">
        <div class="single-right-content">
            <div class="navbar-right-flex">
                <div class="navbar-right-item position-relative">
                    <a href="#0" class="navbar-right-chat search-header-open">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <div class="header-global-search">
                        <div class="header-global-search-header">
                            <h5 class="header-global-search-title"><?php echo e(__('Search')); ?></h5>
                            <div class="header-global-search-close search-close"><i class="fa-solid fa-times"></i>
                            </div>
                        </div>
                        <div class="header-global-search-input d-flex align-items-center">
                            <div class="header-global-search-input-inner">
                                <div class="header-global-search-input-inner-icon" id="header_search_load_spinner">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input type="text" id="search_your_desired_job" class="form-control"
                                       placeholder="<?php echo e(__('Search')); ?>" autocomplete="off">
                            </div>
                            <div class="header-global-search-select">
                                <select id="Select_project_or_job_for_search">
                                    <?php if(get_static_option('project_enable_disable') != 'disable'): ?>
                                    <option value="project"><?php echo e(__('Project')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_static_option('job_enable_disable') != 'disable'): ?>
                                    <option value="job"><?php echo e(__('Job')); ?></option>
                                    <?php endif; ?>
                                    <option value="talent"><?php echo e(__('Talent')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="display_search_result"></div>
                    </div>
                    <div class="search-overlay"></div>
                </div>
                <?php if(Auth::guard('web')->user()->user_type == 1): ?>

                    <?php
                        if(get_static_option('project_enable_disable') != 'disable' && get_static_option('job_enable_disable') != 'disable'){
                            $client_bookmarks = \App\Models\Bookmark::where('user_id',Auth::guard('web')->user()->id)->get();
                        }else if(get_static_option('project_enable_disable') == 'disable' && get_static_option('job_enable_disable') == 'disable'){
                            $client_bookmarks = '';
                        }else if(get_static_option('project_enable_disable') == 'disable'){
                            $client_bookmarks = \App\Models\Bookmark::whereHas('bookmark_job')
                            ->where('is_project_job','job')
                            ->where('user_id',Auth::guard('web')->user()->id)
                            ->get();
                        }else if(get_static_option('job_enable_disable') == 'disable'){
                            $client_bookmarks = \App\Models\Bookmark::whereHas('bookmark_project')
                            ->where('is_project_job','projct')
                            ->where('user_id',Auth::guard('web')->user()->id)
                            ->get();
                        }
                    ?>
                    <div class="navbar-right-item">
                        <?php
                            $unseen_message_count = \App\Models\User::select('id')->withCount(['client_unseen_message' => function($q){
                                  $q->where('is_seen',0)->where('from_user',2);
                                }])->where('id', auth("web")->id())->first();
                        ?>
                        <a href="<?php echo e(route('client.live.chat')); ?>" class="navbar-right-chat position-relative reload_unseen_message_count"> <i class="fa-regular fa-comment-dots"></i>
                            <?php if($unseen_message_count->client_unseen_message_count > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo e($unseen_message_count->client_unseen_message_count ?? ''); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="navbar-right-item bookmark_area position-relative">
                        <a href="#0" class="navbar-right-chat nav-right-bookmark-icon position-relative">
                            <i class="fa-regular fa-bookmark"></i>
                            <?php if(!empty($client_bookmarks) && $client_bookmarks->count() > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                                    <?php echo e($client_bookmarks->count()); ?>

                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="bookmark-wrap">
                            <?php if(!empty($client_bookmarks) && $client_bookmarks->count() > 0): ?>
                                <?php $__currentLoopData = $client_bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookmark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bookmark-item">
                                        <?php if($bookmark->is_project_job == 'project'): ?>
                                            <a href="<?php echo e(route('project.details', ['username' => $bookmark?->bookmark_project?->project_creator?->username, 'slug' => $bookmark?->bookmark_project?->slug])); ?>"
                                               class="bookmark-item-para">
                                                <span class="bookmark-header-icon"><i class="fa-regular fa-bookmark"></i></span>
                                                <?php echo e($bookmark?->bookmark_project?->title ?? ''); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('job.details', ['username' => $bookmark?->bookmark_job?->job_creator?->username, 'slug' => $bookmark?->bookmark_job?->slug])); ?>"
                                               class="bookmark-item-para">
                                                <span class="bookmark-header-icon"><i class="fa-regular fa-bookmark"></i></span>
                                                <?php echo e($bookmark?->bookmark_job?->title ?? ''); ?>

                                            </a>
                                        <?php endif; ?>
                                        <span class="bookmark-item-close remove_from_bookmark"
                                              data-identity = "<?php echo e($bookmark->id); ?>"
                                              data-route = "<?php echo e(route('client.bookmark.remove')); ?>">
                                        <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <span class="navbar-right-notification-wrapper-list-item-content-title">
                                    <span class="bookmark-header">
                                        <span class="bookmark-header-icon"><i class="fa-regular fa-bookmark"></i></span>
                                        <h6 class="bookmark-header-title"><?php echo e(__('No Bookmarks')); ?></h6>
                                    </span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php
                        if(get_static_option('project_enable_disable') != 'disable' && get_static_option('job_enable_disable') != 'disable'){
                            $freelancer_bookmarks = \App\Models\Bookmark::where('user_id',Auth::guard('web')->user()->id)->get();
                        }else if(get_static_option('project_enable_disable') == 'disable' && get_static_option('job_enable_disable') == 'disable'){
                            $freelancer_bookmarks = '';
                        }else if(get_static_option('project_enable_disable') == 'disable'){
                            $freelancer_bookmarks = \App\Models\Bookmark::whereHas('bookmark_job')
                            ->where('is_project_job','job')
                            ->where('user_id',Auth::guard('web')->user()->id)->get();
                        }else if(get_static_option('job_enable_disable') == 'disable'){
                            $freelancer_bookmarks = \App\Models\Bookmark::whereHas('bookmark_project')
                            ->where('is_project_job','project')
                            ->where('user_id',Auth::guard('web')->user()->id)->get();
                        }
                     ?>
                    <div class="navbar-right-item">
                        <?php
                            $unseen_message_count = \App\Models\User::select('id')->withCount(['freelancer_unseen_message' => function($q){
                                  $q->where('is_seen',0)->where('from_user',1);
                                }])->where('id', auth("web")->id())->first();
                        ?>
                        <a href="<?php echo e(route('freelancer.live.chat')); ?>" class="navbar-right-chat position-relative reload_unseen_message_count"> <i class="fa-regular fa-comment-dots"></i>
                            <?php if($unseen_message_count->freelancer_unseen_message_count > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo e($unseen_message_count->freelancer_unseen_message_count ?? ''); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="navbar-right-item bookmark_area position-relative">
                        <a href="#0" class="navbar-right-chat nav-right-bookmark-icon position-relative">
                            <i class="fa-regular fa-bookmark"></i>
                            <?php if(!empty($freelancer_bookmarks) && $freelancer_bookmarks->count() > 0): ?>
                                <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                                    <?php echo e($freelancer_bookmarks->count()); ?>

                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="bookmark-wrap">
                            <?php if(!empty($freelancer_bookmarks) && $freelancer_bookmarks->count() > 0): ?>
                                <?php $__currentLoopData = $freelancer_bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookmark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bookmark-item">
                                        <?php if($bookmark->is_project_job == 'project'): ?>
                                            <a href="<?php echo e(route('project.details', ['username' => $bookmark?->bookmark_project?->project_creator?->username, 'slug' => $bookmark?->bookmark_project?->slug])); ?>"
                                               class="bookmark-item-para"> <span class="bookmark-header-icon"><i class="fa-regular fa-bookmark"></i></span>
                                                <?php echo e($bookmark?->bookmark_project?->title ?? ''); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('job.details', ['username' => $bookmark?->bookmark_job?->job_creator?->username, 'slug' => $bookmark?->bookmark_job?->slug])); ?>"
                                               class="bookmark-item-para"><span class="bookmark-header-icon"><i class="fa-regular fa-bookmark"></i></span>
                                                <?php echo e($bookmark?->bookmark_job?->title ?? ''); ?>

                                            </a>
                                        <?php endif; ?>
                                        <span class="bookmark-item-close remove_from_bookmark"
                                              data-identity = "<?php echo e($bookmark->id); ?>"
                                              data-route = "<?php echo e(route('freelancer.bookmark.remove')); ?>">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <span class="navbar-right-notification-wrapper-list-item-content-title">
                                    <span class="bookmark-header">
                                        <span class="bookmark-header-icon"><i class="fa-regular fa-bookmark"></i></span>
                                        <h6 class="bookmark-header-title"><?php echo e(__('No Bookmarks')); ?></h6>
                                    </span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(Auth::guard('web')->user()->user_type == 1): ?>
                    <?php
                        $client_notifications = \App\Models\ClientNotification::where('is_read', 'unread')
                            ->where('client_id', Auth::guard('web')->user()->id)
                            ->latest()
                            ->get();
                    ?>
                    <div class="navbar-right-item">
                        <div class="navbar-right-notification">
                            <a href="javascript:void(0)" class="navbar-right-notification-icon">
                                <i class="fa-regular fa-bell"></i>
                                <?php if($client_notifications->count() > 0): ?>
                                    <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo e($client_notifications->count() ?? 0); ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="navbar-right-notification-wrapper">
                                <div class="navbar-right-notification-wrapper-list">
                                    <?php if($client_notifications->count() > 0): ?>
                                        <?php $__currentLoopData = $client_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span href="javascript:void(0)"
                                                  class="navbar-right-notification-wrapper-list-item click-notification">
                                                <div class="navbar-right-notification-wrapper-list-item-left">
                                                    <div
                                                            class="navbar-right-notification-wrapper-list-item-icon decline">
                                                        <i class="fa-regular fa-bell"></i>
                                                    </div>
                                                </div>
                                                <div class="navbar-right-notification-wrapper-list-item-content">
                                                    <?php if($notification->type == 'Offer'): ?>
                                                        <a
                                                                href="<?php echo e(route('client.offer.details', $notification->identity)); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>
                                                    <?php if($notification->type == 'Proposal'): ?>
                                                        <a
                                                                href="<?php echo e(route('client.job.proposal.details', $notification->identity)); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>
                                                    <?php if($notification->type == 'Order'): ?>
                                                        <a
                                                                href="<?php echo e(route('client.order.details', $notification->identity)); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>
                                                    <?php if($notification->type == 'Job'): ?>
                                                        <a
                                                                href="<?php echo e(route('client.job.details', $notification->identity)); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>
                                                    <?php if($notification->type == 'Ticket Update'): ?>
                                                        <a href="<?php echo e(route('client.ticket.details',$notification->identity)); ?>">
                                                        <span class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                    </a>
                                                        <span class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="navbar-right-notification-wrapper-list-item click-notification">
                                            <div class="navbar-right-notification-wrapper-list-item-left">
                                                <div class="navbar-right-notification-wrapper-list-item-icon decline">
                                                    <i class="fa-regular fa-bell"></i>
                                                </div>
                                            </div>
                                            <div class="navbar-right-notification-wrapper-list-item-content">
                                                <span
                                                        class="navbar-right-notification-wrapper-list-item-content-title">
                                                    <strong><?php echo e(__('No Notification')); ?></strong> </span>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php
                        $freelancer_notifications = \App\Models\FreelancerNotification::where('is_read', 'unread')
                            ->where('freelancer_id', Auth::guard('web')->user()->id)
                            ->get();
                    ?>
                    <div class="navbar-right-item">
                        <div class="navbar-right-notification">
                            <a href="javascript:void(0)" class="navbar-right-notification-icon">
                                <i class="fa-regular fa-bell"></i>
                                <?php if($freelancer_notifications->count() > 0): ?>
                                    <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo e($freelancer_notifications->count() ?? 0); ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="navbar-right-notification-wrapper">
                                <div class="navbar-right-notification-wrapper-list">
                                    <?php if($freelancer_notifications->count() > 0): ?>
                                        <?php $__currentLoopData = $freelancer_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span href="javascript:void(0)"
                                                  class="navbar-right-notification-wrapper-list-item click-notification">
                                                <div
                                                        class="navbar-right-notification-wrapper-list-item-left show_and_read_freelancer_notification">
                                                    <div
                                                            class="navbar-right-notification-wrapper-list-item-icon decline">
                                                        <i class="fa-regular fa-bell"></i>
                                                    </div>
                                                </div>
                                                <div class="navbar-right-notification-wrapper-list-item-content">

                                                    <?php if($notification->type == 'Offer'): ?>
                                                        <a
                                                                href="<?php echo e(route('freelancer.offer.details', $notification->identity)); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>

                                                    <?php if($notification->type == 'Order'): ?>
                                                        <a
                                                                href="<?php echo e(route('freelancer.order.details', $notification->identity)); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>

                                                    <?php if($notification->type == 'Withdraw'): ?>
                                                        <a href="<?php echo e(route('freelancer.wallet.history')); ?>">
                                                            <span
                                                                    class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>

                                                    <?php if($notification->type == 'Reject Project'): ?>
                                                        <a href="<?php echo e(route('freelancer.profile.details',Auth::guard('web')->user()->username)); ?>">
                                                        <span
                                                             class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                    </a>
                                                        <span
                                                                class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                    <?php endif; ?>

                                                        <?php if($notification->type == 'Ticket Update'): ?>
                                                        <a href="<?php echo e(route('freelancer.ticket.details',$notification->identity)); ?>">
                                                            <span class="navbar-right-notification-wrapper-list-item-content-title"><?php echo e($notification->message); ?></span>
                                                        </a>
                                                            <span class="navbar-right-notification-wrapper-list-item-content-time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
                                                        <?php endif; ?>
                                                </div>
                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="navbar-right-notification-wrapper-list-item click-notification">
                                            <div class="navbar-right-notification-wrapper-list-item-left">
                                                <div class="navbar-right-notification-wrapper-list-item-icon decline">
                                                    <i class="fa-regular fa-bell"></i>
                                                </div>
                                            </div>
                                            <div class="navbar-right-notification-wrapper-list-item-content">
                                                <span
                                                        class="navbar-right-notification-wrapper-list-item-content-title">
                                                    <strong><?php echo e(__('No Notification')); ?></strong> </span>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="navbar-right-item">
                    <div class="navbar-author">
                        <a href="javascript:void(0)" class="navbar-author-flex flex-btn navbar-author-link">
                            <div class="navbar-author-thumb">
                                <?php if(Auth::user()->image): ?>
                                    <img src="<?php echo e(asset('assets/uploads/profile/' . Auth::user()->image)); ?>"
                                         alt="profile.img">
                                <?php else: ?>
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>"
                                             alt="<?php echo e(__('AuthorImg')); ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <span class="navbar-author-name"><?php echo e(Auth::guard('web')->user()->last_name); ?></span>
                        </a>
                        <div class="navbar-author-wrapper">
                            <div class="navbar-author-wrapper-list">
                                <?php if(Auth::guard('web')->user()->user_type == 1): ?>
                                    <a href="<?php echo e(route('client.dashboard')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10.75H5C2.58 10.75 1.25 9.42 1.25 7V5C1.25 2.58 2.58 1.25 5 1.25H7C9.42 1.25 10.75 2.58 10.75 5V7C10.75 9.42 9.42 10.75 7 10.75ZM5 2.75C3.42 2.75 2.75 3.42 2.75 5V7C2.75 8.58 3.42 9.25 5 9.25H7C8.58 9.25 9.25 8.58 9.25 7V5C9.25 3.42 8.58 2.75 7 2.75H5Z" fill="#667085"/>
                                            <path d="M19 10.75H17C14.58 10.75 13.25 9.42 13.25 7V5C13.25 2.58 14.58 1.25 17 1.25H19C21.42 1.25 22.75 2.58 22.75 5V7C22.75 9.42 21.42 10.75 19 10.75ZM17 2.75C15.42 2.75 14.75 3.42 14.75 5V7C14.75 8.58 15.42 9.25 17 9.25H19C20.58 9.25 21.25 8.58 21.25 7V5C21.25 3.42 20.58 2.75 19 2.75H17Z" fill="#667085"/>
                                            <path d="M19 22.75H17C14.58 22.75 13.25 21.42 13.25 19V17C13.25 14.58 14.58 13.25 17 13.25H19C21.42 13.25 22.75 14.58 22.75 17V19C22.75 21.42 21.42 22.75 19 22.75ZM17 14.75C15.42 14.75 14.75 15.42 14.75 17V19C14.75 20.58 15.42 21.25 17 21.25H19C20.58 21.25 21.25 20.58 21.25 19V17C21.25 15.42 20.58 14.75 19 14.75H17Z" fill="#667085"/>
                                            <path d="M7 22.75H5C2.58 22.75 1.25 21.42 1.25 19V17C1.25 14.58 2.58 13.25 5 13.25H7C9.42 13.25 10.75 14.58 10.75 17V19C10.75 21.42 9.42 22.75 7 22.75ZM5 14.75C3.42 14.75 2.75 15.42 2.75 17V19C2.75 20.58 3.42 21.25 5 21.25H7C8.58 21.25 9.25 20.58 9.25 19V17C9.25 15.42 8.58 14.75 7 14.75H5Z" fill="#667085"/>
                                        </svg>
                                        <?php echo e(__('Dashboard')); ?>

                                    </a>
                                    <a href="<?php echo e(route('client.order.all')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M15 12.9502H8C7.59 12.9502 7.25 12.6102 7.25 12.2002C7.25 11.7902 7.59 11.4502 8 11.4502H15C15.41 11.4502 15.75 11.7902 15.75 12.2002C15.75 12.6102 15.41 12.9502 15 12.9502Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M12.38 16.9502H8C7.59 16.9502 7.25 16.6102 7.25 16.2002C7.25 15.7902 7.59 15.4502 8 15.4502H12.38C12.79 15.4502 13.13 15.7902 13.13 16.2002C13.13 16.6102 12.79 16.9502 12.38 16.9502Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M14 6.75H10C9.04 6.75 7.25 6.75 7.25 4C7.25 1.25 9.04 1.25 10 1.25H14C14.96 1.25 16.75 1.25 16.75 4C16.75 4.96 16.75 6.75 14 6.75ZM10 2.75C9.01 2.75 8.75 2.75 8.75 4C8.75 5.25 9.01 5.25 10 5.25H14C15.25 5.25 15.25 4.99 15.25 4C15.25 2.75 14.99 2.75 14 2.75H10Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15 22.7504H9C3.38 22.7504 2.25 20.1704 2.25 16.0004V10.0004C2.25 5.44042 3.9 3.49042 7.96 3.28042C8.36 3.26042 8.73 3.57042 8.75 3.99042C8.77 4.41042 8.45 4.75042 8.04 4.77042C5.2 4.93042 3.75 5.78042 3.75 10.0004V16.0004C3.75 19.7004 4.48 21.2504 9 21.2504H15C19.52 21.2504 20.25 19.7004 20.25 16.0004V10.0004C20.25 5.78042 18.8 4.93042 15.96 4.77042C15.55 4.75042 15.23 4.39042 15.25 3.98042C15.27 3.57042 15.63 3.25042 16.04 3.27042C20.1 3.49042 21.75 5.44042 21.75 9.99042V15.9904C21.75 20.1704 20.62 22.7504 15 22.7504Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('My Orders')); ?>

                                    </a>
                                    <a href="<?php echo e(route('client.job.all')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M16 22.7498H7.99998C3.37998 22.7498 2.51998 20.5998 2.29998 18.5098L1.54998 10.4998C1.43998 9.44977 1.40998 7.89977 2.44998 6.73977C3.34998 5.73977 4.83998 5.25977 6.99998 5.25977H17C19.17 5.25977 20.66 5.74977 21.55 6.73977C22.59 7.89977 22.56 9.44977 22.45 10.5098L21.7 18.4998C21.48 20.5998 20.62 22.7498 16 22.7498ZM6.99998 6.74977C5.30998 6.74977 4.14998 7.07977 3.55998 7.73977C3.06998 8.27977 2.90998 9.10977 3.03998 10.3498L3.78998 18.3598C3.95998 19.9398 4.38998 21.2498 7.99998 21.2498H16C19.6 21.2498 20.04 19.9398 20.21 18.3498L20.96 10.3598C21.09 9.10977 20.93 8.27977 20.44 7.73977C19.85 7.07977 18.69 6.74977 17 6.74977H6.99998Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M16 6.75C15.59 6.75 15.25 6.41 15.25 6V5.2C15.25 3.42 15.25 2.75 12.8 2.75H11.2C8.75 2.75 8.75 3.42 8.75 5.2V6C8.75 6.41 8.41 6.75 8 6.75C7.59 6.75 7.25 6.41 7.25 6V5.2C7.25 3.44 7.25 1.25 11.2 1.25H12.8C16.75 1.25 16.75 3.44 16.75 5.2V6C16.75 6.41 16.41 6.75 16 6.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M12 16.75C9.25 16.75 9.25 15.05 9.25 14.03V13C9.25 11.59 9.59 11.25 11 11.25H13C14.41 11.25 14.75 11.59 14.75 13V14C14.75 15.04 14.75 16.75 12 16.75ZM10.75 12.75C10.75 12.83 10.75 12.92 10.75 13V14.03C10.75 15.06 10.75 15.25 12 15.25C13.25 15.25 13.25 15.09 13.25 14.02V13C13.25 12.92 13.25 12.83 13.25 12.75C13.17 12.75 13.08 12.75 13 12.75H11C10.92 12.75 10.83 12.75 10.75 12.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M14 14.7702C13.63 14.7702 13.3 14.4902 13.26 14.1102C13.21 13.7002 13.5 13.3202 13.91 13.2702C16.55 12.9402 19.08 11.9402 21.21 10.3902C21.54 10.1402 22.01 10.2202 22.26 10.5602C22.5 10.8902 22.43 11.3602 22.09 11.6102C19.75 13.3102 16.99 14.4002 14.09 14.7702C14.06 14.7702 14.03 14.7702 14 14.7702Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M9.99999 14.7799C9.96999 14.7799 9.93999 14.7799 9.90999 14.7799C7.16999 14.4699 4.49999 13.4699 2.18999 11.8899C1.84999 11.6599 1.75999 11.1899 1.98999 10.8499C2.21999 10.5099 2.68999 10.4199 3.02999 10.6499C5.13999 12.0899 7.56999 12.9999 10.07 13.2899C10.48 13.3399 10.78 13.7099 10.73 14.1199C10.7 14.4999 10.38 14.7799 9.99999 14.7799Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('My Jobs')); ?>

                                    </a>
                                    <a href="<?php echo e(route('client.offers')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12 22.7503C11.37 22.7503 10.78 22.5104 10.34 22.0604L8.82001 20.5404C8.70001 20.4204 8.38 20.2904 8.22 20.2904H6.06C4.76 20.2904 3.70999 19.2403 3.70999 17.9403V15.7804C3.70999 15.6204 3.57999 15.3004 3.45999 15.1804L1.94 13.6604C1.5 13.2204 1.25 12.6303 1.25 12.0003C1.25 11.3703 1.49 10.7803 1.94 10.3403L3.45999 8.82028C3.57999 8.70028 3.70999 8.3803 3.70999 8.2203V6.06039C3.70999 4.76039 4.76 3.71029 6.06 3.71029H8.22C8.38 3.71029 8.70001 3.58029 8.82001 3.46029L10.34 1.94027C11.22 1.06027 12.78 1.06027 13.66 1.94027L15.18 3.46029C15.3 3.58029 15.62 3.71029 15.78 3.71029H17.94C19.24 3.71029 20.29 4.76039 20.29 6.06039V8.2203C20.29 8.3803 20.42 8.70028 20.54 8.82028L22.06 10.3403C22.5 10.7803 22.75 11.3703 22.75 12.0003C22.75 12.6303 22.51 13.2204 22.06 13.6604L20.54 15.1804C20.42 15.3004 20.29 15.6204 20.29 15.7804V17.9403C20.29 19.2403 19.24 20.2904 17.94 20.2904H15.78C15.62 20.2904 15.3 20.4204 15.18 20.5404L13.66 22.0604C13.22 22.5104 12.63 22.7503 12 22.7503ZM4.51999 14.1203C4.91999 14.5203 5.20999 15.2204 5.20999 15.7804V17.9403C5.20999 18.4103 5.59 18.7904 6.06 18.7904H8.22C8.78 18.7904 9.48001 19.0803 9.88 19.4803L11.4 21.0003C11.72 21.3203 12.28 21.3203 12.6 21.0003L14.12 19.4803C14.52 19.0803 15.22 18.7904 15.78 18.7904H17.94C18.41 18.7904 18.79 18.4103 18.79 17.9403V15.7804C18.79 15.2204 19.08 14.5203 19.48 14.1203L21 12.6003C21.16 12.4403 21.25 12.2303 21.25 12.0003C21.25 11.7703 21.16 11.5604 21 11.4004L19.48 9.88034C19.08 9.48034 18.79 8.7803 18.79 8.2203V6.06039C18.79 5.59039 18.41 5.21029 17.94 5.21029H15.78C15.22 5.21029 14.52 4.92035 14.12 4.52035L12.6 3.00033C12.28 2.68033 11.72 2.68033 11.4 3.00033L9.88 4.52035C9.48001 4.92035 8.78 5.21029 8.22 5.21029H6.06C5.59 5.21029 5.20999 5.59039 5.20999 6.06039V8.2203C5.20999 8.7803 4.91999 9.48034 4.51999 9.88034L3 11.4004C2.84 11.5604 2.75 11.7703 2.75 12.0003C2.75 12.2303 2.84 12.4403 3 12.6003L4.51999 14.1203Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.0002 16C14.4402 16 13.9902 15.55 13.9902 15C13.9902 14.45 14.4402 14 14.9902 14C15.5402 14 15.9902 14.45 15.9902 15C15.9902 15.55 15.5502 16 15.0002 16Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M9.01001 10C8.45001 10 8 9.55 8 9C8 8.45 8.45 8 9 8C9.55 8 10 8.45 10 9C10 9.55 9.56001 10 9.01001 10Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M8.99994 15.7495C8.80994 15.7495 8.61994 15.6795 8.46994 15.5295C8.17994 15.2395 8.17994 14.7595 8.46994 14.4695L14.4699 8.46945C14.7599 8.17945 15.2399 8.17945 15.5299 8.46945C15.8199 8.75945 15.8199 9.23951 15.5299 9.52951L9.52994 15.5295C9.37994 15.6795 9.18994 15.7495 8.99994 15.7495Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('My Offers')); ?>

                                    </a>
                                    <?php if(moduleExists('SecurityManage')): ?>
                                        <?php if(Auth::guard('web')->user()->freeze_job != 'freeze'): ?>
                                            <a href="<?php echo e(route('client.job.create')); ?>"
                                               class="navbar-author-wrapper-list-item">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M15.8101 20.1795C15.5501 20.1795 15.2801 20.1695 14.9901 20.1395C14.4701 20.0995 13.8801 19.9995 13.2701 19.8495L11.5901 19.4495C6.98007 18.3595 5.47007 15.9195 6.55007 11.3195L7.53007 7.12953C7.75007 6.17953 8.01007 5.40953 8.33007 4.76953C10.0501 1.21953 13.3401 1.53953 15.6801 2.08953L17.3501 2.47953C19.6901 3.02953 21.1701 3.89953 22.0001 5.22953C22.8201 6.55953 22.9501 8.26953 22.4001 10.6095L21.4201 14.7895C20.5601 18.4495 18.7701 20.1795 15.8101 20.1795ZM13.1201 3.24953C11.4501 3.24953 10.3901 3.93953 9.68007 5.41953C9.42007 5.95953 9.19007 6.62953 8.99007 7.46953L8.01007 11.6595C7.12007 15.4395 8.15007 17.0895 11.9301 17.9895L13.6101 18.3895C14.1501 18.5195 14.6601 18.5995 15.1201 18.6395C17.8401 18.9095 19.1901 17.7195 19.9501 14.4495L20.9301 10.2695C21.3801 8.33953 21.3201 6.98953 20.7201 6.01953C20.1201 5.04953 18.9401 4.38953 17.0001 3.93953L15.3301 3.54953C14.5001 3.34953 13.7601 3.24953 13.1201 3.24953Z"
                                                            fill="#667085" />
                                                    <path
                                                            d="M8.33005 22.2497C5.76005 22.2497 4.12005 20.7097 3.07005 17.4597L1.79005 13.5097C0.370052 9.10968 1.64005 6.62968 6.02005 5.20968L7.60005 4.69968C8.12005 4.53968 8.51005 4.42968 8.86005 4.36968C9.15005 4.30968 9.43005 4.41968 9.60005 4.64968C9.77005 4.87968 9.80005 5.17968 9.68005 5.43968C9.42005 5.96968 9.19005 6.63968 9.00005 7.47968L8.02005 11.6697C7.13005 15.4497 8.16005 17.0997 11.9401 17.9997L13.6201 18.3997C14.1601 18.5297 14.6701 18.6097 15.1301 18.6497C15.4501 18.6797 15.7101 18.8997 15.8001 19.2097C15.8801 19.5197 15.7601 19.8397 15.5001 20.0197C14.8401 20.4697 14.0101 20.8497 12.9601 21.1897L11.3801 21.7097C10.2301 22.0697 9.23005 22.2497 8.33005 22.2497ZM7.78005 6.21968L6.49005 6.63968C2.92005 7.78968 2.07005 9.46968 3.22005 13.0497L4.50005 16.9997C5.66005 20.5697 7.34005 21.4297 10.9101 20.2797L12.4901 19.7597C12.5501 19.7397 12.6001 19.7197 12.6601 19.6997L11.6001 19.4497C6.99005 18.3597 5.48005 15.9197 6.56005 11.3197L7.54005 7.12968C7.61005 6.80968 7.69005 6.49968 7.78005 6.21968Z"
                                                            fill="#667085" />
                                                    <path
                                                            d="M17.4901 10.5098C17.4301 10.5098 17.3701 10.4998 17.3001 10.4898L12.4501 9.25978C12.0501 9.15978 11.8101 8.74978 11.9101 8.34978C12.0101 7.94978 12.4201 7.70978 12.8201 7.80978L17.6701 9.03978C18.0701 9.13978 18.3101 9.54978 18.2101 9.94978C18.1301 10.2798 17.8201 10.5098 17.4901 10.5098Z"
                                                            fill="#667085" />
                                                    <path
                                                            d="M14.5599 13.8899C14.4999 13.8899 14.4399 13.8799 14.3699 13.8699L11.4599 13.1299C11.0599 13.0299 10.8199 12.6199 10.9199 12.2199C11.0199 11.8199 11.4299 11.5799 11.8299 11.6799L14.7399 12.4199C15.1399 12.5199 15.3799 12.9299 15.2799 13.3299C15.1999 13.6699 14.8999 13.8899 14.5599 13.8899Z"
                                                            fill="#667085" />
                                                </svg>
                                                <?php echo e(__('Post a Job')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('client.job.create')); ?>"
                                           class="navbar-author-wrapper-list-item">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M15.8101 20.1795C15.5501 20.1795 15.2801 20.1695 14.9901 20.1395C14.4701 20.0995 13.8801 19.9995 13.2701 19.8495L11.5901 19.4495C6.98007 18.3595 5.47007 15.9195 6.55007 11.3195L7.53007 7.12953C7.75007 6.17953 8.01007 5.40953 8.33007 4.76953C10.0501 1.21953 13.3401 1.53953 15.6801 2.08953L17.3501 2.47953C19.6901 3.02953 21.1701 3.89953 22.0001 5.22953C22.8201 6.55953 22.9501 8.26953 22.4001 10.6095L21.4201 14.7895C20.5601 18.4495 18.7701 20.1795 15.8101 20.1795ZM13.1201 3.24953C11.4501 3.24953 10.3901 3.93953 9.68007 5.41953C9.42007 5.95953 9.19007 6.62953 8.99007 7.46953L8.01007 11.6595C7.12007 15.4395 8.15007 17.0895 11.9301 17.9895L13.6101 18.3895C14.1501 18.5195 14.6601 18.5995 15.1201 18.6395C17.8401 18.9095 19.1901 17.7195 19.9501 14.4495L20.9301 10.2695C21.3801 8.33953 21.3201 6.98953 20.7201 6.01953C20.1201 5.04953 18.9401 4.38953 17.0001 3.93953L15.3301 3.54953C14.5001 3.34953 13.7601 3.24953 13.1201 3.24953Z"
                                                        fill="#667085" />
                                                <path
                                                        d="M8.33005 22.2497C5.76005 22.2497 4.12005 20.7097 3.07005 17.4597L1.79005 13.5097C0.370052 9.10968 1.64005 6.62968 6.02005 5.20968L7.60005 4.69968C8.12005 4.53968 8.51005 4.42968 8.86005 4.36968C9.15005 4.30968 9.43005 4.41968 9.60005 4.64968C9.77005 4.87968 9.80005 5.17968 9.68005 5.43968C9.42005 5.96968 9.19005 6.63968 9.00005 7.47968L8.02005 11.6697C7.13005 15.4497 8.16005 17.0997 11.9401 17.9997L13.6201 18.3997C14.1601 18.5297 14.6701 18.6097 15.1301 18.6497C15.4501 18.6797 15.7101 18.8997 15.8001 19.2097C15.8801 19.5197 15.7601 19.8397 15.5001 20.0197C14.8401 20.4697 14.0101 20.8497 12.9601 21.1897L11.3801 21.7097C10.2301 22.0697 9.23005 22.2497 8.33005 22.2497ZM7.78005 6.21968L6.49005 6.63968C2.92005 7.78968 2.07005 9.46968 3.22005 13.0497L4.50005 16.9997C5.66005 20.5697 7.34005 21.4297 10.9101 20.2797L12.4901 19.7597C12.5501 19.7397 12.6001 19.7197 12.6601 19.6997L11.6001 19.4497C6.99005 18.3597 5.48005 15.9197 6.56005 11.3197L7.54005 7.12968C7.61005 6.80968 7.69005 6.49968 7.78005 6.21968Z"
                                                        fill="#667085" />
                                                <path
                                                        d="M17.4901 10.5098C17.4301 10.5098 17.3701 10.4998 17.3001 10.4898L12.4501 9.25978C12.0501 9.15978 11.8101 8.74978 11.9101 8.34978C12.0101 7.94978 12.4201 7.70978 12.8201 7.80978L17.6701 9.03978C18.0701 9.13978 18.3101 9.54978 18.2101 9.94978C18.1301 10.2798 17.8201 10.5098 17.4901 10.5098Z"
                                                        fill="#667085" />
                                                <path
                                                        d="M14.5599 13.8899C14.4999 13.8899 14.4399 13.8799 14.3699 13.8699L11.4599 13.1299C11.0599 13.0299 10.8199 12.6199 10.9199 12.2199C11.0199 11.8199 11.4299 11.5799 11.8299 11.6799L14.7399 12.4199C15.1399 12.5199 15.3799 12.9299 15.2799 13.3299C15.1999 13.6699 14.8999 13.8899 14.5599 13.8899Z"
                                                        fill="#667085" />
                                            </svg>
                                            <?php echo e(__('Post a Job')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('client.profile')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12 15.75C9.93 15.75 8.25 14.07 8.25 12C8.25 9.93 9.93 8.25 12 8.25C14.07 8.25 15.75 9.93 15.75 12C15.75 14.07 14.07 15.75 12 15.75ZM12 9.75C10.76 9.75 9.75 10.76 9.75 12C9.75 13.24 10.76 14.25 12 14.25C13.24 14.25 14.25 13.24 14.25 12C14.25 10.76 13.24 9.75 12 9.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.21 22.1903C15 22.1903 14.79 22.1603 14.58 22.1103C13.96 21.9403 13.44 21.5503 13.11 21.0003L12.99 20.8003C12.4 19.7803 11.59 19.7803 11 20.8003L10.89 20.9903C10.56 21.5503 10.04 21.9503 9.42 22.1103C8.79 22.2803 8.14 22.1903 7.59 21.8603L5.87 20.8703C5.26 20.5203 4.82 19.9503 4.63 19.2603C4.45 18.5703 4.54 17.8603 4.89 17.2503C5.18 16.7403 5.26 16.2803 5.09 15.9903C4.92 15.7003 4.49 15.5303 3.9 15.5303C2.44 15.5303 1.25 14.3403 1.25 12.8803V11.1203C1.25 9.66029 2.44 8.47029 3.9 8.47029C4.49 8.47029 4.92 8.30029 5.09 8.01029C5.26 7.72029 5.19 7.26029 4.89 6.75029C4.54 6.14029 4.45 5.42029 4.63 4.74029C4.81 4.05029 5.25 3.48029 5.87 3.13029L7.6 2.14029C8.73 1.47029 10.22 1.86029 10.9 3.01029L11.02 3.21029C11.61 4.23029 12.42 4.23029 13.01 3.21029L13.12 3.02029C13.8 1.86029 15.29 1.47029 16.43 2.15029L18.15 3.14029C18.76 3.49029 19.2 4.06029 19.39 4.75029C19.57 5.44029 19.48 6.15029 19.13 6.76029C18.84 7.27029 18.76 7.73029 18.93 8.02029C19.1 8.31029 19.53 8.48029 20.12 8.48029C21.58 8.48029 22.77 9.67029 22.77 11.1303V12.8903C22.77 14.3503 21.58 15.5403 20.12 15.5403C19.53 15.5403 19.1 15.7103 18.93 16.0003C18.76 16.2903 18.83 16.7503 19.13 17.2603C19.48 17.8703 19.58 18.5903 19.39 19.2703C19.21 19.9603 18.77 20.5303 18.15 20.8803L16.42 21.8703C16.04 22.0803 15.63 22.1903 15.21 22.1903ZM12 18.4903C12.89 18.4903 13.72 19.0503 14.29 20.0403L14.4 20.2303C14.52 20.4403 14.72 20.5903 14.96 20.6503C15.2 20.7103 15.44 20.6803 15.64 20.5603L17.37 19.5603C17.63 19.4103 17.83 19.1603 17.91 18.8603C17.99 18.5603 17.95 18.2503 17.8 17.9903C17.23 17.0103 17.16 16.0003 17.6 15.2303C18.04 14.4603 18.95 14.0203 20.09 14.0203C20.73 14.0203 21.24 13.5103 21.24 12.8703V11.1103C21.24 10.4803 20.73 9.96029 20.09 9.96029C18.95 9.96029 18.04 9.52029 17.6 8.75029C17.16 7.98029 17.23 6.97029 17.8 5.99029C17.95 5.73029 17.99 5.42029 17.91 5.12029C17.83 4.82029 17.64 4.58029 17.38 4.42029L15.65 3.43029C15.22 3.17029 14.65 3.32029 14.39 3.76029L14.28 3.95029C13.71 4.94029 12.88 5.50029 11.99 5.50029C11.1 5.50029 10.27 4.94029 9.7 3.95029L9.59 3.75029C9.34 3.33029 8.78 3.18029 8.35 3.43029L6.62 4.43029C6.36 4.58029 6.16 4.83029 6.08 5.13029C6 5.43029 6.04 5.74029 6.19 6.00029C6.76 6.98029 6.83 7.99029 6.39 8.76029C5.95 9.53029 5.04 9.97029 3.9 9.97029C3.26 9.97029 2.75 10.4803 2.75 11.1203V12.8803C2.75 13.5103 3.26 14.0303 3.9 14.0303C5.04 14.0303 5.95 14.4703 6.39 15.2403C6.83 16.0103 6.76 17.0203 6.19 18.0003C6.04 18.2603 6 18.5703 6.08 18.8703C6.16 19.1703 6.35 19.4103 6.61 19.5703L8.34 20.5603C8.55 20.6903 8.8 20.7203 9.03 20.6603C9.27 20.6003 9.47 20.4403 9.6 20.2303L9.71 20.0403C10.28 19.0603 11.11 18.4903 12 18.4903Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('Profile settings')); ?>

                                    </a>
                                    <a href="<?php echo e(route('client.logout')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M15.24 22.2705H15.11C10.67 22.2705 8.53002 20.5205 8.16002 16.6005C8.12002 16.1905 8.42002 15.8205 8.84002 15.7805C9.24002 15.7405 9.62002 16.0505 9.66002 16.4605C9.95002 19.6005 11.43 20.7705 15.12 20.7705H15.25C19.32 20.7705 20.76 19.3305 20.76 15.2605V8.74047C20.76 4.67047 19.32 3.23047 15.25 3.23047H15.12C11.41 3.23047 9.93002 4.42047 9.66002 7.62047C9.61002 8.03047 9.26002 8.34047 8.84002 8.30047C8.42002 8.27047 8.12001 7.90047 8.15001 7.49047C8.49001 3.51047 10.64 1.73047 15.11 1.73047H15.24C20.15 1.73047 22.25 3.83047 22.25 8.74047V15.2605C22.25 20.1705 20.15 22.2705 15.24 22.2705Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M5.84994 16.0998C5.65994 16.0998 5.46994 16.0298 5.31994 15.8798L1.96994 12.5298C1.67994 12.2398 1.67994 11.7598 1.96994 11.4698L5.31994 8.11984C5.60994 7.82984 6.08994 7.82984 6.37994 8.11984C6.66994 8.40984 6.66994 8.88984 6.37994 9.17984L3.55994 11.9998L6.37994 14.8198C6.66994 15.1098 6.66994 15.5898 6.37994 15.8798C6.23994 16.0298 6.03994 16.0998 5.84994 16.0998Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('Log Out')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('freelancer.dashboard')); ?>" class="navbar-author-wrapper-list-item">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10.75H5C2.58 10.75 1.25 9.42 1.25 7V5C1.25 2.58 2.58 1.25 5 1.25H7C9.42 1.25 10.75 2.58 10.75 5V7C10.75 9.42 9.42 10.75 7 10.75ZM5 2.75C3.42 2.75 2.75 3.42 2.75 5V7C2.75 8.58 3.42 9.25 5 9.25H7C8.58 9.25 9.25 8.58 9.25 7V5C9.25 3.42 8.58 2.75 7 2.75H5Z" fill="#667085"/>
                                            <path d="M19 10.75H17C14.58 10.75 13.25 9.42 13.25 7V5C13.25 2.58 14.58 1.25 17 1.25H19C21.42 1.25 22.75 2.58 22.75 5V7C22.75 9.42 21.42 10.75 19 10.75ZM17 2.75C15.42 2.75 14.75 3.42 14.75 5V7C14.75 8.58 15.42 9.25 17 9.25H19C20.58 9.25 21.25 8.58 21.25 7V5C21.25 3.42 20.58 2.75 19 2.75H17Z" fill="#667085"/>
                                            <path d="M19 22.75H17C14.58 22.75 13.25 21.42 13.25 19V17C13.25 14.58 14.58 13.25 17 13.25H19C21.42 13.25 22.75 14.58 22.75 17V19C22.75 21.42 21.42 22.75 19 22.75ZM17 14.75C15.42 14.75 14.75 15.42 14.75 17V19C14.75 20.58 15.42 21.25 17 21.25H19C20.58 21.25 21.25 20.58 21.25 19V17C21.25 15.42 20.58 14.75 19 14.75H17Z" fill="#667085"/>
                                            <path d="M7 22.75H5C2.58 22.75 1.25 21.42 1.25 19V17C1.25 14.58 2.58 13.25 5 13.25H7C9.42 13.25 10.75 14.58 10.75 17V19C10.75 21.42 9.42 22.75 7 22.75ZM5 14.75C3.42 14.75 2.75 15.42 2.75 17V19C2.75 20.58 3.42 21.25 5 21.25H7C8.58 21.25 9.25 20.58 9.25 19V17C9.25 15.42 8.58 14.75 7 14.75H5Z" fill="#667085"/>
                                        </svg>
                                        <?php echo e(__('Dashboard')); ?>

                                    </a>
                                    <a href="<?php echo e(route('freelancer.profile.details', Auth::guard('web')->user()->username)); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12.12 13.5305C12.1 13.5305 12.07 13.5305 12.05 13.5305C12.02 13.5305 11.98 13.5305 11.95 13.5305C9.67998 13.4605 7.97998 11.6905 7.97998 9.51047C7.97998 7.29047 9.78998 5.48047 12.01 5.48047C14.23 5.48047 16.04 7.29047 16.04 9.51047C16.03 11.7005 14.32 13.4605 12.15 13.5305C12.13 13.5305 12.13 13.5305 12.12 13.5305ZM12 6.97047C10.6 6.97047 9.46998 8.11047 9.46998 9.50047C9.46998 10.8705 10.54 11.9805 11.9 12.0305C11.93 12.0205 12.03 12.0205 12.13 12.0305C13.47 11.9605 14.52 10.8605 14.53 9.50047C14.53 8.11047 13.4 6.97047 12 6.97047Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M12.0001 22.7503C9.31008 22.7503 6.74008 21.7503 4.75008 19.9303C4.57008 19.7703 4.49008 19.5303 4.51008 19.3003C4.64008 18.1103 5.38008 17.0003 6.61008 16.1803C9.59008 14.2003 14.4201 14.2003 17.3901 16.1803C18.6201 17.0103 19.3601 18.1103 19.4901 19.3003C19.5201 19.5403 19.4301 19.7703 19.2501 19.9303C17.2601 21.7503 14.6901 22.7503 12.0001 22.7503ZM6.08008 19.1003C7.74008 20.4903 9.83008 21.2503 12.0001 21.2503C14.1701 21.2503 16.2601 20.4903 17.9201 19.1003C17.7401 18.4903 17.2601 17.9003 16.5501 17.4203C14.0901 15.7803 9.92008 15.7803 7.44008 17.4203C6.73008 17.9003 6.26008 18.4903 6.08008 19.1003Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('Profile Details')); ?>

                                    </a>
                                    <a href="<?php echo e(route('freelancer.order.all')); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M15 12.9502H8C7.59 12.9502 7.25 12.6102 7.25 12.2002C7.25 11.7902 7.59 11.4502 8 11.4502H15C15.41 11.4502 15.75 11.7902 15.75 12.2002C15.75 12.6102 15.41 12.9502 15 12.9502Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M12.38 16.9502H8C7.59 16.9502 7.25 16.6102 7.25 16.2002C7.25 15.7902 7.59 15.4502 8 15.4502H12.38C12.79 15.4502 13.13 15.7902 13.13 16.2002C13.13 16.6102 12.79 16.9502 12.38 16.9502Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M14 6.75H10C9.04 6.75 7.25 6.75 7.25 4C7.25 1.25 9.04 1.25 10 1.25H14C14.96 1.25 16.75 1.25 16.75 4C16.75 4.96 16.75 6.75 14 6.75ZM10 2.75C9.01 2.75 8.75 2.75 8.75 4C8.75 5.25 9.01 5.25 10 5.25H14C15.25 5.25 15.25 4.99 15.25 4C15.25 2.75 14.99 2.75 14 2.75H10Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15 22.7504H9C3.38 22.7504 2.25 20.1704 2.25 16.0004V10.0004C2.25 5.44042 3.9 3.49042 7.96 3.28042C8.36 3.26042 8.73 3.57042 8.75 3.99042C8.77 4.41042 8.45 4.75042 8.04 4.77042C5.2 4.93042 3.75 5.78042 3.75 10.0004V16.0004C3.75 19.7004 4.48 21.2504 9 21.2504H15C19.52 21.2504 20.25 19.7004 20.25 16.0004V10.0004C20.25 5.78042 18.8 4.93042 15.96 4.77042C15.55 4.75042 15.23 4.39042 15.25 3.98042C15.27 3.57042 15.63 3.25042 16.04 3.27042C20.1 3.49042 21.75 5.44042 21.75 9.99042V15.9904C21.75 20.1704 20.62 22.7504 15 22.7504Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('My Orders')); ?>

                                    </a>
                                    <a href="<?php echo e(route('freelancer.offers')); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12 22.7503C11.37 22.7503 10.78 22.5104 10.34 22.0604L8.82001 20.5404C8.70001 20.4204 8.38 20.2904 8.22 20.2904H6.06C4.76 20.2904 3.70999 19.2403 3.70999 17.9403V15.7804C3.70999 15.6204 3.57999 15.3004 3.45999 15.1804L1.94 13.6604C1.5 13.2204 1.25 12.6303 1.25 12.0003C1.25 11.3703 1.49 10.7803 1.94 10.3403L3.45999 8.82028C3.57999 8.70028 3.70999 8.3803 3.70999 8.2203V6.06039C3.70999 4.76039 4.76 3.71029 6.06 3.71029H8.22C8.38 3.71029 8.70001 3.58029 8.82001 3.46029L10.34 1.94027C11.22 1.06027 12.78 1.06027 13.66 1.94027L15.18 3.46029C15.3 3.58029 15.62 3.71029 15.78 3.71029H17.94C19.24 3.71029 20.29 4.76039 20.29 6.06039V8.2203C20.29 8.3803 20.42 8.70028 20.54 8.82028L22.06 10.3403C22.5 10.7803 22.75 11.3703 22.75 12.0003C22.75 12.6303 22.51 13.2204 22.06 13.6604L20.54 15.1804C20.42 15.3004 20.29 15.6204 20.29 15.7804V17.9403C20.29 19.2403 19.24 20.2904 17.94 20.2904H15.78C15.62 20.2904 15.3 20.4204 15.18 20.5404L13.66 22.0604C13.22 22.5104 12.63 22.7503 12 22.7503ZM4.51999 14.1203C4.91999 14.5203 5.20999 15.2204 5.20999 15.7804V17.9403C5.20999 18.4103 5.59 18.7904 6.06 18.7904H8.22C8.78 18.7904 9.48001 19.0803 9.88 19.4803L11.4 21.0003C11.72 21.3203 12.28 21.3203 12.6 21.0003L14.12 19.4803C14.52 19.0803 15.22 18.7904 15.78 18.7904H17.94C18.41 18.7904 18.79 18.4103 18.79 17.9403V15.7804C18.79 15.2204 19.08 14.5203 19.48 14.1203L21 12.6003C21.16 12.4403 21.25 12.2303 21.25 12.0003C21.25 11.7703 21.16 11.5604 21 11.4004L19.48 9.88034C19.08 9.48034 18.79 8.7803 18.79 8.2203V6.06039C18.79 5.59039 18.41 5.21029 17.94 5.21029H15.78C15.22 5.21029 14.52 4.92035 14.12 4.52035L12.6 3.00033C12.28 2.68033 11.72 2.68033 11.4 3.00033L9.88 4.52035C9.48001 4.92035 8.78 5.21029 8.22 5.21029H6.06C5.59 5.21029 5.20999 5.59039 5.20999 6.06039V8.2203C5.20999 8.7803 4.91999 9.48034 4.51999 9.88034L3 11.4004C2.84 11.5604 2.75 11.7703 2.75 12.0003C2.75 12.2303 2.84 12.4403 3 12.6003L4.51999 14.1203Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.0002 16C14.4402 16 13.9902 15.55 13.9902 15C13.9902 14.45 14.4402 14 14.9902 14C15.5402 14 15.9902 14.45 15.9902 15C15.9902 15.55 15.5502 16 15.0002 16Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M9.01001 10C8.45001 10 8 9.55 8 9C8 8.45 8.45 8 9 8C9.55 8 10 8.45 10 9C10 9.55 9.56001 10 9.01001 10Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M8.99994 15.7495C8.80994 15.7495 8.61994 15.6795 8.46994 15.5295C8.17994 15.2395 8.17994 14.7595 8.46994 14.4695L14.4699 8.46945C14.7599 8.17945 15.2399 8.17945 15.5299 8.46945C15.8199 8.75945 15.8199 9.23951 15.5299 9.52951L9.52994 15.5295C9.37994 15.6795 9.18994 15.7495 8.99994 15.7495Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('My Offers')); ?>

                                    </a>
                                    <a href="<?php echo e(route('freelancer.proposal')); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.6201 9.62012H12.3701C11.9601 9.62012 11.6201 9.28012 11.6201 8.87012C11.6201 8.46012 11.9601 8.12012 12.3701 8.12012H17.6201C18.0301 8.12012 18.3701 8.46012 18.3701 8.87012C18.3701 9.28012 18.0401 9.62012 17.6201 9.62012Z" fill="#667085"/>
                                            <path d="M7.12006 10.3803C6.93006 10.3803 6.74006 10.3103 6.59006 10.1603L5.84006 9.41031C5.55006 9.12031 5.55006 8.64031 5.84006 8.35031C6.13006 8.06031 6.61006 8.06031 6.90006 8.35031L7.12006 8.57031L8.84006 6.85031C9.13006 6.56031 9.61006 6.56031 9.90006 6.85031C10.1901 7.14031 10.1901 7.62031 9.90006 7.91031L7.65006 10.1603C7.51006 10.3003 7.32006 10.3803 7.12006 10.3803Z" fill="#667085"/>
                                            <path d="M17.6201 16.6201H12.3701C11.9601 16.6201 11.6201 16.2801 11.6201 15.8701C11.6201 15.4601 11.9601 15.1201 12.3701 15.1201H17.6201C18.0301 15.1201 18.3701 15.4601 18.3701 15.8701C18.3701 16.2801 18.0401 16.6201 17.6201 16.6201Z" fill="#667085"/>
                                            <path d="M7.12006 17.3803C6.93006 17.3803 6.74006 17.3103 6.59006 17.1603L5.84006 16.4103C5.55006 16.1203 5.55006 15.6403 5.84006 15.3503C6.13006 15.0603 6.61006 15.0603 6.90006 15.3503L7.12006 15.5703L8.84006 13.8503C9.13006 13.5603 9.61006 13.5603 9.90006 13.8503C10.1901 14.1403 10.1901 14.6203 9.90006 14.9103L7.65006 17.1603C7.51006 17.3003 7.32006 17.3803 7.12006 17.3803Z" fill="#667085"/>
                                            <path d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H15C20.43 1.25 22.75 3.57 22.75 9V15C22.75 20.43 20.43 22.75 15 22.75ZM9 2.75C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V9C21.25 4.39 19.61 2.75 15 2.75H9Z" fill="#667085"/>
                                        </svg>
                                        <?php echo e(__('My proposals')); ?>

                                    </a>
                                    <?php if(get_static_option('project_enable_disable') != 'disable'): ?>
                                        <?php if(moduleExists('SecurityManage')): ?>
                                            <?php if(Auth::guard('web')->user()->freeze_project != 'freeze'): ?>
                                                <a href="<?php echo e(route('freelancer.project.create')); ?>"
                                                   class="navbar-author-wrapper-list-item">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M8 16.75H5.43C2.74 16.75 1.25 15.27 1.25 12.57V5.43C1.25 2.74 2.73 1.25 5.43 1.25H10C12.69 1.25 14.18 2.73 14.18 5.43C14.18 5.84 13.84 6.18 13.43 6.18C13.02 6.18 12.68 5.84 12.68 5.43C12.68 3.55 11.88 2.75 10 2.75H5.43C3.55 2.75 2.75 3.55 2.75 5.43V12.57C2.75 14.45 3.55 15.25 5.43 15.25H8C8.41 15.25 8.75 15.59 8.75 16C8.75 16.41 8.41 16.75 8 16.75Z"
                                                                fill="#667085" />
                                                        <path
                                                                d="M18.5701 22.75H14.0001C11.3101 22.75 9.82007 21.27 9.82007 18.57V11.43C9.82007 8.74 11.3001 7.25 14.0001 7.25H18.5701C21.2601 7.25 22.7501 8.73 22.7501 11.43V18.57C22.7501 21.27 21.2701 22.75 18.5701 22.75ZM14.0001 8.75C12.1201 8.75 11.3201 9.55 11.3201 11.43V18.57C11.3201 20.45 12.1201 21.25 14.0001 21.25H18.5701C20.4501 21.25 21.2501 20.45 21.2501 18.57V11.43C21.2501 9.55 20.4501 8.75 18.5701 8.75H14.0001Z"
                                                                fill="#667085" />
                                                        <path
                                                                d="M18.1299 15.75H14.8799C14.4699 15.75 14.1299 15.41 14.1299 15C14.1299 14.59 14.4699 14.25 14.8799 14.25H18.1299C18.5399 14.25 18.8799 14.59 18.8799 15C18.8799 15.41 18.5399 15.75 18.1299 15.75Z"
                                                                fill="#667085" />
                                                        <path
                                                                d="M16.5 17.3799C16.09 17.3799 15.75 17.0399 15.75 16.6299V13.3799C15.75 12.9699 16.09 12.6299 16.5 12.6299C16.91 12.6299 17.25 12.9699 17.25 13.3799V16.6299C17.25 17.0399 16.91 17.3799 16.5 17.3799Z"
                                                                fill="#667085" />
                                                    </svg>
                                                    <?php echo e(__('Project Create')); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('freelancer.project.create')); ?>"
                                               class="navbar-author-wrapper-list-item">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M8 16.75H5.43C2.74 16.75 1.25 15.27 1.25 12.57V5.43C1.25 2.74 2.73 1.25 5.43 1.25H10C12.69 1.25 14.18 2.73 14.18 5.43C14.18 5.84 13.84 6.18 13.43 6.18C13.02 6.18 12.68 5.84 12.68 5.43C12.68 3.55 11.88 2.75 10 2.75H5.43C3.55 2.75 2.75 3.55 2.75 5.43V12.57C2.75 14.45 3.55 15.25 5.43 15.25H8C8.41 15.25 8.75 15.59 8.75 16C8.75 16.41 8.41 16.75 8 16.75Z"
                                                            fill="#667085" />
                                                    <path
                                                            d="M18.5701 22.75H14.0001C11.3101 22.75 9.82007 21.27 9.82007 18.57V11.43C9.82007 8.74 11.3001 7.25 14.0001 7.25H18.5701C21.2601 7.25 22.7501 8.73 22.7501 11.43V18.57C22.7501 21.27 21.2701 22.75 18.5701 22.75ZM14.0001 8.75C12.1201 8.75 11.3201 9.55 11.3201 11.43V18.57C11.3201 20.45 12.1201 21.25 14.0001 21.25H18.5701C20.4501 21.25 21.2501 20.45 21.2501 18.57V11.43C21.2501 9.55 20.4501 8.75 18.5701 8.75H14.0001Z"
                                                            fill="#667085" />
                                                    <path
                                                            d="M18.1299 15.75H14.8799C14.4699 15.75 14.1299 15.41 14.1299 15C14.1299 14.59 14.4699 14.25 14.8799 14.25H18.1299C18.5399 14.25 18.8799 14.59 18.8799 15C18.8799 15.41 18.5399 15.75 18.1299 15.75Z"
                                                            fill="#667085" />
                                                    <path
                                                            d="M16.5 17.3799C16.09 17.3799 15.75 17.0399 15.75 16.6299V13.3799C15.75 12.9699 16.09 12.6299 16.5 12.6299C16.91 12.6299 17.25 12.9699 17.25 13.3799V16.6299C17.25 17.0399 16.91 17.3799 16.5 17.3799Z"
                                                            fill="#667085" />
                                                </svg>
                                                <?php echo e(__('Project Create')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('freelancer.account.setup')); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12 12.75C8.83 12.75 6.25 10.17 6.25 7C6.25 3.83 8.83 1.25 12 1.25C15.17 1.25 17.75 3.83 17.75 7C17.75 10.17 15.17 12.75 12 12.75ZM12 2.75C9.66 2.75 7.75 4.66 7.75 7C7.75 9.34 9.66 11.25 12 11.25C14.34 11.25 16.25 9.34 16.25 7C16.25 4.66 14.34 2.75 12 2.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.8201 22.7504C15.4401 22.7504 15.0801 22.6103 14.8201 22.3503C14.5101 22.0403 14.3701 21.5904 14.4401 21.1204L14.6301 19.7704C14.6801 19.4204 14.8901 19.0104 15.1401 18.7504L18.68 15.2104C20.1 13.7904 21.3501 14.6004 21.9601 15.2104C22.4801 15.7304 22.7501 16.2903 22.7501 16.8503C22.7501 17.4203 22.4901 17.9503 21.9601 18.4803L18.42 22.0204C18.17 22.2704 17.7501 22.4804 17.4001 22.5304L16.05 22.7203C15.97 22.7403 15.9001 22.7504 15.8201 22.7504ZM20.31 15.9203C20.13 15.9203 19.97 16.0404 19.74 16.2704L16.2001 19.8104C16.1701 19.8404 16.12 19.9403 16.12 19.9803L15.9401 21.2303L17.1901 21.0504C17.2301 21.0404 17.33 20.9904 17.36 20.9604L20.9001 17.4203C21.0601 17.2603 21.2501 17.0303 21.2501 16.8503C21.2501 16.7003 21.1301 16.4904 20.9001 16.2704C20.6601 16.0304 20.48 15.9203 20.31 15.9203Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M20.9201 19.2203C20.8501 19.2203 20.7801 19.2104 20.7201 19.1904C19.4001 18.8204 18.3501 17.7704 17.9801 16.4504C17.8701 16.0504 18.1001 15.6404 18.5001 15.5304C18.9001 15.4204 19.3101 15.6503 19.4201 16.0503C19.6501 16.8703 20.3001 17.5204 21.1201 17.7504C21.5201 17.8604 21.7501 18.2803 21.6401 18.6703C21.5501 19.0003 21.2501 19.2203 20.9201 19.2203Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M3.41016 22.75C3.00016 22.75 2.66016 22.41 2.66016 22C2.66016 17.73 6.85018 14.25 12.0002 14.25C13.0902 14.25 14.1702 14.41 15.1802 14.71C15.5802 14.83 15.8002 15.25 15.6802 15.64C15.5602 16.04 15.1402 16.26 14.7502 16.14C13.8702 15.88 12.9502 15.74 12.0002 15.74C7.68018 15.74 4.16016 18.54 4.16016 21.99C4.16016 22.41 3.82016 22.75 3.41016 22.75Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('Account Setup')); ?>

                                    </a>
                                    <a href="<?php echo e(route('freelancer.profile')); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12 15.75C9.93 15.75 8.25 14.07 8.25 12C8.25 9.93 9.93 8.25 12 8.25C14.07 8.25 15.75 9.93 15.75 12C15.75 14.07 14.07 15.75 12 15.75ZM12 9.75C10.76 9.75 9.75 10.76 9.75 12C9.75 13.24 10.76 14.25 12 14.25C13.24 14.25 14.25 13.24 14.25 12C14.25 10.76 13.24 9.75 12 9.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.21 22.1903C15 22.1903 14.79 22.1603 14.58 22.1103C13.96 21.9403 13.44 21.5503 13.11 21.0003L12.99 20.8003C12.4 19.7803 11.59 19.7803 11 20.8003L10.89 20.9903C10.56 21.5503 10.04 21.9503 9.42 22.1103C8.79 22.2803 8.14 22.1903 7.59 21.8603L5.87 20.8703C5.26 20.5203 4.82 19.9503 4.63 19.2603C4.45 18.5703 4.54 17.8603 4.89 17.2503C5.18 16.7403 5.26 16.2803 5.09 15.9903C4.92 15.7003 4.49 15.5303 3.9 15.5303C2.44 15.5303 1.25 14.3403 1.25 12.8803V11.1203C1.25 9.66029 2.44 8.47029 3.9 8.47029C4.49 8.47029 4.92 8.30029 5.09 8.01029C5.26 7.72029 5.19 7.26029 4.89 6.75029C4.54 6.14029 4.45 5.42029 4.63 4.74029C4.81 4.05029 5.25 3.48029 5.87 3.13029L7.6 2.14029C8.73 1.47029 10.22 1.86029 10.9 3.01029L11.02 3.21029C11.61 4.23029 12.42 4.23029 13.01 3.21029L13.12 3.02029C13.8 1.86029 15.29 1.47029 16.43 2.15029L18.15 3.14029C18.76 3.49029 19.2 4.06029 19.39 4.75029C19.57 5.44029 19.48 6.15029 19.13 6.76029C18.84 7.27029 18.76 7.73029 18.93 8.02029C19.1 8.31029 19.53 8.48029 20.12 8.48029C21.58 8.48029 22.77 9.67029 22.77 11.1303V12.8903C22.77 14.3503 21.58 15.5403 20.12 15.5403C19.53 15.5403 19.1 15.7103 18.93 16.0003C18.76 16.2903 18.83 16.7503 19.13 17.2603C19.48 17.8703 19.58 18.5903 19.39 19.2703C19.21 19.9603 18.77 20.5303 18.15 20.8803L16.42 21.8703C16.04 22.0803 15.63 22.1903 15.21 22.1903ZM12 18.4903C12.89 18.4903 13.72 19.0503 14.29 20.0403L14.4 20.2303C14.52 20.4403 14.72 20.5903 14.96 20.6503C15.2 20.7103 15.44 20.6803 15.64 20.5603L17.37 19.5603C17.63 19.4103 17.83 19.1603 17.91 18.8603C17.99 18.5603 17.95 18.2503 17.8 17.9903C17.23 17.0103 17.16 16.0003 17.6 15.2303C18.04 14.4603 18.95 14.0203 20.09 14.0203C20.73 14.0203 21.24 13.5103 21.24 12.8703V11.1103C21.24 10.4803 20.73 9.96029 20.09 9.96029C18.95 9.96029 18.04 9.52029 17.6 8.75029C17.16 7.98029 17.23 6.97029 17.8 5.99029C17.95 5.73029 17.99 5.42029 17.91 5.12029C17.83 4.82029 17.64 4.58029 17.38 4.42029L15.65 3.43029C15.22 3.17029 14.65 3.32029 14.39 3.76029L14.28 3.95029C13.71 4.94029 12.88 5.50029 11.99 5.50029C11.1 5.50029 10.27 4.94029 9.7 3.95029L9.59 3.75029C9.34 3.33029 8.78 3.18029 8.35 3.43029L6.62 4.43029C6.36 4.58029 6.16 4.83029 6.08 5.13029C6 5.43029 6.04 5.74029 6.19 6.00029C6.76 6.98029 6.83 7.99029 6.39 8.76029C5.95 9.53029 5.04 9.97029 3.9 9.97029C3.26 9.97029 2.75 10.4803 2.75 11.1203V12.8803C2.75 13.5103 3.26 14.0303 3.9 14.0303C5.04 14.0303 5.95 14.4703 6.39 15.2403C6.83 16.0103 6.76 17.0203 6.19 18.0003C6.04 18.2603 6 18.5703 6.08 18.8703C6.16 19.1703 6.35 19.4103 6.61 19.5703L8.34 20.5603C8.55 20.6903 8.8 20.7203 9.03 20.6603C9.27 20.6003 9.47 20.4403 9.6 20.2303L9.71 20.0403C10.28 19.0603 11.11 18.4903 12 18.4903Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('Profile Settings')); ?>

                                    </a>
                                    <a href="<?php echo e(route('freelancer.logout')); ?>"
                                       class="navbar-author-wrapper-list-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M15.24 22.2705H15.11C10.67 22.2705 8.53002 20.5205 8.16002 16.6005C8.12002 16.1905 8.42002 15.8205 8.84002 15.7805C9.24002 15.7405 9.62002 16.0505 9.66002 16.4605C9.95002 19.6005 11.43 20.7705 15.12 20.7705H15.25C19.32 20.7705 20.76 19.3305 20.76 15.2605V8.74047C20.76 4.67047 19.32 3.23047 15.25 3.23047H15.12C11.41 3.23047 9.93002 4.42047 9.66002 7.62047C9.61002 8.03047 9.26002 8.34047 8.84002 8.30047C8.42002 8.27047 8.12001 7.90047 8.15001 7.49047C8.49001 3.51047 10.64 1.73047 15.11 1.73047H15.24C20.15 1.73047 22.25 3.83047 22.25 8.74047V15.2605C22.25 20.1705 20.15 22.2705 15.24 22.2705Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
                                                    fill="#667085" />
                                            <path
                                                    d="M5.84994 16.0998C5.65994 16.0998 5.46994 16.0298 5.31994 15.8798L1.96994 12.5298C1.67994 12.2398 1.67994 11.7598 1.96994 11.4698L5.31994 8.11984C5.60994 7.82984 6.08994 7.82984 6.37994 8.11984C6.66994 8.40984 6.66994 8.88984 6.37994 9.17984L3.55994 11.9998L6.37994 14.8198C6.66994 15.1098 6.66994 15.5898 6.37994 15.8798C6.23994 16.0298 6.03994 16.0998 5.84994 16.0998Z"
                                                    fill="#667085" />
                                        </svg>
                                        <?php echo e(__('Log Out')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php else: ?>
    <div class="navbar-right-content show-nav-content">
        <div class="single-right-content">
            <div class="navbar-right-flex">
                <div class="navbar-right-item position-relative">
                    <a href="#0" class="navbar-right-chat search-header-open">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <div class="header-global-search">
                        <div class="header-global-search-header">
                            <h5 class="header-global-search-title"><?php echo e(__('Search')); ?></h5>
                            <div class="header-global-search-close search-close"><i class="fa-solid fa-times"></i>
                            </div>
                        </div>
                        <div class="header-global-search-input d-flex align-items-center">
                            <div class="header-global-search-input-inner">
                                <div class="header-global-search-input-inner-icon" id="header_search_load_spinner">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input type="text" id="search_your_desired_job" class="form-control"
                                       placeholder="<?php echo e(__('Search')); ?>" autocomplete="off">
                                <div class="header-global-search-select">
                                    <select id="Select_project_or_job_for_search">
                                        <?php if(get_static_option('project_enable_disable') != 'disable'): ?>
                                            <option value="project"><?php echo e(__('Project')); ?></option>
                                        <?php endif; ?>
                                        <?php if(get_static_option('job_enable_disable') != 'disable'): ?>
                                            <option value="job"><?php echo e(__('Job')); ?></option>
                                        <?php endif; ?>
                                        <option value="talent"><?php echo e(__('Talent')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="display_search_result"></div>
                    </div>
                    <div class="search-overlay"></div>
                </div>
                <div class="navbar-right-btn">
                    <a href="<?php echo e(route('user.login')); ?>"
                       class="cmn-btn btn-outline-1 color-one btn-small radius-10"><?php echo e(__('Log In')); ?>

                    </a>
                </div>
                <div class="btn-wrapper">
                    <a href="<?php echo e(route('user.register')); ?>"
                       class="cmn-btn btn-bg-1 btn-small radius-10"><?php echo e(__('Sign Up')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/frontend/user-menu.blade.php ENDPATH**/ ?>