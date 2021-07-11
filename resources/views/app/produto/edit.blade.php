@extends('app.layouts.basico')

@section('title', 'Editar')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form action="{{route('produto.store')}}" method="post">
                    @csrf
                    <input type="text" value="{{ $produto->nome ?? old('nome')}}" name="nome" placeholder="Nome" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type="text" value="{{ $produto->descricao ?? old('descricao')}}"  name="descricao" placeholder="Descrição"  class="borda-preta">
                    {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                    <input type="text" value="{{ $produto->peso ?? old('peso')}}"  name="peso" placeholder="Peso"  class="borda-preta">
                    {{$errors->has('peso') ? $errors->first('peso') : ''}}
                    <select name="unidade_id">
                        <option value="">-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
