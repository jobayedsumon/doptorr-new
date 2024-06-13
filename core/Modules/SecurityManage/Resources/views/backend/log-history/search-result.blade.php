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
        <th>{{__('Subject')}}</th>
        <th>{{__('url')}}</th>
        <th>{{__('Location')}}</th>
        <th>{{__('Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td>
                <x-bulk-action.bulk-delete-checkbox :id="$log->id"/>
            </td>
            <td>{{ $log->id }}</td>
            <td>{{ $log->subject }}</td>
            <td>{{ $log->url }}</td>
            <td>
                <p>{{ __('IP address:') }}  {{ $log->ip }}</p>
                <p>
                    @php
                    if (empty($log->ip) || $log->ip === '127.0.0.1') {
                        $country = 'Unknown';
                    } else {
                        try {
                            $reader = new \GeoIp2\Database\Reader(public_path().'/GeoLite2-Country.mmdb');
                            $record = $reader->country($log->ip ?? '');
                            $country = $record->country->name;
                        }
                        catch (\GeoIp2\Exception\AddressNotFoundException $e) {
                            $country = 'Unknown';
                        }
                    }
                    @endphp

                    {{ __('Country:') }}  {{ __($country) }}
                </p>
            </td>
            <td>
                <x-status.table.select-action :title="__('Select Action')"/>
                <ul class="dropdown-menu status_dropdown__list">
                    <li class="status_dropdown__item">
                        <x-popup.delete-popup :title="__('Delete Log')" :url="route('admin.log.delete',$log->id)"/>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<x-pagination.laravel-paginate :allData="$logs"/>
