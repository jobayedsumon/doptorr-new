<!-- Level Rules Modal -->
<div class="modal fade" id="LevelRulesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Setup Rules for Level') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.rule.setup')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="level_id" id="level_id" value="">
                <input type="hidden" name="rule_id" id="rule_id" value="">
                <p>
                    <x-notice.general-notice :description="__('Freelancer level will calculated according to bellow parameters.')" />
                </p>
                <div class="modal-body">
                    <div class="single-input mb-3">
                        <label class="label-title mt-3">{{ __('Select Period') }}</label>
                        <select name="period" id="period" class="form-control">
                            <option value="">{{__('Select Period')}}</option>
                            <option value="1">{{__('1 Month')}}</option>
                            <option value="3">{{__('3 Month')}}</option>
                            <option value="6">{{__('6 Month')}}</option>
                            <option value="9">{{__('9 month')}}</option>
                            <option value="12">{{__('12 month')}}</option>
                        </select>
                    </div>

                    <x-form.text :title="__('Average Rating')" :type="__('number')" :name="'avg_rating'" :id="'avg_rating'" :step="0.01" :placeholder="__('Enter average rating')"/>
                    <x-form.text :title="__('Total Earning')" :type="__('number')" :name="'earning'" :id="'earning'" :placeholder="__('Enter earning amount')"/>
                    <x-form.text :title="__('Complete Order')" :type="__('number')" :name="'complete_order'" :id="'complete_order'" :placeholder="__('Enter order number')"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-btn.submit :title="__('Save')" :class="'btn btn-primary mt-4 pr-4 pl-4 setup_level_rules'" />
                </div>
            </form>
        </div>
    </div>
</div>
