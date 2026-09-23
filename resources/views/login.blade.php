@extends('masterlayout')

@section('content')

<section class="login spad">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7 col-sm-10">

                <div class="login__form">

                    <div class="text-center mb-4">
                        <h3>Welcome Back</h3>
                        <p>Login to your account</p>
                    </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif
                    <form action="{{ route('loginuser') }}" method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        {{-- Password --}}
                        <div class="form-group mb-3">
                            <label for="password">Password</label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                        {{-- Remember + Forgot --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div>
                                <input
                                    type="checkbox"
                                    id="remember"
                                    name="remember"
                                >
                                <label for="remember">Remember me</label>
                            </div>

                            <a href="#">Forgot Password?</a>

                        </div>

                        {{-- Login Button --}}
                        <button
                            type="submit"
                            class="site-btn w-100"
                        >
                            LOGIN
                        </button>

                    </form>

                    {{-- Register --}}
                    <div class="text-center mt-4">
                        <p>
                            Don't have an account?
                            <a href="{{ route('register') }}">
                                Create Account
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection