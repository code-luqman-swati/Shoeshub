@extends('layouts.app')

@section('content')


<x-common.component-card
    title="Edit Size"
    subtitle="Update shoe size information."
>


<form action="{{ route('admin.sizes.update',$size->id) }}"
      method="POST">

@csrf
@method('PUT')



<div class="space-y-6">


{{-- Size --}}

<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">

Size

</label>


<input 
type="text"
name="size"

value="{{ old('size',$size->size) }}"

class="h-11 w-full rounded-lg border border-gray-300 px-4 
dark:border-gray-700 dark:bg-gray-800 dark:text-white"

placeholder="Enter shoe size">


@error('size')

<p class="mt-1 text-sm text-red-500">
{{ $message }}
</p>

@enderror


</div>





{{-- Buttons --}}

<div class="flex justify-end gap-3">


<a href="{{ route('admin.sizes.index') }}"

class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm 
font-medium text-gray-700 hover:bg-gray-100
dark:border-gray-700 dark:text-gray-300">

Cancel

</a>





<button type="submit"

class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm 
font-medium text-white hover:bg-blue-700">

Update Size

</button>



</div>



</div>



</form>


</x-common.component-card>


@endsection