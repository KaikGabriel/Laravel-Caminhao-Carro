<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CaminhaoController extends Controller
{
    public function CadastroCaminhao()
    {
        return view('cadastrarCaminhao');
    }

    public function EditarCaminhao()
    {
        $dadosCaminhao = Caminhao::all();

        //dd($dadosCaminhao);
        return view('editarCaminhao', [
            'registrosCaminhao' => $dadosCaminhao
        ]);
    }

    public function SalvarBancoCaminhao(Request $request)
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

    public function ApagarBancoCaminhao(Caminhao $registrosCaminhoes)
    {

        $registrosCaminhoes->delete();
        //Caminhao::findOrFail($id)->delete();
        //$caminhao->delete();

        return Redirect::route('editar-caminhao');
    }

    public function AlterarCaminhao(Caminhao $registrosCaminhoes)
    {
        

        return view('alterarCaminhao', ['registrosCaminhoes' => $registrosCaminhoes]);
    }
}
