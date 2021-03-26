<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie {

    public function criarSerie (string $nomeSerie, int $qtdTemporada, int $epPorTemporada) : Serie {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criarTemporadas($qtdTemporada, $epPorTemporada, $serie);
        DB::commit();

        return $serie;
    }

    private function criarTemporadas (int $qtdTemporada, int $epPorTemporada, Serie $serie) : void {
        for ($i = 1; $i <= $qtdTemporada; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($epPorTemporada, $temporada);
        }
    }

    private function criarEpisodios (int $epPorTemporada, \Illuminate\Database\Eloquent\Model $temporada) : void {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}