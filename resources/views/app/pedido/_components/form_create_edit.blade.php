@if (isset($pedido->id))
    <form action="{{route('pedido.update', ['pedido' => $pedido])}}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{route('pedido.store')}}" method="post">
    @csrf
@endif

    <select name="cliente_id">
        <option value="">-- Selecione um Cliente --</option>
        @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}" {{( $pedido->cliente_id ?? old('unidade_id')) == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
        @endforeach
    </select>
    {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}

    <button type="submit" class="borda-preta">{{isset($pedido->id) ? 'Editar' : 'Adicionar'}}</button>
</form>
