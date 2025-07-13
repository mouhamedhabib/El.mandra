@extends('frontend.layout.frontend_master')

@section('frontend')
<main class="main pages">
    <div class="page-content pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap background-white p-4 shadow-sm rounded text-center">

                        <h2 class="mb-3">Vérification de l'adresse email</h2>

                        <p class="font-sm mb-4">
                            Merci de vous être inscrit ! Avant de commencer, veuillez vérifier votre adresse email
                            en cliquant sur le lien que nous venons de vous envoyer.
                            Si vous n'avez pas reçu l'email, vous pouvez en demander un autre.
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mb-4">
                                Un nouveau lien de vérification a été envoyé à votre adresse email.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary mb-2">
                                Renvoyer l'email de vérification
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-muted">
                                Se déconnecter
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
