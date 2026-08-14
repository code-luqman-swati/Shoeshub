@extends('customer.layouts.index')

@section('content')

<!-- !banner -->
<div class="banner mt-6 lg:mt-2 -mb-2 lg:-mb-4 flex items-center justify-center px-4 lg:px-0">
  <div class="swiper swiper-js w-full lg:w-5/6">
    <div
      class="swiper-wrapper h-48 sm:h-64 lg:h-96 w-full relative rounded-xl overflow-hidden"
      id="swiperSlide"
    ></div>

    <div class="swiper-scrollbar"></div>
  </div>
</div>

<!--todo Title Categories  -->
<div class="flex items-center justify-center mt-6 lg:mt-10 px-4 lg:px-0">
  <div class="swiper categories_swiper w-full lg:w-5/6">
    <div class="swiper-wrapper relative gap-3 sm:gap-4" id="titlecategories"></div>

    <div class="swiper-scrollbar"></div>
  </div>
</div>

<!--? Products and categories  -->
<section
  class="relative w-full min-h-auto px-4 sm:px-6 lg:px-0 lg:w-5/6 mx-auto mt-10 lg:mt-16 flex gap-6 lg:gap-8"
>
  <!-- mobile filter drawer toggle (checkbox hack, no JS needed) -->
  <input type="checkbox" id="mobile-filters" class="peer hidden" />

  <!-- dim overlay, shown only while drawer is open on mobile -->
  <label
    for="mobile-filters"
    aria-hidden="true"
    class="fixed inset-0 z-40 hidden bg-gray-900/50 backdrop-blur-[1px] peer-checked:block lg:hidden"
  ></label>

  <aside
    class="fixed inset-y-0 left-0 z-50 w-[80%] max-w-xs -translate-x-full overflow-y-auto bg-white p-5 shadow-2xl transition-transform duration-300 ease-out peer-checked:translate-x-0 lg:sticky lg:top-4 lg:z-0 lg:flex lg:w-1/4 lg:max-h-[calc(100vh-2rem)] lg:translate-x-0 lg:flex-col lg:bg-transparent lg:p-0 lg:shadow-none"
  >
    <div class="mb-4 flex items-center justify-between lg:hidden">
      <h2 class="font-serif text-lg font-semibold text-gray-900">Filters</h2>
      <label
        for="mobile-filters"
        class="grid h-8 w-8 place-items-center rounded-full text-gray-500 hover:bg-gray-100"
        aria-label="Close filters"
      >
        <ion-icon name="close-outline" class="text-xl"></ion-icon>
      </label>
    </div>

    <div class="aside_section overflow-y-auto lg:overflow-visible">
      <div class="categories w-full rounded-2xl border border-gray-100 bg-white p-4 lg:p-5 shadow-sm lg:shadow-lg">
        <h1 class="mb-4 font-serif text-lg font-semibold tracking-wide text-gray-900">Category</h1>

        <div class="divide-y divide-gray-100">
          <details class="group py-3" open>
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/dress.svg') }}"
                  alt=""
                />
                Clothes
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Shirt</span><span class="text-xs text-gray-400">300</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Shorts &amp; Jeans</span><span class="text-xs text-gray-400">30</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Jacket</span><span class="text-xs text-gray-400">50</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Dress &amp; Frock</span><span class="text-xs text-gray-400">120</span>
              </a>
            </div>
          </details>

          <details class="group py-3">
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/shoes.svg') }}"
                  alt=""
                />
                Footwear
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Sports</span><span class="text-xs text-gray-400">300</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Formal</span><span class="text-xs text-gray-400">30</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Casual</span><span class="text-xs text-gray-400">50</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Safety Shoes</span><span class="text-xs text-gray-400">120</span>
              </a>
            </div>
          </details>

          <details class="group py-3">
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/jewelry.svg') }}"
                  alt=""
                />
                Jewelry
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Earrings</span><span class="text-xs text-gray-400">300</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Couple Rings</span><span class="text-xs text-gray-400">30</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Necklace</span><span class="text-xs text-gray-400">50</span>
              </a>
            </div>
          </details>

          <details class="group py-3">
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/perfume.svg') }}"
                  alt=""
                />
                Perfume
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Clothes Perfume</span><span class="text-xs text-gray-400">300</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Deodorant</span><span class="text-xs text-gray-400">30</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Jacket</span><span class="text-xs text-gray-400">50</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Dress &amp; Frock</span><span class="text-xs text-gray-400">120</span>
              </a>
            </div>
          </details>

          <details class="group py-3">
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/cosmetics.svg') }}"
                  alt=""
                />
                Cosmetics
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Shampoo</span><span class="text-xs text-gray-400">300</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Sunscreen</span><span class="text-xs text-gray-400">30</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Body Wash</span><span class="text-xs text-gray-400">50</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Makeup Kit</span><span class="text-xs text-gray-400">120</span>
              </a>
            </div>
          </details>

          <details class="group py-3">
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/glasses.svg') }}"
                  alt=""
                />
                Glasses
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Sunglasses</span><span class="text-xs text-gray-400">23</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Lenses</span><span class="text-xs text-gray-400">53</span>
              </a>
            </div>
          </details>

          <details class="group py-3">
            <summary class="flex cursor-pointer list-none items-center justify-between text-gray-800">
              <div class="flex items-center gap-2 font-medium">
                <img
                  class="h-4 w-4"
                  src="{{ asset('customer/assets/images/icons/bag.svg') }}"
                  alt=""
                />
                Bags
              </div>
              <ion-icon name="chevron-down-outline" class="text-gray-400 transition-transform group-open:rotate-180"></ion-icon>
            </summary>
            <div class="mt-3 flex flex-col gap-2 pl-6 text-sm text-gray-500">
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Wallet</span><span class="text-xs text-gray-400">300</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Purse</span><span class="text-xs text-gray-400">30</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Gym Backpack</span><span class="text-xs text-gray-400">50</span>
              </a>
              <a href="#" class="flex items-center justify-between hover:text-rose-600">
                <span>Shopping Bag</span><span class="text-xs text-gray-400">120</span>
              </a>
            </div>
          </details>
        </div>
      </div>

      <div class="bestsellers mt-6 lg:mt-10 flex h-auto flex-col items-start justify-start gap-4">
        <h2 class="font-serif text-lg font-semibold tracking-wide text-gray-900">Best Sellers</h2>

        <a href="#" class="flex w-full items-center justify-start gap-3 rounded-xl p-1.5 transition hover:bg-gray-50">
          <div class="h-16 w-16 sm:h-20 sm:w-20 shrink-0 overflow-hidden rounded-lg border bg-gray-100 p-1.5 shadow-sm">
            <img
              class="h-full w-full object-cover"
              src="{{ asset('customer/assets/images/products/1.jpg') }}"
              alt="Baby Fabric Shoes"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="truncate font-medium text-gray-900">Baby Fabric Shoes</h4>
            <div class="stars text-yellow-500 text-sm">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-half-outline"></ion-icon>
            </div>
            <div class="flex items-center justify-start gap-2">
              <s class="text-gray-400 text-sm">$14.00</s>
              <strong class="text-rose-600">$7.00</strong>
            </div>
          </div>
        </a>

        <a href="#" class="flex w-full items-center justify-start gap-3 rounded-xl p-1.5 transition hover:bg-gray-50">
          <div class="h-16 w-16 sm:h-20 sm:w-20 shrink-0 overflow-hidden rounded-lg border bg-gray-100 p-1.5 shadow-sm">
            <img
              class="h-full w-full object-cover"
              src="{{ asset('customer/assets/images/products/2.jpg') }}"
              alt="Men's Hoodies T-Shirt"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="truncate font-medium text-gray-900">Men's Hoodies T-Shirt</h4>
            <div class="stars text-yellow-500 text-sm">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-half-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
            <div class="flex items-center justify-start gap-2">
              <s class="text-gray-400 text-sm">$5.00</s>
              <strong class="text-rose-600">$2.00</strong>
            </div>
          </div>
        </a>

        <a href="#" class="flex w-full items-center justify-start gap-3 rounded-xl p-1.5 transition hover:bg-gray-50">
          <div class="h-16 w-16 sm:h-20 sm:w-20 shrink-0 overflow-hidden rounded-lg border bg-gray-100 p-1.5 shadow-sm">
            <img
              class="h-full w-full object-cover"
              src="{{ asset('customer/assets/images/products/3.jpg') }}"
              alt="Girls T-Shirt"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="truncate font-medium text-gray-900">Girls T-Shirt</h4>
            <div class="stars text-yellow-500 text-sm">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-half-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
            <div class="flex items-center justify-start gap-2">
              <s class="text-gray-400 text-sm">$10.00</s>
              <strong class="text-rose-600">$5.00</strong>
            </div>
          </div>
        </a>

        <a href="#" class="flex w-full items-center justify-start gap-3 rounded-xl p-1.5 transition hover:bg-gray-50">
          <div class="h-16 w-16 sm:h-20 sm:w-20 shrink-0 overflow-hidden rounded-lg border bg-gray-100 p-1.5 shadow-sm">
            <img
              class="h-full w-full object-cover"
              src="{{ asset('customer/assets/images/products/4.jpg') }}"
              alt="Woolen Hat For Men"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="truncate font-medium text-gray-900">Woolen Hat For Men</h4>
            <div class="stars text-yellow-500 text-sm">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-half-outline"></ion-icon>
            </div>
            <div class="flex items-center justify-start gap-2">
              <s class="text-gray-400 text-sm">$24.00</s>
              <strong class="text-rose-600">$17.00</strong>
            </div>
          </div>
        </a>
      </div>
    </div>
  </aside>

  <div class="products w-full lg:w-3/4 flex flex-col">
    <!-- mobile filter trigger -->
    <label
      for="mobile-filters"
      class="mb-5 inline-flex w-fit items-center gap-2 self-start rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm lg:hidden"
    >
      <ion-icon name="options-outline"></ion-icon>
      Filters &amp; Categories
    </label>

    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-6">
      <div class="NewArrivals flex flex-col gap-4">
        <h1 class="font-serif text-xl font-semibold border-b border-gray-200 pb-4 text-gray-900">New Arrivals</h1>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/clothes-1.jpg') }}"
              alt="Relaxed Short Full Suit"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Relaxed Short Full...</h4>
            <h4 class="text-xs text-gray-400">Clothes</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$7.00</strong>
              <s class="text-gray-400 text-sm">$14.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/clothes-2.jpg') }}"
              alt="Girls Pink Embroidered Dress"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Girls Pnk Embro Desi...</h4>
            <h4 class="text-xs text-gray-400">Clothes</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$21.00</strong>
              <s class="text-gray-400 text-sm">$24.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/clothes-3.jpg') }}"
              alt="Black Floral Wrap Dress"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Black Floral Wrap...</h4>
            <h4 class="text-xs text-gray-400">Clothes</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$5.00</strong>
              <s class="text-gray-400 text-sm">$15.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/shirt-1.jpg') }}"
              alt="Pure Garment Dye Shirt"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Pure Garment Dye...</h4>
            <h4 class="text-xs text-gray-400">Mens Fashion</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$30.00</strong>
              <s class="text-gray-400 text-sm">$40.00</s>
            </div>
          </div>
        </a>
      </div>

      <div class="Trending flex flex-col gap-4">
        <h1 class="font-serif text-xl font-semibold border-b border-gray-200 pb-4 text-gray-900">Trending</h1>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/sports-5.jpg') }}"
              alt="Running & Trekking Shoes"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Running &amp; Trekking...</h4>
            <h4 class="text-xs text-gray-400">Sports</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$82.00</strong>
              <s class="text-gray-400 text-sm">$101.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/sports-2.jpg') }}"
              alt="Trekking & Running Shoes"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Trekking &amp; Running...</h4>
            <h4 class="text-xs text-gray-400">Sports</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$78.00</strong>
              <s class="text-gray-400 text-sm">$93.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/party-wear-1.jpg') }}"
              alt="Women's Party Wear"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Womens Party Wea...</h4>
            <h4 class="text-xs text-gray-400">Party Wear</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$27.00</strong>
              <s class="text-gray-400 text-sm">$32.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/sports-3.jpg') }}"
              alt="Sports Claw Women"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Sports Claw Women...</h4>
            <h4 class="text-xs text-gray-400">Sports</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$12.00</strong>
              <s class="text-gray-400 text-sm">$24.00</s>
            </div>
          </div>
        </a>
      </div>

      <div class="TopRated flex flex-col gap-4 sm:col-span-2 lg:col-span-1">
        <h1 class="font-serif text-xl font-semibold border-b border-gray-200 pb-4 text-gray-900">Top Rated</h1>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/watch-3.jpg') }}"
              alt="Pocket Watch Leather"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Pocket Watch Leather...</h4>
            <h4 class="text-xs text-gray-400">Watches</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$32.00</strong>
              <s class="text-gray-400 text-sm">$53.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/jewellery-3.jpg') }}"
              alt="Silver Deer Heart Necklace"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Silver Deer Heart Neck...</h4>
            <h4 class="text-xs text-gray-400">Jewellery</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$12.00</strong>
              <s class="text-gray-400 text-sm">$32.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/perfume.jpg') }}"
              alt="Titan 100 Ml Womens"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Titan 100 Ml Womens</h4>
            <h4 class="text-xs text-gray-400">Perfume</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$74.00</strong>
              <s class="text-gray-400 text-sm">$104.00</s>
            </div>
          </div>
        </a>

        <a href="#" class="w-full h-28 bg-white border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition rounded-xl flex items-center justify-start gap-3 p-2">
          <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg bg-gray-50">
            <img
              class="w-full h-full object-cover"
              src="{{ asset('customer/assets/images/products/belt.jpg') }}"
              alt="Men's Leather Reversible Belt"
            />
          </div>
          <div class="min-w-0 text-gray-700">
            <h4 class="font-semibold text-gray-900 text-sm truncate">Men's Leather Rever...</h4>
            <h4 class="text-xs text-gray-400">Belt</h4>
            <div class="flex items-center justify-start gap-3 mt-1">
              <strong class="text-rose-600">$17.00</strong>
              <s class="text-gray-400 text-sm">$23.00</s>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Deal of the day -->
    <div class="day my-10 lg:my-14">
      <h1 class="font-serif text-xl font-semibold border-b border-gray-200 py-4 text-gray-900">Deal Of The Day</h1>

      <div class="mt-6 lg:mt-10 w-full h-auto border border-gray-100 shadow-sm rounded-2xl overflow-hidden flex flex-col lg:flex-row lg:justify-between bg-white">
        <img
          class="w-full h-56 sm:h-72 lg:h-auto lg:w-1/2 object-cover"
          src="{{ asset('customer/assets/images/products/shampoo.jpg') }}"
          alt="Shampoo, Conditioner & Facewash Packs"
        />
        <div class="lg:w-1/2 flex flex-col items-start gap-2.5 p-6 sm:p-8">
          <div class="stars text-yellow-500">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-half-outline"></ion-icon>
          </div>
          <h4 class="font-serif font-bold text-xl sm:text-2xl text-gray-900">
            Shampoo, Conditioner &amp; Facewash Packs
          </h4>
          <p class="text-gray-500 text-sm sm:text-base leading-relaxed">
            Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor sit
            amet consectetur Lorem ipsum dolor
          </p>
          <div class="flex items-center gap-3">
            <strong class="text-rose-600 font-bold text-2xl">$150.00</strong>
            <s class="text-lg text-gray-400">$200.00</s>
          </div>
          <button
            class="mt-1 bg-gray-900 hover:bg-rose-600 transition-colors text-white rounded-full py-2.5 px-6 text-sm font-semibold tracking-wide"
          >
            ADD TO CART
          </button>
          <h3 class="mt-5 font-semibold text-xs tracking-wider text-gray-500">HURRY UP! OFFER ENDS IN:</h3>
          <div
            id="reverseTimer"
            class="flex justify-between items-center gap-3 sm:gap-4 font-semibold text-sm text-black"
          >
            <div class="flex flex-col items-center justify-center bg-gray-50 border border-gray-100 shadow-sm p-2 w-14 h-14 sm:w-16 sm:h-16 rounded-xl">
              <span id="days" class="text-lg font-bold text-gray-900"></span>
              <span class="text-[10px] font-normal text-gray-400">days</span>
            </div>
            <div class="flex flex-col items-center justify-center bg-gray-50 border border-gray-100 shadow-sm p-2 w-14 h-14 sm:w-16 sm:h-16 rounded-xl">
              <span id="hour" class="text-lg font-bold text-gray-900"></span>
              <span class="text-[10px] font-normal text-gray-400">hrs</span>
            </div>
            <div class="flex flex-col items-center justify-center bg-gray-50 border border-gray-100 shadow-sm p-2 w-14 h-14 sm:w-16 sm:h-16 rounded-xl">
              <span id="minute" class="text-lg font-bold text-gray-900"></span>
              <span class="text-[10px] font-normal text-gray-400">min</span>
            </div>
            <div class="flex flex-col items-center justify-center bg-gray-50 border border-gray-100 shadow-sm p-2 w-14 h-14 sm:w-16 sm:h-16 rounded-xl">
              <span id="second" class="text-lg font-bold text-gray-900"></span>
              <span class="text-[10px] font-normal text-gray-400">sec</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="newProductsContainer">
      <h1 class="font-serif text-xl font-semibold border-b border-gray-200 py-4 text-gray-900">New Products</h1>
      <div
        id="newProducts"
        class="newProducts grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 mt-2"
      ></div>
    </div>
  </div>
</section>

<div
  class="mt-14 lg:mt-16 w-full px-4 sm:px-6 lg:px-0 lg:w-5/6 mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16 lg:mb-20"
>
  <!-- Testimonial -->
  <div class="testimonial w-full">
    <h1 class="font-serif text-xl font-semibold border-b border-gray-200 pb-4 mb-8 text-gray-900">Testimonial</h1>
    <div
      class="h-full min-h-[20rem] lg:min-h-[23rem] w-full border border-gray-100 shadow-sm rounded-2xl flex flex-col items-center justify-center p-6"
    >
      <img
        class="w-20 h-20 rounded-full object-cover ring-4 ring-rose-50"
        src="{{ asset('customer/assets/images/testimonial-1.jpg') }}"
        alt="Alan Doe"
      />
      <h2 class="mt-4 text-lg font-bold text-gray-800">ALAN DOE</h2>
      <h5 class="text-sm text-gray-400">CEO &amp; Founder, Invision</h5>
      <img
        class="w-6 h-6 my-4 opacity-60"
        src="{{ asset('customer/assets/images/icons/quotes.svg') }}"
        alt=""
      />
      <p class="text-sm w-4/5 mx-auto text-center text-gray-500 leading-relaxed">
        Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor sit
        amet.
      </p>
    </div>
  </div>

  <!-- CTA banner -->
  <div class="w-full flex items-center justify-center">
    <div
      class="w-full h-full min-h-[20rem] lg:min-h-[23rem] rounded-2xl bg-cover bg-center flex items-center justify-center overflow-hidden relative"
      style="background-image: url('{{ asset('customer/assets/images/cta-banner.jpg') }}')"
    >
      <div class="absolute inset-0 bg-gray-900/35"></div>
      <div
        class="relative flex flex-col items-center justify-center p-8 gap-3 text-center"
      >
        <span class="bg-gray-900 text-white text-xs font-semibold tracking-widest px-4 py-2 rounded-full">
          25% DISCOUNT
        </span>
        <h1 class="w-56 text-3xl sm:text-4xl font-serif font-bold text-center text-white">
          Summer Collection
        </h1>
        <h5 class="text-lg font-semibold text-white/80">Starting @ $10</h5>
        <a href="#" class="mt-2 inline-block text-sm font-semibold tracking-wide text-white border-b-2 border-white/70 pb-0.5 hover:border-rose-400 hover:text-rose-200 transition-colors">
          SHOP NOW
        </a>
      </div>
    </div>
  </div>

  <!-- Our Services -->
  <div class="OurServices w-full">
    <h1 class="font-serif text-xl font-semibold border-b border-gray-200 pb-4 mb-8 text-gray-900">Our Services</h1>
    <div
      class="min-h-[20rem] lg:min-h-[23rem] w-full border border-gray-100 shadow-sm rounded-2xl grid grid-cols-2 lg:grid-cols-1 items-center content-center gap-6 lg:gap-8 p-6 lg:px-10"
    >
      <div class="flex flex-col items-center text-center lg:flex-row lg:text-left lg:justify-start gap-2 lg:gap-4">
        <ion-icon class="text-rose-500 text-3xl lg:text-4xl shrink-0" name="boat-outline"></ion-icon>
        <div>
          <h3 class="font-semibold text-gray-800 text-sm lg:text-base">Worldwide Shipping</h3>
          <p class="text-xs text-gray-500">For orders over $100</p>
        </div>
      </div>

      <div class="flex flex-col items-center text-center lg:flex-row lg:text-left lg:justify-start gap-2 lg:gap-4">
        <ion-icon class="text-rose-500 text-3xl lg:text-4xl shrink-0" name="rocket-outline"></ion-icon>
        <div>
          <h3 class="font-semibold text-gray-800 text-sm lg:text-base">Fast Delivery</h3>
          <p class="text-xs text-gray-500">Dispatched within 24 hours</p>
        </div>
      </div>

      <div class="flex flex-col items-center text-center lg:flex-row lg:text-left lg:justify-start gap-2 lg:gap-4">
        <ion-icon class="text-rose-500 text-3xl lg:text-4xl shrink-0" name="call-outline"></ion-icon>
        <div>
          <h3 class="font-semibold text-gray-800 text-sm lg:text-base">24/7 Support</h3>
          <p class="text-xs text-gray-500">Dedicated customer care</p>
        </div>
      </div>

      <div class="flex flex-col items-center text-center lg:flex-row lg:text-left lg:justify-start gap-2 lg:gap-4">
        <ion-icon class="text-rose-500 text-3xl lg:text-4xl shrink-0" name="arrow-undo-outline"></ion-icon>
        <div>
          <h3 class="font-semibold text-gray-800 text-sm lg:text-base">Easy Returns</h3>
          <p class="text-xs text-gray-500">30-day return policy</p>
        </div>
      </div>

      <div class="col-span-2 lg:col-span-1 flex flex-col items-center text-center lg:flex-row lg:text-left lg:justify-start gap-2 lg:gap-4">
        <ion-icon class="text-rose-500 text-3xl lg:text-4xl shrink-0" name="ticket-outline"></ion-icon>
        <div>
          <h3 class="font-semibold text-gray-800 text-sm lg:text-base">Exclusive Offers</h3>
          <p class="text-xs text-gray-500">Deals for members only</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w-full px-4 sm:px-6 lg:px-0 lg:w-5/6 mx-auto flex my-10">
  <div class="swiper blog_swiper w-full">
    <div class="swiper-wrapper" id="blog_swiper"></div>

    <div class="swiper-scrollbar"></div>
  </div>
</div>

@endsection