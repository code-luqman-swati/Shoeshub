@extends('customer.layouts.index')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 lg:py-10 overflow-visible">

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12 relative">

    {{-- LEFT SIDE IMAGES --}}
    <div>

      <div class="relative">

        {{-- Main Image --}}
        <div
          id="imageContainer"
          class="relative w-full h-72 sm:h-96 lg:h-[500px] overflow-hidden rounded-2xl border border-gray-100 bg-gray-50 lg:cursor-crosshair"
        >
          <img
            id="mainImage"
            src="{{ asset('storage/'.$shoe->image) }}"
            alt="{{ $shoe->name }}"
            class="w-full h-full object-cover"
          >
        </div>

        {{-- Zoom Image (desktop hover only) --}}
        <div
          id="zoomResult"
          class="hidden absolute left-full top-0 ml-6 w-[500px] h-[500px] bg-white border border-gray-100 rounded-2xl shadow-2xl bg-no-repeat z-50"
        ></div>

      </div>

      {{-- Thumbnails --}}
      <div class="flex gap-3 sm:gap-4 mt-5 overflow-x-auto pb-1">

        <img
          onclick="changeImage(this.src)"
          src="{{ asset('storage/'.$shoe->image) }}"
          alt="{{ $shoe->name }} thumbnail"
          class="w-16 h-16 sm:w-20 sm:h-20 shrink-0 object-cover rounded-lg cursor-pointer border-2 border-black"
        >

        @foreach($shoe->images as $image)
          <img
            onclick="changeImage(this.src)"
            src="{{ asset('storage/'.$image->image) }}"
            alt="{{ $shoe->name }} thumbnail"
            class="w-16 h-16 sm:w-20 sm:h-20 shrink-0 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-300 transition-colors"
          >
        @endforeach

      </div>

    </div>

    {{-- RIGHT SIDE PRODUCT INFO --}}
    <div>

      @if($shoe->reviews_count > 0)
        <div class="flex items-center gap-1.5 text-sm mb-3">
          <ion-icon name="star" class="text-yellow-400"></ion-icon>
          <span class="font-semibold text-gray-700">{{ number_format($shoe->reviews_avg_rating, 1) }}</span>
          <span class="text-gray-400">({{ $shoe->reviews_count }} {{ Str::plural('Review', $shoe->reviews_count) }})</span>
        </div>
      @endif

      <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
        {{ $shoe->name }}
      </h1>

      <div class="mt-3 text-2xl font-bold text-indigo-600">
        Rs {{ number_format($shoe->price) }}
      </div>

      <p class="text-gray-600 mt-5 leading-relaxed">
        {{ $shoe->description }}
      </p>

      <form action="{{ route('cart.add') }}" method="POST">

        @csrf
        <input type="hidden" name="shoe_id" value="{{ $shoe->id }}">

        {{-- Select Variant --}}
        <div class="mt-8">
          <h3 class="font-semibold mb-3 text-gray-800">
            Select Size &amp; Color
          </h3>

          <div class="flex flex-wrap gap-3">
            @foreach($shoe->variants as $variant)
              <label>
                <input
                  type="radio"
                  name="shoe_variant_id"
                  value="{{ $variant->id }}"
                  class="hidden peer"
                  required
                  {{ $variant->stock == 0 ? 'disabled' : '' }}
                >
                <div
                  class="px-5 py-2 border rounded-lg text-sm transition
                  {{ $variant->stock == 0
                      ? 'cursor-not-allowed opacity-40 line-through border-gray-200 text-gray-400'
                      : 'cursor-pointer border-gray-300 hover:bg-gray-100 peer-checked:bg-black peer-checked:text-white peer-checked:border-black' }}"
                >
                  {{ $variant->size->size }} - {{ $variant->color->name }}
                </div>
              </label>
            @endforeach
          </div>
        </div>

        {{-- Quantity --}}
        <div class="mt-8">
          <h3 class="font-semibold mb-3 text-gray-800">
            Quantity
          </h3>

          <div class="inline-flex items-center border border-gray-300 rounded-lg overflow-hidden">
            <button
              type="button"
              onclick="stepQuantity(-1)"
              class="w-11 h-11 grid place-items-center text-gray-600 hover:bg-gray-100 transition"
              aria-label="Decrease quantity"
            >
              <ion-icon name="remove-outline"></ion-icon>
            </button>
            <input
              id="quantityInput"
              type="number"
              name="quantity"
              value="1"
              min="1"
              class="w-14 h-11 text-center border-x border-gray-300 outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
            >
            <button
              type="button"
              onclick="stepQuantity(1)"
              class="w-11 h-11 grid place-items-center text-gray-600 hover:bg-gray-100 transition"
              aria-label="Increase quantity"
            >
              <ion-icon name="add-outline"></ion-icon>
            </button>
          </div>
        </div>

        {{-- Add Cart Button --}}
        <button
          type="submit"
          class="mt-8 w-full bg-black text-white py-4 rounded-xl text-lg font-semibold hover:bg-gray-800 transition"
        >
          Add To Cart
        </button>

      </form>

      {{-- Wishlist Button --}}
      <form
        action="{{ route('wishlist.store', $shoe->id) }}"
        method="POST"
        class="mt-4"
      >
        @csrf
        <button
          type="submit"
          class="w-full border border-gray-300 rounded-xl py-3 font-semibold transition flex items-center justify-center gap-2
          {{ $isWishlisted ? 'text-red-500 border-red-200 bg-red-50 hover:bg-red-100' : 'text-gray-700 hover:bg-red-50' }}"
        >
          @if($isWishlisted)
            <ion-icon name="heart" class="text-lg"></ion-icon> Already in Wishlist
          @else
            <ion-icon name="heart-outline" class="text-lg"></ion-icon> Add to Wishlist
          @endif
        </button>
      </form>

    </div>

  </div>

  {{-- Reviews Section --}}
  <div class="mt-16 lg:mt-20 max-w-3xl">

    <h2 class="text-2xl font-bold mb-6 text-gray-900">
      Customer Reviews
    </h2>

    {{-- Add Review --}}
    @auth('customer')
      <form
        action="{{ route('reviews.store', $shoe->id) }}"
        method="POST"
        class="bg-gray-50 p-6 rounded-2xl mb-8"
      >
        @csrf

        <h3 class="font-semibold mb-4 text-gray-800">
          Give Your Rating
        </h3>

        <select
          name="rating"
          class="border border-gray-200 rounded-lg px-4 py-2 mb-4 bg-white outline-none focus:ring-2 focus:ring-black/10"
          required
        >
          <option value="">Select Rating</option>
          <option value="5">★★★★★</option>
          <option value="4">★★★★</option>
          <option value="3">★★★</option>
          <option value="2">★★</option>
          <option value="1">★</option>
        </select>

        <textarea
          name="comment"
          placeholder="Write your review..."
          rows="4"
          class="w-full border border-gray-200 rounded-lg p-4 mb-4 bg-white outline-none focus:ring-2 focus:ring-black/10"
        ></textarea>

        <button class="bg-black text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-800 transition">
          Submit Review
        </button>
      </form>
    @endauth

    {{-- Existing Reviews --}}
    @forelse($shoe->reviews as $review)
      <div class="border-b border-gray-100 py-5">
        <div class="flex justify-between items-start gap-4">
          <h4 class="font-semibold text-gray-800">
            {{ $review->customer->name }}
          </h4>
          <span class="text-yellow-500 shrink-0">
            {{ str_repeat('★', $review->rating) }}
          </span>
        </div>
        <p class="text-gray-600 mt-2 leading-relaxed">
          {{ $review->comment }}
        </p>
      </div>
    @empty
      <p class="text-gray-400 text-sm">No reviews yet — be the first to share your thoughts.</p>
    @endforelse

  </div>

  {{-- Related Products --}}
  @if($relatedProducts->count())
    <div class="mt-16 lg:mt-20">

      <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-gray-900">
        Related Products
      </h2>

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        @foreach($relatedProducts as $product)
          <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition">
            <img
              src="{{ asset('storage/'.$product->image) }}"
              alt="{{ $product->name }}"
              class="w-full h-36 sm:h-48 object-cover"
            >
            <div class="p-3 sm:p-4">
              <h3 class="font-bold text-sm sm:text-lg text-gray-900 truncate">
                {{ $product->name }}
              </h3>
              <p class="text-gray-500 text-xs sm:text-sm truncate">
                {{ $product->brand->name }}
              </p>
              <p class="font-bold mt-2 sm:mt-3 text-sm sm:text-base text-gray-900">
                Rs {{ number_format($product->price) }}
              </p>
              <a
                href="{{ route('products.show', $product->id) }}"
                class="block text-center bg-black text-white text-xs sm:text-sm rounded-lg py-2 mt-3 sm:mt-4 hover:bg-gray-800 transition"
              >
                View Product
              </a>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  @endif

  {{-- Recently Viewed --}}
  @if($recentProducts->count())
    <div class="mt-16 lg:mt-20">

      <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-gray-900">
        Recently Viewed
      </h2>

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        @foreach($recentProducts as $product)
          <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition">
            <img
              src="{{ asset('storage/'.$product->image) }}"
              alt="{{ $product->name }}"
              class="w-full h-36 sm:h-48 object-cover"
            >
            <div class="p-3 sm:p-4">
              <h3 class="font-bold text-sm sm:text-base text-gray-900 truncate">
                {{ $product->name }}
              </h3>
              <p class="text-gray-500 text-xs sm:text-sm truncate">
                {{ $product->brand->name }}
              </p>
              <p class="font-bold mt-2 text-sm sm:text-base text-gray-900">
                Rs {{ number_format($product->price) }}
              </p>
              <a
                href="{{ route('products.show', $product->id) }}"
                class="block mt-3 sm:mt-4 bg-black text-white text-xs sm:text-sm text-center py-2 rounded-lg hover:bg-gray-800 transition"
              >
                View Product
              </a>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  @endif

</div>

<script>

// Change Main Image
function changeImage(src) {
  document.getElementById('mainImage').src = src;

  document.querySelectorAll('#zoomResult').forEach(function (z) {
    z.style.backgroundImage = `url(${src})`;
  });
}

// Quantity stepper
function stepQuantity(delta) {
  const input = document.getElementById('quantityInput');
  const next = Math.max(1, (parseInt(input.value, 10) || 1) + delta);
  input.value = next;
}

// Image Zoom — desktop pointer devices only, so it never interferes on mobile
const container = document.getElementById('imageContainer');
const image = document.getElementById('mainImage');
const zoom = document.getElementById('zoomResult');
const supportsZoom = window.matchMedia('(min-width: 1024px) and (hover: hover)').matches;

if (supportsZoom) {

  container.addEventListener('mouseenter', function () {
    zoom.classList.remove('hidden');
    zoom.style.backgroundImage = `url(${image.src})`;
  });

  container.addEventListener('mousemove', function (e) {
    const rect = container.getBoundingClientRect();

    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;

    zoom.style.backgroundSize = '220%';
    zoom.style.backgroundPosition = `${x}% ${y}%`;
  });

  container.addEventListener('mouseleave', function () {
    zoom.classList.add('hidden');
  });

}

</script>

@endsection