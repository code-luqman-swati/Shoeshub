@extends('customer.layouts.index')

@section('content')


<h1 class="text-3xl font-bold mb-8">
    Checkout
</h1>



<div class="grid md:grid-cols-2 gap-8">



    <!-- Shipping Information -->

    <div class="bg-white border rounded-lg p-6">


        <h2 class="text-xl font-bold mb-5">
            Shipping Information
        </h2>



        <form action="{{ route('checkout.store') }}" method="POST">

            @csrf



            <!-- Customer Information -->

            <div class="mb-5 bg-gray-50 p-4 rounded">


                <p class="mb-2">
                    <strong>Name:</strong>

                    {{ auth('customer')->user()->name }}
                </p>


                <p>
                    <strong>Email:</strong>

                    {{ auth('customer')->user()->email }}
                </p>


            </div>




            <div class="mb-4">


                <label class="block mb-2 font-semibold">
                    Shipping Address
                </label>


                <textarea

                name="shipping_address"

                class="border w-full p-3 rounded"

                rows="4"

                required></textarea>


            </div>





            <div class="mb-4">


                <label class="block mb-2 font-semibold">
                    City
                </label>


                <input

                type="text"

                name="city"

                class="border w-full p-3 rounded"

                required>


            </div>





            <div class="mb-4">


                <label class="block mb-2 font-semibold">
                    Postal Code
                </label>


                <input

                type="text"

                name="postal_code"

                class="border w-full p-3 rounded">


            </div>





            <button

            type="submit"

            class="bg-black text-white px-6 py-3 rounded w-full">


                Place Order


            </button>



        </form>



    </div>









    <!-- Order Summary -->


    <div class="bg-white border rounded-lg p-6">



        <h2 class="text-xl font-bold mb-5">

            Order Summary

        </h2>





        @php

            $total = 0;

        @endphp





        @foreach($cart->items as $item)



            @php

                $subtotal = $item->price * $item->quantity;

                $total += $subtotal;

            @endphp






            <div class="flex items-center justify-between border-b py-4">





                <div class="flex gap-4">



                    <img

                    src="{{ asset('storage/'.$item->shoeVariant->shoe->image) }}"

                    class="w-20 h-20 object-cover rounded"

                    >





                    <div>



                        <h3 class="font-semibold">

                            {{ $item->shoeVariant->shoe->name }}

                        </h3>





                        <p class="text-gray-600">

                            Size:

                            {{ $item->shoeVariant->size->size }}

                        </p>





                        <p class="text-gray-600">

                            Color:

                            {{ $item->shoeVariant->color->name }}

                        </p>





                        <p class="text-gray-600">

                            Quantity:

                            {{ $item->quantity }}

                        </p>





                        <p class="text-gray-600">

                            Price:

                            ${{ $item->price }}

                        </p>




                    </div>



                </div>







                <div class="font-bold">


                    ${{ $subtotal }}


                </div>





            </div>






        @endforeach






        <div class="flex justify-between mt-6 text-xl font-bold">



            <span>

                Total

            </span>



            <span>

                ${{ $total }}

            </span>



        </div>





    </div>






</div>



@endsection