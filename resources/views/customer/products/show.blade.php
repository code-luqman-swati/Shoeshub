@extends('customer.layouts.index')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10 overflow-visible">

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 relative">

        {{-- LEFT SIDE IMAGES --}}
        <div>

            {{-- Main Image --}}
           <div class="relative">

    {{-- Main Image --}}
    <div
        id="imageContainer"
        class="relative w-full h-[500px] overflow-hidden rounded-xl border"
    >

        <img
            id="mainImage"
            src="{{ asset('storage/'.$shoe->image) }}"
            class="w-full h-full object-cover"
        >

    </div>


    {{-- Zoom Image --}}
    <div
        id="zoomResult"
        class="
        hidden
        absolute
        left-full
        top-0
        ml-6
        w-[600px]
        h-[600px]
        bg-white
        border
        rounded-xl
        shadow-xl
        bg-no-repeat
        z-50
        "
    ></div>

</div>


            {{-- Thumbnails --}}
            <div class="flex gap-4 mt-5">

                <img
                    onclick="changeImage(this.src)"
                    src="{{ asset('storage/'.$shoe->image) }}"
                    class="w-20 h-20 object-cover rounded-lg cursor-pointer border hover:border-black"
                >


                @foreach($shoe->images as $image)

                <img
                    onclick="changeImage(this.src)"
                    src="{{ asset('storage/'.$image->image) }}"
                    class="w-20 h-20 object-cover rounded-lg cursor-pointer border hover:border-black"
                >

                @endforeach

            </div>

        </div>



        {{-- RIGHT SIDE PRODUCT INFO --}}
        <div>


            {{-- Product Name --}}
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $shoe->name }}
            </h1>

            

            {{-- Price --}}
            <div class="mt-4 text-2xl font-bold text-indigo-600">
                Rs {{ $shoe->price }}
            </div>



            {{-- Description --}}
            <p class="text-gray-600 mt-5 leading-relaxed">
                {{ $shoe->description }}
            </p>



            <form action="{{ route('cart.add') }}" method="POST">

                @csrf

               
             {{-- Select Variant --}}

<div class="mt-8">

<h3 class="font-semibold mb-3">
    Select Size & Color
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
>


<div
class="
px-5 py-2
border
rounded-lg
cursor-pointer
peer-checked:bg-black
peer-checked:text-white
hover:bg-gray-100
">

{{ $variant->size->size }}
-
{{ $variant->color->name }}

</div>


</label>


@endforeach


</div>

</div>
                    




                {{-- Quantity --}}
                <div class="mt-8">

                    <h3 class="font-semibold mb-3">
                        Quantity
                    </h3>


                    <input
                    type="number"
                    name="quantity"
                    value="1"
                    min="1"
                    class="
                    border rounded-lg
                    px-4 py-2
                    w-24
                    "
                    >

                </div>



                {{-- Add Cart Button --}}
<button
class="
mt-8
w-full
bg-black
text-white
py-4
rounded-xl
text-lg
font-semibold
hover:bg-gray-800
transition
"
>

    Add To Cart

</button>


</form>


{{-- Wishlist Button --}}
<form 
action="{{ route('wishlist.store',$shoe->id) }}" 
method="POST"
class="mt-4"
>

@csrf


<button
type="submit"
class="
w-full
border
border-gray-300
rounded-xl
py-3
font-semibold
hover:bg-red-50
transition
"
>

@if($isWishlisted)

❤️ Already in Wishlist

@else

♡ Add to Wishlist

@endif


</button>


</form>


           


        </div>


    </div>

{{-- Reviews Section --}}

<div class="mt-12">


<h2 class="text-2xl font-bold mb-6">
    Customer Reviews
</h2>



{{-- Add Review --}}

@auth('customer')

<form 
action="{{ route('reviews.store',$shoe->id) }}"
method="POST"
class="bg-gray-50 p-6 rounded-xl mb-8"
>

@csrf


<h3 class="font-semibold mb-4">
    Give Your Rating
</h3>


<select
name="rating"
class="border rounded-lg px-4 py-2 mb-4"
required
>

<option value="">
Select Rating
</option>

<option value="5">
★★★★★
</option>

<option value="4">
★★★★
</option>

<option value="3">
★★★
</option>

<option value="2">
★★
</option>

<option value="1">
★
</option>


</select>



<textarea
name="comment"
placeholder="Write your review..."
class="
w-full
border
rounded-lg
p-4
mb-4
"
></textarea>



<button
class="
bg-black
text-white
px-6
py-3
rounded-xl
"
>
Submit Review
</button>


</form>


@endauth



{{-- Existing Reviews --}}

@foreach($shoe->reviews as $review)


<div class="border-b py-5">


<div class="flex justify-between">

<h4 class="font-semibold">
{{ $review->customer->name }}
</h4>


<span class="text-yellow-500">

{{ str_repeat('★',$review->rating) }}

</span>


</div>



<p class="text-gray-600 mt-2">
{{ $review->comment }}
</p>


</div>


@endforeach

{{-- Related Products --}}

<div class="mt-16">


<h2 class="text-3xl font-bold mb-8">
    Related Products
</h2>



<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


@foreach($relatedProducts as $product)


<div class="
bg-white
rounded-2xl
border
overflow-hidden
hover:shadow-lg
transition
">


<img
src="{{ asset('storage/'.$product->image) }}"
class="
w-full
h-48
object-cover
"
>


<div class="p-4">


<h3 class="font-bold text-lg">
{{ $product->name }}
</h3>


<p class="text-gray-500 text-sm">
{{ $product->brand->name }}
</p>


<p class="font-bold mt-3">
Rs {{ $product->price }}
</p>


<a
href="{{ route('products.show',$product->id) }}"
class="
block
text-center
bg-black
text-white
rounded-lg
py-2
mt-4
"
>

View Product

</a>


</div>


</div>


@endforeach


</div>


</div>

{{-- Recently Viewed --}}

@if($recentProducts->count())


<div class="mt-16">


<h2 class="text-3xl font-bold mb-8">
    Recently Viewed
</h2>



<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


@foreach($recentProducts as $product)


<div class="bg-white rounded-2xl border overflow-hidden">


<img
src="{{ asset('storage/'.$product->image) }}"
class="w-full h-48 object-cover"
>


<div class="p-4">


<h3 class="font-bold">
{{ $product->name }}
</h3>


<p class="text-gray-500">
{{ $product->brand->name }}
</p>


<p class="font-bold mt-2">
Rs {{ $product->price }}
</p>


<a
href="{{ route('products.show',$product->id) }}"
class="block mt-4 bg-black text-white text-center py-2 rounded-lg"
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
</div>



<script>

function changeImage(src)
{
    document.getElementById('mainImage').src = src;
}



let variants = @json($shoe->variants);


function checkVariant()
{

    let size = document.querySelector(
        'input[name="size_id"]:checked'
    );


    let color = document.querySelector(
        'input[name="color_id"]:checked'
    );


    if(size && color)
    {


        let variant = variants.find(function(item){

            return item.size_id == size.value 
            &&
            item.color_id == color.value;

        });



        if(variant)
        {

            document.getElementById(
                'shoe_variant_id'
            ).value = variant.id;


            console.log(
                "Variant Found:",
                variant.id
            );

        }

    }

}



document.querySelectorAll(
'.size-option, .color-option'
)
.forEach(function(input){

    input.addEventListener(
        'change',
        checkVariant
    );

});



// Change Main Image
function changeImage(src)
{
    document.getElementById('mainImage').src = src;
}


// Image Zoom
const container = document.getElementById('imageContainer');
const image = document.getElementById('mainImage');
const zoom = document.getElementById('zoomResult');


container.addEventListener('mouseenter', function(){

    zoom.classList.remove('hidden');

    zoom.style.backgroundImage = `url(${image.src})`;

});


container.addEventListener('mousemove', function(e){

    const rect = container.getBoundingClientRect();


    // Mouse position percentage
    const x = ((e.clientX - rect.left) / rect.width) * 100;

    const y = ((e.clientY - rect.top) / rect.height) * 100;


    zoom.style.backgroundImage = `url(${image.src})`;

    
    // Zoom level
    zoom.style.backgroundSize = "250%";


    // Move zoom according to mouse
    zoom.style.backgroundPosition = `${x}% ${y}%`;

});



container.addEventListener('mouseleave', function(){

    zoom.classList.add('hidden');

});

</script>

@endsection