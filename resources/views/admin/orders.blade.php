@extends('admin.app')

@section('title', 'Manage Orders')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Manage Orders
            </h2>

            <p class="text-muted mb-0">
                View and manage customer orders
            </p>

        </div>

    </div>


    <!-- Success Message -->

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Orders Table -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Order ID
                            </th>

                            <th>
                                Customer
                            </th>

                            <th>
                                Items
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Payment
                            </th>

                            <th>
                                Order Status
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

                        @forelse($orders as $order)

                            <tr>

                                <!-- Order ID -->

                                <td>

                                    <strong>
                                        #{{ $order->id }}
                                    </strong>

                                </td>


                                <!-- Customer -->

                                <td>

                                    <div class="fw-semibold">
                                        {{ $order->name }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $order->email }}
                                    </small>

                                </td>


                                <!-- Items -->

                                <td>

                                    <span class="badge bg-secondary">

                                        {{ $order->items->sum('quantity') }}

                                        items

                                    </span>

                                </td>


                                <!-- Total -->

                                <td>

                                    <strong>
                                        ₹{{ number_format($order->total, 2) }}
                                    </strong>

                                </td>


                                <!-- Payment -->

                                <td>

                                    @if($order->payment_method == 'cod')

                                        <span class="badge bg-warning text-dark">
                                            COD
                                        </span>

                                    @else

                                        <span class="badge bg-info">
                                            Online
                                        </span>

                                    @endif

                                    <br>

                                    <small>

                                        {{ ucfirst($order->payment_status) }}

                                    </small>

                                </td>


                                <!-- Order Status -->

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


                                <!-- Date -->

                                <td>

                                    {{ $order->created_at?->format('d M Y') ?? 'N/A' }}

                                </td>


                                <!-- Action -->

                                <td>

                                    <a
                                        href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >

                                        <i class="bi bi-eye"></i>

                                        View

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="bi bi-cart-x fs-1 text-muted"
                                    ></i>

                                    <p class="text-muted mt-2 mb-0">
                                        No orders found.
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