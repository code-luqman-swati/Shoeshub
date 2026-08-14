<footer class="footer bg-[#171717] text-gray-400">

    {{-- ================= BRAND DIRECTORY STRIP ================= --}}
    @if($brands->count() || $categories->count())
        <div class="border-b border-white/10 px-6 py-8 md:px-8 md:py-9 lg:px-16 lg:py-10">
            <div class="max-w-7xl mx-auto flex flex-col gap-4">

                <h3 class="font-display text-red-400 font-semibold text-sm tracking-widest">
                    BRAND DIRECTORY
                </h3>

                {{-- BRANDS --}}
                @if($brands->count())
                    <div class="flex flex-wrap items-center gap-x-2 gap-y-2 text-sm">
                        <span class="font-semibold text-gray-500 mr-1">BRANDS:</span>

                        @foreach($brands as $brand)
                            <a
                                href="{{ route('customer.shop', ['brand' => $brand->slug]) }}"
                                class="text-gray-500 hover:text-white transition-colors"
                            >
                                {{ $brand->name }}
                            </a>
                            @if(!$loop->last)
                                <span class="text-gray-700" aria-hidden="true">&bull;</span>
                            @endif
                        @endforeach
                    </div>
                @endif

                {{-- FOOTWEAR --}}
                @if($categories->count())
                    <div class="flex flex-wrap items-center gap-x-2 gap-y-2 text-sm">
                        <span class="font-semibold text-gray-500 mr-1">FOOTWEAR:</span>

                        @foreach($categories->take(5) as $category)
                            <a
                                href="{{ route('customer.shop', ['category' => $category->slug]) }}"
                                class="text-gray-500 hover:text-white transition-colors"
                            >
                                {{ $category->name }}
                            </a>
                            @if(!$loop->last)
                                <span class="text-gray-700" aria-hidden="true">&bull;</span>
                            @endif
                        @endforeach
                    </div>
                @endif

                {{-- COLLECTIONS --}}
                <div class="flex flex-wrap items-center gap-x-2 gap-y-2 text-sm">
                    <span class="font-semibold text-gray-500 mr-1">COLLECTIONS:</span>

                    <a href="{{ route('customer.shop', ['gender' => 'male']) }}" class="text-gray-500 hover:text-white transition-colors">
                        Men Shoes
                    </a>
                    <span class="text-gray-700" aria-hidden="true">&bull;</span>
                    <a href="{{ route('customer.shop', ['gender' => 'female']) }}" class="text-gray-500 hover:text-white transition-colors">
                        Women Shoes
                    </a>
                </div>

                {{-- FEATURES --}}
                <div class="flex flex-wrap items-center gap-x-2 gap-y-2 text-sm">
                    <span class="font-semibold text-gray-500 mr-1">FEATURES:</span>

                    @php
                        $features = ['Free Shipping', 'Secure Payment', 'Easy Returns', 'Original Products', 'Customer Support'];
                    @endphp

                    @foreach($features as $feature)
                        <span class="text-gray-500">{{ $feature }}</span>
                        @if(!$loop->last)
                            <span class="text-gray-700" aria-hidden="true">&bull;</span>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    @endif


    {{-- ================= FOOTER LINK COLUMNS ================= --}}
    <div class="px-6 py-10 md:px-8 md:py-12 lg:px-16 lg:py-14">
        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8 lg:gap-6">

                {{-- POPULAR CATEGORIES --}}
                <div>
                    <h3 class="font-display font-bold text-sm tracking-wide text-white">POPULAR CATEGORIES</h3>
                    <span class="block w-10 h-0.5 bg-red-400 rounded-full mt-3 mb-4"></span>

                    <ul class="flex flex-col gap-2.5 text-sm text-gray-500">
                        @forelse($categories->take(5) as $category)
                            <li>
                                <a href="{{ route('customer.shop', ['category' => $category->slug]) }}" class="hover:text-white transition-colors">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @empty
                            <li class="text-gray-600">No categories available</li>
                        @endforelse
                    </ul>
                </div>

                {{-- PRODUCTS --}}
                <div>
                    <h3 class="font-display font-bold text-sm tracking-wide text-white">PRODUCTS</h3>
                    <span class="block w-10 h-0.5 bg-red-400 rounded-full mt-3 mb-4"></span>

                    <ul class="flex flex-col gap-2.5 text-sm text-gray-500">
                        <li><a href="{{ route('customer.shop', ['sort' => 'latest']) }}" class="hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="{{ route('customer.shop') }}" class="hover:text-white transition-colors">Featured Shoes</a></li>
                        <li><a href="{{ route('customer.shop') }}" class="hover:text-white transition-colors">Best Sellers</a></li>
                        <li><a href="{{ route('customer.shop', ['sort' => 'discount']) }}" class="hover:text-white transition-colors">Discount Offers</a></li>
                        <li><a href="{{ route('customer.shop') }}" class="hover:text-white transition-colors">All Shoes</a></li>
                    </ul>
                </div>

                {{-- OUR COMPANY --}}
                <div>
                    <h3 class="font-display font-bold text-sm tracking-wide text-white">OUR COMPANY</h3>
                    <span class="block w-10 h-0.5 bg-red-400 rounded-full mt-3 mb-4"></span>

                    <ul class="flex flex-col gap-2.5 text-sm text-gray-500">
                        <li><a href="#" class="hover:text-white transition-colors">About {{ $setting?->site_name ?? 'ShoeHub' }}</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Delivery Information</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Terms &amp; Conditions</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Secure Payment</a></li>
                    </ul>
                </div>

                {{-- CUSTOMER SERVICE --}}
                <div>
                    <h3 class="font-display font-bold text-sm tracking-wide text-white">CUSTOMER SERVICE</h3>
                    <span class="block w-10 h-0.5 bg-red-400 rounded-full mt-3 mb-4"></span>

                    <ul class="flex flex-col gap-2.5 text-sm text-gray-500">
                        <li><a href="{{ route('customer.contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">My Account</a></li>
                        <li><a href="{{ route('customer.orders') }}" class="hover:text-white transition-colors">Order Tracking</a></li>
                        <li><a href="{{ route('wishlist.index') }}" class="hover:text-white transition-colors">Wishlist</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQs</a></li>
                    </ul>
                </div>

                {{-- CONTACT --}}
                <div class="col-span-2 sm:col-span-1">
                    <h3 class="font-display font-bold text-sm tracking-wide text-white">CONTACT</h3>
                    <span class="block w-10 h-0.5 bg-red-400 rounded-full mt-3 mb-4"></span>

                    <ul class="flex flex-col gap-3 text-sm text-gray-500">

                        @if($setting?->address)
                            <li class="flex items-start gap-2.5">
                                <span class="mt-0.5 w-6 h-6 shrink-0 rounded-full bg-white/5 flex items-center justify-center text-red-400">
                                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
                                </span>
                                <span class="leading-relaxed">{{ $setting->address }}</span>
                            </li>
                        @endif

                        @if($setting?->phone)
                            <li class="flex items-center gap-2.5">
                                <span class="w-6 h-6 shrink-0 rounded-full bg-white/5 flex items-center justify-center text-red-400">
                                    <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
                                </span>
                                <a href="tel:{{ $setting->phone }}" class="hover:text-white transition-colors">{{ $setting->phone }}</a>
                            </li>
                        @endif

                        @if($setting?->email)
                            <li class="flex items-center gap-2.5">
                                <span class="w-6 h-6 shrink-0 rounded-full bg-white/5 flex items-center justify-center text-red-400">
                                    <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                                </span>
                                <a href="mailto:{{ $setting->email }}" class="hover:text-white transition-colors">{{ $setting->email }}</a>
                            </li>
                        @endif

                        @if(!$setting?->address && !$setting?->phone && !$setting?->email)
                            <li class="text-gray-600">Contact details coming soon</li>
                        @endif

                    </ul>
                </div>

            </div>

            {{-- FOOTER DESCRIPTION --}}
            @if($setting?->footer_description)
                <div class="mt-10 pt-8 border-t border-white/10 max-w-3xl">
                    <p class="text-gray-500 text-sm leading-6">
                        {{ $setting->footer_description }}
                    </p>
                </div>
            @endif

        </div>
    </div>


    {{-- ================= SOCIAL MEDIA ================= --}}
    @if($setting?->facebook || $setting?->instagram || $setting?->linkedin || $setting?->twitter || $setting?->youtube)
        <div class="px-6 md:px-8 lg:px-16 pb-10">
            <div class="max-w-7xl mx-auto">

                <h3 class="font-display font-bold text-sm tracking-wide text-white">FOLLOW US</h3>
                <span class="block w-10 h-0.5 bg-red-400 rounded-full mt-3 mb-4"></span>

                <ul class="flex items-center gap-3 text-lg">

                    @if($setting?->facebook)
                        <li>
                            <a href="{{ $setting->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Facebook"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 text-gray-400 hover:bg-red-400 hover:text-white hover:-translate-y-0.5 transition-all">
                                <ion-icon name="logo-facebook" aria-hidden="true"></ion-icon>
                            </a>
                        </li>
                    @endif

                    @if($setting?->instagram)
                        <li>
                            <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Instagram"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 text-gray-400 hover:bg-red-400 hover:text-white hover:-translate-y-0.5 transition-all">
                                <ion-icon name="logo-instagram" aria-hidden="true"></ion-icon>
                            </a>
                        </li>
                    @endif

                    @if($setting?->linkedin)
                        <li>
                            <a href="{{ $setting->linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on LinkedIn"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 text-gray-400 hover:bg-red-400 hover:text-white hover:-translate-y-0.5 transition-all">
                                <ion-icon name="logo-linkedin" aria-hidden="true"></ion-icon>
                            </a>
                        </li>
                    @endif

                    @if($setting?->twitter)
                        <li>
                            <a href="{{ $setting->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Twitter"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 text-gray-400 hover:bg-red-400 hover:text-white hover:-translate-y-0.5 transition-all">
                                <ion-icon name="logo-twitter" aria-hidden="true"></ion-icon>
                            </a>
                        </li>
                    @endif

                    @if($setting?->youtube)
                        <li>
                            <a href="{{ $setting->youtube }}" target="_blank" rel="noopener noreferrer" aria-label="Subscribe on YouTube"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 text-gray-400 hover:bg-red-400 hover:text-white hover:-translate-y-0.5 transition-all">
                                <ion-icon name="logo-youtube" aria-hidden="true"></ion-icon>
                            </a>
                        </li>
                    @endif

                </ul>

            </div>
        </div>
    @endif


    {{-- ================= PAYMENT + COPYRIGHT ================= --}}
    <div class="border-t border-white/10 px-6">
        <div class="max-w-7xl mx-auto flex flex-col items-center justify-center gap-5 py-10 pb-24 lg:pb-10 text-center">

            <img
                class="w-full max-w-[18rem] md:max-w-[20rem] h-auto opacity-90"
                src="{{ asset('customer/assets/images/payment.png') }}"
                alt="Accepted payment methods"
            >

            <p class="text-gray-500 text-sm md:text-base font-semibold">
                @if($setting?->copyright)
                    {{ str_replace('{year}', date('Y'), $setting->copyright) }}
                @else
                    Copyright &copy; {{ date('Y') }} {{ $setting?->site_name ?? 'ShoeHub' }}. All Rights Reserved.
                @endif
            </p>

            @if($setting?->developer_name)
                <p class="text-gray-600 text-xs md:text-sm">
                    Developed by {{ $setting->developer_name }}
                    @if($setting->developer_title)
                        &mdash; {{ $setting->developer_title }}
                    @endif
                </p>
            @endif

            <a
                href="#top"
                class="mt-2 inline-flex items-center gap-1.5 text-xs font-semibold text-gray-500 hover:text-white transition-colors"
            >
                <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
                Back to top
            </a>

        </div>
    </div>

</footer>