@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
        Website Settings
    </h1>

    <p class="text-gray-500 dark:text-gray-400">
        Manage your ShoeHub website information
    </p>
</div>

<div class="max-w-4xl">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 rounded-2xl bg-green-100 px-5 py-4 text-sm text-green-700 dark:bg-green-500/10 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf
        @method('PUT')

        {{-- Store Information --}}
        <div class="rounded-3xl border border-gray-200 bg-white p-8 dark:border-white/[0.05] dark:bg-white/[0.03]">

            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Store Information
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Basic information about your ShoeHub store.
                </p>
            </div>

            <div class="space-y-6">

                {{-- Site Name --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Site Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="site_name"
                        value="{{ old('site_name', $setting->site_name) }}"
                        placeholder="e.g. ShoeHub"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
                        required
                    >

                    @error('site_name')
                        <p class="mt-1.5 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Site Logo --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Site Logo
                    </label>

                    @if($setting->site_logo)
                        <div class="mb-4">
                            <img
                                src="{{ asset('storage/' . $setting->site_logo) }}"
                                alt="Site Logo"
                                class="h-20 w-auto rounded-xl border border-gray-200 p-2 dark:border-white/[0.1]"
                            >
                        </div>
                    @endif

                    <input
                        type="file"
                        name="site_logo"
                        accept="image/*"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05]"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        JPG, JPEG, PNG or WEBP. Maximum 2MB.
                    </p>

                    @error('site_logo')
                        <p class="mt-1.5 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Footer Description --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Footer Description
                    </label>

                    <textarea
                        name="footer_description"
                        rows="4"
                        placeholder="Write a short description about ShoeHub..."
                        class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
                    >{{ old('footer_description', $setting->footer_description) }}</textarea>

                    @error('footer_description')
                        <p class="mt-1.5 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>
        </div>


{{-- Contact Information --}}
<div class="rounded-3xl border border-gray-200 bg-white p-8 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
            Contact Information
        </h2>

        <p class="text-sm text-gray-500 dark:text-gray-400">
            Contact details displayed on the customer website.
        </p>
    </div>

    <div class="space-y-6">

        {{-- Address --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Address
            </label>

            <input
                type="text"
                name="address"
                value="{{ old('address', $setting->address) }}"
                placeholder="e.g. ShoeHub Main Branch, Pakistan"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('address')
                <p class="mt-1.5 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Phone --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Phone Number
            </label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone', $setting->phone) }}"
                placeholder="e.g. +92 300 0000000"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('phone')
                <p class="mt-1.5 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Email --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $setting->email) }}"
                placeholder="e.g. support@shoehub.com"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('email')
                <p class="mt-1.5 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>
</div>

{{-- Social Media --}}
<div class="rounded-3xl border border-gray-200 bg-white p-8 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
            Social Media
        </h2>

        <p class="text-sm text-gray-500 dark:text-gray-400">
            Add your social media profiles. These links will appear in the customer footer.
        </p>
    </div>

    <div class="space-y-6">

        {{-- Facebook --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Facebook
            </label>

            <input
                type="url"
                name="facebook"
                value="{{ old('facebook', $setting->facebook) }}"
                placeholder="https://facebook.com/yourpage"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('facebook')
                <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>


        {{-- Instagram --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Instagram
            </label>

            <input
                type="url"
                name="instagram"
                value="{{ old('instagram', $setting->instagram) }}"
                placeholder="https://instagram.com/yourpage"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('instagram')
                <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>


        {{-- LinkedIn --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                LinkedIn
            </label>

            <input
                type="url"
                name="linkedin"
                value="{{ old('linkedin', $setting->linkedin) }}"
                placeholder="https://linkedin.com/company/yourpage"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('linkedin')
                <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>


        {{-- X / Twitter --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                X / Twitter
            </label>

            <input
                type="url"
                name="twitter"
                value="{{ old('twitter', $setting->twitter) }}"
                placeholder="https://x.com/yourpage"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('twitter')
                <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>


        {{-- YouTube --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                YouTube
            </label>

            <input
                type="url"
                name="youtube"
                value="{{ old('youtube', $setting->youtube) }}"
                placeholder="https://youtube.com/@yourchannel"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >

            @error('youtube')
                <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

    </div>
</div>

{{-- Developer Information --}}
<div class="rounded-3xl border border-gray-200 bg-white p-8 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
            Developer Information
        </h2>

        <p class="text-sm text-gray-500 dark:text-gray-400">
            Information about the developer displayed in the customer footer.
        </p>
    </div>

    <div class="space-y-6">

        {{-- Developer Name --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Developer Name
            </label>

            <input
                type="text"
                name="developer_name"
                value="{{ old('developer_name', $setting->developer_name) }}"
                placeholder="e.g. Luqman Ahmad"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >
        </div>


        {{-- Developer Title --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Developer Title
            </label>

            <input
                type="text"
                name="developer_title"
                value="{{ old('developer_title', $setting->developer_title) }}"
                placeholder="e.g. Full Stack Laravel Developer"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >
        </div>


        {{-- Developer Email --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Developer Email
            </label>

            <input
                type="email"
                name="developer_email"
                value="{{ old('developer_email', $setting->developer_email) }}"
                placeholder="e.g. your@email.com"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >
        </div>


        {{-- GitHub --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                GitHub
            </label>

            <input
                type="url"
                name="developer_github"
                value="{{ old('developer_github', $setting->developer_github) }}"
                placeholder="https://github.com/username"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >
        </div>


        {{-- LinkedIn --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                LinkedIn
            </label>

            <input
                type="url"
                name="developer_linkedin"
                value="{{ old('developer_linkedin', $setting->developer_linkedin) }}"
                placeholder="https://linkedin.com/in/username"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >
        </div>


        {{-- Portfolio --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Portfolio
            </label>

            <input
                type="url"
                name="developer_portfolio"
                value="{{ old('developer_portfolio', $setting->developer_portfolio) }}"
                placeholder="https://yourportfolio.com"
                class="w-full rounded-2xl border border-gray-300 px-5 py-3.5 focus:border-blue-500 focus:ring-0 dark:border-white/[0.1] dark:bg-white/[0.05] dark:text-white"
            >
        </div>

    </div>
</div>

        {{-- Buttons --}}
        <div class="flex gap-4 border-t pt-6 dark:border-white/[0.1]">

            <a
                href="{{ url()->previous() }}"
                class="rounded-2xl border border-gray-300 px-7 py-3.5 text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-2xl bg-blue-600 px-8 py-3.5 font-medium text-white transition hover:bg-blue-700"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection