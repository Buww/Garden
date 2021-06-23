@extends('layouts.layout')

@section('content')
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Entrée enfant</span></h6>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <form action="/entrySave" method="POST" onsubmit="return confirm('Est ce bien votre enfant ?');">
                                            <div class="form-group">
                                                @csrf
                                                <p ALIGN="left" class="form-style">Prénom: {{ $children->first }}</p>                                                
                                                <p ALIGN="left" class="form-style">Nom: {{ $children->last }}</p>                                                
                                                <p ALIGN="left" class="form-style">Age: {{ $age }} mois</p>                                                
                                                <input ALIGN="left" class="form-style" name="code" value={{ $children->code }}>
                                                <p></p>
                                                <input class="form-style" type="datetime-local" min={{ $date }} name="date" step="1" value={{ $date}}>                                         
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
