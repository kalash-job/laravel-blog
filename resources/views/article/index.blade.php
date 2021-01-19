@extends('layouts.app')

@section('title', 'Статьи')

@section('header')
    <h1>Список статей</h1>
@endsection

@section('content')
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
