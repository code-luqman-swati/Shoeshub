@extends('customer.layouts.index')


@section('content')


<div class="container mx-auto px-6 py-10">


<h1 class="text-3xl font-bold mb-8">
     Sale products
</h1>



<div class="grid grid-cols-2 md:grid-cols-4 gap-6">


@foreach($products as $shoe)


<div class="border rounded-lg p-4 shadow">


<img
src="{{ asset('storage/'.$shoe->image) }}"
class="w-full h-48 object-cover rounded"
>



<h2 class="font-semibold text-lg mt-3">
{{ $shoe->name }}
</h2>


<p class="text-gray-500">
{{ $shoe->category->name ?? '' }}
</p>


@if($shoe->discount_price)

    <div class="mt-2">
        <span class="text-gray-500 line-through">
            PKR {{ number_format($shoe->price) }}
        </span>

        <span class="ml-2 text-red-600 font-bold">
            PKR {{ number_format($shoe->discount_price) }}
        </span>
    </div>

@else

    <div class="mt-2 font-bold">
        PKR {{ number_format($shoe->discount_price) }}
    </div>

@endif



<a href="{{ route('products.show',$shoe->id) }}"
class="block mt-4 bg-black text-white text-center py-2 rounded">

View Details

</a>


</div>


@endforeach


</div>


</div>


@endsection