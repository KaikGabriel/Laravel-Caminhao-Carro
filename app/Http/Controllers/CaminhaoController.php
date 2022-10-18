<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CaminhaoController extends Controller
{
    public function FormularioCadastro()
    {
        return view('cadastrarCaminhao');
    }

    public function MostrarEditarCaminhao()
    {
        $dadosCaminhao = Caminhao::all();

        //dd($dadosCaminhao);
        return view('editarCaminhao', [
            'registrosCaminhao' => $dadosCaminhao
        ]);
    }

    public function SalvarBanco(Request $request)
    {
        $dadosCaminhao = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);

        Caminhao::create($dadosCaminhao);
        return Redirect::route('home');
    }
}
