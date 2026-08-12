@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">


<h2 class="text-xl font-semibold mb-6 text-gray-800 dark:text-white">
    Edit Purchase
</h2>


<form action="{{ route('admin.purchases.update',$purchase->id) }}"
      method="POST">

@csrf
@method('PUT')



{{-- Supplier --}}

<div class="mb-5">

<label class="block mb-2 font-medium text-gray-800 dark:text-white">
    Supplier
</label>


<select 
name="supplier_id"
class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white">


@foreach($suppliers as $supplier)

<option value="{{ $supplier->id }}"
@if($purchase->supplier_id == $supplier->id)
selected
@endif
>

{{ $supplier->name }}

</option>

@endforeach


</select>

</div>




{{-- Date --}}

<div class="mb-5">

<label class="block mb-2 font-medium text-gray-800 dark:text-white">
    Purchase Date
</label>


<input 
type="date"
name="purchase_date"
value="{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('Y-m-d') }}"
class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white">


</div>





<h3 class="text-lg font-semibold mb-4">
    Purchase Items
</h3>




<div id="items">


@foreach($purchase->items as $index=>$item)


<div class="item-row grid grid-cols-8 gap-3 mb-3 items-center">


{{-- Shoe --}}

<select 
class="shoe-select rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">


<option value="">
Select Shoe
</option>


@foreach($shoes as $shoe)


<option 
value="{{ $shoe->id }}"

@if($item->variant->shoe_id == $shoe->id)
selected
@endif
>

{{ $shoe->name }}

</option>


@endforeach


</select>





{{-- Size --}}

<select 
class="size-select rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">


<option value="">
Select Size
</option>


@foreach($item->variant->shoe->variants as $variant)


@if($variant->size_id == $item->variant->size_id)

<option selected value="{{ $variant->size_id }}">

{{ $variant->size->size }}

</option>

@endif


@endforeach


</select>






{{-- Color --}}

<select 
class="color-select rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800">


<option value="">
Select Color
</option>



<option selected value="{{ $item->variant->color_id }}">

{{ $item->variant->color->name }}

</option>



</select>





<input 
type="hidden"
name="items[{{$index}}][variant_id]"
value="{{ $item->shoe_variant_id }}"
class="variant-id">





<input 
type="number"
name="items[{{$index}}][quantity]"
value="{{ $item->quantity }}"
class="quantity rounded-lg border-gray-300"
placeholder="Qty">





<input 
type="number"
name="items[{{$index}}][price]"
value="{{ $item->purchase_price }}"
class="price rounded-lg border-gray-300"
placeholder="Price">





<input 
type="number"
readonly
value="{{ $item->subtotal }}"
class="subtotal rounded-lg border-gray-300 bg-gray-100">





<button
type="button"
class="remove-row bg-red-500 text-white rounded-lg px-3 py-2">

X

</button>



</div>


@endforeach


</div>




<button 
type="button"
id="addRow"
class="px-4 py-2 bg-gray-600 text-white rounded-lg mb-5">

+ Add Item

</button>





<div class="mb-5">

<label class="font-semibold">
Total Amount
</label>


<input 
readonly
id="total"
value="{{ $purchase->total_amount }}"
class="w-full rounded-lg border-gray-300">


</div>




<button 
class="px-5 py-2 bg-blue-600 text-white rounded-lg">

Update Purchase

</button>


</form>


</div>


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function(){


    let index = {{ $purchase->items->count() }};


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

    document.addEventListener('DOMContentLoaded', function(){

    let index = {{ $purchase->items->count() }};

    calculateTotal();


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

});




document.addEventListener('click',function(e){


    if(e.target.closest('.remove-row'))
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

calculateTotal();
</script>

@endpush
@endsection
