@extends('layouts.app')

@section('content')

<x-common.component-card
    title="Add Shoe"
    subtitle="Add a new shoe product to the system."
>

<form action="{{ route('admin.shoes.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

        {{-- Category --}}
        <div>
            <label class="mb-2 block">Category</label>

            <select
                name="category_id"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

                <option value="">Select Category</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Brand --}}
        <div>
            <label class="mb-2 block">Brand</label>

            <select
                name="brand_id"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

                <option value="">Select Brand</option>

                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Shoe Name --}}
        <div>
            <label class="mb-2 block">Shoe Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter shoe name"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>

        {{-- SKU --}}
        <div>
            <label class="mb-2 block">SKU</label>

            <input
                type="text"
                name="sku"
                value="{{ old('sku') }}"
                placeholder="Enter SKU"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>

        {{-- Price --}}
        <div>
            <label class="mb-2 block">Price</label>

            <input
                type="number"
                name="price"
                value="{{ old('price') }}"
                placeholder="Enter price"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>

        {{-- Discount Price --}}
        <div>
            <label class="mb-2 block">Sale Price</label>

            <input
                type="number"
                name="discount_price"
                value="{{ old('discount_price') }}"
                placeholder="Enter discount price"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>

        {{-- Gender --}}
        <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
    Active
</option>

<option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
    Inactive
</option>

        {{-- Status --}}
      {{-- Status --}}
<div>
    <label class="mb-2 block">Status</label>

    <select
        name="status"
        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

        <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
            Active
        </option>

        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
            Inactive
        </option>

    </select>
</div>


{{-- Featured --}}
<div class="flex items-center gap-3 pt-8">

    <input
        type="checkbox"
        name="is_featured"
        value="1"
        id="is_featured"
        {{ old('is_featured') ? 'checked' : '' }}
        class="h-4 w-4 rounded border-gray-300 text-brand-500 focus:ring-brand-500"
    >

    <label
        for="is_featured"
        class="text-sm font-medium text-gray-700 dark:text-gray-300"
    >
        Featured Shoe
    </label>

</div>

        {{-- Image --}}
        <div class="md:col-span-2">
            <label class="mb-2 block">Image</label>

            <input
                type="file"
                name="image"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>

        {{-- Description --}}
        <div class="md:col-span-2">
            <label class="mb-2 block">Description</label>

            <textarea
                name="description"
                rows="4"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 dark:border-gray-700 dark:bg-gray-800 dark:text-white">{{ old('description') }}</textarea>
        </div>

    </div>

    <div class="mt-6 flex justify-end gap-3">

        <a
            href="{{ route('admin.shoes.index') }}"
            class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium dark:border-gray-700">
            Cancel
        </a>

        <button
            type="submit"
            class="rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-brand-600">
            Save Shoe
        </button>

    </div>

</form>

</x-common.component-card>

@endsection