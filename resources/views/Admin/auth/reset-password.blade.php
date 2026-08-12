@extends('layouts.fullscreen-layout')

@section('content')
<div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
    <div class="relative flex min-h-screen items-center justify-center dark:bg-gray-900">

        <div class="w-full max-w-md rounded-xl bg-white p-8 shadow-theme-lg dark:bg-gray-800">

            <h1 class="mb-2 text-title-md font-semibold text-gray-800 dark:text-white">
                Reset Password
            </h1>

            <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">
                Enter your new password below.
            </p>

           <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ request()->email }}">

                {{-- New Password --}}
                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        New Password
                    </label>

                    <div x-data="{ showPassword:false }" class="relative">

                        <input
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            placeholder="Enter new password"
                            class="h-11 w-full rounded-lg border border-gray-300 px-4 pr-11 dark:border-gray-700 dark:bg-gray-900 dark:text-white">

                        <span
                            @click="showPassword=!showPassword"
                            class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer">

                            <svg x-show="!showPassword" width="20" height="20" fill="currentColor">
                                <path d="M10 4C5 4 2 10 2 10s3 6 8 6 8-6 8-6-3-6-8-6zm0 10a4 4 0 110-8 4 4 0 010 8z"/>
                            </svg>

                            <svg x-show="showPassword" width="20" height="20" fill="currentColor">
                                <path d="M2 3l15 15"/>
                            </svg>

                        </span>

                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-6">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Confirm Password
                    </label>

                    <div x-data="{ showConfirm:false }" class="relative">

                        <input
                            :type="showConfirm ? 'text' : 'password'"
                            name="password_confirmation"
                            required
                            placeholder="Confirm password"
                            class="h-11 w-full rounded-lg border border-gray-300 px-4 pr-11 dark:border-gray-700 dark:bg-gray-900 dark:text-white">

                        <span
                            @click="showConfirm=!showConfirm"
                            class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer">

                            <svg x-show="!showConfirm" width="20" height="20" fill="currentColor">
                                <path d="M10 4C5 4 2 10 2 10s3 6 8 6 8-6 8-6-3-6-8-6zm0 10a4 4 0 110-8 4 4 0 010 8z"/>
                            </svg>

                            <svg x-show="showConfirm" width="20" height="20" fill="currentColor">
                                <path d="M2 3l15 15"/>
                            </svg>

                        </span>

                    </div>

                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="bg-brand-500 hover:bg-brand-600 w-full rounded-lg px-4 py-3 font-medium text-white transition">
                    Reset Password
                </button>

            </form>

        </div>

    </div>
</div>
@endsection