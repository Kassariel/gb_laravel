@extends('layouts.main')
@section('content')
 

 
  <div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Категории новостей</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
 @foreach ($catList as $cat)


      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
        </div>
        <div>
          <h2><a href="<?=route('cat.show', ['idi' => $cat['id']])?>"><?=$cat['category']?></a></h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="<?=route('cat.show', ['idi' => $cat['id']])?>" class="btn btn-primary">
            Подробнее
          </a>
        </div>
      </div>


@endforeach
     </div>
  </div>
@endsection