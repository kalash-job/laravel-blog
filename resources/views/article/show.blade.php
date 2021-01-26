@extends('layouts.app')

@section('title', "Статья {$article->name}")

@section('header')
    <h1>Статья {{$article->name}}</h1>
@endsection

@section('content')
    <a href="{{route('articles.edit', $article)}}">Редактировать статью</a>
    <div>{{$article->body}}</div>
    <div>
        <a href="{{route('articles.destroy', $article)}}" data-confirm="Вы уверены?" data-method="delete"
           rel="nofollow">Удалить статью</a>
    </div>
@endsection
