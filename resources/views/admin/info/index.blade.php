@extends('layouts.admin')
@section('title') Список заказаов на выгрузку @endsection
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список заказаов на выгрузку</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
    
            <a href="{{ route('admin.info.create') }}" class="btn btn-sm btn-outline-secondary">Добавить запрос</a>
          </div>
       
        </div>
      </div>
      
      <div class="table-responsive">
         @include('inc.messages')
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>#ID</th>
                      <th>Автор</th>
                      <th>Телефон</th>
                      <th>Email</th>
                      <th>Ссылка на сайт</th>
                      <th>Информация</th>
                      <th>Опции</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($infoList as $info)
                      <tr>
                          <td>{{ $info->id }}</td>
                          <td>{{ $info->author }}</td>
                          <td>{{ $info->tel }}</td>
                          <td>{{ $info->email }}</td>
                          <td>{{ $info->url }}</td>
                          <td>{{ $info->description }}</td>
                          <td>
                              <a href="{{ route('admin.info.edit', ['info' => $info->id]) }}">Ред.</a>
                              &nbsp;
                              <a href="javascript:;" class="delete" rel="{{ $info->id }}" style="color:red;">Удл.</a>
                          </td>
                      </tr>
                  @empty
                  <tr><td colspan="4">Записей нет</td></tr>
                  @endforelse
              </tbody>
          </table>
          {{ $infoList->links() }}
      </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    const id = this.getAttribute("rel");
                    if(confirm(`Подтвердите удаление записи с #ID ${id} ?`)) {
                        //send id on backend
                        send(`/admin/info/${id}`).then(() => {
                            alert("Запись была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush 


