<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use Illuminate\Http\Request;


class SearchController extends Controller
{

    public function search(Request $request)
    {

        $query = $request->get('query');


        $products = Shoe::with('brand')
        ->where('name','LIKE',"%$query%")
        ->orWhereHas('brand', function($q) use ($query){

            $q->where('name','LIKE',"%$query%");

        })
        ->limit(5)
        ->get();



        return response()->json($products);

    }

}