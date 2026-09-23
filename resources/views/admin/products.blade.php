@extends('admin.app')

@section('title', 'Products')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Products
            </h2>

            <p class="text-muted mb-0">
                Manage your products
            </p>

        </div>


        <a
            href="{{ route('admin.products.create') }}"
            class="btn btn-primary"
        >

            <i class="bi bi-plus-lg"></i>

            Add Product

        </a>

    </div>


    <!-- Products Table -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>
                                Image
                            </th>

                            <th>
                                Product
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                SKU
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Stock
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                <!-- Image -->

                                <td>

                                    @if($product->images->first())

                                        <img
                                            src="{{ asset('uploads/products/' . $product->images->first()->image) }}"
                                            alt="{{ $product->name }}"
                                            width="70"
                                            height="70"
                                            class="rounded border"
                                            style="object-fit: cover;"
                                        >

                                    @else

                                        <div
                                            class="bg-light border rounded d-flex align-items-center justify-content-center"
                                            style="width:70px;height:70px;"
                                        >

                                            <i class="bi bi-image text-muted"></i>

                                        </div>

                                    @endif

                                </td>


                                <!-- Product -->

                                <td>

                                    <strong>
                                        {{ $product->name }}
                                    </strong>

                                    <br>

                                    <small class="text-muted">
                                        ID: {{ $product->id }}
                                    </small>

                                </td>


                                <!-- Category -->

                                <td>

                                    {{ $product->category->name ?? 'No Category' }}

                                </td>


                                <!-- SKU -->

                                <td>

                                    <span class="badge bg-light text-dark">

                                        {{ $product->sku }}

                                    </span>

                                </td>


                                <!-- Price -->

                                <td>

                                    @if($product->sale_price)

                                        <strong>
                                            ₹{{ number_format($product->sale_price, 2) }}
                                        </strong>

                                        <br>

                                        <del class="text-muted">

                                            ₹{{ number_format($product->price, 2) }}

                                        </del>

                                    @else

                                        <strong>
                                            ₹{{ number_format($product->price, 2) }}
                                        </strong>

                                    @endif

                                </td>


                                <!-- Stock -->

                                <td>

                                    @if($product->stock > 0)

                                        <span class="badge bg-success">

                                            {{ $product->stock }}

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            Out of Stock

                                        </span>

                                    @endif

                                </td>


                                <!-- Status -->

                                <td>

                                    @if($product->status)

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->

                                <td>

                                    <div class="d-flex gap-2">

                                        <a
                                            href="{{ route('admin.products.edit', $product->id) }}"
                                            class="btn btn-sm btn-warning"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <form
                                            action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <i class="bi bi-box-seam fs-1 text-muted"></i>

                                    <h5 class="mt-3">
                                        No products found
                                    </h5>

                                    <a
                                        href="{{ route('admin.products.create') }}"
                                        class="btn btn-primary mt-2"
                                    >
                                        Add First Product
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection