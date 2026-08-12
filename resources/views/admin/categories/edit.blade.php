@extends('layouts.app')


@section('content')


    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Edit Category</h1>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data"
              class="space-y-6 rounded-3xl border border-gray-200 bg-white p-8 dark:border-white/[0.05] dark:bg-white/[0.03]">
            
            @csrf
            @method('PUT')

            <!-- Category Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category Name</label>
                <input type="text" name="name" 
                       class="w-full rounded-2xl border border-gray-300 px-5 py-3 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
                       value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="4"
                    class="w-full rounded-2xl border border-gray-300 px-5 py-3 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image -->
            @if($category->image)
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Image</label>
                <img src="{{ Storage::url($category->image) }}" 
                     alt="{{ $category->name }}" 
                     class="w-32 h-32 object-cover rounded-2xl border border-gray-200">
            </div>
            @endif

            <!-- New Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Image (Optional)</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full rounded-2xl border border-gray-300 px-5 py-3 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05]">
                @error('image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3">
                <input type="checkbox" name="status" id="status" value="1" 
                       {{ old('status', $category->status) ? 'checked' : '' }} 
                       class="w-5 h-5 accent-blue-600">
                <label for="status" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Active (Visible on website)
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-6">
                <a href="{{ route('admin.categories.index') }}" 
                   class="px-6 py-3 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300">
                    Cancel
                </a>
                <button type="submit"
                        class="px-8 py-3 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition font-medium">
                    Update Category
                </button>
            </div>
        </form>
    </div>


@endsection