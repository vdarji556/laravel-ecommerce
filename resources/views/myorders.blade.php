@extends('masterlayout')

@section('content')

<!-- =========================
     Breadcrumb
========================= -->

<section class="breadcrumb-option">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="breadcrumb__text">

                    <h4>My Orders</h4>

                    <div class="breadcrumb__links">

                        <a href="{{ route('home') }}">
                            Home
                        </a>

                        <span>
                            My Orders
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     My Orders Section
========================= -->

<section class="shopping-cart spad">

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


        <div class="row">

            <div class="col-lg-12">


                <h4 style="margin-bottom: 30px;">
                    My Orders
                </h4>


                @if($orders->count() > 0)


                    @foreach($orders as $order)


                        <!-- =========================
                             Single Order
                        ========================= -->

                        <div
                            class="card"
                            style="
                                margin-bottom: 25px;
                                padding: 25px;
                                border: 1px solid #eeeeee;
                                border-radius: 5px;
                            "
                        >


                            <!-- Order Header -->

                            <div
                                class="row"
                                style="margin-bottom: 20px;"
                            >

                                <div class="col-lg-6">

                                    <h5>

                                        Order #{{ $order->id }}

                                    </h5>

                                    <p style="margin-top: 5px;">

                                        {{ $order->created_at->format('d M Y, h:i A') }}

                                    </p>

                                </div>


                                <div class="col-lg-6 text-lg-right">

                                    <strong>

                                        ₹{{ number_format(
                                            $order->total,
                                            2
                                        ) }}

                                    </strong>

                                </div>

                            </div>


                            <!-- =========================
                                 Products
                            ========================= -->

                            <div
                                style="
                                    border-top: 1px solid #eeeeee;
                                    padding-top: 15px;
                                "
                            >

                                @foreach($order->items as $item)

                                    <div
                                        class="row"
                                        style="
                                            padding: 10px 0;
                                            border-bottom: 1px solid #f5f5f5;
                                        "
                                    >

                                        <div class="col-lg-6">

                                            <strong>
                                                {{ $item->product_name }}
                                            </strong>

                                        </div>


                                        <div class="col-lg-2">

                                            Qty:
                                            {{ $item->quantity }}

                                        </div>


                                        <div class="col-lg-2">

                                            ₹{{ number_format(
                                                $item->price,
                                                2
                                            ) }}

                                        </div>


                                        <div class="col-lg-2">

                                            ₹{{ number_format(
                                                $item->total,
                                                2
                                            ) }}

                                        </div>

                                    </div>

                                @endforeach

                            </div>


                            <!-- =========================
                                 Order Information
                            ========================= -->

                            <div
                                class="row"
                                style="margin-top: 20px;"
                            >


                                <!-- Payment Method -->

                                <div class="col-lg-3">

                                    <p>

                                        <strong>
                                            Payment:
                                        </strong>

                                        {{ strtoupper(
                                            $order->payment_method
                                        ) }}

                                    </p>

                                </div>


                                <!-- Payment Status -->

                                <div class="col-lg-3">

                                    <p>

                                        <strong>
                                            Payment Status:
                                        </strong>

                                        <span>

                                            {{ ucfirst(
                                                $order->payment_status
                                            ) }}

                                        </span>

                                    </p>

                                </div>


                                <!-- Order Status -->

                                <div class="col-lg-3">

                                    <p>

                                        <strong>
                                            Order Status:
                                        </strong>

                                        <span>

                                            {{ ucfirst(
                                                $order->order_status
                                            ) }}

                                        </span>

                                    </p>

                                </div>


                                <!-- View Details -->

                                <div class="col-lg-3">

                                    <a
                                        href="{{ route(
                                            'order.details',
                                            $order->id
                                        ) }}"
                                        class="primary-btn"
                                    >

                                        VIEW DETAILS

                                    </a>

                                </div>


                            </div>


                        </div>


                    @endforeach


                @else


                    <!-- =========================
                         No Orders
                    ========================= -->

                    <div
                        style="
                            text-align: center;
                            padding: 60px 20px;
                        "
                    >

                        <h4>
                            No Orders Found
                        </h4>

                        <p style="margin: 15px 0 25px;">

                            You have not placed any order yet.

                        </p>


                        <a
                            href="{{ route('shop') }}"
                            class="primary-btn"
                        >

                            CONTINUE SHOPPING

                        </a>

                    </div>


                @endif


            </div>

        </div>

    </div>

</section>

@endsection