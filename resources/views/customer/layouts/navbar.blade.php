<header class="header w-full sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-sm">

    <!-- ================= TOP BAR ================= -->
    <div class="hidden lg:flex items-center justify-between px-4 md:px-20 py-2 border-b bg-gray-50/60 text-xs text-gray-500">
        <div class="flex items-center gap-3">
            <a href="#" class="w-7 h-7 flex items-center justify-center rounded-full bg-white border hover:bg-red-400 hover:text-white hover:border-red-400 transition-all">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="#" class="w-7 h-7 flex items-center justify-center rounded-full bg-white border hover:bg-red-400 hover:text-white hover:border-red-400 transition-all">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a>
            <a href="#" class="w-7 h-7 flex items-center justify-center rounded-full bg-white border hover:bg-red-400 hover:text-white hover:border-red-400 transition-all">
                <ion-icon name="logo-github"></ion-icon>
            </a>
        </div>

        <p class="font-semibold tracking-wide text-gray-400">
            FREE SHIPPING ON ORDERS OVER <span class="text-red-400">Rs. 5000</span>
        </p>

        <div class="flex items-center gap-2">
            <select id="currency" class="bg-transparent border-none text-xs font-semibold text-gray-500 focus:outline-none cursor-pointer">
                <option value="PKR">PKR Rs</option>
                <option value="USD">USD $</option>
            </select>
            <span class="text-gray-300">|</span>
            <select id="language" class="bg-transparent border-none text-xs font-semibold text-gray-500 focus:outline-none cursor-pointer">
                <option value="English">English</option>
                <option value="Urdu">Urdu</option>
            </select>
        </div>
    </div>


    <!-- ================= MAIN HEADER ================= -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-4 px-4 py-4 md:px-12 lg:px-24">

        <h1 data-aos="fade-right" data-aos-duration="500"
            class="font-extrabold text-4xl tracking-tight text-gray-800">
            Shoe<span class="text-red-400">Hub</span>
        </h1>


        <!-- SEARCH -->
        <form data-aos="fade-down" data-aos-duration="500" data-aos-delay="100"
            class="relative w-full lg:w-3/5">

            <input
                class="w-full h-full p-3 pl-5 pr-12 border border-gray-200 rounded-xl
                       focus:outline-none focus:ring-2 focus:ring-red-300 focus:border-red-300
                       transition-all shadow-sm"
                placeholder="Search shoes, brands..."
                id="search"
                type="text"
                autocomplete="off"
            />

            <label class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-400 transition-colors" for="search">
                <i class="fa-solid fa-magnifying-glass cursor-pointer"></i>
            </label>

            <!-- Search Result Dropdown -->
            <div id="searchResults"
                class="absolute top-14 left-0 w-full bg-white shadow-xl rounded-xl hidden z-50
                       border border-gray-100 max-h-96 overflow-y-auto">
            </div>
        </form>


        <!-- ICONS -->
        <div data-aos="fade-left" data-aos-duration="500" data-aos-delay="150"
            class="hidden lg:flex items-center gap-6 text-2xl text-gray-600">

            <!-- PROFILE -->
            <div class="relative group">

                @if(Auth::guard('customer')->check())

                    <button class="flex items-center gap-2 hover:text-red-400 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-100 to-red-50 flex items-center justify-center border border-red-100">
                            <ion-icon name="person-outline" class="text-xl text-red-400"></ion-icon>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">
                            {{ Auth::guard('customer')->user()->name }}
                        </span>
                        <ion-icon name="chevron-down-outline" class="text-sm transition-transform group-hover:rotate-180"></ion-icon>
                    </button>

                    <!-- Dropdown -->
                    <div class="invisible opacity-0 translate-y-2 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0
                                transition-all duration-200 absolute right-0 top-full mt-3 w-64
                                bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50">

                        <div class="px-5 py-4 bg-gradient-to-r from-red-400 to-red-500 text-white">
                            <p class="font-bold">{{ Auth::guard('customer')->user()->name }}</p>
                            <p class="text-xs text-red-100 mt-0.5">{{ Auth::guard('customer')->user()->email }}</p>
                        </div>

                        <a href="#" class="flex items-center gap-3 px-5 py-3 text-sm text-gray-600 hover:bg-red-50 hover:text-red-500 transition-colors">
                            <ion-icon name="person-outline" class="text-lg"></ion-icon>
                            My Profile
                        </a>

                        <a href="{{ route('customer.orders') }}" class="flex items-center gap-3 px-5 py-3 text-sm text-gray-600 hover:bg-red-50 hover:text-red-500 transition-colors">
                            <ion-icon name="bag-outline" class="text-lg"></ion-icon>
                            My Orders
                        </a>

                        <a href="{{ route('wishlist.index') }}" class="flex items-center gap-3 px-5 py-3 text-sm text-gray-600 hover:bg-red-50 hover:text-red-500 transition-colors">
                            <ion-icon name="heart-outline" class="text-lg"></ion-icon>
                            Wishlist
                        </a>

                        <div class="border-t">
                            <form action="{{ route('customer.logout') }}" method="POST">
                                @csrf
                                <button class="flex items-center gap-3 w-full px-5 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <ion-icon name="log-out-outline" class="text-lg"></ion-icon>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                @else

                    <a href="{{ route('customer.login') }}" class="hover:text-red-400 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-gray-100 hover:bg-red-50 flex items-center justify-center transition-colors">
                            <ion-icon name="person-outline" class="text-xl"></ion-icon>
                        </div>
                    </a>

                @endif
            </div>


            <!-- WISHLIST -->
            <a href="{{ route('wishlist.index') }}" class="relative hover:text-red-400 hover:scale-110 transition-all">
                @if($wishlistCount > 0)
                    <span class="absolute -top-2 -right-2 w-4 h-4 flex items-center justify-center text-[10px] font-bold text-white bg-red-400 rounded-full ring-2 ring-white">
                        {{ $wishlistCount }}
                    </span>
                @endif
                <ion-icon name="heart-outline"></ion-icon>
            </a>


            <!-- CART -->
            <a href="{{ route('cart.index') }}" class="relative hover:text-red-400 hover:scale-110 transition-all">
                @if($cartCount > 0)
                    <span class="absolute -top-2 -right-2 w-4 h-4 flex items-center justify-center text-[10px] font-bold text-white bg-red-400 rounded-full ring-2 ring-white">
                        {{ $cartCount }}
                    </span>
                @endif
                <ion-icon name="bag-handle-outline"></ion-icon>
            </a>

        </div>
    </div>


    <!-- ================= DESKTOP NAVBAR ================= -->
    <nav data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"
        class="hidden lg:flex justify-center border-t border-gray-100 py-3 bg-white">

        <ul class="flex justify-center items-center gap-10 text-sm font-bold text-gray-600 tracking-wide">

            <li class="nav_items relative group">
                <a href="{{ route('customer.shop') }}" class="py-2 inline-block hover:text-red-400 transition-colors">HOME</a>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all duration-300 group-hover:w-full"></span>
            </li>

            <li class="nav_items relative group category_nav_item">
                <a href="#Categories" class="py-2 inline-flex items-center gap-1 hover:text-red-400 transition-colors">
                    SHOP
                    <ion-icon name="chevron-down-outline" class="text-xs transition-transform group-hover:rotate-180"></ion-icon>
                </a>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all duration-300 group-hover:w-full"></span>

                <!-- MEGA MENU -->
                <div class="invisible opacity-0 translate-y-2 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0
                            transition-all duration-200 absolute top-full left-1/2 -translate-x-1/2 mt-3
                            w-[640px] bg-white shadow-2xl rounded-2xl border border-gray-100 z-50
                            grid grid-cols-3 gap-8 p-8">

                    {{-- Men's Shoes --}}
                    @php
                        $menCategory = $navCategories->first(fn($c) => in_array(strtolower($c->name), ['men', "men's", 'mens']));
                    @endphp
                    @if($menCategory)
                        <div>
                            <h3 class="flex items-center gap-2 border-b border-red-100 pb-3 mb-4 text-gray-900 font-bold">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                Men's Shoes
                            </h3>
                            <ul class="flex flex-col gap-2.5 text-gray-500 font-normal">
                                @foreach($menCategory->children as $child)
                                    <li>
                                        <a class="hover:text-red-400 hover:translate-x-1 inline-block transition-all"
                                           href="{{ route('category.show', $child->slug) }}">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Women's Shoes --}}
                    @php
                        $womenCategory = $navCategories->first(fn($c) => in_array(strtolower($c->name), ['women', "women's", 'womens']));
                    @endphp
                    @if($womenCategory)
                        <div>
                            <h3 class="flex items-center gap-2 border-b border-red-100 pb-3 mb-4 text-gray-900 font-bold">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                Women's Shoes
                            </h3>
                            <ul class="flex flex-col gap-2.5 text-gray-500 font-normal">
                                @foreach($womenCategory->children as $child)
                                    <li>
                                        <a class="hover:text-red-400 hover:translate-x-1 inline-block transition-all"
                                           href="{{ route('category.show', $child->slug) }}">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Kids Shoes --}}
                    @php
                        $kidsCategory = $navCategories->first(fn($c) => in_array(strtolower($c->name), ['kids', 'kid', 'children', 'child']));
                    @endphp
                    @if($kidsCategory)
                        <div>
                            <h3 class="flex items-center gap-2 border-b border-red-100 pb-3 mb-4 text-gray-900 font-bold">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                Kids Shoes
                            </h3>
                            <ul class="flex flex-col gap-2.5 text-gray-500 font-normal">
                                @foreach($kidsCategory->children as $child)
                                    <li>
                                        <a class="hover:text-red-400 hover:translate-x-1 inline-block transition-all"
                                           href="{{ route('category.show', $child->slug) }}">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </li>

            <li class="nav_items relative group">
                <a href="#Blog" class="py-2 inline-block hover:text-red-400 transition-colors">BLOG</a>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all duration-300 group-hover:w-full"></span>
            </li>

            <li class="nav_items relative group">
                <a href="{{ route('customer.contact') }}" class="py-2 inline-block hover:text-red-400 transition-colors">CONTACT US</a>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all duration-300 group-hover:w-full"></span>
            </li>

            <li class="nav_items relative group">
                <a href="{{ route('sale') }}" class="py-2 inline-block text-red-400 hover:text-red-500 transition-colors">SALE</a>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all duration-300 group-hover:w-full"></span>
            </li>

            <li class="nav_items relative group">
                <a href="{{ route('customer.orders') }}" class="py-2 inline-block hover:text-red-400 transition-colors">MY ORDER</a>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all duration-300 group-hover:w-full"></span>
            </li>

        </ul>
    </nav>


    <!-- ================= MOBILE NAVBAR ================= -->

<style>
  /* Smooth slide-in for sidebars */
  #sidebarNavbar, #sidebarCategories {
    transition: transform 0.3s ease-in-out;
    transform: translateX(-100%);
  }
  #sidebarCategories { transform: translateX(100%); }
  #sidebarNavbar.open, #sidebarCategories.open { transform: translateX(0); }

  #overlayNavbar {
    transition: opacity 0.25s ease-in-out;
    opacity: 0;
  }
  #overlayNavbar.open { opacity: 1; }

  /* Safe area for iPhone home indicator */
  .safe-bottom { padding-bottom: env(safe-area-inset-bottom, 0px); }
</style>

<div class="mobileNavbar lg:hidden">

    <!-- Bottom Navigation -->
    <div
        class="fixed bottom-0 left-0 right-0 z-30
               bg-white/95 backdrop-blur-md border-t border-gray-200
               shadow-[0_-4px_16px_rgba(0,0,0,0.06)]
               flex items-center justify-around
               px-2 pt-2 pb-2 safe-bottom"
    >
        <!-- Menu -->
        <button id="openNavbarButton" type="button"
            class="flex flex-col items-center gap-0.5 px-3 py-1 text-gray-500 hover:text-red-400 transition">
            <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
            <span class="text-[10px] font-medium">Menu</span>
        </button>

        <!-- Wishlist -->
        <a href="{{ route('wishlist.index') }}"
            class="relative flex flex-col items-center gap-0.5 px-3 py-1 text-gray-500 hover:text-red-400 transition">
            @if($wishlistCount > 0)
                <span class="absolute -top-1 right-1 w-4 h-4 rounded-full bg-red-400 text-white text-[9px] font-bold flex items-center justify-center">
                    {{ $wishlistCount }}
                </span>
            @endif
            <ion-icon name="heart-outline" class="text-2xl"></ion-icon>
            <span class="text-[10px] font-medium">Wishlist</span>
        </a>

        <!-- Home (raised, center) -->
        <a href="{{ route('customer.shop') }}"
            class="flex flex-col items-center justify-center -mt-6 w-14 h-14 rounded-full
                   bg-red-400 text-white shadow-lg shadow-red-300/50 hover:bg-red-500 transition">
            <ion-icon name="home-outline" class="text-2xl"></ion-icon>
        </a>

        <!-- Cart -->
        <a href="{{ route('cart.index') }}"
            class="relative flex flex-col items-center gap-0.5 px-3 py-1 text-gray-500 hover:text-red-400 transition">
            @if($cartCount > 0)
                <span class="absolute -top-1 right-1 w-4 h-4 rounded-full bg-red-400 text-white text-[9px] font-bold flex items-center justify-center">
                    {{ $cartCount }}
                </span>
            @endif
            <ion-icon name="bag-handle-outline" class="text-2xl"></ion-icon>
            <span class="text-[10px] font-medium">Cart</span>
        </a>

        <!-- Categories -->
        <button id="categoriesBtn" type="button"
            class="flex flex-col items-center gap-0.5 px-3 py-1 text-gray-500 hover:text-red-400 transition">
            <ion-icon name="grid-outline" class="text-2xl"></ion-icon>
            <span class="text-[10px] font-medium">Categories</span>
        </button>
    </div>


    <!-- ================= OVERLAY ================= -->
    <div id="overlayNavbar" class="hidden fixed inset-0 bg-black/40 backdrop-blur-[2px] z-40"></div>


    <!-- ================= MOBILE MENU SIDEBAR ================= -->
    <div id="sidebarNavbar"
        class="hidden fixed top-0 left-0 w-80 max-w-[85%] h-screen bg-white shadow-2xl
               p-0 flex-col overflow-y-auto z-50">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-5 bg-gradient-to-r from-red-400 to-red-500 text-white sticky top-0 z-10">
            <h3 class="text-lg font-bold tracking-wide">Menu</h3>
            <button type="button" class="closeButton text-2xl hover:scale-110 transition">
                <ion-icon name="close-circle-outline"></ion-icon>
            </button>
        </div>

        <div class="p-5 flex flex-col gap-1">

            <!-- HOME -->
            <a href="{{ route('customer.shop') }}"
                class="flex items-center gap-3 px-3 py-3 rounded-xl text-gray-700 font-medium hover:bg-red-50 hover:text-red-500 transition">
                <ion-icon name="home-outline" class="text-lg"></ion-icon>
                Home
            </a>

            <!-- MEN -->
            <details class="group border-t pt-2">
                <summary class="flex items-center justify-between px-3 py-3 rounded-xl cursor-pointer text-gray-700 font-medium hover:bg-red-50 hover:text-red-500 transition list-none">
                    <span class="flex items-center gap-3">
                        <ion-icon name="man-outline" class="text-lg"></ion-icon>
                        Men's Shoes
                    </span>
                    <ion-icon name="chevron-down-outline" class="text-sm transition group-open:rotate-180"></ion-icon>
                </summary>
                <div class="flex flex-col gap-1 mt-1 pl-11 pb-2">
                    @foreach($navCategories as $category)
                        @if($category->slug == 'men')
                            @foreach($category->children as $child)
                                <a href="{{ route('category.show', $child->slug) }}"
                                    class="py-2 text-sm text-gray-500 hover:text-red-400 transition">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </details>

            <!-- WOMEN -->
            <details class="group border-t pt-2">
                <summary class="flex items-center justify-between px-3 py-3 rounded-xl cursor-pointer text-gray-700 font-medium hover:bg-red-50 hover:text-red-500 transition list-none">
                    <span class="flex items-center gap-3">
                        <ion-icon name="woman-outline" class="text-lg"></ion-icon>
                        Women's Shoes
                    </span>
                    <ion-icon name="chevron-down-outline" class="text-sm transition group-open:rotate-180"></ion-icon>
                </summary>
                <div class="flex flex-col gap-1 mt-1 pl-11 pb-2">
                    @foreach($navCategories as $category)
                        @if($category->slug == 'women')
                            @foreach($category->children as $child)
                                <a href="{{ route('category.show', $child->slug) }}"
                                    class="py-2 text-sm text-gray-500 hover:text-red-400 transition">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </details>

            <!-- KIDS -->
            <details class="group border-t pt-2">
                <summary class="flex items-center justify-between px-3 py-3 rounded-xl cursor-pointer text-gray-700 font-medium hover:bg-red-50 hover:text-red-500 transition list-none">
                    <span class="flex items-center gap-3">
                        <ion-icon name="happy-outline" class="text-lg"></ion-icon>
                        Kids Shoes
                    </span>
                    <ion-icon name="chevron-down-outline" class="text-sm transition group-open:rotate-180"></ion-icon>
                </summary>
                <div class="flex flex-col gap-1 mt-1 pl-11 pb-2">
                    @foreach($navCategories as $category)
                        @if($category->slug == 'children')
                            @foreach($category->children as $child)
                                <a href="{{ route('category.show', $child->slug) }}"
                                    class="py-2 text-sm text-gray-500 hover:text-red-400 transition">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </details>

            <!-- LANGUAGE -->
            <details class="group border-t pt-2">
                <summary class="flex items-center justify-between px-3 py-3 rounded-xl cursor-pointer text-gray-700 font-medium hover:bg-red-50 hover:text-red-500 transition list-none">
                    <span class="flex items-center gap-3">
                        <ion-icon name="language-outline" class="text-lg"></ion-icon>
                        Language
                    </span>
                    <ion-icon name="chevron-down-outline" class="text-sm transition group-open:rotate-180"></ion-icon>
                </summary>
                <div class="flex flex-col mt-1 pl-11 pb-2 text-sm">
                    <a href="#" class="py-2 text-gray-500 hover:text-red-400 transition">English</a>
                    <a href="#" class="py-2 text-gray-500 hover:text-red-400 transition">Persian</a>
                </div>
            </details>

            <!-- CURRENCY -->
            <details class="group border-t pt-2">
                <summary class="flex items-center justify-between px-3 py-3 rounded-xl cursor-pointer text-gray-700 font-medium hover:bg-red-50 hover:text-red-500 transition list-none">
                    <span class="flex items-center gap-3">
                        <ion-icon name="cash-outline" class="text-lg"></ion-icon>
                        Currency
                    </span>
                    <ion-icon name="chevron-down-outline" class="text-sm transition group-open:rotate-180"></ion-icon>
                </summary>
                <div class="pl-11 pr-3 pb-2 pt-1">
                    <select id="currency" class="w-full p-2 border rounded-lg text-sm font-semibold">
                        <option value="PKR">PKR Rs</option>
                        <option value="USD">USD $</option>
                    </select>
                </div>
            </details>

            <!-- SOCIAL -->
            <div class="border-t pt-4 mt-2">
                <h3 class="text-gray-600 mb-3 px-3 text-sm font-semibold">Follow Us</h3>
                <div class="flex items-center gap-3 px-3">
                    <a href="#" class="p-2.5 rounded-lg bg-gray-100 hover:bg-red-400 hover:text-white transition">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a href="#" class="p-2.5 rounded-lg bg-gray-100 hover:bg-red-400 hover:text-white transition">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                    <a href="#" class="p-2.5 rounded-lg bg-gray-100 hover:bg-red-400 hover:text-white transition">
                        <ion-icon name="logo-github"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- ================= MOBILE CATEGORY SIDEBAR ================= -->
    <div id="sidebarCategories"
        class="hidden fixed top-0 right-0 w-80 max-w-[85%] h-screen bg-white shadow-2xl
               p-0 flex-col overflow-y-auto z-50">

        <div class="flex items-center justify-between px-6 py-5 bg-gradient-to-r from-red-400 to-red-500 text-white sticky top-0 z-10">
            <h2 class="text-lg font-bold tracking-wide">Categories</h2>
            <button type="button" class="closeButton text-2xl hover:scale-110 transition">
                <ion-icon name="close-circle-outline"></ion-icon>
            </button>
        </div>

        <div class="p-5 flex flex-col gap-4">
            <!-- MEN -->
            <div class="pb-4 border-b">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                    <ion-icon name="man-outline" class="text-red-400"></ion-icon>
                    Men's Shoes
                </h3>
                <div class="flex flex-col gap-2 text-sm pl-1">
                    @foreach($navCategories as $category)
                        @if($category->slug == 'men')
                            @foreach($category->children as $child)
                                <a href="{{ route('category.show', $child->slug) }}"
                                    class="text-gray-500 hover:text-red-400 transition">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- WOMEN -->
            <div class="pb-4 border-b">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                    <ion-icon name="woman-outline" class="text-red-400"></ion-icon>
                    Women's Shoes
                </h3>
                <div class="flex flex-col gap-2 text-sm pl-1">
                    @foreach($navCategories as $category)
                        @if($category->slug == 'women')
                            @foreach($category->children as $child)
                                <a href="{{ route('category.show', $child->slug) }}"
                                    class="text-gray-500 hover:text-red-400 transition">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- KIDS -->
            <div class="pb-4 border-b">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                    <ion-icon name="happy-outline" class="text-red-400"></ion-icon>
                    Kids Shoes
                </h3>
                <div class="flex flex-col gap-2 text-sm pl-1">
                    @foreach($navCategories as $category)
                        @if($category->slug == 'children')
                            @foreach($category->children as $child)
                                <a href="{{ route('category.show', $child->slug) }}"
                                    class="text-gray-500 hover:text-red-400 transition">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</header>


<script>
const search = document.getElementById('search');
const results = document.getElementById('searchResults');

search.addEventListener('keyup', function(){
    let query = this.value;

    if(query.length < 2){
        results.innerHTML = '';
        results.classList.add('hidden');
        return;
    }

    fetch(`/search/products?query=${query}`)
        .then(response => response.json())
        .then(products => {
            results.innerHTML = '';

            if(products.length === 0){
                results.innerHTML = `<div class="p-6 text-center text-gray-400 text-sm">No products found</div>`;
            }

            products.forEach(product => {
                results.innerHTML += `
                <a href="/products/${product.id}"
                    class="flex items-center gap-4 p-3 hover:bg-red-50/60 rounded-xl mx-2 my-1 transition-colors">
                    <img src="/storage/${product.image}" class="w-14 h-14 rounded-lg object-cover border" />
                    <div>
                        <div class="font-semibold text-gray-800 text-sm">${product.name}</div>
                        <div class="text-xs text-gray-500">${product.brand.name}</div>
                        <div class="font-bold text-sm mt-1 text-red-400">Rs ${product.price}</div>
                    </div>
                </a>`;
            });

            results.classList.remove('hidden');
        });
});

document.addEventListener('click', function(e){
    if(!search.contains(e.target) && !results.contains(e.target)){
        results.classList.add('hidden');
    }
});




// Toggle open/close with the CSS classes instead of just hidden/flex,
// so the slide animation actually plays
function openPanel(panel, overlay) {
    panel.classList.remove('hidden');
    panel.classList.add('flex');
    requestAnimationFrame(() => {
        panel.classList.add('open');
        overlay.classList.remove('hidden');
        requestAnimationFrame(() => overlay.classList.add('open'));
    });
}

function closePanel(panel, overlay) {
    panel.classList.remove('open');
    overlay.classList.remove('open');
    setTimeout(() => {
        panel.classList.add('hidden');
        panel.classList.remove('flex');
        overlay.classList.add('hidden');
    }, 300);
}

const overlay = document.getElementById('overlayNavbar');
const sidebarNavbar = document.getElementById('sidebarNavbar');
const sidebarCategories = document.getElementById('sidebarCategories');

document.getElementById('openNavbarButton').addEventListener('click', () => openPanel(sidebarNavbar, overlay));
document.getElementById('categoriesBtn').addEventListener('click', () => openPanel(sidebarCategories, overlay));

document.querySelectorAll('.closeButton').forEach(btn => {
    btn.addEventListener('click', () => {
        closePanel(sidebarNavbar, overlay);
        closePanel(sidebarCategories, overlay);
    });
});

overlay.addEventListener('click', () => {
    closePanel(sidebarNavbar, overlay);
    closePanel(sidebarCategories, overlay);
});

</script>