@extends('layouts.main')
@section('content')
 

 
  <div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Категории новостей</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
 @foreach ($categories as $category)


      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
        </div>
        <div>
          <h2><a href="<?=route('cat.show', ['idi' => $category->id])?>">{{$category->title}}</a></h2>
          <p>{{$category->description}}</p>
          <a href="<?=route('cat.show', ['idi' => $category->id])?>" class="btn btn-primary">
            Подробнее
          </a>
        </div>
      </div>


@endforeach
     </div>
  </div>
@endsection