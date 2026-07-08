@extends('layouts.fullscreen-layout')

@section('content')
<div class="relative z-1 bg-white p-6 dark:bg-gray-900">
    <div class="flex min-h-screen items-center justify-center">

        <div class="w-full max-w-md rounded-lg bg-white p-8 shadow dark:bg-gray-800">

            <h1 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white">
                Forgot Password
            </h1>

            <p class="mb-6 text-sm text-gray-500">
                Enter your email address and we'll send you a password reset link.
            </p>

            @if (session('status'))
                <div class="mb-4 rounded-lg bg-green-100 p-3 text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3">

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-brand-500 px-4 py-3 text-white">
                    Send Password Reset Link
                </button>

            </form>

        </div>

    </div>
</div>
@endsection