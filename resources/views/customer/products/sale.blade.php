@extends('customer.layouts.index')

@section('content')

<div class="container mx-auto px-4 sm:px-6 py-10 lg:py-14">

  {{-- Header --}}
  <div class="flex items-center gap-3 mb-2">
    <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-600 text-xs font-bold tracking-wider uppercase px-3 py-1.5 rounded-full">
      <ion-icon name="flame-outline"></ion-icon>
      Limited Time
    </span>
  </div>

  <h1 class="text-3xl sm:text-4xl font-serif font-bold text-gray-900 mb-2">
    Sale Products
  </h1>
  <p class="text-sm sm:text-base text-gray-500 mb-8 lg:mb-10">
    Marked-down favorites, while stock lasts.
  </p>

  @if($products->count())

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">

      @foreach($products as $shoe)

        @php
          $hasDiscount = (bool) $shoe->discount_price;
          $displayPrice = $hasDiscount ? $shoe->discount_price : $shoe->price;
          $percentOff = $hasDiscount && $shoe->price > 0
              ? round((($shoe->price - $shoe->discount_price) / $shoe->price) * 100)
              : 0;
        @endphp

        <div class="group bg-white border border-gray-100 rounded-2xl sm:rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col">

          <a href="{{ route('products.show', $shoe->id) }}" class="relative block bg-gray-50 h-40 sm:h-48 lg:h-56 overflow-hidden">

            <img
              src="{{ asset('storage/'.$shoe->image) }}"
              alt="{{ $shoe->name }}"
              class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
            >

            @if($hasDiscount && $percentOff > 0)
              <span class="absolute top-3 left-3 bg-red-600 text-white text-[11px] sm:text-xs font-bold px-2.5 py-1 rounded-full shadow">
                -{{ $percentOff }}%
              </span>
            @endif

          </a>

          <div class="p-3.5 sm:p-5 flex flex-col flex-1">

            <p class="text-[11px] sm:text-xs uppercase tracking-wide text-gray-400 truncate">
              {{ $shoe->category->name ?? '' }}
            </p>

            <a href="{{ route('products.show', $shoe->id) }}">
              <h2 class="font-semibold text-sm sm:text-lg text-gray-900 mt-1 leading-snug line-clamp-2 hover:text-red-600 transition-colors">
                {{ $shoe->name }}
              </h2>
            </a>

            <div class="mt-2 sm:mt-3 flex items-baseline gap-2 flex-wrap">
              @if($hasDiscount)
                <span class="text-red-600 font-bold text-sm sm:text-lg">
                  PKR {{ number_format($displayPrice) }}
                </span>
                <span class="text-gray-400 line-through text-xs sm:text-sm">
                  PKR {{ number_format($shoe->price) }}
                </span>
              @else
                <span class="text-gray-900 font-bold text-sm sm:text-lg">
                  PKR {{ number_format($displayPrice) }}
                </span>
              @endif
            </div>

            <a
              href="{{ route('products.show', $shoe->id) }}"
              class="mt-auto block text-center bg-black text-white text-xs sm:text-sm font-semibold py-2 sm:py-2.5 rounded-lg sm:rounded-xl mt-4 hover:bg-red-600 transition-colors"
            >
              View Details
            </a>

          </div>

        </div>

      @endforeach

    </div>

    @if(method_exists($products, 'hasPages') && $products->hasPages())
      <div class="mt-10">
        {{ $products->withQueryString()->links() }}
      </div>
    @endif

  @else

    <div class="flex flex-col items-center justify-center text-center py-20 rounded-2xl border border-dashed border-gray-200">
      <ion-icon name="pricetags-outline" class="text-4xl text-gray-300 mb-3"></ion-icon>
      <p class="text-gray-500 font-medium">No sale items right now.</p>
      <p class="text-gray-400 text-sm mt-1">Check back soon — new deals drop regularly.</p>
      <a
        href="{{ route('customer.shop') }}"
        class="mt-5 inline-flex items-center gap-1.5 rounded-full bg-black hover:bg-gray-800 text-white text-sm font-semibold px-5 py-2.5 transition"
      >
        Browse all products
      </a>
    </div>

  @endif

</div>

@endsection