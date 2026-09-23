@extends('masterlayout')

@section('content')

<section class="login spad">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8 col-sm-10">

                <div class="login__form">

                    <div class="text-center mb-4">
                        <h3>Create Account</h3>
                        <p>Register to start shopping with us</p>
                    </div>
                
                    <form action="{{ route('registeruser') }}" method="POST">
                        @csrf

                        {{-- Name --}}
                        <div class="form-group mb-3">
                            <label for="name">Full Name</label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}"
                                required
                            >
                        </div>

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

                        {{-- Phone --}}
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter your phone number"
                                value="{{ old('phone') }}"
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
                                placeholder="Create a password"
                                required
                            >
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group mb-3">
                            <label for="password_confirmation">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm your password"
                                required
                            >
                        </div>

                        {{-- Terms --}}
                        <div class="mb-4">
                            <input
                                type="checkbox"
                                id="terms"
                                name="terms"
                                required
                            >

                            <label for="terms">
                                I agree to the Terms & Conditions
                            </label>
                        </div>

                        {{-- Register Button --}}
                        <button
                            type="submit"
                            class="site-btn w-100"
                        >
                            CREATE ACCOUNT
                        </button>

                    </form>

                    {{-- Login --}}
                    <div class="text-center mt-4">
                        <p>
                            Already have an account?

                            <a href="{{ route('login') }}">
                                Login
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection