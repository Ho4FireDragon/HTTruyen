@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý user</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên user</th>
                            <th scope="col">Email</th>
                            <th scope="col">Admin</th>
                            <!-- <th scope="col">Password</th> -->
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($list_user as $key => $user)
                          <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            <form action="{{route('user.update',[$user->id])}}" method="POST">
                            @method('PUT')
                            @csrf
                              <div class="form-check form-switch d-flex justify-content-center">
  <input class="form-check-input" id="is-admin-switch" name="is_admin" type="checkbox" {{$user->is_admin==1 ? 'checked' : ''}}>
  <button class="btn btn-style" type="submit"><p class="text-success sw-style"><i class="fa fa-check" aria-hidden="true"></i></p>
  </button>
</div>
</form>
                            </td>
                            <!-- <td>
                              <div class="pass">{{$user->password}}</div>
                            </td> -->
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <form action="{{route('user.destroy',[$user->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa user này không ?');" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.pass {
height: 100px;
width: 70px;
overflow-y: hidden;
}
.pass:hover {
height: 100px;
width: 70px;
overflow-y: scroll !important;
}
.sw-style {
  margin-bottom: 0;
}
.btn-style {
  padding: 0 12px;
}
</style>
@endsection
