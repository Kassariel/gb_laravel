@extends('layouts.main')
@section('header')
     <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Список новостей @isset($idi) из категории <strong> {{$newsList[0]['category']}} @endisset </strong></h1>
      </div>
    </div>
      </section>
@endsection
@section('content')
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@forelse ($newsList as $news)

<div class="col">
          <div class="card shadow-sm">
                <img src="{{$news ['image']}}">

            <div class="card-body">
             <strong><a href="{{route('news.show', ['id' => $news['id']])}}">{{$news['title']}}</a></strong>
              <p class="card-text">{{$news['description']}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('news.show', ['id' => $news['id']])}}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                </div>
                <small class="text-muted">Автор: <em>{{$news['author']}}</em></small>
                <small class="text-muted">Статус: <em>{{$news['status']}}</em></small>
                <small class="text-muted">Категория: <em><a href="{{route('cat.show', ['idi' => $news['catid']])}}">{{$news['category']}}</a></em></small>
              </div>
            </div>
          </div>
        </div>
@empty
    <h2>Новостей нет</h2>
@endforelse  
      </div>      
@endsection




