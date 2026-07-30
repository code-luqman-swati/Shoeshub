@extends('customer.layouts.index')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    My Wishlist
</h1>


<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">


@forelse($wishlists as $item)


<div class="bg-white rounded-3xl shadow p-5">


<img 
src="{{ asset('storage/'.$item->shoe->image) }}"
class="w-full h-64 object-cover rounded-xl"
>


<h2 class="text-xl font-bold mt-4">
{{ $item->shoe->name }}
</h2>


<p class="text-gray-500">
{{ $item->shoe->brand->name }}
</p>


<p class="font-bold mt-3">
Rs {{ $item->shoe->price }}
</p>

<a
href="{{ route('wishlist.cart.variant',$item->shoe_id) }}"
class="
bg-black
text-white
px-4
py-2
rounded-lg
inline-block
"
>
Select Options
</a>
<form 
action="{{ route('wishlist.destroy',$item->id) }}"
method="POST"
class="mt-4"
>

@csrf
@method('DELETE')


<button
class="
bg-red-500
text-white
px-4
py-2
rounded-lg
"
>
Remove
</button>


</form>


</div>


@empty

<p class="text-gray-500">
Your wishlist is empty.
</p>

@endforelse


</div>


@endsection