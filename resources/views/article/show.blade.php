@extends('layouts.app')

@section('title', "Статья {$article->name}")

@section('header')
    <h1>Статья {{$article->name}}</h1>
@endsection

@section('content')
    <div>{{$article->body}}</div>
@endsection
