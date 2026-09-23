<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Panel')
    </title>


    <!-- Bootstrap CSS -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <style>

        body {
            margin: 0;
            background: #f5f6fa;
            font-family: Arial, sans-serif;
        }


        /* =========================
           Sidebar
        ========================= */

        .admin-sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 250px;

            height: 100vh;

            background: #212529;

            color: white;

            z-index: 1000;

            overflow-y: auto;
        }


        .admin-logo {

            height: 70px;

            display: flex;

            align-items: center;

            padding: 0 25px;

            border-bottom: 1px solid #343a40;

            font-size: 21px;

            font-weight: bold;
        }


        .admin-logo i {

            margin-right: 10px;

        }


        /* Sidebar Links */

        .sidebar-menu {

            padding: 20px 12px;

        }


        .sidebar-menu-title {

            color: #adb5bd;

            font-size: 12px;

            text-transform: uppercase;

            padding: 10px 13px;

            margin-bottom: 5px;
        }


        .sidebar-menu a {

            display: flex;

            align-items: center;

            text-decoration: none;

            color: #ced4da;

            padding: 12px 15px;

            margin-bottom: 5px;

            border-radius: 6px;

            transition: 0.2s;
        }


        .sidebar-menu a:hover {

            background: #343a40;

            color: white;

        }


        .sidebar-menu a i {

            width: 25px;

            font-size: 17px;

        }


        /* =========================
           Main Area
        ========================= */

        .admin-main {

            margin-left: 250px;

            min-height: 100vh;

        }


        /* =========================
           Top Navbar
        ========================= */

        .admin-navbar {

            height: 70px;

            background: white;

            border-bottom: 1px solid #e9ecef;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;

        }


        .admin-navbar-title {

            font-size: 20px;

            font-weight: 600;

        }


        .admin-user {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .admin-user-icon {

            width: 38px;

            height: 38px;

            border-radius: 50%;

            background: #212529;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .admin-user-name {

            font-weight: 600;

        }


        /* =========================
           Content
        ========================= */

        .admin-content {

            padding: 30px;

        }


        /* =========================
           Responsive
        ========================= */

        @media (max-width: 768px) {

            .admin-sidebar {

                width: 70px;

            }


            .admin-logo span {

                display: none;

            }


            .sidebar-menu-title {

                display: none;

            }


            .sidebar-menu a span {

                display: none;

            }


            .sidebar-menu a {

                justify-content: center;

            }


            .sidebar-menu a i {

                width: auto;

            }


            .admin-main {

                margin-left: 70px;

            }


            .admin-navbar {

                padding: 0 15px;

            }


            .admin-content {

                padding: 20px;

            }

        }

    </style>

</head>


<body>


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="admin-sidebar">


        <!-- Logo -->

        <div class="admin-logo">

            <i class="bi bi-shop"></i>

            <span>
                E-Commerce Admin
            </span>

        </div>


        <!-- Menu -->

        <div class="sidebar-menu">


            <div class="sidebar-menu-title">
                Main Menu
            </div>


            <!-- Dashboard -->

            <a href="{{ route('admin.dashboard') }}">

                <i class="bi bi-speedometer2"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Categories -->

            <a href="{{ route('admin.categories') }}">

                <i class="bi bi-grid"></i>

                <span>
                    Categories
                </span>

            </a>


            <!-- Products -->

            <a href="{{ route('admin.products') }}">

                <i class="bi bi-box-seam"></i>

                <span>
                    Products
                </span>

            </a>


            <!-- Orders -->

            <a href="{{ route('admin.orders') }}">

                <i class="bi bi-cart3"></i>

                <span>
                    Orders
                </span>

            </a>


            <!-- Customers -->

            <a href="{{ route('admin.customers') }}">

                <i class="bi bi-people"></i>

                <span>
                    Customers
                </span>

            </a>


            <div class="sidebar-menu-title mt-3">
                Account
            </div>


            <!-- Website -->

            <a href="{{ route('home') }}">

                <i class="bi bi-globe"></i>

                <span>
                    Visit Website
                </span>

            </a>


            <!-- Logout -->

           


        </div>

    </aside>



    <!-- =========================
         MAIN
    ========================== -->

    <main class="admin-main">


        <!-- =========================
             TOP NAVBAR
        ========================== -->

        <nav class="admin-navbar">


            <div class="admin-navbar-title">

                Admin Panel

            </div>


            <div class="admin-user">


                <div class="admin-user-icon">

                    <i class="bi bi-person"></i>

                </div>


                <div>

                    <div class="admin-user-name">

                        Admin

                    </div>

                    <small class="text-muted">

                        Administrator

                    </small>

                </div>


            </div>


        </nav>



        <!-- =========================
             PAGE CONTENT
        ========================== -->

        <div class="admin-content">


            {{-- Success Message --}}

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif


            {{-- Error Message --}}

            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif


            {{-- Validation Errors --}}

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Child Page Content --}}

            @yield('content')


        </div>


    </main>



    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


</body>

</html>