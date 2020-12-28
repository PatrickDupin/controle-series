<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller {

    public function index(Request $request) {
        $series = Serie::all();
    
        $html = "<ul>";
        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";
        
        return view('series.index', compact('series'));
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request) {
        $serie = Serie::create($request->all());

        echo "Série com id ($serie->id) criada: ($serie->nome)";
    }

}