@extends('layouts.app')

@section('content')

<div class="mx-auto max-w-3xl">

    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="mb-6 text-xl font-semibold text-gray-800">
            Edit Profile
        </h2>


        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-100 p-3 text-green-700">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')


            <!-- Name -->
            <div class="mb-5">
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Name
                </label>

                <input 
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >

                @error('name')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>



            <!-- Email -->
            <div class="mb-5">
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Email
                </label>

                <input 
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >

                @error('email')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>



            <!-- Phone -->
            <div class="mb-5">
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Phone
                </label>

                <input 
                    type="text"
                    name="phone"
                    value="{{ old('phone', $user->phone) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >

                @error('phone')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>



            <!-- Password -->
            <!-- Current Password -->
<div class="mb-5">
    <label class="mb-2 block text-sm font-medium text-gray-700">
        Current Password
    </label>

    <input 
        type="password"
        name="current_password"
        class="w-full rounded-lg border border-gray-300 px-4 py-2"
        placeholder="Enter your current password"
    >

    @error('current_password')
        <p class="mt-1 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>



<!-- New Password -->
<div class="mb-5">
    <label class="mb-2 block text-sm font-medium text-gray-700">
        New Password
    </label>

    <input 
        type="password"
        name="password"
        class="w-full rounded-lg border border-gray-300 px-4 py-2"
        placeholder="Enter new password"
    >

    @error('password')
        <p class="mt-1 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>



<!-- Confirm Password -->
<div class="mb-5">
    <label class="mb-2 block text-sm font-medium text-gray-700">
        Confirm New Password
    </label>

    <input 
        type="password"
        name="password_confirmation"
        class="w-full rounded-lg border border-gray-300 px-4 py-2"
        placeholder="Confirm new password"
    >
</div>



            <!-- Buttons -->
            <div class="flex justify-end gap-3">

                <a href="{{ route('dashboard') }}"
                   class="rounded-lg border px-5 py-2 text-gray-600">
                    Cancel
                </a>


                <button 
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-2 text-white">
                    Update Profile
                </button>

            </div>


        </form>

    </div>

</div>

@endsection