@extends('Projects.Auth.layout.app')
 
@section('title', 'Forgot Password - AdminPro')

@section('css')
@endsection
 
@section('content')

<!-- Forgot Password Card -->
<section class="auth-card">

    <!-- Header -->
    <div class="auth-card-header">
        <h1>Forgot Password?</h1>
        <p>Enter your email and we'll send you a reset link</p>
    </div>


    <!-- Body -->
    <div class="auth-card-body">
        <form id="forgotPasswordForm" action="" method="POST">
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

            <!-- Submit -->
            <button type="submit" class="btn btn-primary btn-sm auth-submit w-100">
                <i class="fa-regular fa-paper-plane auth-btn-icon"></i>
                <span>Send Reset Link</span>
            </button>
        </form>
    </div>

    <!-- Footer -->
    <div class="auth-card-footer">
        <a href="{{ route('admin.login') }}" class="auth-link">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Back to Sign In
        </a>
    </div>
    
</section>

@endsection

@section('javascript')
@endsection