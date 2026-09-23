@extends('masterlayout')

@section('content')

<!-- =========================
     Breadcrumb Section
========================= -->
<section class="breadcrumb-option">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="breadcrumb__text">

                    <h4>Check Out</h4>

                    <div class="breadcrumb__links">

                        <a href="{{ route('home') }}">
                            Home
                        </a>

                        <a href="{{ route('shop') }}">
                            Shop
                        </a>

                        <span>
                            Check Out
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Breadcrumb Section End -->


<!-- =========================
     Checkout Section
========================= -->

<section class="checkout spad">

    <div class="container">


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


        <div class="checkout__form">


            <!-- =========================
                 Checkout Form
            ========================= -->

            <form
                action="{{ route('place.order') }}"
                method="POST"
            >

                @csrf


                <div class="row">


                    <!-- =========================
                         Customer Details
                    ========================= -->

                    <div class="col-lg-8 col-md-6">

                        <h6 class="checkout__title">
                            Billing Details
                        </h6>


                        <!-- Full Name -->

                        <div class="checkout__input">

                            <p>
                                Full Name <span>*</span>
                            </p>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                required
                            >

                            @error('name')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- Email + Phone -->

                        <div class="row">


                            <!-- Email -->

                            <div class="col-lg-6">

                                <div class="checkout__input">

                                    <p>
                                        Email <span>*</span>
                                    </p>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your email"
                                        required
                                    >

                                    @error('email')

                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>

                                    @enderror

                                </div>

                            </div>


                            <!-- Phone -->

                            <div class="col-lg-6">

                                <div class="checkout__input">

                                    <p>
                                        Phone <span>*</span>
                                    </p>

                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="Enter your phone number"
                                        required
                                    >

                                    @error('phone')

                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- Address -->

                        <div class="checkout__input">

                            <p>
                                Address <span>*</span>
                            </p>

                            <input
                                type="text"
                                name="address"
                                value="{{ old('address') }}"
                                placeholder="Street Address"
                                required
                            >

                            @error('address')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- City + State + Pincode -->

                        <div class="row">


                            <!-- City -->

                            <div class="col-lg-4">

                                <div class="checkout__input">

                                    <p>
                                        City <span>*</span>
                                    </p>

                                    <input
                                        type="text"
                                        name="city"
                                        value="{{ old('city') }}"
                                        placeholder="City"
                                        required
                                    >

                                    @error('city')

                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>

                                    @enderror

                                </div>

                            </div>


                            <!-- State -->

                            <div class="col-lg-4">

                                <div class="checkout__input">

                                    <p>
                                        State <span>*</span>
                                    </p>

                                    <input
                                        type="text"
                                        name="state"
                                        value="{{ old('state') }}"
                                        placeholder="State"
                                        required
                                    >

                                    @error('state')

                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>

                                    @enderror

                                </div>

                            </div>


                            <!-- Pincode -->

                            <div class="col-lg-4">

                                <div class="checkout__input">

                                    <p>
                                        Pincode <span>*</span>
                                    </p>

                                    <input
                                        type="text"
                                        name="pincode"
                                        value="{{ old('pincode') }}"
                                        placeholder="Pincode"
                                        required
                                    >

                                    @error('pincode')

                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>

                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- =========================
                         Order Summary
                    ========================= -->

                    <div class="col-lg-4 col-md-6">

                        <div class="checkout__order">


                            <h4 class="order__title">
                                Your Order
                            </h4>


                            <!-- Header -->

                            <div class="checkout__order__products">

                                Product

                                <span>
                                    Total
                                </span>

                            </div>


                            <!-- Products -->

                            <ul class="checkout__total__products">

                                @foreach($cart as $item)

                                    <li>

                                        {{ $item['name'] }}

                                        <span>

                                            ₹{{ number_format(
                                                $item['price'] * $item['quantity'],
                                                2
                                            ) }}

                                        </span>

                                    </li>

                                @endforeach

                            </ul>


                            <!-- Total -->

                            <ul class="checkout__total__all">


                                <li>

                                    Subtotal

                                    <span>

                                        ₹{{ number_format(
                                            $subtotal,
                                            2
                                        ) }}

                                    </span>

                                </li>


                                <li>

                                    Total

                                    <span>

                                        ₹{{ number_format(
                                            $subtotal,
                                            2
                                        ) }}

                                    </span>

                                </li>


                            </ul>


                            <!-- =========================
                                 Payment Method
                            ========================= -->

                            <div
                                class="payment-method"
                                style="margin-top: 25px;"
                            >

                                <h5 style="margin-bottom: 15px;">
                                    Payment Method
                                </h5>


                                <!-- Cash On Delivery -->

                                <div class="checkout__input__checkbox">

                                    <label for="cod">

                                        Cash on Delivery

                                        <input
                                            type="radio"
                                            name="payment_method"
                                            value="cod"
                                            id="cod"
                                            checked
                                        >

                                        <span class="checkmark"></span>

                                    </label>

                                </div>


                                <!-- Online Payment -->

                                <div class="checkout__input__checkbox">

                                    <label for="online">

                                        Online Payment

                                        <input
                                            type="radio"
                                            name="payment_method"
                                            value="online"
                                            id="online"
                                        >

                                        <span class="checkmark"></span>

                                    </label>

                                </div>


                                @error('payment_method')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                @enderror

                            </div>


                            <!-- =========================
                                 Place Order
                            ========================= -->

                            <button
                                type="submit"
                                class="site-btn"
                            >
                                PLACE ORDER
                            </button>


                        </div>

                    </div>


                </div>

            </form>

        </div>

    </div>

</section>

<!-- Checkout Section End -->

@endsection 