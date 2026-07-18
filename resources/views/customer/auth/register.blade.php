@extends('layouts.fullscreen-layout')

@section('content')

<div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
    <div class="flex h-screen w-full flex-col justify-center lg:flex-row">

        <!-- Left Side -->
        <div class="flex w-full flex-1 flex-col lg:w-1/2">
            <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">

                <div class="mb-8">
                    <h1 class="mb-2 text-3xl font-semibold text-gray-800 dark:text-white">
                        Create Customer Account
                    </h1>

                    <p class="text-gray-500 dark:text-gray-400">
                        Enter your details to create your account.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-lg bg-red-100 p-4 text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('customer.register.store') }}" method="POST">
                    @csrf

                    <div class="space-y-5">

                        <!-- Name -->
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your name"
                                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="03xxxxxxxxx"
                                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                placeholder="Enter your password"
                                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Button -->
                        <div>
                            <button
                                type="submit"
                                class="bg-brand-500 hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                Create Account
                            </button>
                        </div>

                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?

                        <a href="{{ route('customer.login') }}"
                           class="text-brand-500 hover:underline">
                            Sign In
                        </a>
                    </p>
                </div>

            </div>
        </div>

        <!-- Right Side -->
        <div class="bg-brand-950 relative hidden h-full w-full items-center justify-center lg:flex lg:w-1/2 dark:bg-white/5">
            <div class="text-center">
                <h2 class="mb-3 text-4xl font-bold text-white">
                    ShoeHub
                </h2>

                <p class="text-gray-300">
                    Create your account and start shopping with us.
                </p>
            </div>
        </div>

    </div>
</div>

@endsection