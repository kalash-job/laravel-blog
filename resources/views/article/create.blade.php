@extends('layouts.app')

@section('title', "Создать статью")

@section('header')
<h1>Создайте статью</h1>
@endsection

@section('content')
{{ Form::model($article, ['url' => route('articles.store')]) }}
@include('article.form')
{{ Form::submit('Создать') }}
{{ Form::close() }}
<div>{{$article->body}}</div>
@endsection
