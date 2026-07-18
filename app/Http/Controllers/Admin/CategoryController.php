<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
           $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }





public function update(Request $request, $id)
{
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
       $category = Category::findorfail($id);
         $category->delete();

    return response()->json([
        'success' => 'Category deleted successfully.'
    ]);
}
}