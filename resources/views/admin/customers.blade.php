@extends('admin.app')

@section('title', 'Customers')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Customers
            </h2>

            <p class="text-muted mb-0">
                View registered customers
            </p>

        </div>

    </div>


    <!-- Success Message -->

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Customers Table -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Customer
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Orders
                            </th>

                            <th>
                                Registered
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($customers as $customer)

                            <tr>

                                <!-- ID -->

                                <td>

                                    <strong>
                                        #{{ $customer->id }}
                                    </strong>

                                </td>


                                <!-- Customer -->

                                <td>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                            style="width: 40px; height: 40px;"
                                        >

                                            {{ strtoupper(substr($customer->name, 0, 1)) }}

                                        </div>

                                        <strong>
                                            {{ $customer->name }}
                                        </strong>

                                    </div>

                                </td>


                                <!-- Email -->

                                <td>

                                    {{ $customer->email }}

                                </td>


                                <!-- Phone -->

                                <td>

                                    {{ $customer->phone ?? 'N/A' }}

                                </td>


                                <!-- Orders -->

                                <td>

                                    <span class="badge bg-info">

                                        {{ $customer->orders_count }}

                                        Orders

                                    </span>

                                </td>


                                <!-- Registered -->

                                <td>

                                    {{ $customer->created_at?->format('d M Y') ?? 'N/A' }}

                                </td>


                                <!-- Action -->

                                <td>

                                    <a
                                        href="{{ route('admin.customers.show', $customer->id) }}"
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
                                    colspan="7"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="bi bi-people fs-1 text-muted"
                                    ></i>

                                    <p class="text-muted mt-2 mb-0">
                                        No customers found.
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