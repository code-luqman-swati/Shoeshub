<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use App\Models\ShoeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ShoeImageController extends Controller
{


public function store(Request $request, Shoe $shoe)
{

    $request->validate([

        'images' => 'required',
        'images.*' => 'image|max:2048'

    ]);


    foreach($request->file('images') as $image)
    {

        $path = $image->store(
            'shoes',
            'public'
        );


        ShoeImage::create([

            'shoe_id'=>$shoe->id,
            'image'=>$path

        ]);

    }


    return back()->with(
        'success',
        'Images uploaded successfully'
    );

}

public function destroy(ShoeImage $image)
{


if(Storage::disk('public')
->exists($image->image))
{

Storage::disk('public')
->delete($image->image);

}



$image->delete();



return back()->with(
    'success',
    'Image deleted successfully'
);


}


}