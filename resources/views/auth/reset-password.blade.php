@extends('frontend.layout.frontend_master')

@section('frontend')
<main class="main pages">
    <div class="page-content pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="login_wrap background-white p-4 shadow-sm rounded">
                        <div class="heading_s1 text-center mb-4">
                            <h2 class="mb-2">Réinitialiser le mot de passe</h2>
                            <p class="font-sm">Veuillez saisir votre nouvelle adresse email et votre nouveau mot de passe.</p>
                        </div>

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email -->
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Adresse email *" required />
                                @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Nouveau mot de passe *" required />
                                @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe *" required />
                                @error('password_confirmation')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Réinitialiser</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <a class="text-muted" href="{{ route('login') }}">Retour à la page de connexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
