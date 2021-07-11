@extends('app.layouts.basico')

@section('title', 'Adicionar')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produto</p>
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
                    <input type="text" value="" name="nome" placeholder="Nome" class="borda-preta">
                    <input type="text" value=""  name="descricao" placeholder="Descrição"  class="borda-preta">
                    <input type="text" value=""  name="peso" placeholder="Peso"  class="borda-preta">
                    <select name="unidade_id">
                        <option value="">-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
