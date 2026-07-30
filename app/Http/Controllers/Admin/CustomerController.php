<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{


public function index(Request $request)
{
    $customers = Customer::query();

    if ($request->search) {

        $customers->where('name','like',"%{$request->search}%")
                  ->orWhere('email','like',"%{$request->search}%");

    }

    $customers = $customers->paginate(10);


    if($request->ajax()){

        return view(
            'admin.customers.table',
            compact('customers')
        );

    }


    return view(
        'admin.customers.index',
        compact('customers')
    );
}

       

    



    public function show(Customer $customer)
    {

        return view(
            'admin.customers.show',
            compact('customer')
        );

    }



    public function status(Customer $customer)
    {

        $customer->update([

            'status' => !$customer->status

        ]);


        return back();

    }


}