@extends('customer.layouts.index')

@section('content')

<div class="w-full px-4 sm:px-6 lg:px-0 lg:w-5/6 mx-auto mt-8 lg:mt-12 mb-16">

  <div class="mb-8">
    <h1 class="font-serif text-3xl font-bold text-gray-900">Shop</h1>
    <p class="text-sm text-gray-500 mt-1">Browse the full collection and filter by brand or price.</p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 relative">

    {{-- mobile filter drawer toggle (checkbox hack, no JS needed) --}}
    <input type="checkbox" id="mobile-filters" class="peer hidden" />

    <label
      for="mobile-filters"
      aria-hidden="true"
      class="fixed inset-0 z-40 hidden bg-gray-900/50 backdrop-blur-[1px] peer-checked:block lg:hidden"
    ></label>

    {{-- Filters Sidebar --}}
    <aside
      class="fixed inset-y-0 left-0 z-50 w-[85%] max-w-sm -translate-x-full overflow-y-auto bg-white p-6 shadow-2xl transition-transform duration-300 ease-out peer-checked:translate-x-0 lg:sticky lg:top-4 lg:z-0 lg:col-span-1 lg:h-fit lg:max-h-[calc(100vh-2rem)] lg:w-auto lg:translate-x-0 lg:overflow-visible lg:rounded-2xl lg:border lg:border-gray-100 lg:bg-white lg:p-6 lg:shadow-sm"
    >
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl font-bold text-gray-800">
          Filters
        </h2>
        <label
          for="mobile-filters"
          class="grid h-8 w-8 place-items-center rounded-full text-gray-500 hover:bg-gray-100 lg:hidden"
          aria-label="Close filters"
        >
          <ion-icon name="close-outline" class="text-xl"></ion-icon>
        </label>
      </div>

      <form method="GET" action="{{ url()->current() }}">

        {{-- Brand --}}
        <div>
          <h3 class="text-sm font-semibold text-gray-700 mb-4">Brand</h3>

          <div class="flex flex-wrap gap-2.5">

            {{-- All Brands Button --}}
            <a
              href="{{ route('customer.shop') }}"
              class="inline-flex items-center px-5 py-2.5 rounded-full border text-sm cursor-pointer transition
              {{ !request('brand') ? 'bg-yellow-400 border-yellow-400 text-black font-semibold' : 'border-gray-200 bg-gray-50 text-gray-700 hover:bg-yellow-50' }}"
            >
              All
            </a>

            @foreach($brands as $brand)
              <label>
                <input
                  type="radio"
                  name="brand"
                  value="{{ $brand->slug }}"
                  class="hidden peer"
                  {{ request('brand') == $brand->slug ? 'checked' : '' }}
                  onchange="this.form.submit()"
                >
                <span
                  class="inline-flex items-center px-5 py-2.5 rounded-full border border-gray-200 bg-gray-50 text-sm cursor-pointer transition
                  hover:bg-yellow-50 peer-checked:bg-yellow-400 peer-checked:border-yellow-400 peer-checked:text-black peer-checked:font-semibold"
                >
                  {{ $brand->name }}
                </span>
              </label>
            @endforeach

          </div>
        </div>

        {{-- Divider --}}
        <div class="border-t border-gray-100 my-6"></div>

        {{-- Price --}}
        <div class="mb-8">
          <h3 class="text-sm font-semibold text-gray-700 mb-4">
            Price Range
          </h3>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="text-xs text-gray-500 mb-2 block">
                Minimum
              </label>
              <input
                type="number"
                name="min_price"
                value="{{ request('min_price') }}"
                placeholder="Rs 0"
                class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:ring-2 focus:ring-yellow-400"
              >
            </div>

            <div>
              <label class="text-xs text-gray-500 mb-2 block">
                Maximum
              </label>
              <input
                type="number"
                name="max_price"
                value="{{ request('max_price') }}"
                placeholder="Rs 50000"
                class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:ring-2 focus:ring-yellow-400"
              >
            </div>
          </div>
        </div>

        {{-- Apply Button --}}
        <button
          type="submit"
          class="w-full h-12 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-black font-semibold text-sm transition shadow-sm hover:shadow-md"
        >
          Apply Filters
        </button>

        @if(request('brand') || request('min_price') || request('max_price'))
          <a
            href="{{ route('customer.shop') }}"
            class="mt-3 flex items-center justify-center gap-1 w-full h-11 rounded-xl border border-gray-200 text-gray-500 text-sm font-medium transition hover:bg-gray-50"
          >
            <ion-icon name="refresh-outline"></ion-icon>
            Clear all filters
          </a>
        @endif

      </form>
    </aside>

    {{-- Products --}}
    <div class="lg:col-span-3">

      <div class="flex justify-between items-center mb-6 flex-wrap gap-4">

        {{-- mobile filter trigger --}}
        <label
          for="mobile-filters"
          class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm lg:hidden"
        >
          <ion-icon name="options-outline"></ion-icon>
          Filters
        </label>

        <span class="hidden lg:block text-sm text-gray-500">
          {{ $products->total() }} {{ Str::plural('Product', $products->total()) }}
        </span>

        <form method="GET" action="{{ url()->current() }}" class="ml-auto">

          {{-- Keep brand filter --}}
          @if(request('brand'))
            <input type="hidden" name="brand" value="{{ request('brand') }}">
          @endif

          {{-- Keep price filter --}}
          @if(request('min_price'))
            <input type="hidden" name="min_price" value="{{ request('min_price') }}">
          @endif

          @if(request('max_price'))
            <input type="hidden" name="max_price" value="{{ request('max_price') }}">
          @endif

          <select
            name="sort"
            onchange="this.form.submit()"
            class="border border-gray-200 rounded-xl px-4 py-3 text-sm bg-white outline-none focus:ring-2 focus:ring-yellow-400"
          >
            <option value="">Latest</option>
            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>
              Price Low - High
            </option>
            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
              Price High - Low
            </option>
          </select>

        </form>
      </div>

      <span class="lg:hidden block text-sm text-gray-500 mb-6">
        {{ $products->total() }} {{ Str::plural('Product', $products->total()) }}
      </span>

      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8">

        @forelse($products as $shoe)

          <div class="group bg-white rounded-3xl overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300 flex flex-col">

            {{-- Image --}}
            <a href="{{ route('products.show', $shoe->id) }}" class="bg-gray-50 h-56 sm:h-64 flex items-center justify-center relative overflow-hidden block">

              <img
                src="{{ asset('storage/'.$shoe->image) }}"
                alt="{{ $shoe->name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
              >

              @if($shoe->sold_percentage >= 80)
                <span class="absolute top-4 left-4 bg-red-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                  Almost Gone
                </span>
              @endif

              {{-- Wishlist Button --}}
              <form
                action="{{ route('wishlist.store', $shoe->id) }}"
                method="POST"
                class="absolute top-4 right-4"
                onclick="event.stopPropagation()"
              >
                @csrf
                <button
                  type="submit"
                  class="bg-white rounded-full w-10 h-10 shadow grid place-items-center text-gray-500 hover:text-red-500 transition"
                  aria-label="Toggle wishlist"
                >
                  @if($shoe->isWishlisted)
                    <ion-icon name="heart" class="text-lg text-red-500"></ion-icon>
                  @else
                    <ion-icon name="heart-outline" class="text-lg"></ion-icon>
                  @endif
                </button>
              </form>
            </a>

            {{-- Product Info --}}
            <div class="p-5 flex flex-col flex-1">

              {{-- Rating --}}
              <div class="flex items-center gap-1.5 text-sm mb-3">
                @if($shoe->reviews_count > 0)
                  <ion-icon name="star" class="text-yellow-400"></ion-icon>
                  <span class="font-semibold text-gray-700">
                    {{ number_format($shoe->reviews_avg_rating, 1) }}
                  </span>
                  <span class="text-gray-400">
                    ({{ $shoe->reviews_count }} {{ Str::plural('Review', $shoe->reviews_count) }})
                  </span>
                @else
                  <span class="text-gray-400">No Reviews</span>
                @endif
              </div>

              <a href="{{ route('products.show', $shoe->id) }}">
                <h3 class="text-lg font-bold text-gray-900 leading-snug hover:text-yellow-600 transition-colors">
                  {{ $shoe->name }}
                </h3>
              </a>

              <p class="text-gray-500 text-sm mt-1">
                {{ $shoe->brand->name }}
              </p>

              <div class="flex justify-between items-end mt-5 pt-4 border-t border-gray-50">

                <div class="min-w-0">
                  <p class="text-xl font-bold text-gray-900">
                    Rs {{ number_format($shoe->price) }}
                  </p>

                  <div class="mt-1.5 flex items-center gap-2">
                    <div class="h-1.5 w-16 rounded-full bg-gray-100 overflow-hidden">
                      <div class="h-full bg-orange-400" style="width: {{ min($shoe->sold_percentage, 100) }}%"></div>
                    </div>
                    <span class="text-[11px] text-gray-400 whitespace-nowrap">
                      {{ $shoe->sold_percentage }}% sold
                    </span>
                  </div>
                </div>

                <a
                  href="{{ route('products.show', $shoe->id) }}"
                  class="shrink-0 bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-orange-600 transition"
                  aria-label="View {{ $shoe->name }}"
                >
                  <ion-icon name="arrow-forward-outline" class="text-lg"></ion-icon>
                </a>

              </div>

            </div>

          </div>

        @empty

          <div class="col-span-full flex flex-col items-center justify-center text-center py-20 rounded-2xl border border-dashed border-gray-200">
            <ion-icon name="search-outline" class="text-4xl text-gray-300 mb-3"></ion-icon>
            <p class="text-gray-500 font-medium">No products found.</p>
            <p class="text-gray-400 text-sm mt-1">Try adjusting or clearing your filters.</p>
            <a
              href="{{ route('customer.shop') }}"
              class="mt-5 inline-flex items-center gap-1.5 rounded-full bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-semibold px-5 py-2.5 transition"
            >
              Clear filters
            </a>
          </div>

        @endforelse

      </div>

      @if($products->hasPages())
        <div class="mt-10">
          {{ $products->withQueryString()->links() }}
        </div>
      @endif

    </div>

  </div>

</div>

@endsection