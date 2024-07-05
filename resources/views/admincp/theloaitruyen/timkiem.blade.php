@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <!-- tim kiem -->
                <form autocomplete="off" class="d-block" method="POST" action="{{url('tim-kiem/')}}">
                  @csrf
                  <div class="d-flex">
                  <input class="form-control" id="keywords" name="tukhoa" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                  <button class="btn btn-warning text-light" style="margin-left: 10px" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                  </div>
                    <div id="search_ajax" style="margin-top: 10px"></div>
                  </form>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($theloaitruyen as $key => $theloai)
                          <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$theloai->tentheloai}}</td>
                            <td>
                                @if($theloai->kichhoat==0)
                                <span class="text text-success">Kích hoạt</span>
                                @else
                                <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td style="display:flex">
                                <a href="{{route('theloai.edit',[$theloai->id])}}" class="btn btn-primary" style="margin-right: 10px">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <form action="{{route('theloai.destroy',[$theloai->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa thể loại này không ?');" class="btn btn-danger">
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
