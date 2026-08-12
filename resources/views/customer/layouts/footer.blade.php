<footer class="footer bg-[#212121]">

    {{-- BRAND DIRECTORY --}}
    <div class="brands flex flex-col justify-start items-start gap-4 px-6 py-8 md:px-8 md:py-10 lg:px-16 lg:py-12">

        <h3 class="text-red-400 font-semibold text-md lg:text-lg">
            BRAND DIRECTORY
        </h3>

        {{-- BRANDS --}}
        <div class="flex flex-wrap gap-2 mr-4 text-sm lg:text-md">

            <h4 class="font-semibold text-[darkgray]">
                BRANDS:
            </h4>

            @foreach($brands as $brand)
                <a
                    href="{{ route('customer.shop', ['brand' => $brand->slug]) }}"
                    class="text-gray-500 hover:text-white transition"
                >
                    {{ $brand->name }}@if(!$loop->last) | @endif
                </a>
            @endforeach

        </div>

        {{-- FOOTWEAR --}}
        <div class="flex flex-wrap gap-2 mr-4 text-sm lg:text-md">

            <h4 class="font-semibold text-[darkgray]">
                FOOTWEAR:
            </h4>

            <ul class="flex flex-col justify-start text-gray-500 gap-2">

                @foreach($categories->take(5) as $category)
                    <li>
                        <a
                            href="{{ route('customer.shop', ['category' => $category->slug]) }}"
                            class="hover:text-white transition"
                        >
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

        {{-- COLLECTIONS --}}
        <div class="flex flex-wrap gap-2 mr-4 text-sm lg:text-md">

            <h4 class="font-semibold text-[darkgray]">
                COLLECTIONS:
            </h4>

            <a
                href="{{ route('customer.shop', ['gender' => 'male']) }}"
                class="text-gray-500 hover:text-white transition"
            >
                Men Shoes |
            </a>

            <a
                href="{{ route('customer.shop', ['gender' => 'female']) }}"
                class="text-gray-500 hover:text-white transition"
            >
                Women Shoes
            </a>

        </div>

        {{-- FEATURES --}}
        <div class="flex flex-wrap gap-2 mr-4 text-sm lg:text-md">

            <h4 class="font-semibold text-[darkgray]">
                FEATURES:
            </h4>

            <span class="text-gray-500">Free Shipping |</span>
            <span class="text-gray-500">Secure Payment |</span>
            <span class="text-gray-500">Easy Returns |</span>
            <span class="text-gray-500">Original Products |</span>
            <span class="text-gray-500">Customer Support</span>

        </div>

    </div>


    <hr>


    {{-- FOOTER LINKS --}}
    <div class="px-6 py-8 md:px-8 md:py-10 lg:px-16 lg:py-12">

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">

            {{-- POPULAR CATEGORIES --}}
            <div>

                <h2 class="font-bold text-md text-white">
                    POPULAR CATEGORIES
                </h2>

                <hr class="title w-16 mb-4 mt-2">

                <ul class="flex flex-col justify-start text-gray-500 gap-2">

                    @forelse($categories->take(5) as $category)

                        <li>
                            <a
                                href="{{ route('customer.shop', ['category' => $category->slug]) }}"
                                class="hover:text-white transition"
                            >
                                {{ $category->name }}
                            </a>
                        </li>

                    @empty

                        <li>No categories available</li>

                    @endforelse

                </ul>

            </div>


            {{-- PRODUCTS --}}
            <div>

                <h2 class="font-bold text-md text-white">
                    PRODUCTS
                </h2>

                <hr class="title w-16 mb-4 mt-2">

                <ul class="flex flex-col justify-start text-gray-500 gap-2">

                    <li>
                        <a
                            href="{{ route('customer.shop', ['sort' => 'latest']) }}"
                            class="hover:text-white transition"
                        >
                            New Arrivals
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('customer.shop') }}"
                            class="hover:text-white transition"
                        >
                            Featured Shoes
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('customer.shop') }}"
                            class="hover:text-white transition"
                        >
                            Best Sellers
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('customer.shop', ['sort' => 'discount']) }}"
                            class="hover:text-white transition"
                        >
                            Discount Offers
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('customer.shop') }}"
                            class="hover:text-white transition"
                        >
                            All Shoes
                        </a>
                    </li>

                </ul>

            </div>


            {{-- OUR COMPANY --}}
            <div>

    <h2 class="font-bold text-md text-white">
        OUR COMPANY
    </h2>

    <hr class="title w-16 mb-4 mt-2">

    <ul class="flex flex-col justify-start text-gray-500 gap-2">

        <li>
            <a href="#" class="hover:text-white transition">
                About {{ $setting?->site_name ?? 'ShoeHub' }}
            </a>
        </li>

        <li>
            <a href="#" class="hover:text-white transition">
                Delivery Information
            </a>
        </li>

        <li>
            <a href="#" class="hover:text-white transition">
                Privacy Policy
            </a>
        </li>

        <li>
            <a href="#" class="hover:text-white transition">
                Terms & Conditions
            </a>
        </li>

        <li>
            <a href="#" class="hover:text-white transition">
                Secure Payment
            </a>
        </li>

    </ul>

</div>

            {{-- CUSTOMER SERVICE --}}
            <div>

                <h2 class="font-bold text-md text-white">
                    CUSTOMER SERVICE
                </h2>

                <hr class="title w-16 mb-4 mt-2">

                <ul class="flex flex-col justify-start text-gray-500 gap-2">

                  <a
    href="{{ route('customer.contact') }}"
    class="hover:text-white transition"
>
    Contact Us
</a>

                    <li>
                        <a
                            href="#"
                            class="hover:text-white transition"
                        >
                            My Account
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('customer.orders') }}"
                            class="hover:text-white transition"
                        >
                            Order Tracking
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('wishlist.index') }}"
                            class="hover:text-white transition"
                        >
                            Wishlist
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-white transition">
                            FAQs
                        </a>
                    </li>

                </ul>

            </div>


            {{-- CONTACT --}}
            <div>

                <h2 class="font-bold text-md text-white">
                    CONTACT
                </h2>

                <hr class="title w-16 mb-4 mt-2">

                <ul class="flex flex-col justify-start text-gray-500 gap-2">

                    @if($setting?->address)
                        <li class="flex items-start gap-2">

                            <ion-icon
                                class="text-lg shrink-0"
                                name="location-outline">
                            </ion-icon>

                            <span>
                                {{ $setting->address }}
                            </span>

                        </li>
                    @endif


                    @if($setting?->phone)
                        <li class="flex items-center gap-2">

                            <ion-icon
                                class="text-lg shrink-0"
                                name="call-outline">
                            </ion-icon>

                            <a
                                href="tel:{{ $setting->phone }}"
                                class="hover:text-white transition"
                            >
                                {{ $setting->phone }}
                            </a>

                        </li>
                    @endif


                    @if($setting?->email)
                        <li class="flex items-center gap-2">

                            <ion-icon
                                class="text-lg shrink-0"
                                name="mail-outline">
                            </ion-icon>

                            <a
                                href="mailto:{{ $setting->email }}"
                                class="hover:text-white transition"
                            >
                                {{ $setting->email }}
                            </a>

                        </li>
                    @endif

                </ul>

            </div>

        </div>


        {{-- FOOTER DESCRIPTION --}}
        @if($setting?->footer_description)

            <div class="mt-8 max-w-3xl">

                <p class="text-gray-500 text-sm leading-6">
                    {{ $setting->footer_description }}
                </p>

            </div>

        @endif

    </div>


    {{-- SOCIAL MEDIA --}}
    <div class="px-6 md:px-8 lg:px-16 pb-8">

        <h2 class="font-bold text-md text-white">
            FOLLOW US
        </h2>

        <hr class="title w-16 mb-4 mt-2">

        <ul class="flex justify-start text-gray-500 gap-4 text-lg">

            @if($setting?->facebook)
                <li>
                    <a
                        href="{{ $setting->facebook }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-white transition"
                    >
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
            @endif

            @if($setting?->instagram)
                <li>
                    <a
                        href="{{ $setting->instagram }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-white transition"
                    >
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
            @endif

            @if($setting?->linkedin)
                <li>
                    <a
                        href="{{ $setting->linkedin }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-white transition"
                    >
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>
            @endif

            @if($setting?->twitter)
                <li>
                    <a
                        href="{{ $setting->twitter }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-white transition"
                    >
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>
            @endif

            @if($setting?->youtube)
                <li>
                    <a
                        href="{{ $setting->youtube }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-white transition"
                    >
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>
            @endif

        </ul>

    </div>


    <hr>


    {{-- PAYMENT + COPYRIGHT --}}
    <div class="mx-auto flex items-center justify-center flex-col gap-4 py-10 pb-20 lg:pb-10">

        <img
            class="w-80"
            src="{{ asset('customer/assets/images/payment.png') }}"
            alt="Payment Methods"
        >

        <h4 class="text-gray-500 text-md lg:text-lg font-semibold text-center">

            @if($setting?->copyright)

                {{ str_replace('{year}', date('Y'), $setting->copyright) }}

            @else

                Copyright © {{ date('Y') }}
                {{ $setting?->site_name ?? 'ShoeHub' }}
                All Rights Reserved.

            @endif

        </h4>

        @if($setting?->developer_name)

            <p class="text-gray-600 text-sm text-center">

                Developed by
                {{ $setting->developer_name }}

                @if($setting->developer_title)
                    — {{ $setting->developer_title }}
                @endif

            </p>

        @endif

    </div>

</footer>