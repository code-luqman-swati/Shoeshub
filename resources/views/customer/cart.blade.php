@extends('customer.layouts.index')

@section('content')

<div class="container mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-8">
        Shopping Cart
    </h1>

@if(!$cart || $cart->items->isEmpty())
        <div class="text-center py-10">

            <h2 class="text-xl text-gray-600">
                Your cart is empty
            </h2>

        </div>


    @else


    <div class="bg-white shadow rounded-lg p-6">


        @php
            $total = 0;
        @endphp


        @foreach($cart->items as $item)

            @php
                $subtotal = $item->price * $item->quantity;
                $total += $subtotal;
            @endphp


            <div class="flex items-center justify-between border-b py-5">


                <div class="flex items-center gap-5">


                    <img
                    src="{{ asset('storage/'.$item->shoeVariant->shoe->image) }}"
                    class="w-24 h-24 object-cover rounded"
                    >


                    <div>

                        <h2 class="font-semibold text-lg">
                            {{ $item->shoeVariant->shoe->name }}
                        </h2>


                        <p class="text-gray-600">
                            Price: ${{ $item->price }}
                        </p>


                      <div class="flex items-center gap-2">

    {{-- Decrease Quantity --}}
<div class="flex items-center gap-3 mt-2">


    <button type="button"
        onclick="updateCart({{ $item->id }}, 'minus')"
        class="px-3 py-1 bg-gray-200 rounded">
        -
    </button>


    <span id="qty-{{ $item->id }}" class="font-bold">
        {{ $item->quantity }}
    </span>


    <button type="button"
        onclick="updateCart({{ $item->id }}, 'plus')"
        class="px-3 py-1 bg-gray-200 rounded">
        +
    </button>


</div>
</div>


                    </div>


                </div>



                <div>


                   <p class="font-bold">
    $<span id="subtotal-{{ $item->id }}">
        {{ $subtotal }}
    </span>
</p>



                    <form action="{{ route('cart.remove',$item->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')


                        <button
                        class="text-red-500 mt-2">

                            Remove

                        </button>


                    </form>


                </div>


            </div>


        @endforeach



        <div class="flex justify-between mt-8">


            <h2 class="text-xl font-bold">
                Total
            </h2>


          <h2 class="text-xl font-bold">
    $<span id="cart-total">
        {{ $total }}
    </span>
</h2>

        </div>


            <a href="{{ route('checkout') }}"
            class="inline-block mt-6 bg-black text-white px-6 py-3 rounded">

            Proceed To Checkout

            </a>


    </div>


    @endif


</div>



<script>

function updateCart(id, action)
{

    let quantity = parseInt(
        document.getElementById('qty-'+id).innerHTML
    );


    if(action === 'plus')
    {
        quantity++;
    }
    else
    {
        quantity--;
    }



    fetch('/cart/update/'+id, {

        method:'POST',

        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },


        body:JSON.stringify({

            quantity: quantity

        })

    })


    .then(response=>response.json())


    .then(data=>{


        if(data.status)
        {

            document.getElementById('qty-'+id)
            .innerHTML = data.quantity;


        }
        else
        {

            alert(data.message);

        }


    });


}


</script>
@endsection