
@extends('layouts.patient')

@section('page-content')

<h3>Étape 2 : Date & Heure</h3>

<input type="date" class="form-control mb-3">

<select class="form-select mb-3">
    <option>10:00</option>
    <option>11:00</option>
</select>

<a href="/patient/rdv/create" class="btn btn-secondary">← Retour</a>
<a href="/patient/rdv/info" class="btn btn-primary">Suivant →</a>

@endsection