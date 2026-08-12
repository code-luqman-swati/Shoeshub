@extends('layouts.app')

@section('content')


<x-common.component-card
title="Edit Color"
subtitle="Update color information"
>


<form action="{{ route('admin.colors.update',$color->id) }}" method="POST">

@csrf

@method('PUT')




<div class="mb-5">


<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
Color Name
</label>



<input
type="text"
name="name"

value="{{ old('name',$color->name) }}"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
>



@error('name')

<p class="mt-1 text-sm text-red-500">
{{ $message }}
</p>

@enderror



</div>





<div class="mb-5">


<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
Color Code
</label>



<div class="flex items-center gap-4">

    <input
        type="color"
        id="colorPicker"
        value="{{ old('code', $color->hex_code ?? '#000000') }}"
        class="h-11 w-16 rounded border"
    >

    <div
        id="colorPreview"
        class="h-10 w-10 rounded-full border border-gray-300"
        style="background-color: {{ old('code', $color->hex_code ?? '#000000') }}">
    </div>

    <input
        id="colorCode"
        type="text"
        name="code"
        value="{{ old('code', $color->hex_code ?? '#000000') }}"
        class="h-11 flex-1 rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
    >
</div>



@error('code')

<p class="mt-1 text-sm text-red-500">
{{ $message }}
</p>

@enderror



</div>





<div class="flex gap-3">


<a href="{{ route('admin.colors.index') }}"

class="rounded-lg border border-gray-300 px-5 py-2.5 dark:border-gray-700">

Cancel

</a>




<button
type="submit"

class="rounded-lg bg-blue-600 px-5 py-2.5 text-white hover:bg-blue-700">

Update Color

</button>



</div>



</form>
@push('scripts')
<script>
    const picker = document.getElementById('colorPicker');
    const preview = document.getElementById('colorPreview');
    const code = document.getElementById('colorCode');

    picker.addEventListener('input', function () {
        code.value = this.value;
        preview.style.backgroundColor = this.value;
    });
</script>
@endpush

</x-common.component-card>


@endsection