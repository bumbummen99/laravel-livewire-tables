<div>
    @if ($component->debugIsEnabled())
        @php
            $debuggable = [
                'query' => $component->getQuerySql(),
                'sorts' => $component->getSorts(),
            ];
        @endphp

        <p><strong>@lang('Debugging Values'):</strong></p>

        @if (! app()->runningInConsole())
            <div class="mb-4">@dump($debuggable)</div>
        @endif
    @endif
</div>
