@extends('frontend.layout.frontend_master')
@section('frontend')

<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-justify ">
                <h6 class="text-muted mb-3">À propos de nous</h6>
                <h2 class="fw-bold text-success mb-4">L’histoire de Elmandra, un goût de tradition</h2>
                <p class="mb-4  ">Depuis notre création, Elmandra s'engage à préserver et promouvoir les richesses culinaires du terroir tunisien. À travers notre plateforme, nous mettons en lumière les produits locaux faits maison, issus d’un savoir-faire authentique, transmis de génération en génération.

                    Notre mission est simple : reconnecter les Tunisiens – où qu’ils soient – aux saveurs de leur enfance, aux arômes des régions, et à la qualité d’un produit fabriqué avec amour. Chez Elmandra, chaque article est soigneusement sélectionné pour sa qualité, son origine naturelle et son impact positif sur l’économie locale.
                    
                    Nous croyons profondément que le futur du commerce passe par un retour à l’authenticité, au consommer local, et à la valorisation des artisans et producteurs de nos régions. Elmandra n’est pas seulement un site de vente en ligne, c’est une communauté de passionnés, un pont entre tradition et innovation, entre ville et campagne, entre le passé et l’avenir.
                    
                    Bienvenue chez Elmandra – le goût de la Tunisie, livré jusqu’à votre porte.
                    
                    
                    </p>
                <div class="row text-center mb-4">
                    <div class="col-6 col-md-6 mb-3">
                        <div class="border rounded p-3 h-100">
                            <h4 class="text-success fw-bold mb-1">120+ Produits</h4>
                            <p class="mb-0 text-muted small">Artisanaux et 100% tunisiens</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 mb-3">
                        <div class="border rounded p-3 h-100">
                            <h4 class="text-success fw-bold mb-1">98% Clients satisfaits</h4>
                            <p class="mb-0 text-muted small">Fidélité et confiance</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('vendor.register') }}" class="btn btn-success px-4">Rejoignez notre réseau d’artisans</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="rounded shadow overflow-hidden">
                    <img src="{{ asset('frontend') }}/assets/imgs/theme/couc.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
