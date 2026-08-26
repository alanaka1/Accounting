@extends('Projects.Auth.layout.app')
 
@section('title', 'Register - AdminPro')

@section('css')
@endsection
 
@section('content')

<!-- Register Card -->
<section class="auth-card">

    <div class="auth-card-header">
        <h1>Create Account</h1>
        <p>Create your account to get started</p>
    </div>


    <div class="auth-card-body">

        <form id="registerForm" action="" method="POST">

            <!-- Full Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter your full name" autocomplete="name" required>
                </div>
            </div>


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
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Create password" autocomplete="new-password" required>
                    <button type="button" class="password-toggle" data-password-toggle="password" title="Show Password" aria-label="Show Password">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>


            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>
                    <input type="password" class="form-control form-control-sm" id="passwordConfirmation" name="password_confirmation" placeholder="Confirm password" autocomplete="new-password" required>
                    <button type="button" class="password-toggle" data-password-toggle="passwordConfirmation" title="Show Password" aria-label="Show Password">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Terms -->
            <div class="form-check auth-remember">
                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">I agree to the Terms & Conditions</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary btn-sm auth-submit w-100">
                <i class="fa-solid fa-user-plus auth-btn-icon"></i>
                <span>Create Account</span>
            </button>

        </form>

    </div>

    <!-- Footer -->
    <div class="auth-card-footer">
        <span>Already have an account?</span>
        <a href="{{ route('admin.login') }}" class="auth-link">Sign In</a>
    </div>
</section>

@endsection

@section('javascript')
@endsection