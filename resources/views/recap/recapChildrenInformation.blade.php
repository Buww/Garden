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
          <div class="month-picker">
            <a href="#" class="month-picker-nav" title="Not implemented">&lt;</a>
            <fieldset class="month-picker-fieldset">
              <input type="radio" name="month" value="jan" id="jan">
              <label for="jan" class="month-picker-label">Jan</label>
              <input type="radio" name="month" value="feb" id="feb">
              <label for="feb" class="month-picker-label">Feb</label>
              <input type="radio" name="month" value="mar" id="mar">
              <label for="mar" class="month-picker-label">Mar</label>
              <input type="radio" name="month" value="apr" id="apr">
              <label for="apr" class="month-picker-label">Apr</label>
              <input type="radio" name="month" value="may" id="may">
              <label for="may" class="month-picker-label">May</label>
              <input type="radio" name="month" value="jun" id="jun">
              <label for="jun" class="month-picker-label">Jun</label>
              <input type="radio" name="month" value="jul" id="jul">
              <label for="jul" class="month-picker-label">Jul</label>
              <input type="radio" name="month" value="aug" id="aug">
              <label for="aug" class="month-picker-label">Aug</label>
              <input type="radio" name="month" value="sep" id="sep" checked>
              <label for="sep" class="month-picker-label">Sep</label>
              <input type="radio" name="month" value="oct" id="oct">
              <label for="oct" class="month-picker-label">Oct</label>
              <input type="radio" name="month" value="nov" id="nov">
              <label for="nov" class="month-picker-label">Nov</label>
              <input type="radio" name="month" value="dec" id="dec">
              <label for="dec" class="month-picker-label">Dec</label>
            </fieldset>
            <a href="#" class="month-picker-nav" title="Not implemented">&gt;</a>
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
                <td> {{ substr($item, 39, 6) == '+12:00' ? 'Aucun temps' : substr($item, 39, 6)}} </td>
              </tr>
              @endforeach
              <tr>
            </tbody>
          </table>
    </div>
</div>

@endsection
