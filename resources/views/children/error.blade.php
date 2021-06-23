@extends('layouts.layout')

@section('content')
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Erreur</span></h6>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <form action="/" method="GET" >
                                            <div class="form-group">
                                                @csrf
                                                @if ($boolean == 'entry')
                                                    <p ALIGN="left" class="form-style">Votre enfant est déjà entré</p>
                                                @elseif ($boolean == 'release')
                                                    <p ALIGN="left" class="form-style">Votre enfant est déjà sorti</p>
                                                @else
                                                    <p ALIGN="left" class="form-style">{{ $error }}</p>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn mt-4">retour</button>
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
