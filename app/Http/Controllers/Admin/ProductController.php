<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductController extends Controller
{
    // =========================
    // PRODUCT LIST
    // =========================
    public function index()
    {
        $products = Product::with(['category', 'images'])
            ->latest()
            ->get();

        return view('admin.products', compact('products'));
    }


    // =========================
    // ADD PRODUCT FORM
    // =========================
    public function create()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        return view('admin.product-create', compact('categories'));
    }


    // =========================
    // STORE PRODUCT
    // =========================
    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required|exists:categories,id',

            'name' => 'required|string|max:255',

            'sku' => 'required|string|max:255|unique:products,sku',

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'sale_price' => 'nullable|numeric|min:0|lte:price',

            'stock' => 'required|integer|min:0',

            'status' => 'required|boolean',

            'images' => 'nullable|array',

            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // Create Product

        $product = Product::create([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'sku' => $request->sku,

            'description' => $request->description,

            'price' => $request->price,

            'sale_price' => $request->sale_price,

            'stock' => $request->stock,

            'status' => $request->status,

        ]);


        // Upload Multiple Images

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $index => $image) {

                $imageName = time()
                    . '_'
                    . $index
                    . '_'
                    . $image->getClientOriginalName();

                $image->move(
                    public_path('uploads/products'),
                    $imageName
                );


                ProductImage::create([

                    'product_id' => $product->id,

                    'image' => $imageName,

                    'is_primary' => $index == 0 ? 1 : 0,

                    'sort_order' => $index,

                ]);
            }
        }


        return redirect()
            ->route('admin.products')
            ->with('success', 'Product added successfully');
    }


    // =========================
    // EDIT PRODUCT
    // =========================
    public function edit($id)
    {
        $product = Product::with('images')
            ->findOrFail($id);

        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        return view(
            'admin.product-edit',
            compact('product', 'categories')
        );
    }


    // =========================
    // UPDATE PRODUCT
    // =========================
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);


        $request->validate([

            'category_id' => 'required|exists:categories,id',

            'name' => 'required|string|max:255',

            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'sale_price' => 'nullable|numeric|min:0|lte:price',

            'stock' => 'required|integer|min:0',

            'status' => 'required|boolean',

            'images' => 'nullable|array',

            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        // Update Product

        $product->update([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'sku' => $request->sku,

            'description' => $request->description,

            'price' => $request->price,

            'sale_price' => $request->sale_price,

            'stock' => $request->stock,

            'status' => $request->status,

        ]);


        // Add New Images

        if ($request->hasFile('images')) {

            $existingImages = $product->images()->count();

            foreach ($request->file('images') as $index => $image) {

                $imageName = time()
                    . '_'
                    . $index
                    . '_'
                    . $image->getClientOriginalName();

                $image->move(
                    public_path('uploads/products'),
                    $imageName
                );


                ProductImage::create([

                    'product_id' => $product->id,

                    'image' => $imageName,

                    'is_primary' => $existingImages == 0 && $index == 0 ? 1 : 0,

                    'sort_order' => $existingImages + $index,

                ]);
            }
        }


        return redirect()
            ->route('admin.products')
            ->with('success', 'Product updated successfully');
    }


    // =========================
    // DELETE PRODUCT
    // =========================
    public function destroy($id)
    {
        $product = Product::with('images')
            ->findOrFail($id);


        // Delete physical images

        foreach ($product->images as $image) {

            $imagePath = public_path(
                'uploads/products/' . $image->image
            );

            if (file_exists($imagePath)) {

                unlink($imagePath);
            }
        }


        // Delete product
        // Product images will also be deleted
        // because of cascadeOnDelete()

        $product->delete();


        return redirect()
            ->route('admin.products')
            ->with('success', 'Product deleted successfully');
    }
    public function deleteImage($id)
{
    $image = ProductImage::findOrFail($id);

    // Physical image delete
    $imagePath = public_path(
        'uploads/products/' . $image->image
    );

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Database se image delete
    $image->delete();

    return back()->with(
        'success',
        'Product image deleted successfully'
    );
}
}