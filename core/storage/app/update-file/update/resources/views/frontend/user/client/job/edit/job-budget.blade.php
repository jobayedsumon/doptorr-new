<!-- Budget, Skills Start -->
<div class="setup-wrapper-contents">
    <div class="setup-wrapper-contents-item">
        <div class="setup-bank-form">
            <div class="setup-bank-form-item">
                <label class="label-title">{{ __('Job type') }}</label>
                <select class="form-control" name="type" id="type">
                    <option value="fixed" {{ $job_details->type == 'fixed' ? 'selected' : ''}}>{{ __('Fixed-Price (Pay a fixed amount for the job)') }}</option>
                </select>
            </div>
            <div class="setup-bank-form-item setup-bank-form-item-icon">
                <label class="label-title">{{ __('Enter Budget') }}</label>
                <input type="number" class="form--control" name="budget" id="budget" value="{{ $job_details->budget }}" placeholder="{{ __('Enter Your Budget') }}">
                <span class="input-icon">{{ get_static_option('site_global_currency') ?? '' }}</span>
            </div>
            <div class="single-input mt-3">
                <label class="label-title">{{ __('Select Skill') }}</label>
                <select name="skill[]" id="skill" class="form-control skill_select2" multiple>
                    @foreach($allSkills = \App\Models\Skill::all_skills() as $data)
                        <option
                            @foreach($job_details->job_skills as $skill)
                                {{ $skill->id === $data->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $data->id }}">{{ $data->skill }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="setup-bank-form-item">
                @php
                    $extension = [];
                    $extensions = [];
                    $path_info = pathinfo('assets/uploads/jobs/'.$job_details->attachment);
                    if(isset($path_info['extension'])){
                        $extension = $path_info['extension'];
                        $extensions = array('png','jpg','jpeg','bmp','gif','tiff','svg');
                    }
                @endphp
                @if(in_array($extension, $extensions))
                    <div class="remove-attachment-wrap mb-4">
                        <img class="remove_attachment" src="{{ asset('assets/uploads/jobs/'.$job_details->attachment) }}" alt="{{ $job_details->attachment ?? '' }}">
                    </div>
                @else
                    <div class="remove-attachment-wrap mb-4">
                        <span class="remove_attachment">{{ $job_details->attachment ?? '' }}</span>
                    </div>
                @endif
                <label class="photo-uploaded center-text w-100">
                    <div class="photo-uploaded-flex d-flex uploadImage">
                        <div class="photo-uploaded-icon"><i class="fa-solid fa-paperclip"></i></div>
                        <span class="photo-uploaded-para">{{ __('Add attachments') }}</span>
                    </div>
                    <input class="photo-uploaded-file inputTag" type="file" name="attachment" id="attachment">
                </label>
                <p class="mt-2">{{ __('Supported: image,csv,txt,xlx,xls,pdf file') }}</p>
            </div>
        </div>
    </div>
</div>
<!-- Budget, Skills Ends -->
