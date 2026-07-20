@props(['value' => 0])

@if($value >= 0)

<span
    class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500"
>
    <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12">
        <path d="M6 1L10 5H7V11H5V5H2L6 1Z"/>
    </svg>

    {{ number_format($value,2) }}%
</span>

@else

<span
    class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500"
>
    <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12">
        <path d="M6 11L2 7H5V1H7V7H10L6 11Z"/>
    </svg>

    {{ number_format(abs($value),2) }}%
</span>

@endif