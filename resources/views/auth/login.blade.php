@extends('auth.app')

@section('title', 'Login')

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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h2 class="mb-4">Login</h2>

                        @include('layouts._flash')

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" class="form-control" name="email" autocomplete="email"
                                autofocus />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-end mb-4">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                                {{old('remember') ? 'checked' : '' }} />
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                            Login
                        </button>

                        <p>I don't have an account? <a href="/register">register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection