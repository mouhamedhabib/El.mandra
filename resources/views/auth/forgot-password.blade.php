@extends('frontend.layout.frontend_master')

@section('frontend')
<main class="main pages">
    <div class="page-content pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="login_wrap background-white p-4 shadow-sm rounded">
                        <div class="heading_s1 text-center mb-4">
                            <h2 class="mb-2">Mot de passe oublié</h2>
                            <p class="font-sm">Entrez votre adresse email pour recevoir un lien de réinitialisation.</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success mb-3" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Votre adresse e-mail *" required autofocus>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Envoyer le lien de réinitialisation
                                </button>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('login') }}" class="text-muted">← Retour à la connexion</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
