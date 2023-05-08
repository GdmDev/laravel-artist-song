<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{

    public function index(Request $request)
    {
        $artists = Artist::all();

        $current = $request->get('artist');

        if ($current) {
            $current = Artist::find($current);
            if ($artists->contains($current)) {
                return view('artists.index', ['artists' => $artists, 'current' => $current]);
            } else {
                return abort(404);
            }
        } else {
            return view('artists.index', ['artists' => $artists]);
        }
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        try {
            $artist = new Artist($request->all());
            $artist->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Si è verificato un errore ' . $e->getMessage());
        } catch (\Error $e) {
            return back()->with('error', 'Si è verificato un errore ' . $e->getMessage());
        }
        return back()->with('success', 'Artista registrato con successo');
    }
}
