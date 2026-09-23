@extends('admin.app')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Dashboard
            </h2>

            <p class="text-muted mb-0">
                Welcome to your e-commerce admin panel
            </p>
        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =========================
         Main Statistics
    ========================== --}}

    <div class="row g-4">


        {{-- Categories --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-2">
                                Total Categories
                            </p>

                            <h2 class="fw-bold">
                                {{ $totalCategories }}
                            </h2>

                        </div>

                        <div>
                            <span class="fs-1">
                                📁
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Products --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-2">
                                Total Products
                            </p>

                            <h2 class="fw-bold">
                                {{ $totalProducts }}
                            </h2>

                        </div>

                        <div>
                            <span class="fs-1">
                                🛍️
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Orders --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-2">
                                Total Orders
                            </p>

                            <h2 class="fw-bold">
                                {{ $totalOrders }}
                            </h2>

                        </div>

                        <div>
                            <span class="fs-1">
                                📦
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Customers --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-2">
                                Total Customers
                            </p>

                            <h2 class="fw-bold">
                                {{ $totalCustomers }}
                            </h2>

                        </div>

                        <div>
                            <span class="fs-1">
                                👥
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         Order Statistics
    ========================== --}}

    <div class="row g-4 mt-2">


        {{-- Pending --}}
        <div class="col-xl-4 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        Pending Orders
                    </h6>

                    <h3 class="fw-bold mt-2">
                        {{ $pendingOrders }}
                    </h3>

                    <a
                        href="{{ route('admin.orders') }}"
                        class="btn btn-sm btn-outline-warning mt-2"
                    >
                        View Orders
                    </a>

                </div>

            </div>

        </div>


        {{-- Processing --}}
        <div class="col-xl-4 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        Processing Orders
                    </h6>

                    <h3 class="fw-bold mt-2">
                        {{ $processingOrders }}
                    </h3>

                    <a
                        href="{{ route('admin.orders') }}"
                        class="btn btn-sm btn-outline-primary mt-2"
                    >
                        View Orders
                    </a>

                </div>

            </div>

        </div>


        {{-- Delivered --}}
        <div class="col-xl-4 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        Delivered Orders
                    </h6>

                    <h3 class="fw-bold mt-2">
                        {{ $deliveredOrders }}
                    </h3>

                    <a
                        href="{{ route('admin.orders') }}"
                        class="btn btn-sm btn-outline-success mt-2"
                    >
                        View Orders
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         Quick Actions
    ========================== --}}

    <div class="card border-0 shadow-sm mt-4">

    <div class="card-body">

        <h5 class="fw-bold mb-4">
            Quick Actions
        </h5>

        <div class="d-flex flex-wrap gap-2">

            {{-- Manage Categories --}}
            <a
                href="{{ route('admin.categories') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-folder"></i>
                Manage Categories
            </a>


            {{-- Manage Products --}}
            <a
                href="{{ route('admin.products') }}"
                class="btn btn-success"
            >
                <i class="bi bi-box-seam"></i>
                Manage Products
            </a>


            {{-- Manage Orders --}}
            <a
                href="{{ route('admin.orders') }}"
                class="btn btn-warning"
            >
                <i class="bi bi-cart"></i>
                Manage Orders
            </a>


            {{-- View Customers --}}
            <a
                href="{{ route('admin.customers') }}"
                class="btn btn-secondary"
            >
                <i class="bi bi-people"></i>
                View Customers
            </a>


            {{-- Logout --}}
            <a
                href="{{ route('admin.logout') }}"
                class="btn btn-danger"
                onclick="return confirm('Are you sure you want to logout?')"
            >
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>

        </div>

    </div>

</div>

</div>

@endsection