@extends('masterlayout')

@section('content')

<!-- Shop Details Section Begin -->
<section class="shop-details">

    <!-- Product Images -->
    <div class="product__details__pic">

        <div class="container">

            <!-- Breadcrumb -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="product__details__breadcrumb">

                        <a href="{{ url('/') }}">
                            Home
                        </a>

                        <a href="{{ route('shop') }}">
                            Shop
                        </a>

                        <span>
                            {{ $product->name }}
                        </span>

                    </div>

                </div>
            </div>


            <!-- Product Images -->
            <div class="row">

                <!-- Thumbnail -->
                <div class="col-lg-3 col-md-3">

                    <ul class="nav nav-tabs" role="tablist">

                        @forelse($product->images as $key => $image)

                            <li class="nav-item">

                                <a
                                    class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                    data-toggle="tab"
                                    href="#tabs-{{ $key }}"
                                    role="tab"
                                >

                                    <div
                                        class="product__thumb__pic set-bg"
                                        data-setbg="{{ asset('uploads/products/' . $image->image) }}"
                                    >
                                    </div>

                                </a>

                            </li>

                        @empty

                            <li class="nav-item">

                                <a
                                    class="nav-link active"
                                    data-toggle="tab"
                                    href="#tabs-default"
                                    role="tab"
                                >

                                    <div
                                        class="product__thumb__pic set-bg"
                                        data-setbg="{{ asset('pro_img.png') }}"
                                    >
                                    </div>

                                </a>

                            </li>

                        @endforelse

                    </ul>

                </div>


                <!-- Main Image -->
                <div class="col-lg-6 col-md-9">

                    <div class="tab-content">

                        @forelse($product->images as $key => $image)

                            <div
                                class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                id="tabs-{{ $key }}"
                                role="tabpanel"
                            >

                                <div class="product__details__pic__item">

                                    <img
                                        src="{{ asset('uploads/products/' . $image->image) }}"
                                        alt="{{ $product->name }}"
                                    >

                                </div>

                            </div>

                        @empty

                            <div
                                class="tab-pane active"
                                id="tabs-default"
                                role="tabpanel"
                            >

                                <div class="product__details__pic__item">

                                    <img
                                        src="{{ asset('pro_img.png') }}"
                                        alt="{{ $product->name }}"
                                    >

                                </div>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Product Details Content -->
    <div class="product__details__content">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col-lg-8">

                    <div class="product__details__text">


                        <!-- Product Name -->
                        <h4>
                            {{ $product->name }}
                        </h4>


                        <!-- Price -->
                        @if($product->sale_price)

                            <h3>

                                ${{ number_format($product->sale_price, 2) }}

                                <span>
                                    ${{ number_format($product->price, 2) }}
                                </span>

                            </h3>

                        @else

                            <h3>
                                ${{ number_format($product->price, 2) }}
                            </h3>

                        @endif


                        <!-- Description -->
                        @if($product->description)

                            <p>
                                {{ $product->description }}
                            </p>

                        @endif


                        <!-- ======================== -->
                        <!-- SIZE -->
                        <!-- ======================== -->

                        @if(isset($sizes) && $sizes->count() > 0)

                            <div class="product__details__option">

                                <div class="product__details__option__size">

                                    <span>
                                        Size:
                                    </span>

                                    @foreach($sizes as $sizeId)

                                        <label
                                            for="size-{{ $sizeId->name }}"
                                        >

                                            {{ strtoupper($sizeId->name) }}

                                            <input
                                                type="radio"
                                                name="size_id"
                                                id="size-{{ $sizeId->name }}"
                                                value="{{ $sizeId->id }}"
                                            >

                                        </label>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        <!-- ======================== -->
                        <!-- COLOR -->
                        <!-- ======================== -->

                        @if(isset($colors) && $colors->count() > 0)

                            <div class="product__details__option">

                                <div class="product__details__option__color">

                                    <span>
                                        Color:
                                    </span>

                                    @foreach($colors as $color)

                                        <label
                                            for="color-{{ $color->id }}"
                                            title="{{ $color->name }}"
                                            style="background-color: {{ $color->code ?? '#000000' }};"
                                        >

                                            <input
                                                type="radio"
                                                name="color_id"
                                                id="color-{{ $color->id }}"
                                                value="{{ $color->id }}"
                                            >

                                        </label>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        <!-- ======================== -->
                        <!-- QUANTITY + ADD TO CART -->
                        <!-- ======================== -->

                        @if($product->stock > 0)

                            <div class="product__details__cart__option">

                                <div class="quantity">

                                    <div class="pro-qty">

                                        <input
                                            type="text"
                                            name="quantity"
                                            value="1"
                                        >

                                    </div>

                                </div>


                                <a
                                    href="{{ route('cart.add', $product->id) }}"
                                    class="primary-btn"
                                >
                                    Add To Cart
                                </a>

                            </div>

                        @else

                            <div style="margin-top: 20px;">

                                <strong>
                                    Out of Stock
                                </strong>

                            </div>

                        @endif


                        <!-- ======================== -->
                        <!-- PRODUCT INFORMATION -->
                        <!-- ======================== -->

                        <div class="product__details__last__option">

                            <ul>

                                <li>

                                    <span>
                                        SKU:
                                    </span>

                                    {{ $product->sku }}

                                </li>


                                <li>

                                    <span>
                                        Category:
                                    </span>

                                    {{ $product->category->name ?? 'N/A' }}

                                </li>


                                <li>

                                    <span>
                                        Stock:
                                    </span>

                                    {{ $product->stock }}

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ======================== -->
            <!-- DESCRIPTION TAB -->
            <!-- ======================== -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="product__details__tab">

                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">

                                <a
                                    class="nav-link active"
                                    data-toggle="tab"
                                    href="#tabs-5"
                                    role="tab"
                                >
                                    Description
                                </a>

                            </li>

                        </ul>


                        <div class="tab-content">

                            <div
                                class="tab-pane active"
                                id="tabs-5"
                                role="tabpanel"
                            >

                                <div class="product__details__tab__content">

                                    @if($product->description)

                                        <p>
                                            {{ $product->description }}
                                        </p>

                                    @else

                                        <p>
                                            No description available.
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Shop Details Section End -->

@endsection