<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // =========================
    // CATEGORY LIST
    // =========================
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories', compact('categories'));
    }


    // =========================
    // ADD CATEGORY PAGE
    // =========================
    public function create()
    {
        return view('admin.category-create');
    }


    // =========================
    // SAVE CATEGORY
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);


        $imageName = null;


        // Upload category image
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/categories'),
                $imageName
            );
        }


        // Create category
        Category::create([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status,
        ]);


        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category added successfully');
    }


    // =========================
    // EDIT CATEGORY PAGE
    // =========================
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'admin.category-edit',
            compact('category')
        );
    }


    // =========================
    // UPDATE CATEGORY
    // =========================
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);


        // Existing image
        $imageName = $category->image;


        // New image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/categories'),
                $imageName
            );
        }


        // Update category
        $category->update([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status,
        ]);


        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category updated successfully');
    }


    // =========================
    // DELETE CATEGORY
    // =========================
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category deleted successfully');
    }
}