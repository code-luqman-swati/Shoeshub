<!DOCTYPE html>
<html lang="en">

<head>
    


  @include('customer.layouts.head')
  </head>
  <body>
    <!--! newspaper popup -->
    <div
      id="newspaper"
      class="z-20 fixed w-screen h-screen hidden items-center justify-center"
    >
      <div
        id="newspaperOverlay"
        class="z-10 fixed top-0 w-screen h-screen bg-[#00000066]"
      ></div>
      <div
        id="newspaperBox"
        class="z-20 w-4/5 lg:w-3/6 h-2/5 lg:h-3/5 bg-white flex items-center rounded-md overflow-hidden border shadow-md"
      >
        <div class="hidden md:flex md:w-1/2 h-full">
      <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/newsletter.png') }}"
    alt="newsletter"
/>
        </div>
        <div
          class="w-full md:w-1/2 h-full flex flex-col justify-center p-12 px-8 gap-4 relative"
        >
          <button
            class="closeButton absolute top-4 right-4 text-2xl hover:text-red-500"
          >
            <ion-icon name="close-circle-outline"></ion-icon>
          </button>
          <h3 class="text-xl font-bold text-gray-800">Subscribe Newsletter.</h3>
          <p class="text-md text-gray-600 font-semibold">
            Subscribe the <span class="text-lg font-semibold">Anon</span> to get
            latest products and discount update.
          </p>
          <input class="border p-2" type="email" placeholder="Email Address" />
          <button
            class="rounded-md self-center py-2 px-3 bg-gray-900 text-white hover:bg-red-500"
          >
            SUBSCRIBE
          </button>
        </div>
      </div>
    </div>

<header class="header w-full">
     @include('customer.layouts.navbar')
      <!--? Navbar -->
    </header>
  @if(session('error'))

<div class="max-w-7xl mx-auto mt-5">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        {{ session('error') }}
    </div>
</div>

@endif


@if(session('success'))

<div class="max-w-7xl mx-auto mt-5">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
</div>

@endif
    <main>
     @yield('content')
    </main>

    <!--todo footer -->
    <footer class="footer bg-[#212121]">
    @include('customer.layouts.footer')
    </footer>
    <!--! icons -->
<!-- Swiper -->
 @include('customer.layouts.scripts')
  </body>
</html>
