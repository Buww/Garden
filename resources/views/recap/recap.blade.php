@extends('layouts.layout')

@section('content')
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Récapitulatif</span></h6>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Récapitulatif de l'enfant</h4>
                                        <form action="/recap" method="POST">
                                            <div class="form-group">
                                                @csrf
                                                <input type="code" name="code" class="form-style" placeholder="Identifiant Bébé" id="code">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">rechercher</button>
                                        </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>
@endsection
