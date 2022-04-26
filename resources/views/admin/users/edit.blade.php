@extends('layouts.admin')
@section('title') Редактировать профиль@endsection
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать профиль</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
    
            
          </div>
       
        </div>
      </div>
      
      <div class="raw">
         @include('inc.messages')
          <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
             @csrf
             @method('put')
              <div class="form-group">
                  <label for="author">Имя</label>
                  <input type="text" class="form-control" name="name" id="author" value="{{ $user->name }}">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
              </div>

              <br>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_admin" id="exampleRadios1" value="1" @if($user->is_admin == '1') checked @endif>
                  <label class="form-check-label" for="exampleRadios1">
                    Админ
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_admin" id="exampleRadios2" value="0" @if($user->is_admin == '0') checked @endif>
                  <label class="form-check-label" for="exampleRadios2">
                    Пользователь
                  </label>
                </div>
              <br>
              <button type="submit" class="btn btn-success">Сохранить</button>
          </form>
      </div>

@endsection