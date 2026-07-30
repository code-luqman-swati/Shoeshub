@extends('layouts.fullscreen-layout')

@section('content')

@if(session('error'))

<div class="mb-4 rounded-lg bg-red-100 p-4 text-red-700">
    {{ session('error') }}
</div>

@endif
<div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
    <div class="relative flex h-screen w-full flex-col justify-center lg:flex-row dark:bg-gray-900">

    <!-- Left Side -->
    <div class="flex w-full flex-1 flex-col">
        <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">

            <div class="mb-5 sm:mb-8">
                <h1 class="mb-2 text-3xl font-semibold text-gray-800 dark:text-white">
                    Customer Login
                </h1>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Enter your email and password to sign in.
                </p>
            </div>

            @if($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 p-3 text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('customer.login.check') }}">
                @csrf

                <div class="space-y-5">

                    <!-- Email -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autofocus
                            class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                        >
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Password
                        </label>

                        <div x-data="{ showPassword: false }" class="relative">

                            <input
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                placeholder="Enter your password"
                                required
                                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-11 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >

                            <span
                                @click="showPassword = !showPassword"
                                class="absolute top-1/2 right-4 -translate-y-1/2 cursor-pointer text-gray-500">

                                <svg x-show="!showPassword" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 4C5 4 2 10 2 10s3 6 8 6 8-6 8-6-3-6-8-6zm0 9a3 3 0 100-6 3 3 0 000 6z"/>
                                </svg>

                                <svg x-show="showPassword" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 3l14 14M8.7 8.7A3 3 0 0010 13a3 3 0 002.3-1.1M17 10s-3 6-8 6a8.6 8.6 0 01-3.7-.8M6 6.2A8.8 8.8 0 0110 4c5 0 8 6 8 6a15 15 0 01-2.4 3.2"/>
                                </svg>

                            </span>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            class="h-4 w-4 rounded border-gray-300 text-brand-500"
                        >

                        <label for="remember" class="ml-2 text-sm text-gray-700 dark:text-gray-400">
                            Keep me logged in
                        </label>
                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="bg-brand-500 hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                        Sign In
                    </button>

                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?

                    <a
                        href="{{ route('customer.register') }}"
                        class="text-brand-500 hover:underline">
                        Create Account
                    </a>
                </p>
            </div>

        </div>
    </div>

    <!-- Right Side -->
    <div class="bg-brand-950 relative hidden h-full w-full items-center justify-center lg:flex lg:w-1/2 dark:bg-white/5">
        <div class="text-center">
            <h2 class="mb-4 text-4xl font-bold text-white">
                Welcome to ShoeHub
            </h2>

            <p class="max-w-sm text-gray-300">
                Sign in to your account and browse our latest shoes, manage your profile, and track your orders.
            </p>
        </div>
    </div>

</div>

</div>

@endsection
