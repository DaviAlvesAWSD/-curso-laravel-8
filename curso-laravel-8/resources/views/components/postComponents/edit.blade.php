@extends('app')

@section('title', 'Editar Posts')

@section('content')
<h1>Edita o Post <strong>{{ $post->title }}</strong></h1>
<form action="{{ route('posts.update', $post->id) }}" method="post"  enctype="multipart/form-data">
    @method('put')
    @include('components.postComponents._partials.form')
</form>
@endsection
