 <form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$class}}">
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$class}}">
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$class}}">
    <br>
    <select name="motivo_contato" class="{{$class}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{$class}}">{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>

<div style="background: red; position: relative; top: 0px; left: 0px; width: 100%">
    <pre>
    {{print_r($errors)}}
    </pre>

</div>
