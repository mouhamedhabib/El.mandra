@extends('frontend.layout.frontend_master')

@section('frontend')
<div class="page-content d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="login_wrap background-white p-4 shadow-sm rounded">
                    <div class="heading_s1 text-center mb-4">
                        <h2 class="mb-2">Créer un compte</h2>
                        <p class="font-sm">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connexion</a></p>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="name" placeholder="Name" required />
                            @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input class="form-control" type="email" name="email" placeholder="Email" required />
                            @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Password" required />
                            @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                        </div>

                    

                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold">Submit & Register</button>
                        </div>

                        <p class="font-xs text-muted text-center">
                            <strong>Note:</strong> Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
