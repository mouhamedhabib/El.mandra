@extends('frontend.layout.frontend_master')

@section('frontend')
<main class="main pages">
    <div class="page-content pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap background-white p-4 shadow-sm rounded">
                        <div class="heading_s1 text-center mb-4">
                            <h2 class="mb-2">Créer un compte</h2>
                            <p class="font-sm">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous ici</a></p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom -->
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Nom complet *" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe *" required>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmation mot de passe -->
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe *" required>
                                @error('password_confirmation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100">Créer un compte</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
