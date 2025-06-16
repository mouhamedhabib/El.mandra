@extends('frontend.layout.frontend_master')

@section('code', '404')
@section('frontend')
<div class="text-center py-5">
    <h1 style="font-size: 120px;">4<span><img src="{{asset('frontend')}}/assets/imgs/theme/icons/iconlogo.png" width="100   px"
        alt="" /></span>4</h1>
    <h3>Page introuvable</h3>
    <p>La page que vous recherchez n’existe pas ou a été déplacée.</p>
    <a href="{{ url('/') }}" class="btn btn-warning mt-3">Retour à la page d’accueil</a>
</div>
@endsection
