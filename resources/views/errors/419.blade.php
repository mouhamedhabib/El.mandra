@extends('frontend.layout.frontend_master')

@section('code', '419')
@section('frontend')
<div class="text-center py-5">
    <h1 style="font-size: 120px;">419</h1>
    <h3>Session expirée</h3>
    <p>Votre session a expiré pour des raisons de sécurité. Veuillez actualiser la page ou vous reconnecter.</p>
    <a href="{{ url('/') }}" class="btn btn-warning mt-3">Retour à la page d’accueil</a>
</div>
@endsection
