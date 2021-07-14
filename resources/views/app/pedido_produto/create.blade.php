@extends('app.layouts.basico')

@section('title', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
             <p>Adicionar Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>ID do pedido {{$pedido->id}}</p>
            <p>ID do cliente {{$pedido->cliente_id}}</p>

            <div style="width: 30%; margin-left: auto; margin-right: auto">
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido->id, 'produtos' => $produtos ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
