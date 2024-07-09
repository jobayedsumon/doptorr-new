<div class="tab-content-item active mt-5" id="proposals">
    <div class="myJob-wrapper">
        @if($job_proposals->count() > 0)
            @foreach($job_proposals as $proposal)
                <div class="myJob-wrapper-single">
                    {!! freelancer_skill_match_with_job_skill($proposal->freelancer_id, $proposal->job_id) !!}
                <div class="myJob-wrapper-single-flex flex-between align-items-center">
                    <div class="myJob-wrapper-single-contents">
                        <div class="jobFilter-proposal-author-flex">
                            <div class="jobFilter-proposal-author-thumb">
                                @if($proposal?->freelancer->image)
                                    <a href="{{ route('freelancer.profile.details', $proposal?->freelancer->username) }}">
                                        <img src="{{ asset('assets/uploads/profile/'.$proposal?->freelancer?->image) }}" alt="{{ $proposal?->freelancer?->fullname }}">
                                    </a>
                                @else
                                    <a href="{{ route('freelancer.profile.details', $proposal?->freelancer->username) }}">
                                        <img src="{{ asset('assets/static/img/author/author.jpg') }}" alt="{{ __('AuthorImg') }}">
                                    </a>
                                @endif
                            </div>
                            <div class="jobFilter-proposal-author-contents">
                                <h4 class="jobFilter-proposal-author-contents-title">
                                    <a href="{{ route('freelancer.profile.details', $proposal?->freelancer->username) }}">
                                    {{ $proposal->freelancer?->fullname ?? '' }}
                                    </a>
                                    <x-status.user-active-inactive-check :userID="$proposal->freelancer->id" />
                                </h4>
                                <p class="jobFilter-proposal-author-contents-subtitle mt-2"> {{ $proposal->freelancer?->user_introduction?->title ?? '' }} · <span>{{ $proposal->freelancer?->user_state?->state ?? '' }}, {{ $proposal->freelancer?->user_country?->country ?? '' }}</span> </p>
                                <div class="jobFilter-proposal-author-contents-review mt-2">
                                    {!! freelancer_rating($proposal->freelancer_id) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="myJob-wrapper-single-arrow">
                        <div class="job-proposal-btn">
                            <div class="job-proposal-btn-item">
                                <x-job.job-proposal-view :isView="$proposal->is_view" />
                            </div>
                            <div class="job-proposal-btn-item">
                                <x-job.hire-short-list-check :isHired="$proposal->is_hired" :isShortListed="$proposal->is_short_listed" />
                            </div>
                            <div class="job-proposal-btn-item">
                                <p class="jobFilter-proposal-author-contents-time">{{ $proposal->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jobFilter-proposal-offered profile-border-top">
                    <div class="jobFilter-proposal-offered-single">
                        <span class="offered">{{ __('Offered') }} <span class="offered-price">{{ float_amount_with_currency_symbol($proposal->amount) }}</span> </span>
                    </div>
                    <div class="jobFilter-proposal-offered-single">
                        <span class="offered">{{ __('Est. delivery duration') }} <span class="offered-days">{{ $proposal->duration }}</span> </span>
                    </div>
                </div>
                <div class="flex-between profile-border-top">
                    <div class="btn-wrapper rejected_interview_location_{{ $proposal->id }}">
                        @if($proposal->is_rejected == 1)
                            <a href="javascript:void(0)" class="btn-profile btn-outline-gray">{{ __('Rejected') }}</a>
                        @else
                            <a href="javascript:void(0)"
                               class="btn-profile btn-outline-gray click-interview take_freelancer_interview"
                               data-job-id="{{ $proposal->job?->id }}"
                               data-proposal-id="{{ $proposal->id }}"
                               data-freelancer-id="{{ $proposal->freelancer_id }}"
                               data-job-title="{{ $proposal->job?->title }}"
                               data-job-level="{{ $proposal->job?->level }}"
                               data-job-type="{{ $proposal->job?->type }}"
                               data-job-create-date="{{ $proposal->job?->created_at }}"
                            >
                                @if ($proposal->is_interview_take == 1) {{ __('Interviewed') }} @else {{ __('Take Interview') }} @endif
                            </a>
                            <a href="javascript:void(0)" class="btn-profile btn-outline-gray reject_proposal" data-proposal-id="{{ $proposal->id }}">{{ __('Reject') }}</a>
                        @endif
                    </div>
                    <div class="btn-wrapper flex-btn gap-2 add_remove_interview_location_{{$proposal->id}}">
                        @if($proposal->is_rejected == 0)
                            <a href="javascript:void(0)" class="btn-profile btn-outline-gray loadingRound add_remove_shortlist" data-proposal-id="{{ $proposal->id }}">
                                @if($proposal->is_short_listed == 0)
                                    <span class="add_to_short_listed">{{ __('Add to Shortlist') }}</span>
                                @else
                                    <span class="remove_from_short_listed">{{ __('Remove from Shortlist') }}</span>
                                @endif
                            </a>
                        @endif
                        <a href="{{ route('client.job.proposal.details',$proposal->id) }}" target="_blank" class="btn-profile btn-bg-1">{{ __('View Proposal') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h4 class="jobFilter-proposal-author-contents-title text-danger"> {{ __('Nothing Found') }} </h4>
        @endif

    </div>
</div>
