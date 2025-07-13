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

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Mot de passe *" required />
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Se souvenir de moi -->
                            <div class="form-group form-check mb-3">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                                <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100">Connexion</button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="text-muted" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
