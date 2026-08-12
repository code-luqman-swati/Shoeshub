@extends('customer.layouts.index')

@section('content')

<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">

    {{-- Header --}}
    <div class="bg-[#212121] py-12 px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white">
            Contact Us
        </h1>

        <p class="mt-3 text-gray-400">
            We are here to help you with any questions or concerns.
        </p>
    </div>

    {{-- Contact Section --}}
    <div class="mx-auto max-w-7xl px-6 py-12 lg:px-16">

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">

            {{-- Address --}}
            @if($setting?->address)
                <div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">

                    <ion-icon
                        name="location-outline"
                        class="text-3xl text-red-400">
                    </ion-icon>

                    <h2 class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">
                        Our Address
                    </h2>

                    <p class="mt-2 text-gray-500">
                        {{ $setting->address }}
                    </p>

                </div>
            @endif

            {{-- Phone --}}
            @if($setting?->phone)
                <div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">

                    <ion-icon
                        name="call-outline"
                        class="text-3xl text-red-400">
                    </ion-icon>

                    <h2 class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">
                        Phone
                    </h2>

                    <a
                        href="tel:{{ $setting->phone }}"
                        class="mt-2 block text-gray-500 hover:text-red-400 transition"
                    >
                        {{ $setting->phone }}
                    </a>

                </div>
            @endif

            {{-- Email --}}
            @if($setting?->email)
                <div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">

                    <ion-icon
                        name="mail-outline"
                        class="text-3xl text-red-400">
                    </ion-icon>

                    <h2 class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">
                        Email
                    </h2>

                    <a
                        href="mailto:{{ $setting->email }}"
                        class="mt-2 block text-gray-500 hover:text-red-400 transition"
                    >
                        {{ $setting->email }}
                    </a>

                </div>
            @endif

        </div>

        {{-- Contact Information --}}
        <div class="mt-12 rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">

            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Get In Touch
            </h2>

            <p class="mt-3 max-w-2xl text-gray-500">
                Have a question about our products, orders, delivery, or returns?
                Feel free to contact us using the information provided above.
                Our customer support team will be happy to assist you.
            </p>

            @if($setting?->site_name)
                <p class="mt-6 font-semibold text-gray-700 dark:text-gray-300">
                    {{ $setting->site_name }}
                </p>
            @endif

        </div>

    </div>

</div>

@endsection