<div class="single-flex-input">
    <div class="single-input">
        <label class="label-title">{{ $title ?? '' }}</label>
        <select name="level" id="level" class="{{ $class ?? 'form-control' }}">
            <option value="">{{ __('Select') }}</option>
            <option value="junior">{{ __('Junior') }}</option>
            <option value="midLevel">{{ __('MidLevel') }}</option>
            <option value="senior">{{ __('Senior') }}</option>
            <option value="not mandatory">{{ __('Not Mandatory') }}</option>
        </select>
    </div>
</div>
