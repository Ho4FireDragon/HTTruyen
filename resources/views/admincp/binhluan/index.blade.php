@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý comment</div>

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
                            <th scope="col">Tên thành viên</th>
                            <th scope="col">Chương</th>
                            <th scope="col">Truyện</th>
                            <th scope="col">Nội dung comment</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($comment as $key => $binhluan)
                          <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$binhluan->user->name}}</td>
                            <td>{{$binhluan->chuong->tieude}}</td>
                            <td>{{$binhluan->chuong->truyen->tentruyen}}</td>
                            <td>{{$binhluan->noidung}}</td>
                            <td style="display:flex">
                                <form action="{{route('binhluan.destroy',[$binhluan->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa bình luận này không ?');" class="btn btn-danger">
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
@endsection
