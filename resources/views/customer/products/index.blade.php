@extends('customer.layouts.index')

@section('content')
{{-- Filters Sidebar --}}<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">


    <h2 class="text-xl font-bold text-gray-800 mb-8">
        Filters
    </h2>



    <form method="GET" action="{{ url()->current() }}">



        {{-- Brand --}}
        <div class="flex flex-wrap gap-3">


    {{-- All Brands Button --}}
 <a
href="{{ route('customer.shop') }}"
class="
inline-flex
items-center
px-5
py-2.5
rounded-full
border
border-gray-200
bg-gray-50
text-sm
cursor-pointer
transition
hover:bg-yellow-50
{{ !request('brand') ? 'bg-yellow-400 border-yellow-400' : '' }}
"
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
        >


        <span
        class="
        inline-flex
        items-center
        px-5
        py-2.5
        rounded-full
        border
        border-gray-200
        bg-gray-50
        text-sm
        cursor-pointer
        transition
        hover:bg-yellow-50
        peer-checked:bg-yellow-400
        peer-checked:border-yellow-400
        peer-checked:text-black
        "
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
                    class="
                    w-full
                    h-12
                    px-4
                    rounded-xl
                    border
                    border-gray-200
                    bg-gray-50
                    text-sm
                    outline-none
                    focus:ring-2
                    focus:ring-yellow-400
                    "
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
                    class="
                    w-full
                    h-12
                    px-4
                    rounded-xl
                    border
                    border-gray-200
                    bg-gray-50
                    text-sm
                    outline-none
                    focus:ring-2
                    focus:ring-yellow-400
                    "
                    >

                </div>



            </div>



        </div>





        {{-- Apply Button --}}
        <button
        type="submit"
        class="
        w-full
        h-12
        rounded-xl
        bg-yellow-400
        hover:bg-yellow-500
        text-black
        font-semibold
        text-sm
        transition
        shadow-sm
        hover:shadow-md
        "
        >

            Apply Filters

        </button>



        

<div class="flex justify-between items-center mb-8">


  


    <div>

        <form method="GET" action="{{ url()->current() }}">


            {{-- Keep brand filter --}}
            @if(request('brand'))
                <input 
                type="hidden" 
                name="brand" 
                value="{{ request('brand') }}">
            @endif


            {{-- Keep price filter --}}
            @if(request('min_price'))
                <input 
                type="hidden" 
                name="min_price" 
                value="{{ request('min_price') }}">
            @endif


            @if(request('max_price'))
                <input 
                type="hidden" 
                name="max_price" 
                value="{{ request('max_price') }}">
            @endif



            <select
            name="sort"
            onchange="this.form.submit()"
            class="
            border
            border-gray-200
            rounded-xl
            px-4
            py-3
            text-sm
            bg-white
            outline-none
            "
            >


                <option value="">
                    Latest
                </option>


                <option 
                value="price_low"
                {{ request('sort') == 'price_low' ? 'selected':'' }}
                >
                    Price Low - High
                </option>


                <option 
                value="price_high"
                {{ request('sort') == 'price_high' ? 'selected':'' }}
                >
                    Price High - Low
                </option>


            </select>


        </form>

    </div>


</div>


        {{-- Products --}}
      {{-- Products --}}
<div class="lg:col-span-3">


    <div class="flex justify-between items-center mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            Trending Products
        </h2>


        <span class="text-sm text-gray-500">
            {{ $products->total() }} Products
        </span>

    </div>



    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">


        @forelse($products as $shoe)


        <div class="
        group
        bg-white
        rounded-3xl
        overflow-hidden
        border
        border-gray-100
        hover:shadow-xl
        transition
        duration-300
        ">


            {{-- Image --}}
            <div class="
            bg-gray-50
            h-64
            flex
            items-center
            justify-center
            relative
            overflow-hidden
            ">


                <img
                src="{{ asset('storage/'.$shoe->image) }}"
                class="
                w-full
                h-full
                object-cover
                group-hover:scale-105
                transition
                duration-300
                "
                >



              {{-- Wishlist Button --}}
<form 
action="{{ route('wishlist.store',$shoe->id) }}" 
method="POST"
class="absolute top-4 right-4"
>

@csrf

<button
type="submit"
class="
bg-white
rounded-full
w-10
h-10
shadow
text-gray-500
hover:text-red-500
transition
"
>

@if($shoe->isWishlisted)

❤️

@else

♡

@endif


</button>

</form>
            </div>





            {{-- Product Info --}}
            <div class="p-5">


                {{-- Rating --}}
                <div class="flex items-center gap-2 text-sm mb-3">


@if($shoe->reviews_count > 0)

<span class="text-yellow-400">
    ★
</span>


<span class="font-semibold text-gray-700">
    {{ number_format($shoe->reviews_avg_rating,1) }}
</span>


<span class="text-gray-400">
    ({{ $shoe->reviews_count }} Reviews)
</span>


@else

<span class="text-gray-400">
    No Reviews
</span>

@endif


</div>




                <h3 class="
                text-lg
                font-bold
                text-gray-900
                ">

                    {{ $shoe->name }}

                </h3>



                <p class="text-gray-500 text-sm mt-1">

                    {{ $shoe->brand->name }}

                </p>




                <div class="
                flex
                justify-between
                items-center
                mt-5
                ">


                    <div>

                        <p class="
                        text-xl
                        font-bold
                        text-gray-900
                        ">

                            Rs {{ $shoe->price }}

                        </p>


                       <span class="text-xs text-gray-400">
    Sold Out {{ $shoe->sold_percentage }}%
</span>
                    </div>



                    <a
                    href="{{ route('products.show',$shoe->id) }}"
                    class="
                    bg-orange-500
                    text-white
                    w-12
                    h-12
                    rounded-full
                    flex
                    items-center
                    justify-center
                    hover:bg-orange-600
                    transition
                    "
                    >

                        →

                    </a>



                </div>



            </div>


        </div>



        @empty


        <p class="text-gray-500">
            No products found.
        </p>


        @endforelse


    </div>

<div class="mt-10">

    {{ $products->withQueryString()->links() }}

</div>



@endsection