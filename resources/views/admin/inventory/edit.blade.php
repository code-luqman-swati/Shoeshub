@extends('layouts.app')

@section('content')

<div class="mb-5">

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Update Inventory
    </h2>

</div>


<div class="rounded-xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">


    <div class="mb-6 grid grid-cols-1 gap-5 md:grid-cols-3">


        <div>
            <p class="text-sm text-gray-500">
                Shoe
            </p>

            <p class="font-medium text-gray-800 dark:text-white">
                {{ $variant->shoe->name }}
            </p>
        </div>


        <div>
            <p class="text-sm text-gray-500">
                Size
            </p>

            <p class="font-medium text-gray-800 dark:text-white">
                {{ $variant->size->size }}
            </p>
        </div>



        <div>
            <p class="text-sm text-gray-500">
                Color
            </p>

            <p class="font-medium text-gray-800 dark:text-white">
                {{ $variant->color->name }}
            </p>
        </div>


    </div>



    <form action="{{ route('inventory.update',$variant->id) }}" method="POST">

        @csrf
        @method('PUT')


        <div class="mb-5">

            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Stock Quantity
            </label>


            <input 
                type="number"
                name="stock"
                value="{{ old('stock',$variant->stock) }}"
                min="0"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
            >


            @error('stock')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror


        </div>



        <div class="flex gap-3">


            <button
                type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">

                Update Stock

            </button>



            <a href="{{ route('admin.inventory.index') }}"
               class="rounded-lg bg-gray-500 px-5 py-2 text-white hover:bg-gray-600">

                Cancel

            </a>


        </div>


    </form>


</div>


@endsection