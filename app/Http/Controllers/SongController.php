<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use App\Http\Controllers\ArtistController;

class SongController extends Controller
{
    public function create()
    {
        $artists = Artist::all();
        return view('songs.create', ['artists' => $artists]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->get('song');
            $song = new Song($data);
            $song->save();

            $artist = $request->get('artist');
            $artistIds = $artist['artists'];
            foreach ($artistIds as $id) {
                $song->artists()->attach($id);
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Si è verificato un errore ' . $e->getMessage());
        } catch (\Error $e) {
            return back()->with('error', 'Si è verificato un errore ' . $e->getMessage());
        }
        return back()->with('success', 'Canzone registrata con successo');
    }

    public function edit(Request $request, $id)
    {
        $song = Song::find($id);
        if (!$song) {
            abort(404);
        }
        return view('songs.edit', ['song' => $song]);
    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        if (!$song) {
            abort(404);
        }

        $song->fill($request->get('song'));
        $song->save();

        return back()->with('success', 'Canzone modificata con successo');
    }

    public function delete(Request $request, $id)
    {
        $song = Song::find($id);
        if (!$song) {
            abort(404);
        }
        $song->delete();
        return back()->with('success', 'Canzone aliminata con successo');
    }

}
