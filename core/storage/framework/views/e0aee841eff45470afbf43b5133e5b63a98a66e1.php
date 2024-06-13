<?php
    $project = json_decode(json_encode($message->message['project']));
?>

<?php if($message->from_user == 1): ?>
    <div class="chat-wrapper-details-inner-chat">
        <div class="chat-wrapper-details-inner-chat-flex">
            <div class="chat-wrapper-details-inner-chat-thumb">
                <?php if($data->client?->image): ?>
                    <img src="<?php echo e(asset('assets/uploads/profile/'.$data->client?->image)); ?>" alt="">
                <?php else: ?>
                    <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                <?php endif; ?>
            </div>
            <div class="chat-wrapper-details-inner-chat-contents <?php echo e(!empty($project->type) ? "bg-danger p-2 text-dark bg-opacity-10" : ""); ?>">
                <p class="chat-wrapper-details-inner-chat-contents-para <?php echo e(!empty($project) ? "d-none" : ""); ?>">
                <?php if(!empty($message->message['message'])): ?>
                    <span class="chat-wrapper-details-inner-chat-contents-para-span"><?php echo e($message->message['message'] ?? ''); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($message->file)): ?>
                        <br />
                        <br />
                        <img src="<?php echo e(asset('assets/uploads/media-uploader/live-chat/'. $message->file)); ?>" alt="">
                        <?php
                            $ext = pathinfo($message->file, PATHINFO_EXTENSION);
                        ?>
                            <?php if($ext == 'pdf'): ?>
                            <a class="download-pdf-chat" href="<?php echo e(asset('assets/uploads/media-uploader/live-chat/'. $message->file)); ?>" download><?php echo e(__('Download pdf')); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </p>

                <?php if(!empty($project)): ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 <?php echo e(($project->type ?? '') == 'job'?'d-none' : ''); ?>">
                                <?php if(($project->type ?? '') == 'job'): ?>
                                    <span></span>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/uploads/project/'.$project->image)); ?>" class="img-fluid rounded-start" alt="<?php echo e($project->image ?? ''); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($project->title); ?></h5>
                                    <?php if(($project->type ?? '') == 'job'): ?>
                                        <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo e(route('job.details', ['username' => $project->username, 'slug' => $project->slug])); ?>"><?php echo e(__('View details')); ?></a>
                                    <?php else: ?>
                                        <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo e(route('project.details', ['username' => $project->username, 'slug' => $project->slug])); ?>"><?php echo e(__('View details')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <?php if(($project->type ?? '') == 'job'): ?>
                            <h5><?php echo e($project->interview_message ?? ''); ?></h5>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <span class="chat-wrapper-details-inner-chat-contents-time mt-2">
                    <?php echo e($message->created_at->diffForHumans()); ?>

                </span>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if($message->from_user == 2): ?>
    <div class="chat-wrapper-details-inner-chat chat-reply">
        <div class="chat-wrapper-details-inner-chat-flex">
            <div class="chat-wrapper-details-inner-chat-thumb">
                 <a href="<?php echo e(route('freelancer.profile.details', $data?->freelancer?->username)); ?>" target="_blank">
                    <?php if($data->freelancer?->image): ?>
                        <img src="<?php echo e(asset('assets/uploads/profile/'.$data->freelancer?->image)); ?>" alt="">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                    <?php endif; ?>
                </a>
            </div>
            <div class="chat-wrapper-details-inner-chat-contents">
                <p class="chat-wrapper-details-inner-chat-contents-para">
                    <?php if(!empty($message->message['message'])): ?>
                    <span class="chat-wrapper-details-inner-chat-contents-para-span"><?php echo e($message->message['message'] ?? ''); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($message->file)): ?>
                        <br />
                        <br />
                        <img src="<?php echo e(asset('assets/uploads/media-uploader/live-chat/'. $message->file)); ?>" alt="">
                            <?php
                                $ext = pathinfo($message->file, PATHINFO_EXTENSION);
                            ?>
                            <?php if($ext == 'pdf'): ?>
                                <a class="download-pdf-chat" href="<?php echo e(asset('assets/uploads/media-uploader/live-chat/'. $message->file)); ?>" download><?php echo e(__('Download pdf')); ?></a>
                            <?php endif; ?>
                    <?php endif; ?>
                </p>


                <?php if(!empty($project)): ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo e(asset('assets/uploads/project/'.$project->image)); ?>" class="img-fluid rounded-start" alt="<?php echo e($project->image ?? ''); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($project->title); ?></h5>
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo e(route('project.details', ['username' => $project->username, 'slug' => $project->slug])); ?>"><?php echo e(__('View details')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <span class="chat-wrapper-details-inner-chat-contents-time mt-2">
                    <?php echo e($message->created_at->diffForHumans()); ?>

                </span>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Chat/Resources/views/components/client/message.blade.php ENDPATH**/ ?>