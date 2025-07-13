@extends('frontend.layout.frontend_master')

@section('code', '403')
@section('frontend')
<div class="text-center py-5">
    <h1 style="font-size: 120px;">4<span><img src="{{asset('frontend')}}/assets/imgs/theme/icons/iconlogo.png" width="100px"
        alt="" /></span>3</h1>
    <h3>Accès refusé</h3>
    <p>Vous n’avez pas la permission d’accéder à cette page.</p>
    <a href="{{ url('/') }}" class="btn btn-warning mt-3">Retour à la page d’accueil</a>
</div>
@endsection
