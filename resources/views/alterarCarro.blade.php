@extends('padrao')
@section('content')
<section>
  <div class="container cadastroCaminhao">
    <form class="row g-3" method="post" action="{{route('alterar-banco-carro',$registrosCarros->id)}}">
      @csrf
      @method('put')
      <div class="col-md-12">
        <label for="inputModelo" class="form-label">Modelo</label>
        <input type="text" name="modelo" value="{{old('modelo',$registrosCarros->modelo)}}" class="form-control" id="inputModelo" placeholder="ONIX">
        @error('modelo')
        <div class="text-sm-start text-light">*Preencher o campo modelo.</div>
        @enderror
      </div>

      <div class="col-12">
        <label for="inputMarca" class="form-label">Marca</label>
        <input type="text" name="marca" value="{{old('marca',$registrosCarros->marca)}}" class="form-control" id="inputMarca" placeholder="Toyota">
        @error('marca')
        <div class="text-sm-start text-light">*Preencher o campo marca.</div>
        @enderror
      </div>


      <div class="col-12">
        <label for="inputAno" class="form-label">Ano</label>
        <input type="text" name="ano" value="{{old('ano',$registrosCarros->ano)}}" class="form-control" id="inputAno" placeholder="2005">
        @error('ano')
        <div class="text-sm-start text-light">*Preencher o campo ano.</div>
        @enderror
      </div>


      <div class="col-md-12">
        <label for="inputCor" class="form-label">Cor</label>
        <input type="text" name="cor" value="{{old('cor',$registrosCarros->cor)}}" class="form-control" id="inputCor" placeholder="Vermelho">
        @error('cor')
        <div class="text-sm-start text-light">*Preencher o campo cor.</div>
        @enderror
      </div>

      <div class="col-md-12">
        <label for="inputValor" class="form-label">Valor</label>
        <input type="text" name="valor" value="{{old('valor',$registrosCarros->valor)}}" class="form-control" id="inputValor" placeholder="R$ 58.777,30">
        @error('valor')
        <div class="text-sm-start text-light">*Preencher o campo valor.</div>
        @enderror
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>


    </form>
  </div>
</section>
@endsection