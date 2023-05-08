@extends('layouts.default')

<div class="row mt-5">
    @include('layouts.flash-message')
</div>

@section('content')
<div class="row mt-5">
    <h2>Inserisci un Cantante</h2>
    <p>si prega di compilare tutti i campi.</p>
</div>
<form method="POST" action="{{ route('artists.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Nome" required>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-7">
            <label class="form-label">Data di Nascita</label>
            <input type="date" class="form-control" name="birthdate" placeholder="Data di Nascita" required>
        </div>
        <div class="col-5">
            <label class="form-label">Sesso:</label>
            <select class="form-select" name="sex">
                <option value="male">Uomo</option>
                <option value="female">Donna</option>
            </select>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-sm" name="salva">Salva</button>
    </div>
</form>
@stop
