<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saludar()
    {
        return view('saludo');
    }

    public function saludarPersona($nombre, $edad = null)
    {
        //return "Hola $nombre";
        //$edad = 30;
        if ($edad) {
            $var_edad = $edad;
        } else {
            $var_edad = 50;
        }

        return view('saludo')
            ->with('edad', $var_edad)
            ->with('nombreUser', "<strong>$nombre</strong>");
    }

    public function generaNumero($numeroUsuario)
    {
        $numeroMaquina = rand(1, 5);
        if ($numeroUsuario == $numeroMaquina) {
            $result = ' has acertado.';
        } else {
            $result = ' no has acertado.';
        }

        return view('resultado')
            ->with('numeroUsuario', $numeroUsuario)
            ->with('numeroMaquina', $numeroMaquina)
            ->with('resultado', $result);
    }

    public function adivinaNumero(Request $request)
    {
        //dd($request);
        //Aprovechamos la función anterior:
        $num = $request->apuesta;

        return $this->generaNumero($num);
    }
}
