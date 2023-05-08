@extends('layouts.default')

<div class="row mt-5">
    @include('layouts.flash-message')
</div>

@section('content')
<div class="row mt-5">
    <h2>Modifica Canzone</h2>
</div>
<form method="POST" action="{{ route('songs.update', $song->id) }}">
    @csrf
    <input type="hidden" name="_method" value="put">
    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" name="song[title]" placeholder="Titolo" required value="{{ $song->title }}">
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-7">
            <label class="form-label">Data di Pubblicazione</label>
            <input type="date" class="form-control" name="song[publication]" placeholder="Data di Pubblicazione" required  value="{{ $song->publication }}">
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-sm" name="salva">Salva</button>
    </div>
</form>
@stop
