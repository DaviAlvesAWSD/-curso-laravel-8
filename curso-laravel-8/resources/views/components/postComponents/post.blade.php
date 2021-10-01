<h1>Posts</h1>

<!--  messages  -->
@if(session('sucesso'))
<div class="alert sucesso">
	{{session('sucesso')}}
</div>
@elseif(session('error'))
<div class="alert sucesso">
	{{session('error')}}
</div>
@endif

<!--
<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="search" name="search" placeholder="search"><button type="submit">pesquisar</button>
</form>
-->
@foreach ($posts as $post)
    <p>{{ $post->title }}
        <a href="{{ route('posts.show', $post->id) }}">[ Ver ]</a>
        <a href="{{ route('posts.edit', $post->id) }}">[ Edit ]</a>
    </p>
@endforeach
@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
 @endif
