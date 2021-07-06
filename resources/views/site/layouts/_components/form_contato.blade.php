 <form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$class}}">
    <span style="color: red; font-size: .875rem">{{$errors->has('nome') ? $errors->first('nome') : ''}} </span>
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$class}}">
    <span style="color: red; font-size: .875rem">{{$errors->has('telefone') ? $errors->first('telefone') : ''}} </span>
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$class}}">
    <span style="color: red; font-size: .875rem">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
    <br>
    <select name="motivo_contatos_id" class="{{$class}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>]
        @endforeach
    </select>
    <span style="color: red; font-size: .875rem">{{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}</span>
    <br>
    <textarea name="mensagem" class="{{$class}}">{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    <span style="color: red; font-size: .875rem">{{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}</span>
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>

