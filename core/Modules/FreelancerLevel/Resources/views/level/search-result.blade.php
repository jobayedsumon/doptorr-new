<x-validation.error />
<table class="DataTable_activation">
    <thead>
    <tr>
        <th>{{__('ID')}}</th>
        <th>{{__('Image')}}</th>
        <th>{{__('Level')}}</th>
        <th>{{__('Level Rule')}}</th>
        <th>{{__('Status')}}</th>
        <th>{{__('Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($all_levels as $level)
        <tr>
            <td>{{ $level->id }}</td>
            <td>
                <span class="img_100"> {!! render_image_markup_by_attachment_id($level->image ?? '') !!} </span>
                @php $level_img = get_attachment_image_by_id($level->image,null,true); @endphp
                @if (!empty($level_img))
                    @php  $img_url = $level_img['img_url']; @endphp
                @endif
            </td>
            <td>{{ $level->level }}</td>
            <td>
                @if($level?->level_rule?->period)
                <p>{{ __('Period:') }} {{ $level?->level_rule?->period }} {{__('month')}}</p>
                @endif
                @if($level?->level_rule?->complete_order)
                <p>{{ __('Complete Order:') }} {{ $level?->level_rule?->complete_order }}</p>
                @endif
                @if($level?->level_rule?->avg_rating)
                <p>{{ __('Average Rating:') }} {{ $level?->level_rule?->avg_rating }}</p>
                @endif
                @if($level?->level_rule?->earning)
                <p>{{ __('Total Earning:') }} {{ float_amount_with_currency_symbol($level?->level_rule?->earning) }}</p>
                @endif
            </td>
            <td>
                @if($level->status === 1)
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
                            class="btn dropdown-item status_dropdown__list__link edit_level_modal"
                            data-bs-toggle="modal"
                            data-bs-target="#editLevelModal"
                            data-level="{{ $level->level }}"
                            data-level_id="{{ $level->id }}"
                            data-img_id="{{ $level->image }}"
                            data-img_url="{{ $img_url }}">
                            {{ __('Edit Level') }}
                        </a>
                    </li>
                    <li class="status_dropdown__item">
                        <a
                            class="btn dropdown-item status_dropdown__list__link level_rules_modal"
                            data-bs-toggle="modal"
                            data-bs-target="#LevelRulesModal"
                            data-level="{{ $level->level }}"
                            data-level-id="{{ $level->id }}"
                            data-rule-id="{{ $level?->level_rule->id ?? '' }}"
                            data-period="{{ $level?->level_rule->period ?? '' }}"
                            data-avg-rating="{{ $level?->level_rule->avg_rating ?? '' }}"
                            data-earning="{{ $level?->level_rule->earning ?? '' }}"
                            data-complete-order="{{ $level?->level_rule->complete_order ?? '' }}"
                        >
                            {{ __('Setup Level Rules') }}
                        </a>
                    </li>
                    <li class="status_dropdown__item"><x-status.table.status-change :title="__('Change Status')" :url="route('admin.level.status',$level->id)"/></li>
                    <li class="status_dropdown__item"><x-popup.delete-popup :title="__('Delete Level')" :url="route('admin.level.delete',$level->id)"/></li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
