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

    public function EditarCaminhao(Request $request)
    {
        $dadosCaminhao = Caminhao::query();
        $dadosCaminhao->when($request->marca, function ($query, $vl) {
            $query->where('marca', 'like', '%' .$vl. '%');
        });


        $dadosCaminhao = $dadosCaminhao->get();

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

    public function AlterarBancoCaminhao(Caminhao $registrosCaminhoes, Request $request)
    {
        $banco = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);

        $registrosCaminhoes->fill($banco);
        $registrosCaminhoes->save();

        return Redirect::route('editar-caminhao');
    }
}
