@extends('layouts.admin')
@section('title') Добавить запрос на выгрузку@endsection
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить запрос на выгрузку</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
    
            
          </div>
       
        </div>
      </div>
      
      <div class="raw">
         @include('inc.messages')
          <form method="post" action="{{ route('admin.info.store') }}">
             @csrf
              <div class="form-group">
                  <label for="author">Автор</label>
                  <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
              </div>
              <div class="form-group">
                  <label for="phone">Телефон</label>
                  <input type="tel" class="form-control" name="tel" id="tel" value="{{ old('tel') }}">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
              </div>
              <div class="form-group">
                  <label for="email">Ссылка на сайт</label>
                  <input type="url" class="form-control" name="url" id="url" value="{{ old('url') }}">
              </div>
              <div class="form-group">
                  <label for="description">Информация</label>
                  <textarea type="text" class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-success">Сохранить</button>
          </form>
      </div>

@endsection