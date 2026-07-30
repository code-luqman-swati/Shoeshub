<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{

    public function store(Request $request, Shoe $shoe)
    {

        $request->validate([

            'rating' => 'required|integer|min:1|max:5',

            'comment' => 'nullable|string|max:1000',

        ]);



        Review::create([

            'customer_id' => Auth::guard('customer')->id(),

            'shoe_id' => $shoe->id,

            'rating' => $request->rating,

            'comment' => $request->comment,

        ]);



        return back()
            ->with('success','Review added successfully');

    }

}