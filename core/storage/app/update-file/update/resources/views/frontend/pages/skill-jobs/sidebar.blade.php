<div class="shop-sidebar-content">
    <div class="shop-close-content">
        <div class="shop-close-content-icon"> <i class="fas fa-times"></i> </div>
        <div class="single-shop-left bg-white radius-10">
            <div class="single-shop-left-filter">
                <div class="single-shop-left-filter-flex flex-between">
                    <div class="single-shop-left-filter-title">
                        <h5 class="title">
                            {{ __('Jobs Filter') }}
                        </h5>
                    </div>
                    <a href="javascript:void(0)" class="single-shop-left-filter-reset" id="category_job_filter_reset">{{ __('Reset Filter') }}</a>
                </div>
            </div>
        </div>
        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"> {{ __('Search by Country') }} </h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="single-shop-left-select">
                        <x-form.filter-project-job-country :innerTitle="__('Select')" :name="'category'" :id="'country'" />
                    </div>
                </div>
            </div>
        </div>

        <x-form.filter-job-type />

        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title">{{ __('Experience Level') }}</h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="single-shop-left-select">
                        <x-form.experience-level-dropdown :class="'form-control'" :name="'level'" :id="'level'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title">{{ __('Budget') }}</h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="price-range-input">
                        <div class="price-range-input-flex">
                            <div class="price-range-input-min">
                                <input type="number" placeholder="{{ __('Min') }}" name="min_price" id="min_price">
                            </div>
                            <span class="price-range-separator">-</span>
                            <div class="price-range-input-min">
                                <input type="number" placeholder="{{ __('Max') }}" name="max_price" id="max_price">
                            </div>
                        </div>
                        <div class="price-range-input-btn">
                            <button class="btn-profile btn-outline-1" id="set_price_range"><i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title">{{ __('Job Lengths') }}</h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="single-shop-left-select">
                        <select class="form-control" name="duration" id="duration">
                            <option value="">{{ __('Select') }}</option>
                            <option value="1 Days">{{ __('1 Days') }}</option>
                            <option value="1 Days">{{ __('2 Days') }}</option>
                            <option value="1 Days">{{ __('3 Days') }}</option>
                            <option value="less than a week">{{ __('Less than a week') }}</option>
                            <option value="less than a month">{{ __('Less than a month') }}</option>
                            <option value="less than 2 month">{{ __('Less than 2 month') }}</option>
                            <option value="less than 3 month">{{ __('Less than 3 month') }}</option>
                            <option value="More than 3 month">{{ __('More than 2 month') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
