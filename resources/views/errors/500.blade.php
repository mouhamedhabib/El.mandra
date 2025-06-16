@extends('frontend.layout.frontend_master')

@section('code', '500')
@section('frontend')
<div class="text-center py-5">
    <h1 style="font-size: 120px;">5<span><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/iconlogo.png" width="100px" alt="" /></span>0</h1>
    <h3>Erreur interne du serveur</h3>
    <p>Un problème inattendu s’est produit. Veuillez réessayer plus tard ou contacter le support technique.</p>
    <a href="{{ url('/') }}" class="btn btn-warning mt-3">Retour à la page d’accueil</a>
</div>
@endsection
