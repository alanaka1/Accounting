@extends('Projects.Auth.layout.app')
 
@section('title', 'Login - AdminPro')

@section('css')
@endsection
 
@section('content')

<!-- Login Card -->
<section class="auth-card">

    <div class="auth-card-header">
        <h1>Welcome Back</h1>
        <p>Sign in to continue to your dashboard</p>
    </div>


    <div class="auth-card-body">
        <form id="loginForm" action="" method="POST">
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="name@example.com" autocomplete="email" required>
                </div>
            </div>
            <!-- Password -->
            <div class="mb-2">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <label for="password" class="form-label mb-0">Password</label>
                    <a href="{{ route('admin.forgot_password') }}" class="auth-link">Forgot Password?</a>
                </div>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter password" autocomplete="current-password" required>

                    <button type="button" class="password-toggle" data-password-toggle="password" title="Show Password" aria-label="Show Password">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>
            <!-- Remember -->
            <div class="form-check auth-remember">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <!-- Submit -->
            <button type="submit" class="btn btn-primary btn-sm auth-submit w-100">
                <i class="fa-solid fa-right-to-bracket auth-btn-icon"></i>
                <span>Sign In</span>
            </button>
        </form>
    </div>


    <!-- Footer -->
    <div class="auth-card-footer">
        <span>Don't have an account?</span>
        <a href="{{ route('admin.register') }}" class="auth-link">Create Account</a>
    </div>
</section>
@endsection

@section('javascript')
@endsection