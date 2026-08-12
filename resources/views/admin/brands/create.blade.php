@extends('layouts.app')

@section('content')

<x-common.component-card
    title="Add Brand"
    subtitle="Add a new brand to the system."
>

<form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mx-auto max-w-4xl">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900 lg:p-8">

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Brand Information
                </h3>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Fill in the brand details below.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">

                <!-- Brand Name -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Brand Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter brand name"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >

                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Status
                    </label>

                    <select
                        name="status"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Brand Logo -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Brand Logo
                    </label>

                    <input
                        type="file"
                        name="logo"
                        accept="image/*"
                        class="block w-full rounded-lg border border-gray-300 p-3 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        Allowed formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                    </p>

                    @error('logo')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-3">

                <a
                    href="{{ route('admin.brands.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium dark:border-gray-700"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-brand-600"
                >
                    Save Brand
                </button>

            </div>

        </div>
    </div>

</form>

</x-common.component-card>

@endsection