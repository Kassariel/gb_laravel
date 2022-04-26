@extends('layouts.admin')
@section('title') Список пользователей @endsection
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          
       
        </div>
      </div>
      
      <div class="table-responsive">
         @include('inc.messages')
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>#ID</th>
                      <th>Имя</th>
                      <th>Email</th>
                      <th>Роль</th>
                      <th>Опции</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($userList as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                              @if($user->is_admin == 1) Админ @else Пользователь @endif 
                          </td>
                          <td>
                              <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Ред.</a>
                              &nbsp;
                              <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color:red;">Удл.</a>
                          </td>
                      </tr>
                  @empty
                  <tr><td colspan="4">Записей нет</td></tr>
                  @endforelse
              </tbody>
          </table>
          {{ $userList->links() }}
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
                        send(`/admin/users/${id}`).then(() => {
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

