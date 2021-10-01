<form action="{{ route('posts.update', $post->id) }}" method="post">
    <h1>Edita o Post <strong>{{ $post->title }}</strong></h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo">{{ $post->content }}</textarea>
    <button type="submit">Enviar</button>
</form>
