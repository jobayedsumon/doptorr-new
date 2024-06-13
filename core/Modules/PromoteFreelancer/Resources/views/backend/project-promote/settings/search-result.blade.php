<x-validation.error />
<table class="DataTable_activation">
    <thead>
    <tr>
        <th>{{__('ID')}}</th>
        <th>{{__('Title')}}</th>
        <th>{{__('Budget')}}</th>
        <th>{{__('Duration (days)')}}</th>
        <th>{{__('Status')}}</th>
        <th>{{__('Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($all_settings))
        @foreach($all_settings as $setting)
        <tr>
            <td>{{ $setting->id }}</td>
            <td>{{ $setting->title }}</td>
            <td>{{ float_amount_with_currency_symbol($setting->budget) }}</td>
            <td>{{ $setting->duration }}</td>
            <td>
                @if($setting->status === 1)
                    <span class="alert alert-success">{{__('Active')}}</span>
                @else
                    <span class="alert alert-warning" >{{__('Inactive')}}</span>
                @endif
            </td>
            <td>
                <x-status.table.select-action :title="__('Select Action')"/>
                <ul class="dropdown-menu status_dropdown__list">
                    <li class="status_dropdown__item">
                        <a
                            class="btn dropdown-item status_dropdown__list__link edit_project_promote_settings"
                            data-bs-toggle="modal"
                            data-bs-target="#editProjectPromotSettingsModal"
                            data-settings-id="{{ $setting->id }}"
                            data-title="{{ $setting->title }}"
                            data-duration="{{ $setting->duration ?? '' }}"
                            data-budget="{{ $setting->budget ?? '' }}"
                        >
                            {{ __('Edit Settings') }}
                        </a>
                    </li>
                    <li class="status_dropdown__item"><x-status.table.status-change :title="__('Change Status')" :url="route('admin.project.promote.settings.status',$setting->id)"/></li>
                    <li class="status_dropdown__item"><x-popup.delete-popup :title="__('Delete Settings')" :url="route('admin.project.promote.settings.delete',$setting->id)"/></li>
                </ul>
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>
<x-pagination.laravel-paginate :allData="$all_settings"/>
