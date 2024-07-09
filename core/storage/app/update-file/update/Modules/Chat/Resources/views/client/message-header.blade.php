<a href="{{ route('freelancer.profile.details', $data?->freelancer?->username) }}" target="_blank">
    <div class="chat-wrapper-details-header profile-border-bottom flex-between" id="livechat-message-header"
        data-freelancer-id="{{ $data->freelancer->id }}">
        <div class="chat-wrapper-details-header-left d-flex gap-2 align-items-center">
            <div class="chat-wrapper-details-header-left-author d-flex gap-2 align-items-center">
                @if ($data->freelancer?->image)
                    <div class="chat-wrapper-contact-list-thumb-main chat-wrapper-contact-list-thumb">
                        <img src="{{ asset('assets/uploads/profile/' . $data->freelancer?->image) }}"
                            alt="{{ $data->freelancer?->fullname }}">
                    </div>
                @else
                    <div class="chat-wrapper-contact-list-thumb-main chat-wrapper-contact-list-thumb">
                        <img src="{{ asset('assets/static/img/author/author.jpg') }}" alt="{{ __('author') }}">
                    </div>
                @endif
                <div class="chat-wrapper-contact-list-thumb-contents">
                    <h5 class="chat-wrapper-details-header-title">{{ $data->freelancer?->fullname }}</h5>
                    <p class="chat-wrapper-details-header-para">{{ $data->freelancer?->user_introduction?->title }}</p>
                </div>
            </div>
        </div>
    </div>
</a>
