@extends('layouts.main')
@section('content')
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="{{route('news')}}" class="btn btn-primary my-2">Новости</a>
          <a href="{{route('cat')}}" class="btn btn-secondary my-2">Категории</a>
        </p>
      </div>
          <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Напишите нам</h1>
      @include('inc.messages')
       <form method="post" action="{{ route('main.store') }}">
             @csrf
              <div class="form-group">
                  <label for="author">Автор</label>
                  <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
              </div>
              <div class="form-group">
                  <label for="description">Описание</label>
                  <textarea type="text" class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-success">Сохранить</button>
          </form>
    </div>
        </div>
    </div>
  </section>
@endsection