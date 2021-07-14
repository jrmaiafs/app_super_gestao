@if (isset($cliente->id))
    <form action="{{route('cliente.update', ['cliente' => $cliente])}}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{route('cliente.store')}}" method="post">
    @csrf
@endif

    <input type="text" value="{{ $cliente->nome ?? old('nome')}}" name="nome" placeholder="Nome" class="borda-preta">
    {{$errors->has('nome') ? $errors->first('nome') : ''}}

    <button type="submit" class="borda-preta">{{isset($cliente->id) ? 'Editar' : 'Adicionar'}}</button>
</form>
