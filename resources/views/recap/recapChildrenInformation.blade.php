@extends('layouts.layout')

@section('content')
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <div class="card-recap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h6 class="mb-0 pb-3"><span>Récapitulatid de l'enfant</span></h6>
                                        <div class="form-group">
                                            @csrf
                                            <p ALIGN="left" class="form-style">Prénom: {{ $children->first }}</p>                                                
                                            <p ALIGN="left" class="form-style">Nom: {{ $children->last }}</p>                                                
                                            <p ALIGN="left" class="form-style">Age: {{ $age }} mois</p>                                                
                                            <input ALIGN="left" class="form-style" name="code" value={{ $children->code }}>
                                            <p></p>
                                            <p ALIGN="left" class="form-style">Heure d'arrivée: {{ $children->arrival }} </p>                                                
                                            <p ALIGN="left" class="form-style">Heure de départ: {{ $children->departure }}</p>
                                            <p ALIGN="left" class="form-style">Total d'heures: {{ $total }}</p>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <table class="table table-dark" id="dtBasicExample">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Heure d'arrivée</th>
                <th scope="col">Heure de sortie</th>
                <th scope="col">Temps supplémentaire</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($entries as $item)                    
              <tr>
                <td>{{ substr($item, 0, 11) }}</td>
                <td> {{ substr($item, 11, 5) }} </td>
                <td> {{ substr($item, 30, 6) }} </td>
                <td> {{ substr($item, 39, 6) }} </td>
              </tr>
              @endforeach
              <tr>
            </tbody>
          </table>
    </div>
</div>

@endsection
