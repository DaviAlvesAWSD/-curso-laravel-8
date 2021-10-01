<h1>Posts</h1>

@if(session('sucesso'))
<div class="alert sucesso">
	{{session('sucesso')}}
</div>
@endif

@foreach ($posts as $post)
    <p>{{ $post->title }}</p>
    <p>{{ $post->content }}</p>
@endforeach
