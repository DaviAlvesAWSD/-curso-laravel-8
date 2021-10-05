@extends('app')

@section('title', 'Listagem dos Posts')

@section('content')

<hr>
<h1>Posts</h1>

<!--  messages  -->
@include('components.postComponents._partials.message')

<!-- search
<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="search" name="search" placeholder="search"><button type="submit">pesquisar</button>
</form>
-->
@foreach ($posts as $post)
    <p>
        <img src=" {{ url("storage/{$post->image}")}} " alt="{{ $post->title }}" style="max-width:100px;" >
        {{ $post->title }}
        <a href="{{ route('posts.show', $post->id) }}">[ Ver ]</a>
        <a href="{{ route('posts.edit', $post->id) }}">[ Edit ]</a>
    </p>
@endforeach
@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
 @endif


    <hr>
    <a href="{{ route('posts.create') }}">Criar novo Post</a>

@endsection

