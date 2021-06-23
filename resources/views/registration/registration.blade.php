@extends('layouts.layout')

@section('content')
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Enregistrer un enfant</span></h6>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <form action="/registration" method="POST">
                                            <div class="form-group">
                                                @csrf
                                                <input type="text" name="first" class="form-style" placeholder="Prénom" id="first">                                                
                                                <input type="text" name="last" class="form-style" placeholder="Nom" id="last">                                                
                                                <input type="datetime-local" name="birth" class="form-style" placeholder="Date de naissance" id="birth">                                                
                                                <input type="time" name="arrival" class="form-style" placeholder="Heure d'arrivée" id="arrival">                                                
                                                <input type="time" name="departure" class="form-style" placeholder="Heure de départ" id="departure">                                                
                                            </div>
                                            <button type="submit" class="btn mt-4">enregistrer</button>
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
