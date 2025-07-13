@extends('frontend.layout.frontend_master')

@section('frontend')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> Pages <span></span> Devenir Vendeur
        </div>
        
    </div>
</div>

<div class="page-content pt-150 pb-150 ">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto text-center">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Devenir Vendeur</h1>
                                    <p class="mb-30">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connexion</a></p>
                                </div>
                    
                                <form method="post" action="{{ route('vendor.register.store') }}">
                                    @csrf
                    
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}" />
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}" />
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Mot de passe" />
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" />
                                    </div>
                    
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox"
                                                    id="exampleCheckbox12" required />
                                                <label class="form-check-label" for="exampleCheckbox12">
                                                    <span>J'accepte les conditions &amp; la politique.</span>
                                                </label>
                                            </div>
                                        </div>
                                        <a href="{{ url('page-privacy-policy.html') }}">
                                            <i class="fi-rs-book-alt mr-5 text-muted"></i>En savoir plus
                                        </a>
                                    </div>
                    
                                    <div class="form-group mb-30">
                                        <button type="submit"
                                            class="btn btn-fill-out btn-block hover-up font-weight-bold">S’inscrire comme Vendeur</button>
                                    </div>
                    
                                    <p class="font-xs text-muted"><strong>Note :</strong> Vos données personnelles seront utilisées
                                        pour améliorer votre expérience sur ce site, gérer l'accès à votre compte, et pour d'autres
                                        finalités décrites dans notre politique de confidentialité.
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 pr-30 d-none">
                        <div class="card-login mt-115">
                            <a href="#" class="social-login facebook-login">
                                <img src="{{ asset('frontend/assets/imgs/theme/icons/logo-facebook.svg') }}" alt="" />
                                <span>Continue with Facebook</span>
                            </a>
                            <a href="#" class="social-login google-login">
                                <img src="{{ asset('frontend/assets/imgs/theme/icons/logo-google.svg') }}" alt="" />
                                <span>Continue with Google</span>
                            </a>
                            <a href="#" class="social-login apple-login">
                                <img src="{{ asset('frontend/assets/imgs/theme/icons/logo-apple.svg') }}" alt="" />
                                <span>Continue with Apple</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
