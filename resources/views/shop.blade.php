@extends('masterlayout')

@section('content')

<!-- =========================
     BREADCRUMB
========================= -->
<section class="breadcrumb-option">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="breadcrumb__text">

                    <h4>
                        @if(isset($category))
                            {{ $category->name }}
                        @else
                            Shop
                        @endif
                    </h4>

                    <div class="breadcrumb__links">

                        <a href="{{ url('/') }}">
                            Home
                        </a>

                        <span>Shop</span>

                        @if(isset($category))
                            <span>
                                {{ $category->name }}
                            </span>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     SHOP SECTION
========================= -->
<section class="shop spad">

    <div class="container">


        <!-- =========================
             CATEGORY SECTION
        ========================== -->
        <div class="row">

            <div class="col-lg-12">

                <div class="section-title">

                    <span>
                        Shop By Category
                    </span>

                    <h2>
                        Categories
                    </h2>

                </div>


                <div class="shop__categories">

                    <!-- ALL PRODUCTS -->
                    <a
                        href="{{ route('shop') }}"
                        class="{{ !isset($category) ? 'active' : '' }}"
                    >
                        All Products
                    </a>


                    <!-- CATEGORY LIST -->
                    @foreach($categories as $cat)

                        <a
                            href="{{ route('category.products', $cat->id) }}"
                            class="{{ isset($category) && $category->id == $cat->id ? 'active' : '' }}"
                        >
                            {{ $cat->name }}
                        </a>

                    @endforeach

                </div>

            </div>

        </div>


        <!-- =========================
             PRODUCT RESULT HEADER
        ========================== -->
        <div class="row">

            <div class="col-lg-12">

                <div class="shop__product__option">

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="shop__product__option__left">

                                @if($products->total() > 0)

                                    <p>

                                        @if(isset($category))
                                            {{ $category->name }} -
                                        @endif

                                        Showing
                                        {{ $products->firstItem() }}
                                        –
                                        {{ $products->lastItem() }}
                                        of
                                        {{ $products->total() }}
                                        results

                                    </p>

                                @else

                                    <p>
                                        No products found.
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             PRODUCTS
        ========================== -->
        <div class="row">

            @forelse($products as $product)

                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div
                        class="product__item {{ $product->sale_price ? 'sale' : '' }}"
                    >


                        <!-- =========================
                             PRODUCT IMAGE
                        ========================== -->
                        <div class="product__item__pic">

                            @if($product->images->first())

                                <img
src="{{ asset('uploads/products/' . $product->images->first()->image) }}"                                    alt="{{ $product->name }}"
                                    class="product-main-image"
                                >

                            @else

                                <div class="no-product-image">
                                    No Image
                                </div>

                            @endif


                            <!-- SALE LABEL -->
                            @if($product->sale_price)

                                <span class="label">
                                    Sale
                                </span>

                            @endif


                            <!-- =========================
                                 PRODUCT HOVER
                            ========================== -->
                            <ul class="product__hover">

                                <!-- Wishlist -->
                                <li>

                                    <a href="#">

                                        <img
                                            src="{{ asset('img/icon/heart.png') }}"
                                            alt="Wishlist"
                                        >

                                    </a>

                                </li>


                                <!-- Compare -->
                                <li>

                                    <a href="#">

                                        <img
                                            src="{{ asset('img/icon/compare.png') }}"
                                            alt="Compare"
                                        >

                                        <span>
                                            Compare
                                        </span>

                                    </a>

                                </li>


                                <!-- Product Details -->
                                <li>

                                    <a
                                        href="{{ route('shop.details', $product->id) }}"
                                    >

                                        <img
                                            src="{{ asset('img/icon/search.png') }}"
                                            alt="View Product"
                                        >

                                    </a>

                                </li>

                            </ul>

                        </div>


                        <!-- =========================
                             PRODUCT INFORMATION
                        ========================== -->
                        <div class="product__item__text">


                            <!-- PRODUCT NAME -->
                            <h6>
                                {{ $product->name }}
                            </h6>


                            <!-- PRODUCT DETAILS -->
                            <a
                                href="{{ route('shop.details', $product->id) }}"
                                class="add-cart"
                            >
                                View Product
                            </a>


                            <!-- =========================
                                 PRODUCT PRICE
                            ========================== -->
                            @if($product->sale_price)

                                <h5>

                                    ${{ number_format($product->sale_price, 2) }}

                                    <del>
                                        ${{ number_format($product->price, 2) }}
                                    </del>

                                </h5>

                            @else

                                <h5>
                                    ${{ number_format($product->price, 2) }}
                                </h5>

                            @endif

                        </div>

                    </div>

                </div>


            @empty


                <!-- =========================
                     NO PRODUCTS
                ========================== -->
                <div class="col-lg-12">

                    <div class="text-center">

                        <h4>
                            No products available.
                        </h4>

                    </div>

                </div>


            @endforelse

        </div>


        <!-- =========================
             PAGINATION
        ========================== -->
        @if($products->hasPages())

            <div class="row">

                <div class="col-lg-12">

                    <div class="product__pagination">

                        {{ $products->links() }}

                    </div>

                </div>

            </div>

        @endif


    </div>

</section>


<!-- =========================
     CUSTOM CSS
========================= -->
<style>

    /* =========================
       CATEGORY BUTTONS
    ========================== */

    .shop__categories {

        display: flex;
        flex-wrap: wrap;
        gap: 10px;

        margin-bottom: 40px;

    }


    .shop__categories a {

        display: inline-block;

        padding: 10px 20px;

        border: 1px solid #e5e5e5;

        color: #111111;

        background: #ffffff;

        font-size: 14px;

        font-weight: 600;

        transition: all 0.3s;

    }


    .shop__categories a:hover {

        background: #111111;

        color: #ffffff;

        border-color: #111111;

    }


    .shop__categories a.active {

        background: #111111;

        color: #ffffff;

        border-color: #111111;

    }


    /* =========================
       PRODUCT IMAGE
    ========================== */

    .product__item__pic {

        position: relative;

        width: 100%;

        height: 360px;

        overflow: hidden;

        background: #f5f5f5;

    }


    .product-main-image {

        width: 100%;

        height: 100%;

        object-fit: cover;

        display: block;

    }


    /* =========================
       NO IMAGE
    ========================== */

    .no-product-image {

        width: 100%;

        height: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #999;

        font-size: 15px;

    }

</style>

@endsection