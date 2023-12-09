@extends('auth.app')

@section('title', 'Register')

@section('content')
<div class="container px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            <h1 class="display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                <span style="color: #c30010">WorkWise</span>
            </h1>
            <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                The only place you need to get hired!
            </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

            <div class="card bg-glass">
                <div class="card-body px-4 py-5 px-md-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h2 class="mb-4">Register</h2>

                        @include('layouts._flash')

                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}"
                                required autocomplete="name" autofocus />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}"
                                required autocomplete="email" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}"
                                required autocomplete="phone" autofocus />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password-confirm">Password Confirmation</label>
                            <input type="password" id="password-confirm" class="form-control"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                            Register
                        </button>

                        <p>I already have an account? <a href="/login">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection