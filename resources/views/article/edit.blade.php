@extends('layouts.app')

@section('title', "Редактирование статьи")

@section('header')
    <h1>Отредактируйте статью</h1>
@endsection

@section('content')
{{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
@include('article.form')
{{ Form::submit('Обновить') }}
{{ Form::close() }}
@endsection
