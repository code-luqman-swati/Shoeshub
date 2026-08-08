<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Http\Request;
 use Illuminate\Support\Str;


class CategoryController extends Controller
{
public function index(Request $request)
{
      $this->authorize('viewAny', Category::class);

    $categories = Category::query();


    if($request->search){

        $categories->where('name','like',"%{$request->search}%");

    }


    $categories = $categories->paginate(10);



    if($request->ajax()){

        return view(
            'admin.categories.table',
            compact('categories')
        );

    }


    return view(
        'admin.categories.index',
        compact('categories')
    );
}
public function create()

{
    $this->authorize('create', Category::class);

    $categories = Category::whereNull('parent_id')->get();

    return view('admin.categories.create', compact('categories'));
}



public function store(StoreCategoryRequest $request)
{
             $this->authorize('create', Category::class);

    $data = $request->validated();


    // Generate slug
    if ($request->parent_id) {

        $parent = Category::find($request->parent_id);

        $slug = Str::slug($parent->name . '-' . $request->name);

    } else {

        $slug = Str::slug($request->name);

    }


    // Make slug unique
    $originalSlug = $slug;
    $counter = 1;

    while (Category::where('slug', $slug)->exists()) {

        $slug = $originalSlug . '-' . $counter;
        $counter++;

    }

    $data['slug'] = $slug;


    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('categories', 'public');
    }


    Category::create($data);


    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category created successfully.');
}

    public function edit($id)
    {  
            $this->authorize('update', Category::class);
           $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }





public function update(Request $request, $id)
{
        $this->authorize('update', Category::class);
    $category = Category::findOrFail($id);

    $category->update([
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    // Update image only if a new image is uploaded
    if ($request->hasFile('image')) {

        // Delete old image
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $image = $request->file('image')->store('categories', 'public');

        $category->update([
            'image' => $image,
        ]);
    }

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category updated successfully.');
}

public function destroy($id)
{
         $this->authorize('delete', Category::class);

       $category = Category::findorfail($id);
         $category->delete();

    return response()->json([
        'success' => 'Category deleted successfully.'
    ]);
}
}