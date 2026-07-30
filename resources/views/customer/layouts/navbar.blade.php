
<header class="header w-full">
<!--! topHeader -->
      <!-- <div
        class="top-header w-screen flex flex-col items-center justify-between border-b"
      >
        <div class="flex w-full items-center justify-between p-4 md:px-20 border-b">
          <div class="icons hidden lg:flex items-center gap-2">
            <a
              class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center transition-all"
              href="#"
            >
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a
              class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center transition-all"
              href="#"
            >
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
            <a
              class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center transition-all"
              href="#"
            >
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </div>
          <h3 class="text-gray-400 font-semibold text-xs">
            FREE SHIPPING ON ORDERS OVER - Rs. 5000
          </h3>
          <div class="select hidden md:flex">
           <select class="mr-2 p-1 px-2 text-sm font-semibold" id="currency">
    <option value="PKR">PKR Rs</option>
    <option value="USD">USD $</option>
</select>
            <select class="mr-2 p-1 px-2 text-sm font-semibold" id="language">
    <option value="English">English</option>
    <option value="Urdu">Urdu</option>
</select>
          </div>
        </div> -->
        <div
          class="gap-4 flex flex-col sm:flex-row w-full items-center justify-between p-6 md:px-24"
        >
         <h1 class="font-semibold text-4xl text-gray-600">
    ShoeHub
</h1>
          <form class="relative w-full sm:w-3/5">

    <input
        class="w-full h-full p-2 border rounded-xl"
        placeholder="Search shoes, brands..."
        id="search"
        type="text"
        autocomplete="off"
    />


    <label class="absolute right-2 top-2" for="search">
        <i class="fa-solid fa-magnifying-glass cursor-pointer"></i>
    </label>



    {{-- Search Result Dropdown --}}
    <div
        id="searchResults"
        class="
        absolute
        top-12
        left-0
        w-full
        bg-white
        shadow-lg
        rounded-xl
        hidden
        z-50
        "
    >

    </div>


</form>
         <div class="icons hidden mr-2 text-3xl md:flex gap-8 text-gray-600">

    <div class="relative group">

        @if(Auth::guard('customer')->check())

            {{-- User Button --}}
            <button
                class="
                flex
                items-center
                gap-2
                hover:text-black
                transition
                "
            >

                <div
                    class="
                    w-10
                    h-10
                    rounded-full
                    bg-gray-100
                    flex
                    items-center
                    justify-center
                    "
                >

                    <ion-icon 
                        name="person-outline"
                        class="text-2xl"
                    ></ion-icon>

                </div>


                <span class="
                    text-sm
                    font-semibold
                    text-gray-700
                ">
                    {{ Auth::guard('customer')->user()->name }}
                </span>


                <ion-icon 
                    name="chevron-down-outline"
                    class="text-sm"
                ></ion-icon>


            </button>



            {{-- Dropdown --}}
            <div
            class="
            hidden
            group-hover:block
            absolute
            right-0
            top-full
            mt-3
            w-56
            bg-white
            rounded-2xl
            shadow-xl
            border
            border-gray-100
            overflow-hidden
            z-50
            "
            >


                {{-- Header --}}
                <div class="
                    px-5
                    py-4
                    bg-gray-50
                    border-b
                ">

                    <p class="font-bold text-gray-800">
                        {{ Auth::guard('customer')->user()->name }}
                    </p>

                    <p class="text-xs text-gray-500">
                        {{ Auth::guard('customer')->user()->email }}
                    </p>

                </div>



                <a
                href="#"
                class="
                flex
                items-center
                gap-3
                px-5
                py-3
                text-sm
                hover:bg-gray-100
                transition
                "
                >

                    <ion-icon name="person-outline"></ion-icon>

                    My Profile

                </a>



                <a
                href="{{ route('customer.orders') }}"
                class="
                flex
                items-center
                gap-3
                px-5
                py-3
                text-sm
                hover:bg-gray-100
                transition
                "
                >

                    <ion-icon name="bag-outline"></ion-icon>

                    My Orders

                </a>




                <a
                href="#"
                class="
                flex
                items-center
                gap-3
                px-5
                py-3
                text-sm
                hover:bg-gray-100
                transition
                "
                >

                    <ion-icon name="heart-outline"></ion-icon>

                    Wishlist

                </a>



                <div class="border-t">


                    <form action="{{ route('customer.logout') }}" method="POST">

                        @csrf

                        <button
                        class="
                        flex
                        items-center
                        gap-3
                        w-full
                        px-5
                        py-3
                        text-sm
                        text-red-600
                        hover:bg-red-50
                        transition
                        "
                        >

                            <ion-icon name="log-out-outline"></ion-icon>

                            Logout

                        </button>


                    </form>


                </div>


            </div>


        @else


            <a 
            href="{{ route('customer.login') }}"
            class="
            hover:text-black
            transition
            "
            >

                <div
                class="
                w-10
                h-10
                rounded-full
                bg-gray-100
                flex
                items-center
                justify-center
                "
                >

                    <ion-icon 
                        name="person-outline"
                        class="text-2xl"
                    ></ion-icon>

                </div>

            </a>


        @endif


    </div>

</div>
          <div class="relative">

    @if($wishlistCount > 0)

    <span
    class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full"
    >
        {{ $wishlistCount }}
    </span>

    @endif

    <a href="{{ route('wishlist.index') }}">
        <ion-icon name="heart-outline"></ion-icon>
    </a>

</div>
            <div class="relative">

    @if($cartCount > 0)

    <span
    class="
    text-xs
    text-center
    font-semibold
    text-white
    absolute
    -top-2
    -right-2
    w-4
    h-4
    bg-red-400
    rounded-full
    "
    >
        {{ $cartCount }}
    </span>

    @endif


    <a href="{{ route('cart.index') }}">
        <ion-icon name="bag-handle-outline"></ion-icon>
    </a>

</div>
         
        </div>
      </div>
      <!--! topHeader -->
      <!--? navbar -->
      <!--todo desktop Navbar -->
      <div class="desktopNavbar">
        <nav class="my-4 hidden lg:flex justify-center">
          <ul
            class="desktopNavbarUl flex justify-center items-center gap-12 font-sm font-bold text-gray-600"
          >
            <li class="nav_items relative">
              <a href="{{ route ('customer.shop') }}">HOME</a>
              <span
                class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"
              ></span>
            </li>
            <li class="nav_items relative category_nav_item">
              <a href="#Categories">SHOP</a>
              <span
                class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"
              ></span>
              <!--? hoverItems -->
        <ul
class="
categoriesItem 
absolute 
top-10 
shadow-lg 
rounded-xl 
hidden 
grid-cols-3 
p-6 
gap-8 
border 
text-gray-400 
font-normal 
bg-white 
z-10
"
>


<!-- Men's Shoes -->
<li>

    <h3 class="border-b py-2 mb-4 text-gray-900 font-semibold">
        Men's Shoes
    </h3>


    <ul class="flex flex-col items-start justify-start gap-2">

        @foreach($navCategories as $category)

            @if($category->slug == 'men')

                @foreach($category->children as $child)

                    <li>
                        <a 
                        class="hover:text-red-400"
                        href="{{ route('category.show',$child->slug) }}">
                            {{ $child->name }}
                        </a>
                    </li>

                @endforeach

            @endif

        @endforeach

    </ul>

</li>




<!-- Women's Shoes -->
<li>

    <h3 class="border-b py-2 mb-4 text-gray-900 font-semibold">
        Women's Shoes
    </h3>


    <ul class="flex flex-col items-start justify-start gap-2">


        @foreach($navCategories as $category)

            @if($category->slug == 'women')

                @foreach($category->children as $child)

                    <li>
                        <a 
                        class="hover:text-red-400"
                        href="{{ route('category.show',$child->slug) }}">
                            {{ $child->name }}
                        </a>
                    </li>

                @endforeach

            @endif

        @endforeach


    </ul>

</li>




<!-- Kids Shoes -->
<li>

    <h3 class="border-b py-2 mb-4 text-gray-900 font-semibold">
        Kids Shoes
    </h3>


    <ul class="flex flex-col items-start justify-start gap-2">


        @foreach($navCategories as $category)

            @if($category->slug == 'children')

                @foreach($category->children as $child)

                    <li>
                        <a 
                        class="hover:text-red-400"
                        href="{{ route('category.show',$child->slug) }}">
                            {{ $child->name }}
                        </a>
                    </li>

                @endforeach

            @endif

        @endforeach


    </ul>

</li>


</ul>


<!-- Brands -->

              <!--? hoverItems -->
      

<li class="nav_items relative">
    <a href="#Blog">BLOG</a>
    <span
        class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"
    ></span>
</li>


<li class="nav_items relative">
  <a href="{{ route('sale') }}">Sale</a>
    <span
        class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"
    ></span>
</li>

<li class="nav_items relative">
    <a href="{{ route('customer.orders') }}">My order</a>
    <span
        class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"
    ></span>
</li>

          

      <!--? mobile Navbar -->
      <div class="mobileNavbar">
        <!--? navbar button -->
        <div
          style="box-shadow: 0 0 0.3rem lightgray"
          class="z-10 bg-white w-96 lg:hidden flex justify-around items-center p-4 border rounded-t-xl fixed bottom-0 left-1/2 -translate-x-1/2 text-lg"
        >
          <button id="openNavbarButton" type="button">
            <ion-icon name="menu-outline"></ion-icon>
          </button>

          <button class="relative" type="button">
            <span
              class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full"
            >
              0
            </span>
            <ion-icon name="bag-handle-outline"></ion-icon>
          </button>

          <button type="button">
            <ion-icon name="home-outline"></ion-icon>
          </button>

          <button class="relative" type="button">
            <span
              class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full"
            >
              0
            </span>
            <ion-icon name="heart-outline"></ion-icon>
          </button>

          <button id="categoriesBtn" type="button">
            <ion-icon name="grid-outline"></ion-icon>
          </button>
        </div>
        <!--* overlay -->
        <div
          id="overlayNavbar"
          class="hidden fixed top-0 left-0 w-screen h-screen bg-gray-500/30 z-10"
        ></div>

        <!--! sidebarNavbar -->
        <div
          class="fixed top-0 w-72 h-screen bg-white p-4 shadow-lg hidden flex-col justify-start gap-4 text-lg font-semibold overflow-auto z-20"
          id="sidebarNavbar"
        >
          <div class="flex justify-between border-b-2 py-4">
            <h3 class="text-red-400">Menu</h3>
            <button class="closeButton hover:text-red-500">
              <ion-icon name="close-circle-outline"></ion-icon>
            </button>
          </div>
          <div class="mobile_navbar_item border-b pb-3 text-gray-600">Home</div>
          <div class="mobile_navbar_item border-b pb-3 text-gray-600">
            <details>
          <a href="#">Sneakers</a>
          <a href="#">Running Shoes</a>
          <a href="#">Casual Shoes</a>
          <a href="#">Formal Shoes</a>
          <a href="#">Boots</a>
          <a href="#">Sandals</a>
              <summary>Men's</summary>
            </details>
          </div>
          <div class="mobile_navbar_item border-b pb-3 text-gray-600">
    <details>
        <a href="#">Sneakers</a>
        <a href="#">Heels</a>
        <a href="#">Flats</a>
        <a href="#">Sandals</a>
        <a href="#">Boots</a>
        <a href="#">Formal Shoes</a>
        <summary>Women's</summary>
    </details>
</div>
          
          <div class="mobile_navbar_item border-b pb-3 text-gray-600">
    <details>
        <a href="#">Boys Shoes</a>
        <a href="#">Girls Shoes</a>
        <a href="#">School Shoes</a>
        <a href="#">Sports Shoes</a>
        <a href="#">Casual Shoes</a>
        <summary>Kids</summary>
    </details>
</div><div class="mobile_navbar_item border-b pb-3 text-gray-600">
    <details>
        <a href="#">Running Shoes</a>
        <a href="#">Football Shoes</a>
        <a href="#">Basketball Shoes</a>
        <a href="#">Gym Shoes</a>
        <a href="#">Training Shoes</a>
        <summary>Sports</summary>
    </details>
</div>
        <div class="mobile_navbar_item border-b pb-3 text-gray-600">
    <a href="#">New Arrivals</a>
</div>
          <div class="mobile_navbar_item border-b pb-3 text-gray-600">
    <a href="#">Sale</a>
</div>

<div class="mobile_navbar_item border-b pb-3 text-gray-600">
    <details>
        <a href="#">Nike</a>
        <a href="#">Adidas</a>
        <a href="#">Puma</a>
        <a href="#">Bata</a>
        <a href="#">Service</a>
        <a href="#">Skechers</a>
        <summary>Brands</summary>
    </details>
</div>

          <div class="mobile_navbar_item border-b pb-3 text-gray-600">
            <details>
              <div class="border rounded-xl shadow-xl flex flex-col items-start">
                <a class="border-b w-full pb-2" href="#">English</a>
                <a class="border-b w-full pb-2" href="#">Persian</a>
              </div>
              <summary>Language</summary>
            </details>
          </div>
          <div class="mobile_navbar_item border-b pb-3 text-gray-600">
            <details>
              <div class="border rounded-xl shadow-xl flex flex-col items-start">
             <select class="mr-2 p-1 px-2 text-sm font-semibold" id="currency">
    <option value="PKR">PKR Rs</option>
    <option value="USD">USD $</option>
</select>
              </div>
              <summary>Currency</summary>
            </details>
          </div>

          <div class="icons flex items-center justify-center gap-4">
            <a
              class="text-gray-900 bg-gray-300/50 p-2 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center"
              href="#"
            >
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a
              class="text-gray-900 bg-gray-300/50 p-2 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center"
              href="#"
            >
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
            <a
              class="text-gray-900 bg-gray-300/50 p-2 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center"
              href="#"
            >
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </div>
        </div>

        <!--todo sidebarCategories -->
        <div
          id="sidebarCategories"
          class="fixed top-0 w-80 h-screen bg-white p-6 shadow-lg hidden flex-col justify-start gap-4 font-semibold overflow-auto z-20"
        >
          <div class="categories w-full h-auto">
            <div class="w-full flex items-center justify-between">
              <h1 class="text-lg font-semibold mb-4">CATEGORY</h1>
              <button class="closeButton text-xl hover:text-red-500">
                <ion-icon name="close-circle-outline"></ion-icon>
              </button>
            </div>
           <div
  class="border-b pb-3 text-lg text-gray-600"
>
  <details>

    <div class="flex justify-between items-baseline text-sm">
      <a href="#">Sneakers</a>
      <span>120</span>
    </div>

    <div class="flex justify-between items-baseline text-sm">
      <a href="#">Running Shoes</a>
      <span>80</span>
    </div>

    <div class="flex justify-between items-baseline text-sm">
      <a href="#">Formal Shoes</a>
      <span>50</span>
    </div>

    <div class="flex justify-between items-baseline text-sm">
      <a href="#">Casual Shoes</a>
      <span>100</span>
    </div>

    <summary>
      <div class="flex items-center gap-2">
        Men
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
                      <a href="#">Heels</a>
                      <span>60</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Flats</a>
                      <span>90</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Sandals</a>
                      <span>70</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Boots</a>
                      <span>40</span>
                      </div>


                      <summary>
                      <div class="flex items-center gap-2">
                      Women

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
                      <a href="#">School Shoes</a>
                      <span>100</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Boys Shoes</a>
                      <span>70</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Girls Shoes</a>
                      <span>80</span>
                      </div>


                      <summary>
                      <div class="flex items-center gap-2">
                      Kids

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
                      <a href="#">Football Shoes</a>
                      <span>40</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Basketball Shoes</a>
                      <span>30</span>
                      </div>

                      <div class="flex justify-between items-baseline text-sm">
                      <a href="#">Gym Shoes</a>
                      <span>50</span>
                      </div>


                      <summary>
                      <div class="flex items-center gap-2">
                      Sports

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
<a href="#">Nike</a>
<span>150</span>
</div>

<div class="flex justify-between items-baseline text-sm">
<a href="#">Adidas</a>
<span>120</span>
</div>

<div class="flex justify-between items-baseline text-sm">
<a href="#">Puma</a>
<span>90</span>
</div>

<div class="flex justify-between items-baseline text-sm">
<a href="#">Bata</a>
<span>80</span>
</div>


<summary>
<div class="flex items-center gap-2">
Brands

<img
class="w-4 h-4"
src="{{ asset('customer/assets/images/icons/shoes.svg') }}"
alt="productPicture"
/>

</div>
</summary>

</details>
</div>
</div>

         <div
class="bestsellers w-full h-auto mt-2 flex flex-col items-start justify-start gap-4"
>

<h2 class="text-lg font-semibold">
    BEST SELLERS
</h2>


<!-- Shoe 1 -->
<div class="flex items-center justify-start gap-2">

<div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
<img
class="w-full h-full"
src="{{ asset('customer/assets/images/products/1.jpg') }}"
alt="Nike Air Max"
/>
</div>

<div class="text-gray-700">

<h4 class="text-gray-900">
Nike Air Max
</h4>

<div class="stars text-yellow-500">
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star-half-outline"></ion-icon>
</div>

<div class="flex items-center justify-start gap-4">
<s class="text-gray-500">
Rs. 18000
</s>
<strong>
Rs. 15000
</strong>
</div>

</div>

</div>



<!-- Shoe 2 -->
<div class="flex items-center justify-start gap-2">

<div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">

<img
class="w-full h-full"
src="{{ asset('customer/assets/images/products/2.jpg') }}"
alt="Adidas Running Shoes"
/>

</div>


<div class="text-gray-700">

<h4 class="text-gray-900">
Adidas Running Shoes
</h4>


<div class="stars text-yellow-500">
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star-half-outline"></ion-icon>
<ion-icon name="star-outline"></ion-icon>
</div>


<div class="flex items-center justify-start gap-4">

<s class="text-gray-500">
Rs. 14000
</s>

<strong>
Rs. 11000
</strong>

</div>


</div>

</div>




<!-- Shoe 3 -->
<div class="flex items-center justify-start gap-2">

<div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">

<img
class="w-full h-full"
src="{{ asset('customer/assets/images/products/3.jpg') }}"
alt="Puma Sneakers"
/>

</div>


<div class="text-gray-700">

<h4 class="text-gray-900">
Puma Sneakers
</h4>


<div class="stars text-yellow-500">

<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star-outline"></ion-icon>
<ion-icon name="star-outline"></ion-icon>

</div>


<div class="flex items-center justify-start gap-4">

<s class="text-gray-500">
Rs. 12000
</s>

<strong>
Rs. 9000
</strong>

</div>


</div>

</div>




<!-- Shoe 4 -->
<div class="flex items-center justify-start gap-2">

<div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">

<img
class="w-full h-full"
src="{{ asset('customer/assets/images/products/4.jpg') }}"
alt="Bata Formal Shoes"
/>

</div>


<div class="text-gray-700">

<h4 class="text-gray-900">
Bata Formal Shoes
</h4>


<div class="stars text-yellow-500">

<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star"></ion-icon>
<ion-icon name="star-half-outline"></ion-icon>

</div>


<div class="flex items-center justify-start gap-4">

<s class="text-gray-500">
Rs. 8000
</s>

<strong>
Rs. 6500
</strong>

</div>


</div>

</div>


</div>
        </div>
</div>
</nav>


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

            results.innerHTML = `
            <div class="p-4 text-gray-500">
                No products found
            </div>
            `;

        }



        products.forEach(product => {


            results.innerHTML += `

<a 
href="/products/${product.id}"
class="
flex
items-center
gap-4
p-3
hover:bg-gray-100
rounded-xl
"
>


<img
src="/storage/${product.image}"
class="
w-14
h-14
rounded-lg
object-cover
"
/>



<div>

<div class="font-semibold text-gray-800">
${product.name}
</div>


<div class="text-sm text-gray-500">
${product.brand.name}
</div>


<div class="font-bold text-sm mt-1">
Rs ${product.price}
</div>


</div>


</a>

`;


        });



        results.classList.remove('hidden');


    });


});


</script>