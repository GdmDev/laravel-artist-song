@extends('layouts.default')

<div class="row mt-5">
    @include('layouts.flash-message')
</div>

@section('content')
<div class="row mt-5">
    <h2>Cerca un Cantante</h2>
    <form method="GET" action="{{ route('artists.index') }}">
        <select class="form-select" name="artist" onchange="this.parentNode.submit()">
            @foreach ($artists as $artist)
                <option
                    {{ ((isset($current) && $artist->id == $current->id) ? "selected" : "") }}
                    value="{{ $artist->id }}"
                >{{ $artist->name }}</option>
            @endforeach
        </select>
    </form>

    <div>
        <table>
            <?php
                if (!isset($current)) {
                    $current = $artists[0];
                }
            ?>

            @forelse ($current->songs as $song)
                <tr>
                    <td>{{ $song->title }}</td>
                    <td>({{ date('d-m-Y', strtotime($song->publication)) }})</td>
                    <td>
                        <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-sm btn-primary">Modifica</a>
                        <form class="d-inline" method="post" action="{{ route('songs.delete', $song->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" role="submit" class="btn btn-sm btn-danger" value="Elimina">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nessuna canzone</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@stop
