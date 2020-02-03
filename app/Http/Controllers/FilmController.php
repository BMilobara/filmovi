<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\film;
use \App\zanr;
use Illuminate\Support\Facades\DB;

use Illuminate\Auth\AuthManager;



class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('film.unos');
    }

    public function store(Request $request)
    {
        $noviFilm = new film;
		
        $noviFilm->naslov = $request->naslov;
		$noviFilm->id_zanr = $request->id_zanr;
		$noviFilm->godina = $request->godina;
		$noviFilm->trajanje = $request->trajanje;
		$noviFilm->slika = $request->slika;
		
		$noviFilm->save();
		
		return redirect()->action('FilmController@index');
    }
	
    public function destroy($id)
    {
		$f = film::find($id);
	    $f->delete();	
		
		return redirect()->action('FilmController@index');
	
    }
}
