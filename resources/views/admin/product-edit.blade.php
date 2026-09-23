@extends('admin.app')

@section('title', 'Edit Product')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Product
            </h2>

            <p class="text-muted mb-0">
                Update product information
            </p>
        </div>

        <a
            href="{{ route('admin.products') }}"
            class="btn btn-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

    </div>


    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <!-- Success Message -->
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- Error Message -->
            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif


            <!-- Validation Errors -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- Update Product Form -->
            <form
                action="{{ route('admin.products.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <!-- Category -->
                <div class="mb-3">

                    <label class="form-label">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required
                    >

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Product Name -->
                <div class="mb-3">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $product->name) }}"
                        required
                    >

                </div>


                <!-- SKU -->
                <div class="mb-3">

                    <label class="form-label">
                        SKU
                    </label>

                    <input
                        type="text"
                        name="sku"
                        class="form-control"
                        value="{{ old('sku', $product->sku) }}"
                        required
                    >

                </div>


                <!-- Description -->
                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                    >{{ old('description', $product->description) }}</textarea>

                </div>


                <!-- Price / Sale Price / Stock -->
                <div class="row">

                    <!-- Price -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Price
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            value="{{ old('price', $product->price) }}"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>


                    <!-- Sale Price -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Sale Price
                        </label>

                        <input
                            type="number"
                            name="sale_price"
                            class="form-control"
                            value="{{ old('sale_price', $product->sale_price) }}"
                            min="0"
                            step="0.01"
                        >

                    </div>


                    <!-- Stock -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Stock
                        </label>

                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            value="{{ old('stock', $product->stock) }}"
                            min="0"
                            required
                        >

                    </div>

                </div>


                <!-- ========================= -->
                <!-- CURRENT PRODUCT IMAGES -->
                <!-- ========================= -->

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Current Images
                    </label>

                    <div class="d-flex flex-wrap gap-4">

                        @forelse($product->images as $image)

                            <div
                                class="border rounded p-2"
                                style="width: 160px;"
                            >

                                <!-- Product Image -->

                                <img
                                    src="{{ asset('uploads/products/' . $image->image) }}"
                                    alt="{{ $product->name }}"
                                    width="140"
                                    height="120"
                                    class="rounded"
                                    style="object-fit: cover; width: 100%;"
                                >


                                <!-- Primary Badge -->

                                @if($image->is_primary)

                                    <div class="text-center mt-2">

                                        <span class="badge bg-primary">
                                            <i class="bi bi-star-fill"></i>
                                            Primary
                                        </span>

                                    </div>

                                @endif


                                <!-- Delete Image -->

                                <form
                                    action="{{ route('admin.products.image.delete', $image->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this image?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm w-100"
                                    >

                                        <i class="bi bi-trash"></i>
                                        Delete

                                    </button>

                                </form>

                            </div>

                        @empty

                            <div class="text-muted">

                                <i class="bi bi-image"></i>

                                No images available.

                            </div>

                        @endforelse

                    </div>

                </div>


                <!-- ========================= -->
                <!-- ADD MORE IMAGES -->
                <!-- ========================= -->

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Add More Images
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        class="form-control"
                        accept="image/*"
                        multiple
                    >

                    <small class="text-muted">
                        You can select multiple images.
                        Leave empty if you don't want to add new images.
                    </small>

                </div>


                <!-- Status -->
                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option
                            value="1"
                            {{ old('status', $product->status) == 1 ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            {{ old('status', $product->status) == 0 ? 'selected' : '' }}
                        >
                            Inactive
                        </option>

                    </select>

                </div>


                <!-- Buttons -->

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-check-lg"></i>

                    Update Product

                </button>


                <a
                    href="{{ route('admin.products') }}"
                    class="btn btn-secondary"
                >

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection