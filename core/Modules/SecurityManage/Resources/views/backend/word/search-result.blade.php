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
        <th>{{__('Word')}}</th>
        <th>{{__('Status')}}</th>
        <th>{{__('Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($words as $word)
        <tr>
            <td>
                <x-bulk-action.bulk-delete-checkbox :id="$word->id"/>
            </td>
            <td>{{ $word->id }}</td>
            <td>{{ $word->word }}</td>
            <td>
                @if($word->status == 'active')
                    <span class="text-success fw-bold">{{ ucfirst(__($word->status)) }}</span>
                @else
                    <span class="text-danger fw-bold">{{ ucfirst(__($word->status)) }}</span>
                @endif
            </td>
            <td>
                <x-status.table.select-action :title="__('Select Action')"/>
                <ul class="dropdown-menu status_dropdown__list">
                    <li class="status_dropdown__item">
                        <a class="btn dropdown-item status_dropdown__list__link edit_skill_modal"
                           data-bs-toggle="modal"
                           data-bs-target="#editWordModal"
                           data-word="{{ $word->word }}"
                           data-word_id="{{ $word->id }}">
                            {{ __('Edit Word') }}
                        </a>
                    </li>
                    <li class="status_dropdown__item">
                        <x-popup.delete-popup :title="__('Delete Word')" :url="route('admin.word.delete',$word->id)"/>
                    </li>
                    <li class="status_dropdown__item">
                        <x-status.table.status-change :title="__('Change Status')" :url="route('admin.word.status',$word->id)"/>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<x-pagination.laravel-paginate :allData="$words"/>
