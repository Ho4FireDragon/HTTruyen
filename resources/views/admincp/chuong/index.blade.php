@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê chương</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{url('tim-kiem-chuong/')}}" class="d-flex" style="margin-bottom: 10px">
                    @csrf
        <input name="tukhoa" class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-warning text-light" type="submit">
        <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
      @php
        $count = count($chuong_t);
        @endphp
        @if($count==0)
        <div class="col-md-12">
            <div class="card box-shadow bg-warning">
                <div class="card-body">
                    <p class="text-danger">Không tìm thấy chương truyện vui lòng quay lại sau.....</p>
                </div>
            </div>
        </div>
        @else

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="col-md-3">Tiêu đề</th>
                            <th scope="col">Thuộc truyện</th>
                            <th scope="col" class="col-md-5">Nội dung</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($chuong_t as $key => $chap)
                          <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$chap->tieude}}</td>
                            <td>{{$chap->truyen->tentruyen}}</td>
                            <td>
                            <div class="noidung"> {{!! $chap->noidung !!}}</div>
                           </td>
                            <td>
                                @if($chap->kichhoat==0)
                                <span class="text text-success">Kích hoạt</span>
                                @else
                                <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('chuong.edit',[$chap->id])}}" class="btn btn-primary" style="margin-bottom: 10px">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <form action="{{route('chuong.destroy',[$chap->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa chương này không ?');" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @endif
                
                    </div>
            </div>
            <div class="d-flex flex-row-reverse mt-3">
    {{ $chuong_t->links() }}
    </div>
        </div>
    </div>
</div>
<style>
.noidung {
height: 200px;
overflow-y: hidden;
}
.noidung:hover {
height: 200px;
overflow-y: scroll !important;
}
      /* Style for the pagination links */
      .pagination {
  display: flex;
  justify-content: center;
 
}

.pagination li {
  display: inline-block;
  margin-right: 10px;
  font-size: 16px;
}

.pagination li a {
  display: block;
  background-color: #f5f5f5;
  color: #333;
  border-radius: 5px;
}

.pagination li a:hover {
  background-color: #333;
  color: #fff;
}

.pagination .active a {
  background-color: #333;
  color: #fff;
}
.page-link.active, .active > .page-link {
  border-radius: 5px;
}
</style>
@endsection
