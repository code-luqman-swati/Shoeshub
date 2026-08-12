@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            Add Purchase
        </h2>

        <a href="{{ route('admin.purchases.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded-lg">
            Back
        </a>

    </div>


    

    <form action="{{ route('admin.purchases.store') }}" method="POST">

        @csrf

@if($errors->any())

<div class="bg-red-100 text-red-600 p-3 rounded mb-5">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif
        {{-- Supplier --}}

       <div class="flex items-end gap-2">
    <div class="flex-1">
        <label class="block mb-2 font-medium">
            Supplier
        </label>

        <select
            name="supplier_id"
            id="supplier_id"
            class="w-full rounded-lg border-gray-300"
        >
            <option value="">Select Supplier</option>

            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button
        type="button"
        id="openSupplierModal"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg"
    >
        + New
    </button>
</div>


<div
    id="supplierModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50"
>
    <div class="bg-white rounded-lg w-full max-w-lg p-6">

        <h2 class="text-xl font-semibold mb-4">
            Add Supplier
        </h2>

      <div id="supplierForm">

    @csrf

    <input
        type="text"
        id="supplier_name"
        placeholder="Supplier Name"
        class="w-full border rounded-lg p-2 mb-3"
    >

    <input
        type="text"
        id="supplier_phone"
        placeholder="Phone"
        class="w-full border rounded-lg p-2 mb-3"
    >

    <input
        type="email"
        id="supplier_email"
        placeholder="Email"
        class="w-full border rounded-lg p-2 mb-3"
    >

    <textarea
        id="supplier_address"
        placeholder="Address"
        class="w-full border rounded-lg p-2 mb-4"
    ></textarea>

    <div class="flex justify-end gap-2">

        <button
            type="button"
            id="closeSupplierModal"
            class="px-4 py-2 border rounded"
        >
            Cancel
        </button>

        <button
            type="button"
            id="saveSupplier"
            class="px-4 py-2 bg-green-600 text-white rounded"
        >
            Save
        </button>

    </div>

</div>

    </div>
</div>

<div class="mb-5 py-5">

    <label class="block mb-2 font-medium text-white-200 dark:text-white">
        Purchase Date
    </label>


    <input 
        type="date"
        name="purchase_date"
        value="{{ date('Y-m-d') }}"
        class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

</div>
     {{-- Purchase Items --}}
<h3 class="text-lg font-semibold mb-4">
    Purchase Items
</h3>

<div id="items">
<div class="item-row grid grid-cols-8 gap-3 mb-3 items-center">


    {{-- Shoe --}}
    <div class="flex items-center gap-2 col-span-2">

        <select 
            class="shoe-select w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">

            <option value="">
                Select Shoe
            </option>

            @foreach($shoes as $shoe)

                <option value="{{ $shoe->id }}">
                    {{ $shoe->name }}
                </option>

            @endforeach

        </select>


        <button 
            type="button"
            class="openProductModal px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg whitespace-nowrap">

            + New

        </button>

    </div>



    {{-- Size --}}
    <select 
        class="size-select rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">

        <option value="">
            Select Size
        </option>

    </select>



    {{-- Color --}}
    <select 
        class="color-select rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">

        <option value="">
            Select Color
        </option>

    </select>



    {{-- Variant ID --}}
    <input 
        type="hidden"
        name="items[0][variant_id]"
        class="variant-id">



    {{-- Quantity --}}
    <input 
        type="number"
        name="items[0][quantity]"
        placeholder="Qty"
        class="quantity rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">



    {{-- Purchase Price --}}
    <input 
        type="number"
        name="items[0][price]"
        placeholder="Price"
        class="price rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">



    {{-- Subtotal --}}
    <input 
        type="number"
        readonly
        placeholder="0"
        class="subtotal rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 text-sm text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white">



    {{-- Remove --}}
    <button 
        type="button"
        class="remove-row flex items-center justify-center w-10 h-10
               bg-red-500 hover:bg-red-600
               text-white rounded-lg">

        X

    </button>


</div>

</div>

<button type="button"
        id="addRow"
        class="px-4 py-2 bg-gray-600 text-white rounded-lg mb-5">

    + Add Item

</button>



<div class="mb-5">

<label class="font-semibold">
Total Amount
</label>

<input type="text"
id="total"
readonly
class="w-full rounded-lg border-gray-300">

</div>

            <button class="px-5 py-2 bg-blue-600 text-white rounded-lg">
                Save Purchase
            </button>

        </div>


    </form>


</div>
<div id="productModal"
class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">


<div class="bg-white rounded-xl p-6 w-full max-w-xl">


<h2 class="text-xl font-semibold mb-5">
Add New Product
</h2>


<div class="grid grid-cols-2 gap-3">


<input 
id="product_name"
placeholder="Product Name"
class="border rounded-lg p-2">


<select id="product_brand"
class="border rounded-lg p-2">

<option value="">
Select Brand
</option>

@foreach($brands as $brand)

<option value="{{ $brand->id }}">
{{ $brand->name }}
</option>

@endforeach

</select>



<select id="product_category"
class="border rounded-lg p-2">

<option value="">
Select Category
</option>


@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach


</select>




<select id="product_gender"
class="border rounded-lg p-2">

<option value="male">
Male
</option>

<option value="female">
Female
</option>

<option value="unisex">
Unisex
</option>


</select>




<input
id="product_price"
type="number"
placeholder="Selling Price"
class="border rounded-lg p-2">


<input
id="product_sku"
placeholder="SKU"
class="border rounded-lg p-2">


</div>



<hr class="my-5">



<h3 class="font-semibold mb-3">
Variant
</h3>



<div class="grid grid-cols-2 gap-3">


<select id="variant_size"
class="border rounded-lg p-2">


<option value="">
Select Size
</option>


@foreach($sizes as $size)

<option value="{{ $size->id }}">
{{ $size->size }}
</option>

@endforeach


</select>




<select id="variant_color"
class="border rounded-lg p-2">


<option value="">
Select Color
</option>


@foreach($colors as $color)

<option value="{{ $color->id }}">
{{ $color->name }}
</option>

@endforeach


</select>


</div>



<div class="flex justify-end gap-2 mt-5">


<button
type="button"
id="closeProductModal"
class="px-4 py-2 border rounded-lg">

Cancel

</button>



<button
type="button"
id="saveProduct"
class="px-4 py-2 bg-green-600 text-white rounded-lg">

Save

</button>


</div>


</div>

</div>
@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function(){


    let index = 1;


    document.getElementById('addRow').onclick = function(){


        let row = document.querySelector('.item-row').cloneNode(true);


        row.querySelectorAll('select,input').forEach(function(input){


            if(input.name)
            {
                input.name = input.name.replace(
                    /\d+/,
                    index
                );
            }


            input.value = '';

        });



        document.getElementById('items')
            .appendChild(row);



        index++;


    };


});



document.addEventListener('click',function(e){


    if(e.target.classList.contains('remove-row'))
    {

        let rows = document.querySelectorAll('.item-row');


        if(rows.length > 1)
        {
            e.target.closest('.item-row').remove();

            calculateTotal();
        }

    }


});





document.addEventListener('input',function(e){


    if(
        e.target.classList.contains('quantity') ||
        e.target.classList.contains('price')
    )
    {

        let row = e.target.closest('.item-row');


        let qty = row.querySelector('.quantity').value || 0;

        let price = row.querySelector('.price').value || 0;


        row.querySelector('.subtotal').value =
            qty * price;


        calculateTotal();

    }


});





function calculateTotal()
{

    let total = 0;


    document.querySelectorAll('.subtotal')
    .forEach(function(input){

        total += Number(input.value) || 0;

    });



    document.getElementById('total').value = total;

}


let variants = @json(
    $shoes->pluck('variants')->flatten()
);

console.log(variants);




// Shoe -> Size

document.addEventListener('change', function(e){

    if(e.target.classList.contains('shoe-select'))
    {

        let row = e.target.closest('.item-row');

        let shoeId = e.target.value;

        let sizes = [];


        variants.forEach(function(variant){

            if(variant.shoe_id == shoeId)
            {

                if(!sizes.includes(variant.size_id))
                {
                    sizes.push(variant.size_id);
                }

            }

        });



        let sizeSelect = row.querySelector('.size-select');

        sizeSelect.innerHTML =
        '<option value="">Select Size</option>';


variants.forEach(function(variant){

    if(
        variant.shoe_id == shoeId
    )
    {

        sizeSelect.innerHTML +=
        `
        <option value="${variant.size_id}">
            ${variant.size.size}
        </option>
        `;

    }

});

    }

});




// Size -> Color
// Size -> Color

document.addEventListener('change', function(e){

    if(e.target.classList.contains('size-select'))
    {

        let row = e.target.closest('.item-row');


        let shoeId =
        row.querySelector('.shoe-select').value;


        let sizeId =
        e.target.value;



        let colorSelect =
        row.querySelector('.color-select');


        colorSelect.innerHTML =
        '<option value="">Select Color</option>';



        variants.forEach(function(variant){


            if(
                variant.shoe_id == shoeId &&
                variant.size_id == sizeId
            )
            {


                colorSelect.innerHTML +=
                `
                <option value="${variant.color_id}">
                    ${variant.color.name}
                </option>
                `;


            }


        });


    }

});




// Color -> Variant ID

document.addEventListener('change', function(e){


    if(e.target.classList.contains('color-select'))
    {


        let row = e.target.closest('.item-row');


        let shoeId =
        row.querySelector('.shoe-select').value;


        let sizeId =
        row.querySelector('.size-select').value;


        let colorId =
        e.target.value;



        let variantId = null;



        variants.forEach(function(variant){


            if(
                variant.shoe_id == shoeId &&
                variant.size_id == sizeId &&
                variant.color_id == colorId
            )
            {

                variantId = variant.id;

            }


        });



        row.querySelector('.variant-id').value = variantId;


        console.log("Variant ID:", variantId);


    }


});
          
document.getElementById('openSupplierModal').onclick = function () {
    let modal = document.getElementById('supplierModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
};


document.getElementById('closeSupplierModal').onclick = function () {
    let modal = document.getElementById('supplierModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
};


document.getElementById('saveSupplier').onclick = function(){

    let name = document.getElementById('supplier_name').value;
    let phone = document.getElementById('supplier_phone').value;
    let email = document.getElementById('supplier_email').value;
    let address = document.getElementById('supplier_address').value;


    fetch("{{ route('admin.suppliers.ajax.store') }}", {

        method: "POST",

        headers: {

            "Content-Type": "application/json",

            "X-CSRF-TOKEN": "{{ csrf_token() }}"

        },

        body: JSON.stringify({

            name:name,
            phone:phone,
            email:email,
            address:address

        })

    })

    .then(response => response.json())

    .then(data => {


        if(data.success)
        {

            let option = document.createElement('option');

            option.value = data.supplier.id;

            option.text = data.supplier.name;


            document.getElementById('supplier_id')
                .appendChild(option);


            document.getElementById('supplier_id').value =
                data.supplier.id;



            document.getElementById('supplierModal')
                .classList.add('hidden');


            document.getElementById('supplierForm')
                .querySelectorAll('input, textarea')
                .forEach(input => input.value='');


            alert("Supplier Added Successfully");

        }


    })

    .catch(error => {

        console.log(error);

    });


};

document.getElementById('saveProduct').onclick = function(){


fetch("{{ route('admin.shoes.ajax.store') }}",{


method:"POST",

headers:{

"Content-Type":"application/json",

"X-CSRF-TOKEN":"{{ csrf_token() }}"

},


body:JSON.stringify({

name:
document.getElementById('product_name').value,

brand_id:
document.getElementById('product_brand').value,

category_id:
document.getElementById('product_category').value,

gender:
document.getElementById('product_gender').value,

price:
document.getElementById('product_price').value,

sku:
document.getElementById('product_sku').value,

size_id:
document.getElementById('variant_size').value,

color_id:
document.getElementById('variant_color').value,


})


})


.then(res=>res.json())


.then(data=>{


console.log(data);


if(data.success)
{


alert("Product Created");


document.getElementById('productModal')
.classList.add('hidden');



}

});


};
   
   
   document.addEventListener('click', function(e){

    if(e.target.classList.contains('openProductModal'))
    {

        let modal = document.getElementById('productModal');

        modal.classList.remove('hidden');

        modal.classList.add('flex');

    }

});

document.getElementById('closeProductModal').onclick = function(){

    let modal = document.getElementById('productModal');

    modal.classList.add('hidden');

    modal.classList.remove('flex');

};
</script>

@endpush
@endsection