@extends('admin.app')

@section('title', 'Customer Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Customer Details
            </h2>

            <p class="text-muted mb-0">
                Customer information and orders
            </p>

        </div>


        <a
            href="{{ route('admin.customers') }}"
            class="btn btn-secondary"
        >

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </div>


    <!-- Customer Information -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row">

                <!-- Name -->

                <div class="col-md-4 mb-3">

                    <small class="text-muted">
                        Name
                    </small>

                    <h5 class="mb-0">
                        {{ $customer->name }}
                    </h5>

                </div>


                <!-- Email -->

                <div class="col-md-4 mb-3">

                    <small class="text-muted">
                        Email
                    </small>

                    <h5 class="mb-0">
                        {{ $customer->email }}
                    </h5>

                </div>


                <!-- Phone -->

                <div class="col-md-4 mb-3">

                    <small class="text-muted">
                        Phone
                    </small>

                    <h5 class="mb-0">
                        {{ $customer->phone ?? 'N/A' }}
                    </h5>

                </div>


                <!-- Customer ID -->

                <div class="col-md-4">

                    <small class="text-muted">
                        Customer ID
                    </small>

                    <h5 class="mb-0">
                        #{{ $customer->id }}
                    </h5>

                </div>


                <!-- Registered -->

                <div class="col-md-4">

                    <small class="text-muted">
                        Registered
                    </small>

                    <h5 class="mb-0">

                        {{ $customer->created_at?->format('d M Y') ?? 'N/A' }}

                    </h5>

                </div>


                <!-- Total Orders -->

                <div class="col-md-4">

                    <small class="text-muted">
                        Total Orders
                    </small>

                    <h5 class="mb-0">

                        {{ $customer->orders->count() }}

                    </h5>

                </div>

            </div>

        </div>

    </div>


    <!-- Customer Orders -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h5 class="fw-bold mb-3">

                <i class="bi bi-cart"></i>

                Customer Orders

            </h5>


            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Order ID
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Payment
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($customer->orders as $order)

                            <tr>

                                <td>

                                    <strong>
                                        #{{ $order->id }}
                                    </strong>

                                </td>


                                <td>

                                    ₹{{ number_format($order->total, 2) }}

                                </td>


                                <td>

                                    {{ strtoupper($order->payment_method) }}

                                </td>


                                <td>

                                    @if($order->order_status == 'pending')

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @elseif($order->order_status == 'processing')

                                        <span class="badge bg-info">
                                            Processing
                                        </span>

                                    @elseif($order->order_status == 'shipped')

                                        <span class="badge bg-primary">
                                            Shipped
                                        </span>

                                    @elseif($order->order_status == 'delivered')

                                        <span class="badge bg-success">
                                            Delivered
                                        </span>

                                    @elseif($order->order_status == 'cancelled')

                                        <span class="badge bg-danger">
                                            Cancelled
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    {{ $order->created_at?->format('d M Y') ?? 'N/A' }}

                                </td>


                                <td>

                                    <a
                                        href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >

                                        <i class="bi bi-eye"></i>

                                        View Order

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-4"
                                >

                                    <p class="text-muted mb-0">
                                        This customer has no orders yet.
                                    </p>

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