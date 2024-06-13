<x-validation.error />
<table class="DataTable_activation">
    <thead>
    <tr>
        <th>{{__('Project Details')}}</th>
        <th>{{__('Package Details')}}</th>
        <th>{{__('Payment Details')}}</th>
        <th>{{__('Expire Date')}}</th>
        <th>{{__('Impression and Click')}}</th>
        <th>{{__('Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($promoted_project_packages))
        @foreach($promoted_project_packages as $package)
            <tr>
                <td>
                    <p><strong>{{ __('ID:') }}</strong> {{ $package?->project?->id }}</p>
                    <p><strong>{{ __('Title:') }}</strong> {{ $package?->project?->title }}</p>
                </td>
                <td>
                    <p><strong>{{ __('ID:') }}</strong> {{ $package->package_id }}</p>
                    <p><strong>{{ __('Title:') }}</strong> {{ $package?->package->title }}</p>
                    <p><strong>{{ __('Duration:') }}</strong> {{ $package->duration }} {{ __('days') }}</p>
                    <p><strong>{{ __('Package Price:') }}</strong> {{ float_amount_with_currency_symbol($package?->package->budget) }}</p>
                </td>
                <td>
                    <p><strong>{{ __('Gateway:') }}</strong> {{ ucfirst(str_replace('_', ' ', $package->payment_gateway)) }}</p>
                    <p><strong>{{ __('Status:') }}</strong>
                        @if($package->payment_gateway == 'manual_payment' && $package->payment_status == 'pending')
                            <span class="text-danger">{{ ucfirst($package->payment_status) }}</span>
                        @else
                            <span>{{ ucfirst($package->payment_status) }}</span>
                        @endif
                    </p>
                    <p><strong>{{ __('Price:') }}</strong> {{ float_amount_with_currency_symbol($package->price) }}</p>
                    <p><strong>{{ __('Transaction Fee') }}</strong> {{ float_amount_with_currency_symbol($package->transaction_fee) }}</p>
                    @if($package->payment_gateway == 'manual_payment' && $package->payment_status == 'pending')
                    <a class="btn btn-sm btn-danger edit_payment_gateway_modal"
                        data-bs-toggle="modal"
                        data-bs-target="#editPaymentGatewayModal"
                        data-promoted-project-list-id="{{ $package->id }}"
                        data-promoted-project-user-id="{{ $package->user_id }}"
                        data-img-url="{{ $package->manual_payment_image }}">
                        {{ __('Update Payment') }}
                    </a>
                     @endif
                </td>
                <td>{{ $package->expire_date }}</td>
                <td>
                    <p><strong>{{ __('Impression:') }}</strong> {{ $package->impression }}</p>
                    <p><strong>{{ __('Click:') }}</strong> {{ $package->click }}</p>
                </td>
                <td>
                    <x-status.table.select-action :title="__('Select Action')"/>
                    <ul class="dropdown-menu status_dropdown__list">
                        @if($package->payment_gateway == 'manual_payment' && $package->payment_status == 'pending')
                        <li class="status_dropdown__item"><x-popup.delete-popup :title="__('Delete')" :url="route('admin.project.promote.delete',$package->id)"/></li>
                        @else
                        <li class="status_dropdown__item">
                            <a tabindex="0" class="btn dropdown-item status_dropdown__list__link">{{ __('No Option') }}</a>
                        </li>
                        @endif
                    </ul>
                </td>
            </tr>
    @endforeach
    @endif
    </tbody>
</table>
<x-pagination.laravel-paginate :allData="$promoted_project_packages"/>
