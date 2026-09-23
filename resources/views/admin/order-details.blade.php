@extends('admin.app')

@section('title', 'Order Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Order #{{ $order->id }}
            </h2>

            <p class="text-muted mb-0">
                Order details and status
            </p>

        </div>


        <a
            href="{{ route('admin.orders') }}"
            class="btn btn-secondary"
        >

            <i class="bi bi-arrow-left"></i>

            Back to Orders

        </a>

    </div>


    <!-- Success -->

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Customer + Order Info -->

    <div class="row">


        <!-- Customer Details -->

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-person"></i>

                        Customer Details

                    </h5>


                    <p class="mb-2">

                        <strong>Name:</strong>

                        {{ $order->name }}

                    </p>


                    <p class="mb-2">

                        <strong>Email:</strong>

                        {{ $order->email }}

                    </p>


                    <p class="mb-2">

                        <strong>Phone:</strong>

                        {{ $order->phone }}

                    </p>


                    <p class="mb-0">

                        <strong>User ID:</strong>

                        {{ $order->user_id ?? 'Guest' }}

                    </p>

                </div>

            </div>

        </div>


        <!-- Shipping Address -->

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-geo-alt"></i>

                        Delivery Address

                    </h5>


                    <p class="mb-1">
                        {{ $order->address }}
                    </p>

                    <p class="mb-1">
                        {{ $order->city }},
                        {{ $order->state }}
                    </p>

                    <p class="mb-0">
                        PIN: {{ $order->pincode }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- Products -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">

                <i class="bi bi-box-seam"></i>

                Ordered Products

            </h5>


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Product
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Quantity
                            </th>

                            <th>
                                Total
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($order->items as $item)

                            <tr>

                                <td>

                                    {{ $item->product_name }}

                                </td>


                                <td>

                                    ₹{{ number_format($item->price, 2) }}

                                </td>


                                <td>

                                    {{ $item->quantity }}

                                </td>


                                <td>

                                    <strong>

                                        ₹{{ number_format($item->total, 2) }}

                                    </strong>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <!-- Total -->

            <div class="text-end">

                <h5>

                    Subtotal:

                    ₹{{ number_format($order->subtotal, 2) }}

                </h5>

                <h4 class="fw-bold">

                    Total:

                    ₹{{ number_format($order->total, 2) }}

                </h4>

            </div>

        </div>

    </div>


    <!-- Payment + Status -->

    <div class="row">


        <!-- Payment -->

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-credit-card"></i>

                        Payment Information

                    </h5>


                    <p>

                        <strong>
                            Method:
                        </strong>

                        {{ strtoupper($order->payment_method) }}

                    </p>


                    <p class="mb-0">

                        <strong>
                            Payment Status:
                        </strong>

                        @if($order->payment_status == 'paid')

                            <span class="badge bg-success">
                                Paid
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                {{ ucfirst($order->payment_status) }}
                            </span>

                        @endif

                    </p>

                </div>

            </div>

        </div>


        <!-- Update Status -->

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-arrow-repeat"></i>

                        Update Order Status

                    </h5>


                    <form
                        action="{{ route('admin.orders.status', $order->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <select
                            name="order_status"
                            class="form-select mb-3"
                            required
                        >

                            <option
                                value="pending"
                                {{ $order->order_status == 'pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>


                            <option
                                value="processing"
                                {{ $order->order_status == 'processing' ? 'selected' : '' }}
                            >
                                Processing
                            </option>


                            <option
                                value="shipped"
                                {{ $order->order_status == 'shipped' ? 'selected' : '' }}
                            >
                                Shipped
                            </option>


                            <option
                                value="delivered"
                                {{ $order->order_status == 'delivered' ? 'selected' : '' }}
                            >
                                Delivered
                            </option>


                            <option
                                value="cancelled"
                                {{ $order->order_status == 'cancelled' ? 'selected' : '' }}
                            >
                                Cancelled
                            </option>

                        </select>


                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >

                            <i class="bi bi-check-lg"></i>

                            Update Status

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection