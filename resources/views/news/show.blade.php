@extends('layouts.main')
@forelse ($news as $news)
@section('header')
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$news->title}}</h1>
      </div>
    </div>
@endsection
@section('content')
   <div class="news">
    <img src="{{$news->image}}">
    <br>
    <p>Категория: <em>{{$news->categoryTitle}}</em></p>
    <p>Статус: <em>{{$news->status}}</em></p>
    <p>Автор: <em>{{$news->author}}</em></p>
    <p>{{$news->description}}</p>
</div>
@empty
    <h2>Новостей нет</h2>
@endforelse  
@endsection