@extends('layouts.app')


@section('content')


<h2 class="text-xl font-bold">
Add Size
</h2>



<form action="{{route('admin.sizes.store')}}"
method="POST">


@csrf


<input

type="text"

name="size"

placeholder="Enter size e.g 42"

class="border p-2 rounded"


>


<button

class="bg-blue-600 text-white px-4 py-2 rounded">

Save

</button>



</form>



@endsection