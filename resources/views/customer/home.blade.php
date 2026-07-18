@extends('customer.layouts.index')


@section('content')


<div class="container mx-auto px-6 py-10">


<h1 class="text-3xl font-bold">
Welcome to ShoeHub
</h1>


<p class="text-gray-600 mt-2">
Find the best shoes for every occasion
</p>



<!-- Categories -->

<section class="mt-10">

<h2 class="text-xl font-bold mb-5">
Categories
</h2>


<div class="grid grid-cols-2 md:grid-cols-4 gap-5">


@foreach($categories as $category)


<div class="border rounded-lg p-5 text-center">

<h3 class="font-semibold">
{{ $category->name }}
</h3>


</div>


@endforeach


</div>


</section>




<!-- Products -->

<section class="mt-12">


<h2 class="text-xl font-bold mb-5">
Latest Shoes
</h2>



<div class="grid grid-cols-2 md:grid-cols-4 gap-5">


@foreach($products as $shoe)


<div class="border rounded-lg p-4">


<img 
src="{{ asset('storage/'.$shoe->image) }}"
class="h-40 w-full object-cover"
>



<h3 class="font-semibold mt-3">

{{ $shoe->name }}

</h3>


<p class="text-red-500">

${{ $shoe->price }}

</p>



<button class="mt-3 bg-black text-white px-4 py-2 rounded">

Add To Cart

</button>


</div>


@endforeach


</div>



</section>


</div>


@endsection