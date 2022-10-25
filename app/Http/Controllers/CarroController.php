<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarroController extends Controller
{
    public function CadastroCarro()
    {
        return view('cadastrarCarro');
    }

    public function EditarCarro(Request $request)
    {
        $dadosCarro = Carro::query();
        $dadosCarro->when($request->marca, function ($query, $vl) {
            $query->where('marca', 'like', '%' . $vl . '%');
        });


        $dadosCarro = $dadosCarro->get();

        //dd($dadosCarro);
        return view('editarCarro', [
            'registrosCarro' => $dadosCarro
        ]);
    }




    public function SalvarBancoCarro(Request $request)
    {
        $dadosCarro = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);

        Carro::create($dadosCarro);
        return Redirect::route('home');
    }

    public function ApagarBancoCarro(Carro $registrosCarros)
    {

        $registrosCarros->delete();
        //Carro::findOrFail($id)->delete();
        //$carro->delete();

        return Redirect::route('editar-carro');
    }

    public function AlterarCarro(Carro $registrosCarros)
    {
        return view('alterarCarro', ['registrosCarros' => $registrosCarros]);
    }

    public function AlterarBancoCarro(Carro $registrosCarros, Request $request)
    {
        $bancoCarro = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);

        $registrosCarros->fill($bancoCarro);
        $registrosCarros->save();

        return Redirect::route('editar-carro');
    }
}
