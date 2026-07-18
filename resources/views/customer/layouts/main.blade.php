@extends('customer.layouts.index')


@section('content')

<!-- !banner -->
      <div class="banner mt-10 lg:-mt-4 flex items-center justify-center">
        <div class="swiper swiper-js">
          <div
            class="swiper-wrapper h-64 lg:h-96 w-full lg:w-5/6 relative"
            id="swiperSlide"
          ></div>

          <div class="swiper-scrollbar"></div>
        </div>
      </div>
      <!--todo Title Categories  -->
      <div class="flex items-center justify-center mt-10">
        <div class="swiper categories_swiper">
          <div class="swiper-wrapper relative gap-4" id="titlecategories"></div>

          <div class="swiper-scrollbar"></div>
        </div>
      </div>

      <!--? Products and categories  -->
      <section
        class="w-full min-h-auto px-8 lg:px-0 lg:w-5/6 mx-auto mt-16 flex gap-8"
      >
        <aside class="sticky top-0 hidden lg:flex flex-col lg:w-1/4 max-h-screen">
          <div class="aside_section overflow-y-auto">
            <div class="categories w-full rounded-xl p-4 bg-white border shadow-lg">
              <h1 class="text-xl font-semibold mb-4">CATEGORY</h1>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Shirt</a>
                    <span>300</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Shorts & Jeans</a>
                    <span>30</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Jacket</a>
                    <span>50</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Dress & Frock</a>
                    <span>120</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Clothes
                   <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/dress.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Sports</a>
                    <span>300</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Formal</a>
                    <span>30</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Casual</a>
                    <span>50</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Safety Shoes</a>
                    <span>120</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Footwear
                    <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/shoes.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Earrings</a>
                    <span>300</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Couple Rings</a>
                    <span>30</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Necklace</a>
                    <span>50</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Jewelry
                   <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/jewelry.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Clothes Perfume</a>
                    <span>300</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Deodorant</a>
                    <span>30</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Jacket</a>
                    <span>50</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Dress & Frock</a>
                    <span>120</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Perfume
                    <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/perfume.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Shampoo</a>
                    <span>300</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Sunscreen</a>
                    <span>30</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Body Wash</a>
                    <span>50</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Makeup Kit</a>
                    <span>120</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Cosmetics
                    <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/cosmetics.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Sunglasses</a>
                    <span>23</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Lenses</a>
                    <span>53</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Glasses
                   <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/glasses.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
              <div class="border-b pb-3 text-lg text-gray-600">
                <details>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Wallet</a>
                    <span>300</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Purse</a>
                    <span>30</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Gym Backpack</a>
                    <span>50</span>
                  </div>
                  <div class="flex justify-between items-baseline text-sm">
                    <a href="#">Shopping Bag</a>
                    <span>120</span>
                  </div>
                  <summary>
                    <div class="flex items-center gap-2">
                      Bags
                    <img
    class="w-4 h-4"
    src="{{ asset('customer/assets/images/icons/bag.svg') }}"
    alt="productPicture"
/>
                    </div>
                  </summary>
                </details>
              </div>
            </div>

            <div
              class="bestsellers 2-72 h-auto mt-10 flex flex-col items-start justify-start gap-4"
            >
              <h2 class="text-lg font-semibold">BEST SELLERS</h2>
              <div class="flex items-center justify-start gap-2">
                <div
                  class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md"
                ><img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/1.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="text-gray-900">Baby Fabric Shoes</h4>
                  <div class="stars text-yellow-500">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                  </div>
                  <div class="flex items-center justify-start gap-4">
                    <s class="text-gray-500">$14.00</s> <strong>$7.00</strong>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-start gap-2">
                <div
                  class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md"
                >
                 <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/2.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="text-gray-900">Men's Hoodies T-Shirt</h4>
                  <div class="stars text-yellow-500">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                  </div>
                  <div class="flex items-center justify-start gap-4">
                    <s class="text-gray-500">$5.00</s> <strong>$2.00</strong>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-start gap-2">
                <div
                  class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md"
                >
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/3.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="text-gray-900">Girls T-Shirt</h4>
                  <div class="stars text-yellow-500">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                  </div>
                  <div class="flex items-center justify-start gap-4">
                    <s class="text-gray-500">$10.00</s> <strong>$5.00</strong>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-start gap-2">
                <div
                  class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md"
                >
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/4.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="text-gray-900">Woolen Hat For Men</h4>
                  <div class="stars text-yellow-500">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                  </div>
                  <div class="flex items-center justify-start gap-4">
                    <s class="text-gray-500">$24.00</s> <strong>$17.00</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>

        <div class="products w-full lg:w-3/4 flex flex-col">
          <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="NewArrivals flex flex-col gap-4">
              <h1 class="text-xl font-semibold border-b pb-4">New Arrivals</h1>

              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/clothes-1.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm text-sm">
                    Relaxed Short Full...
                  </h4>
                  <h4>Clothes</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$7.00</strong>
                    <s class="text-gray-500">$14.00</s>
                  </div>
                </div>
              </div>

              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/clothes-2.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm text-sm">
                    Girls Pnk Embro Desi...
                  </h4>
                  <h4>Clothes</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$21.00</strong>
                    <s class="text-gray-500">$24.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/clothes-3.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm text-sm">
                    Black Floral Wrap...
                  </h4>
                  <h4>Clothes</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$5.00</strong>
                    <s class="text-gray-500">$15.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/shirt-1.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm text-sm">
                    Pure Garment Dye...
                  </h4>
                  <h4>Mens Fashion</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$30.00</strong>
                    <s class="text-gray-500">$40.00</s>
                  </div>
                </div>
              </div>
            </div>
            <div class="Trending flex flex-col gap-4">
              <h1 class="text-xl font-semibold border-b pb-4">Trending</h1>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/sports-5.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm text-sm">
                    Running & Trekking...
                  </h4>
                  <h4>Sports</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$82.00</strong>
                    <s class="text-gray-500">$101.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/sports-2.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Trekking & Running...
                  </h4>
                  <h4>Sports</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$78.00</strong>
                    <s class="text-gray-500">$93.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
               <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/party-wear-1.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Womens Party Wea...
                  </h4>
                  <h4>Party Wear</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$27.00</strong>
                    <s class="text-gray-500">$32.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/sports-3.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Sports Claw Women...
                  </h4>
                  <h4>Sports</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$12.00</strong>
                    <s class="text-gray-500">$24.00</s>
                  </div>
                </div>
              </div>
            </div>
            <div class="TopRated flex flex-col gap-4">
              <h1 class="text-xl font-semibold border-b pb-4">Top Rated</h1>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/watch-3.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Pocket Watch Leather...
                  </h4>
                  <h4>Watches</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$32.00</strong>
                    <s class="text-gray-500">$53.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                 <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/jewellery-3.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Silver Deer Heart Neck...
                  </h4>
                  <h4>Jewellery</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$12.00</strong>
                    <s class="text-gray-500">$32.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                 <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/perfume.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Titan 100 Ml Womens
                  </h4>
                  <h4>Perfume</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$74.00</strong>
                    <s class="text-gray-500">$104.00</s>
                  </div>
                </div>
              </div>
              <div
                class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer"
              >
                <div class="w-20 h-20 p-2">
                  <img
    class="w-full h-full"
    src="{{ asset('customer/assets/images/products/belt.jpg') }}"
    alt=""
/>
                </div>
                <div class="text-gray-700">
                  <h4 class="font-bold text-gray-900 text-sm">
                    Men's Leather Rever...
                  </h4>
                  <h4>Belt</h4>
                  <div class="flex items-center justify-start gap-4">
                    <strong class="text-red-400">$17.00</strong>
                    <s class="text-gray-500">$23.00</s>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="day my-10">
            <h1 class="font-semibold text-xl border-b py-4">Deal Of The Day</h1>
            <div
              class="mt-10 w-full h-auto border rounded-lg flex flex-col lg:flex-row justify-between"
            >
              <img
    class="lg:w-1/2"
    src="{{ asset('customer/assets/images/products/shampoo.jpg') }}"
    alt=""
/>
              <div class="lg:w-1/2 flex flex-col items-start gap-2 p-4">
                <div class="stars text-yellow-500">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star-half-outline"></ion-icon>
                </div>
                <h4 class="font-bold text-lg">
                  SHAMPOO, CONDITIONER & FACEWASH PACKS
                </h4>
                <p>
                  Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor sit
                  amet consectetur Lorem ipsum dolor
                </p>
                <div>
                  <strong class="text-red-400 font-bold text-xl">$150.00</strong>
                  <s class="text-xl text-gray-500">$200.00</s>
                </div>
                <button
                  class="bg-red-500 text-white rounded-xl py-2 px-4 text-md font-semibold"
                >
                  ADD TO CART
                </button>
                <h3 class="mt-4 font-semibold text-sm">HURRY UP! OFFER ENDS IN:</h3>
                <div
                  id="reverseTimer"
                  class="flex justify-between items-center gap-4 font-semibold text-sm text-black"
                >
                  <h1
                    class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                    id="days"
                  ></h1>
                  <h1
                    class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                    id="hour"
                  ></h1>
                  <h1
                    class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                    id="minute"
                  ></h1>
                  <h1
                    class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                    id="second"
                  ></h1>
                </div>
              </div>
            </div>
          </div>

          <div class="newProductsContainer">
            <h1 class="font-semibold text-xl border-b py-4">New Products</h1>
            <div
              id="newProducts"
              class="newProducts grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
            ></div>
          </div>
        </div>
      </section>

      <div
        class="mt-10 w-full px-8 lg:px-0 lg:w-5/6 mx-auto flex flex-wrap lg:flex-nowrap flex-col lg:flex-row gap-8 mb-20"
      >
        <div class="testimonial w-full lg:w-2/6">
          <h1 class="text-xl font-semibold border-b pb-4 mb-8">Testimonial</h1>
          <div
            style="height: 23rem"
            class="w-full border rounded-xl flex flex-col items-center justify-center p-4"
          >
           <img
    class="w-20 h-20 rounded-full"
    src="{{ asset('customer/assets/images/testimonial-1.jpg') }}"
    alt="testimonial"
/>
            <h2 class="text-lg font-bold text-gray-600">ALAN DOE</h2>
            <h5 class="text-md">CEO & Founder Invision</h5>
           <img
    class="w-6 h-6 my-4"
    src="{{ asset('customer/assets/images/icons/quotes.svg') }}"
    alt="quotes"
/>
            <p class="text-sm w-4/5 mx-auto text-center">
              Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor sit
              amet.
            </p>
          </div>
        </div>

      <div
    class="w-full lg:w-3/6 rounded-lg flex items-center justify-center"
    style="background-image: url('{{ asset('customer/assets/images/cta-banner.jpg') }}')"
>
    ...
</div>
          <div
            class="flex flex-col items-center justify-center p-8 gap-4 bg-gray-100/70 rounded-lg w-3/4"
          >
            <button class="bg-gray-900 text-white p-2 rounded-lg">
              25% DISCOUNT
            </button>
            <h1 class="w-56 text-4xl font-bold text-center text-gray-800">
              Summer Collection
            </h1>
            <h5 class="text-lg font-semibold text-gray-500">Starting @ $10</h5>
            <button class="text-lg font-semibold text-gray-500">SHOP NOW</button>
          </div>
        </div>

        <div class="OurServices w-full lg:w-2/6">
          <h1 class="text-xl font-semibold border-b pb-4 mb-8">Our Services</h1>
          <div
            style="height: 23rem"
            class="w-full border rounded-xl flex flex-wrap justify-between lg:flex-col items-center lg:justify-center p-4 lg:px-8 lg:gap-8"
          >
            <div
              class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2"
            >
              <ion-icon class="text-red-500 text-4xl" name="boat-outline"></ion-icon>
              <div>
                <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                <p class="text-xs text-gray-600">For Order Over $100</p>
              </div>
            </div>

            <div
              class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2"
            >
              <ion-icon
                class="text-red-500 text-4xl"
                name="rocket-outline"
              ></ion-icon>
              <div>
                <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                <p class="text-xs text-gray-600">For Order Over $100</p>
              </div>
            </div>

            <div
              class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2"
            >
              <ion-icon class="text-red-500 text-4xl" name="call-outline"></ion-icon>
              <div>
                <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                <p class="text-xs text-gray-600">For Order Over $100</p>
              </div>
            </div>

            <div
              class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2"
            >
              <ion-icon
                class="text-red-500 text-4xl"
                name="arrow-undo-outline"
              ></ion-icon>
              <div>
                <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                <p class="text-xs text-gray-600">For Order Over $100</p>
              </div>
            </div>

            <div
              class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2"
            >
              <ion-icon
                class="text-red-500 text-4xl"
                name="ticket-outline"
              ></ion-icon>
              <div>
                <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                <p class="text-xs text-gray-600">For Order Over $100</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="w-full mx-auto flex my-10">
        <div class="swiper blog_swiper">
          <div class="swiper-wrapper" id="blog_swiper"></div>

          <div class="swiper-scrollbar"></div>
        </div>
      </div>


      @endsection