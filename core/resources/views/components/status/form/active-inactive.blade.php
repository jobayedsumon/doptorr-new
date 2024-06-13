<div class="single-input">
    <label class="label-title mt-3">{{ $title }}</label>
    @if($status != '')
        <select name="status" class="form-control">
            <option value="1" @if($status == 1) selected @endif>{{__('Active')}}</option>
            <option value="0" @if($status == 0) selected @endif>{{__('Inactive')}}</option>
        </select>
    @else
        <select name="status" id="status" class="form-control">
            <option value="1">{{__('Active')}}</option>
            <option value="0">{{__('Inactive')}}</option>
        </select>
    @endif
</div>
