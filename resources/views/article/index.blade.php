@extends('layouts.app')

@section('title', 'Статьи')

@section('header')
    <h1>Список статей</h1>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @foreach ($articles as $article)
        <h2><a href="{{route('articles.show', $article->id)}}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
