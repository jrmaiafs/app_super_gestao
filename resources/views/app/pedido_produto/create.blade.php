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
                <h4>Itens do Pedido</h4>
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data da adição do produto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->pivot->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <form id="form_{{$produto->pivot->id}}" action="{{route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido->id, 'produtos' => $produtos ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
