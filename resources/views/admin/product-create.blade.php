@extends('admin.app')

@section('title', 'Add Product')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Add Product
            </h2>

            <p class="text-muted mb-0">
                Create a new product
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


    <div class="card border-0 shadow-sm">

        <div class="card-body">


            <!-- Errors -->

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


            <form
                action="{{ route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


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

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                        value="{{ old('name') }}"
                        placeholder="Enter product name"
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
                        value="{{ old('sku') }}"
                        placeholder="Example: TS-001"
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
                        placeholder="Enter product description"
                    >{{ old('description') }}</textarea>

                </div>


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
                            value="{{ old('price') }}"
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
                            value="{{ old('sale_price') }}"
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
                            value="{{ old('stock', 0) }}"
                            min="0"
                            required
                        >

                    </div>

                </div>


                <!-- Images -->

                <div class="mb-3">

                    <label class="form-label">
                        Product Images
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        class="form-control"
                        accept="image/*"
                        multiple
                    >

                    <small class="text-muted">
                        You can select multiple images. JPG, JPEG, PNG or WEBP. Maximum 2MB each.
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
                    >

                        <option
                            value="1"
                            {{ old('status', 1) == 1 ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            {{ old('status') == '0' ? 'selected' : '' }}
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

                    Save Product

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