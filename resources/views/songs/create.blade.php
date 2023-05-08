@extends('layouts.default')

<div class="row mt-5">
    @include('layouts.flash-message')
</div>

@section('content')
<div class="row mt-5">
    <h2>Inserisci una Canzone</h2>
    <p>si prega di compilare tutti i campi.</p>
</div>
<form method="POST" action="{{ route('songs.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" name="song[title]" placeholder="Titolo" required>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-7">
            <label class="form-label">Data di Pubblicazione</label>
            <input type="date" class="form-control" name="song[publication]" placeholder="Data di Pubblicazione" required>
        </div>
    </div>
    <div class="my-3">
        <div class="row">
            <div class="col-7">
            <label class="form-label">Cantanti</label>
            <select class="form-select" name="artist[artists][]" multiple>
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-sm" name="salva">Salva</button>
    </div>
</form>
@stop
