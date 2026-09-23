@extends('masterlayout')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb__text">

                    <h4>Shopping Cart</h4>

                    <div class="breadcrumb__links">

                        <a href="{{ route('home') }}">
                            Home
                        </a>

                        <a href="{{ route('shop') }}">
                            Shop
                        </a>

                        <span>
                            Shopping Cart
                        </span>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">

    <div class="container">

        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        {{-- Error Message --}}
        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif


        @if(empty($cart))

            <!-- Empty Cart -->
            <div class="text-center py-5">

                <h3>Your Cart is Empty</h3>

                <p>
                    You haven't added any product to your cart yet.
                </p>

                <br>

                <a
                    href="{{ route('shop') }}"
                    class="primary-btn"
                >
                    Continue Shopping
                </a>

            </div>

        @else

            <div class="row">

                <!-- ========================= -->
                <!-- CART PRODUCTS -->
                <!-- ========================= -->

                <div class="col-lg-8">

                    <div class="shopping__cart__table">

                        <table>

                            <thead>

                                <tr>

                                    <th>Product</th>

                                    <th>Quantity</th>

                                    <th>Total</th>

                                    <th></th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($cart as $id => $item)

                                    <tr>

                                        <!-- PRODUCT -->
                                        <td class="product__cart__item">

                                            <div class="product__cart__item__pic">

                                                @if($item['image'])

                                                    <img
                                                        src="{{ asset('uploads/products/' . $item['image']) }}"
                                                        alt="{{ $item['name'] }}"
                                                        style="
                                                            width:80px;
                                                            height:80px;
                                                            object-fit:cover;
                                                        "
                                                    >

                                                @else

                                                    <span>
                                                        No Image
                                                    </span>

                                                @endif

                                            </div>


                                            <div class="product__cart__item__text">

                                                <h6>
                                                    {{ $item['name'] }}
                                                </h6>

                                                <h5>
                                                    ₹{{ number_format($item['price'], 2) }}
                                                </h5>

                                            </div>

                                        </td>


                                        <!-- QUANTITY -->
                                        <td class="quantity__item">

                                            <div class="quantity">

                                                <div class="pro-qty-2">

                                                    <input
                                                        type="text"
                                                        value="{{ $item['quantity'] }}"
                                                        readonly
                                                    >

                                                </div>

                                            </div>

                                        </td>


                                        <!-- TOTAL -->
                                        <td class="cart__price">

                                            ₹{{ number_format(
                                                $item['price'] * $item['quantity'],
                                                2
                                            ) }}

                                        </td>


                                        <!-- REMOVE -->
                                       <td class="cart__close">

        <a href="{{ route('cart.remove', $id) }}">
            <i class="fa fa-close"></i>
        </a>

</td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                    <!-- Continue Shopping -->
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="continue__btn">

                                <a href="{{ route('shop') }}">
                                    Continue Shopping
                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ========================= -->
                <!-- CART TOTAL -->
                <!-- ========================= -->

                <div class="col-lg-4">

                    <div class="cart__total">

                        <h6>
                            Cart Total
                        </h6>

                        <ul>

                            <li>
                                Subtotal

                                <span>
                                    ₹{{ number_format($subtotal, 2) }}
                                </span>
                            </li>


                            <li>
                                Total

                                <span>
                                    ₹{{ number_format($subtotal, 2) }}
                                </span>
                            </li>

                        </ul>


                        <a
                            href="{{ route('checkout') }}"
                            class="primary-btn"
                        >
                            Proceed to Checkout
                        </a>

                    </div>

                </div>

            </div>

        @endif

    </div>

</section>
<!-- Shopping Cart Section End -->

@endsection