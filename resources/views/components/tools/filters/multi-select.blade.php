@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="rounded-md">
        <div>
            <input
                type="checkbox"
                id="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-select-all"
                wire:input="selectAllFilterOptions('{{ $filter->getKey() }}')"
                {{ count($component->getAppliedFilterWithValue($filter->getKey()) ?? []) === count($filter->getOptions()) ? 'checked' : ''}}

                class="text-indigo-600 rounded border-gray-300 shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:bg-gray-600 disabled:opacity-50 disabled:cursor-wait"
            >
            <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-select-all" class="dark:text-white">@lang('All')</label>
        </div>

        @foreach($filter->getOptions() as $key => $value)
            <div wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-multiselect-{{ $key }}">
                <input
                    type="checkbox"
                    id="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}"
                    value="{{ $key }}"
                    wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}"
                    wire:model.stop="{{ $component->getTableName() }}.filters.{{ $filter->getKey() }}"
                    {{ count($component->getAppliedFilterWithValue($filter->getKey()) ?? []) === count($filter->getOptions()) ? 'disabled' : ''}}
                    :class="{'disabled:bg-gray-400 disabled:hover:bg-gray-400' : {{ count($component->getAppliedFilterWithValue($filter->getKey()) ?? []) === count($filter->getOptions()) ? 'true' : 'false' }}}"
                    class="text-indigo-600 rounded border-gray-300 shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:bg-gray-600 disabled:opacity-50 disabled:cursor-wait"
                >
                <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}" class="dark:text-white">{{ $value }}</label>
            </div>
        @endforeach
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
