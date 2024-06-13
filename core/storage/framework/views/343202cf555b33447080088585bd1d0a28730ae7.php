<?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>
    <div class="profile-wrapper-item radius-10">
        <div class="profile-wrapper-item-flex flex-between align-items-center profile-border-bottom">
            <h4 class="profile-wrapper-item-title"> <?php echo e(__('Skills')); ?> </h4>
            <div class="profile-wrapper-item-plus display_edit_skill_wrapper edit_skill_show_hide"><i class="fa-regular fa-pen-to-square"></i></div>
        </div>

        <ul class="setup-wrapper-work-list freelancer_skill_list">
            <?php
                $array_skill = explode(", ",$skills);
                $array_length =  count($array_skill);
            ?>
            <?php for($i = 0; $i<=($array_length-1); $i ++ ): ?>
                <li class="setup-wrapper-work-list-item "> <?php echo e($array_skill[$i]); ?> </li>
            <?php endfor; ?>
        </ul>
        <div class="edit_skill_wrapper">
            <div class="setup-wrapper-skill">
                <p class="setup-wrapper-skill-para"><?php echo e(__('Type and hit ↵ Enter to add a skill or choose from suggestions below')); ?></p>

                <div class="setup-wrapper-skill-tagInputs mt-4">
                    <input type="text" id="skill_input" placeholder="__('select tags')">
                </div>
            </div>

            <h6 class="setup-wrapper-experience-details-subtitle mt-4"><?php echo e(__('Suggested Skill')); ?> </h6>
            <ul class="setup-wrapper-work-list mt-3">
                <?php if($skills_according_to_category): ?>
                    <?php $__currentLoopData = $skills_according_to_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!in_array($skill->skill, $array_skill)): ?>
                            <li class="setup-wrapper-work-list-item choose_skill"> <?php echo e($skill->skill); ?> </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
            <div class="btn-wrapper d-flex justify-content-end mt-3">
                <a href="javascript:void(0)" class="cmn-btn btn-bg-1 btn-small update_freelancer_skill"><?php echo e(__('Update Skills')); ?></a>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="profile-wrapper-item radius-10">
        <div class="profile-wrapper-item-flex flex-between align-items-center profile-border-bottom">
            <h4 class="profile-wrapper-item-title"> <?php echo e(__('Skills')); ?> </h4>
        </div>
        <ul class="setup-wrapper-work-list">
            <?php
                $array_skill = explode(",",$skills);
                $array_length =  count($array_skill);
            ?>
            <?php if($array_length > 1): ?>
                <?php for($i = 0; $i<=($array_length-1); $i ++ ): ?>
                    <li class="setup-wrapper-work-list-item "> <?php echo e($array_skill[$i]); ?> </li>
                <?php endfor; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/profile-details/skill.blade.php ENDPATH**/ ?>