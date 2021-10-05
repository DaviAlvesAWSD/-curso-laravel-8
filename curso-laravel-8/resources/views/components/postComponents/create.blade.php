@extends('app')

@section('title', 'Criar Posts')

@section('content')
<h1>Cadastrar Novo Post</h1>
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @include('components.postComponents._partials.form')
</form>
@endsection
