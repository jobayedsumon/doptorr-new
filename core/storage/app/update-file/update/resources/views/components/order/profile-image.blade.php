@if($image)
    <a href="javascript:void(0)">
        <img src="{{ asset('assets/uploads/profile/'.$image) }}" alt="{{ __('AuthorImg') }}">
    </a>
@else
    <a href="javascript:void(0)"><img src="{{ asset('assets/static/img/author/author.jpg') }}" alt="{{ __('AuthorImg') }}"></a>
@endif
