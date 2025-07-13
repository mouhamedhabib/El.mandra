@extends('frontend.layout.frontend_master')

@section('frontend')
<main class="main pages">
    <div class="page-content pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="login_wrap background-white p-4 shadow-sm rounded">
                        <div class="heading_s1 text-center mb-4">
                            <h2 class="mb-2">Connexion</h2>
                            <p class="font-sm">Vous n'avez pas de compte ? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>
                        </div>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="email" placeholder="Email *" required />
                                @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password *" required />
                                @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                            </div>

                            <div class="text-center">
                                <a class="text-muted" href="{{ route('password.request') }}">Forgot your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
