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

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-5 rounded-lg border border-red-300 bg-red-50 p-4 dark:border-red-700 dark:bg-red-900/20">

            <h3 class="mb-2 font-semibold text-red-700 dark:text-red-400">
                Please fix the following errors:
            </h3>

            <ul class="list-disc space-y-1 pl-5 text-sm text-red-600 dark:text-red-400">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif


    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

        {{-- Category --}}
        <div>
            <label class="mb-2 block">
                Category
            </label>

            <select
                name="category_id"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

                <option value="">
                    Select Category
                </option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>
                @endforeach

            </select>

            @error('category_id')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Brand --}}
        <div>
            <label class="mb-2 block">
                Brand
            </label>

            <select
                name="brand_id"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

                <option value="">
                    Select Brand
                </option>

                @foreach($brands as $brand)
                    <option
                        value="{{ $brand->id }}"
                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}>

                        {{ $brand->name }}

                    </option>
                @endforeach

            </select>

            @error('brand_id')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Shoe Name --}}
        <div>
            <label class="mb-2 block">
                Shoe Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter shoe name"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

            @error('name')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- SKU --}}
        <div>
            <label class="mb-2 block">
                SKU
            </label>

            <input
                type="text"
                name="sku"
                value="{{ old('sku') }}"
                placeholder="Enter SKU"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

            @error('sku')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Price --}}
        <div>
            <label class="mb-2 block">
                Price
            </label>

            <input
                type="number"
                name="price"
                value="{{ old('price') }}"
                placeholder="Enter price"
                step="0.01"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

            @error('price')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Discount Price --}}
        <div>
            <label class="mb-2 block">
                Sale Price
            </label>

            <input
                type="number"
                name="discount_price"
                value="{{ old('discount_price') }}"
                placeholder="Enter discount price"
                step="0.01"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

            @error('discount_price')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Gender --}}
        <div>
            <label class="mb-2 block">
                Gender
            </label>

            <select
                name="gender"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

                <option value="">
                    Select Gender
                </option>

                <option
                    value="male"
                    {{ old('gender') === 'male' ? 'selected' : '' }}>
                    Male
                </option>

                <option
                    value="female"
                    {{ old('gender') === 'female' ? 'selected' : '' }}>
                    Female
                </option>

                <option
                    value="unisex"
                    {{ old('gender') === 'unisex' ? 'selected' : '' }}>
                    Unisex
                </option>

                <option
                    value="kids"
                    {{ old('gender') === 'kids' ? 'selected' : '' }}>
                    Kids
                </option>

            </select>

            @error('gender')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Status --}}
        <div>
            <label class="mb-2 block">
                Status
            </label>

            <select
                name="status"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

                <option
                    value="1"
                    {{ old('status', 1) == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option
                    value="0"
                    {{ old('status') === '0' ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

            @error('status')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
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
                class="text-sm font-medium text-gray-700 dark:text-gray-300">

                Featured Shoe

            </label>

        </div>


        {{-- Image --}}
        <div class="md:col-span-2">

            <label class="mb-2 block">
                Image
            </label>

            <input
                type="file"
                name="image"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

            @error('image')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Description --}}
        <div class="md:col-span-2">

            <label class="mb-2 block">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 dark:border-gray-700 dark:bg-gray-800 dark:text-white">{{ old('description') }}</textarea>

            @error('description')
                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- Buttons --}}
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