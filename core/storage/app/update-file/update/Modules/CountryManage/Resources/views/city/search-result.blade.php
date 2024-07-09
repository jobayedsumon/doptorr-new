<x-validation.error />
<table class="DataTable_activation">
    <thead>
    <tr>
        <th class="no-sort">
            <div class="mark-all-checkbox">
                <input type="checkbox" class="all-checkbox">
            </div>
        </th>
        <th>{{__('ID')}}</th>
        <th>{{__('City')}}</th>
        <th>{{__('State')}}</th>
        <th>{{__('Country')}}</th>
        <th>{{__('Status')}}</th>
        <th>{{__('Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($all_cities as $city)
        <tr>
            <td>
                <x-bulk-action.bulk-delete-checkbox :id="$city->id"/>
            </td>
            <td>{{ $city->id }}</td>
            <td>{{ $city->city }}</td>
            <td>{{ optional($city->state)->state }}</td>
            <td>{{ optional($city->country)->country }}</td>
            <td>
                <x-status.table.active-inactive :status="$city->status"/>
            </td>
            <td>
                <x-status.table.select-action :title="__('Select Action')"/>
                <ul class="dropdown-menu status_dropdown__list">
                    @can('city-edit')
                    <li class="status_dropdown__item">
                        <a class="btn dropdown-item status_dropdown__list__link edit_city_modal"
                           data-bs-toggle="modal"
                           data-bs-target="#editCityModal"
                           data-city="{{ $city->city }}"
                           data-city_id="{{ $city->id }}"
                           data-state_id="{{ $city->state_id }}"
                           data-country_id="{{ $city->country_id }}">
                            {{ __('Edit City') }}
                        </a>
                    </li>
                    @endcan
                    @can('city-delete')
                    <li class="status_dropdown__item">
                        <x-popup.delete-popup :title="__('Delete City')" :url="route('admin.city.delete',$city->id)"/>
                    </li>
                    @endcan
                    @can('city-status-change')
                    <li class="status_dropdown__item">
                        <x-status.table.status-change :title="__('Change Status')" :url="route('admin.city.status',$city->id)"/>
                    </li>
                    @endcan
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<x-pagination.laravel-paginate :allData="$all_cities"/>
