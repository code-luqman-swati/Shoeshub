@extends('layouts.app')


@section('content')


    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Create New Category</h1>
            <p class="text-gray-500 dark:text-gray-400">Add a new shoe category</p>
        </div>
    </div>

    <div class="max-w-2xl">
        <div class="rounded-3xl border border-gray-200 bg-white p-8 dark:border-white/[0.05] dark:bg-white/[0.03]">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Category Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" 
                           class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
                           placeholder="e.g. Running Shoes, Formal Shoes" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
                        placeholder="Short description about this category...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05]">
                    @error('image')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="status" id="status" value="1" checked 
                           class="w-5 h-5 accent-blue-600 rounded">
                    <label for="status" class="text-sm font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                        Active (Show on website)
                    </label>
                </div>

                <div class="flex gap-4 pt-6 border-t">
                    <a href="{{ route('admin.categories.index') }}" 
                       class="px-7 py-3.5 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition dark:border-gray-700 dark:text-gray-300">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-8 py-3.5 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition font-medium">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection