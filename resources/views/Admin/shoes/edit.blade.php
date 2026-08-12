@extends('layouts.app')

@section('content')

<x-common.component-card
    title="Edit Shoe"
    subtitle="Update shoe information."
>


<form 
action="{{ route('admin.shoes.update',$shoe->id) }}"
method="POST"
enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="grid grid-cols-1 gap-5 md:grid-cols-2">


{{-- Category --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Category
</label>


<select
name="category_id"
class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">


@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ old('category_id',$shoe->category_id) == $category->id ? 'selected' : '' }}
>

{{ $category->name }}

</option>

@endforeach


</select>

</div>




{{-- Brand --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Brand
</label>


<select

name="brand_id"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">


@foreach($brands as $brand)

<option

value="{{ $brand->id }}"

{{ old('brand_id',$shoe->brand_id) == $brand->id ? 'selected' : '' }}

>

{{ $brand->name }}

</option>

@endforeach


</select>

</div>





{{-- Name --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Shoe Name
</label>


<input

type="text"

name="name"

value="{{ old('name',$shoe->name) }}"

placeholder="Shoe Name"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

</div>





{{-- SKU --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    SKU
</label>


<input

type="text"

name="sku"

value="{{ old('sku',$shoe->sku) }}"

placeholder="SKU"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

</div>





{{-- Price --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Regular Price
</label>


<input

type="number"

name="price"

value="{{ old('price',$shoe->price) }}"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

</div>





{{-- Discount Price --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Sale Price
</label>


<input

type="number"

name="discount_price"

value="{{ old('discount_price',$shoe->discount_price) }}"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

</div>





{{-- Gender --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Gender
</label>


<select

name="gender"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">


<option value="male"
{{ old('gender',$shoe->gender)=='male'?'selected':'' }}>
Male
</option>


<option value="female"
{{ old('gender',$shoe->gender)=='female'?'selected':'' }}>
Female
</option>


<option value="unisex"
{{ old('gender',$shoe->gender)=='unisex'?'selected':'' }}>
Unisex
</option>


</select>

</div>





{{-- Status --}}
<div>

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Status
</label>


<select

name="status"

class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">


<option value="1"
{{ old('status',$shoe->status)==1?'selected':'' }}>
Active
</option>


<option value="0"
{{ old('status',$shoe->status)==0?'selected':'' }}>
Inactive
</option>


</select>

</div>





{{-- Main Image --}}
<div class="md:col-span-2">

<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
    Main Image
</label>


<input

type="file"

name="image"

class="h-11 w-full border rounded">


@if($shoe->image)

<img

src="{{ asset('storage/'.$shoe->image) }}"

class="h-24 w-24 rounded object-cover mt-3">

@endif


</div>


</div>





<div class="mt-6 flex justify-end gap-3">


<a

href="{{ route('admin.shoes.index') }}"

class="rounded-lg border px-5 py-2.5">

Cancel

</a>



<button

type="submit"

class="rounded-lg bg-brand-500 px-5 py-2.5 text-white">

Update Shoe

</button>


</div>


</form>




<hr class="my-6">




{{-- Upload Multiple Images --}}
<div class="mt-6">

    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
        Upload Shoe Images
    </h3>

    <form action="{{ route('admin.shoes.images.store',$shoe->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <input 
            type="file"
            name="images[]"
            multiple
            class="mt-3 border p-2 rounded-lg w-full"
        >

        <button 
            type="submit"
            class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg">
            Upload Images
        </button>

    </form>

</div>




<div class="grid grid-cols-4 gap-4 mt-5">


@forelse($shoe->images ?? [] as $image)


<div class="border rounded p-3">


<img

src="{{ asset('storage/'.$image->image) }}"

class="h-32 w-32 rounded object-cover">


<form

action="{{ route('admin.shoe-images.destroy',$image->id) }}"

method="POST">


@csrf
@method('DELETE')


<button

class="mt-2 bg-red-500 text-white px-3 py-1 rounded">

Delete

</button>


</form>


</div>



@empty


<p>
No gallery images uploaded.
</p>


@endforelse


</div>



</x-common.component-card>

@endsection