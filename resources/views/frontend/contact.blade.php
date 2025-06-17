@extends('frontend.layout.frontend_master')
@section('frontend')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<section class="bg-light py-4 py-md-5">
    <div class="container">
      <div class="row gy-4 gy-lg-0 align-items-center">
        <div class="col-12 col-lg-6">
          <div class="row justify-content-xl-center">
            <div class="col-12 col-xl-11">
              <h2 class="h1 mb-3 text-success" style="color: #b2cb34 !important;">Contactez-nous</h2>
              <p class="lead fs-5 text-secondary mb-5">
                Nous sommes ravis de collaborer avec des producteurs, artisans ou partenaires. Pour toute question ou suggestion, n’hésitez pas à nous écrire.
              </p>
              <div class="d-flex mb-4">
                <div class="me-4" style="color: #ef840e;">
                  <i class="bi bi-geo-alt-fill" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h5 class="mb-1">Adresse</h5>
                  <p class="text-secondary mb-0"> Rue Bourguiba, Bennane,Monastir
                </p>
                </div>
              </div>
              <div class="d-flex mb-4">
                <div class="me-4" style="color: #ef840e;">
                  <i class="bi bi-telephone-fill" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h5 class="mb-1">Téléphone</h5>
                  <p class="mb-0"><a href="tel:31 100 111" class="text-decoration-none text-secondary">31 100 111</a></p>
                </div>
              </div>
              <div class="d-flex mb-4">
                <div class="me-4" style="color: #ef840e;">
                  <i class="bi bi-envelope-fill" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h5 class="mb-1">E-mail</h5>
                  <p class="mb-0"><a href="mailto:contact@mandra.tn" class="text-decoration-none text-secondary">contact@mandra.tn</a></p>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-4" style="color: #ef840e;">
                  <i class="bi bi-clock-fill" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h5 class="mb-1">Horaires</h5>
                  <p class="text-secondary mb-0">Lun - Ven : 8h - 17h</p>
                  <p class="text-secondary mb-0">Sam - Dim : 9h - 14h</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="bg-white border rounded shadow-sm p-4 p-xl-5">
            <form action="#!" method="post">
              <div class="row gy-4">
                <div class="col-12">
                  <label for="fullname" class="form-label">Nom Complet <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
                <div class="col-12 col-md-6">
                  <label for="email" class="form-label">Adresse E-mail <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-12 col-md-6">
                  <label for="phone" class="form-label">Numéro de Téléphone</label>
                  <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-12">
                  <label for="subject" class="form-label">Sujet <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="col-12">
                  <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <div class="col-12">
                  <button class="btn btn-lg w-100 text-white" style="background-color: #b2cb34;" type="submit">Envoyer le message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection
