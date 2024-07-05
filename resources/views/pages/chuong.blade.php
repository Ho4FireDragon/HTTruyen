@extends('../layout') @section('content') <nav aria-label="breadcrumb">
  <ol class="breadcrumb bread-list bread_style">
    <li class="breadcrumb-item">
      <a href="{{url('/truyen-hay')}}">
        <i class="fa fa-home" style="margin-right:10px" aria-hidden="true"></i>Trang chủ </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{url('the-loai/'.$truyen_bread->theloaitruyen->slug_theloai)}}">{{$truyen_bread->theloaitruyen->tentheloai}}</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{url('xem-truyen/'.$truyen_bread->slug_truyen)}}">{{$truyen_bread->tentruyen}}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{$chuong->tieude}}</li>
  </ol>
</nav>
<div class="row p-3">
  <div class="col-md-12">
    <h4 style="text-align:center;">{{$chuong->truyen->tentruyen}}</h4>
    <p style="text-align:center;">{{$chuong->tieude}}</p>
    <div class="d-flex justify-content-evenly">
      <div>
        <a href="{{url('xem-chuong/'.$prev_chuong)}}" class="btn btn-success {{$chuong->id==$min_id->id ? 'disabled' : ''}}">
          <i class="fa fa-arrow-left" style="margin-right: 10px" aria-hidden="true"></i>Chương trước </a>
      </div>
      <div>
        <select class="form-select select-chuong" aria-label="Default select example">
          <option selected>Chọn chương</option> @foreach($all_chuong as $key => $chap) <option value="{{url('xem-chuong/'.$chap->slug_chuong)}}">{{$chap->tieude}}</option> @endforeach
        </select>
      </div>
      <div>
        <a href="{{url('xem-chuong/'.$next_chuong)}}" class="btn btn-success {{$chuong->id==$max_id->id ? 'disabled' : ''}}">Chương tiếp <i class="fa fa-arrow-right" style="margin-left: 10px" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="noidung_card mt-3 mb-3">
      <h6 class="card-text font_content" style="line-height: 30px">
        {{!! $chuong->noidung !!}}
      </h6>
    </div>
    <div class="d-flex justify-content-evenly">
      <div>
        <a href="{{url('xem-chuong/'.$prev_chuong)}}"  class="btn btn-success {{$chuong->id==$min_id->id ? 'disabled' : ''}}">
          <i class="fa fa-arrow-left" style="margin-right: 10px" aria-hidden="true"></i>Chương trước </a>
      </div>
      <div>
        <select class="form-select select-chuong" aria-label="Default select example">
          <option selected>Chọn chương</option> @foreach($all_chuong as $key => $chap) <option value="{{url('xem-chuong/'.$chap->slug_chuong)}}">{{$chap->tieude}}</option> @endforeach
        </select>
      </div>
      <div>
        <a href="{{url('xem-chuong/'.$next_chuong)}}" class="btn btn-success {{$chuong->id==$max_id->id ? 'disabled' : ''}}">Chương tiếp <i class="fa fa-arrow-right" style="margin-left: 10px" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <!-- Binh luan -->
    <form method="POST" action="{{ route('binhluan.store') }}">
    @csrf
    <div class="d-flex justify-content-between flex-column mb-3 mt-3">
        <div class="mb-3">
            <textarea name="noidung" type="text" class="form-control" placeholder="Nhập nội dung bình luận...">{{ old('noidung') }}</textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="chuong_id" value="{{ $chuong->id }}">
        <button type="submit" class="btn btn-primary">Thêm bình luận</button>
    </div>
</form>
    @foreach($comment as $key => $binhluan)
    <div>
    <div class="card mb-3">
  <div class="card-header">
  <i class="fa fa-user" aria-hidden="true"></i> {{$binhluan->user->name}}
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item d-flex justify-content-between align-content-center">
      <p>{{$binhluan->noidung}}</p>
      @if($binhluan->user->name === Auth::user()->name)
      <div>
      </div>
  <div class="d-flex align-items-center">
  <button class="btn btn-sm btn-primary m-2 btn-edit">
      <i class="fa fa-pencil" aria-hidden="true"></i>
  </button>
  
    <form action="{{route('binhluan.destroy',[$binhluan->id])}}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-danger">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
    </form>
  </div>
@endif
    </li>
    @if($binhluan->user->name === Auth::user()->name)
    <li class="list-group-item">
    <form method="POST" action="{{ route('binhluan.update',[$binhluan->id]) }}" class="form-edit d-none">
  @method('PUT')
  @csrf
    <div class="d-flex">
        <div>
            <textarea value="{{$binhluan->noidung}}}" name="noidung" type="text" class="form-control" placeholder="Nhập nội dung bình luận...">{{$binhluan->noidung}}</textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="chuong_id" value="{{ $chuong->id }}">
        <div style="margin-left: 5px; padding: 10px">
        <button type="submit" class="btn btn-primary btn-edit">Cập nhật</button>
      </div>
    </div>
</form>
    </li>
    @endif
    <li class="list-group-item">{{$binhluan->updated_at}}</li>
  </ul>
</div>

    </div>
    @endforeach
  </div>
</div>
<style>
  .noidung_card {
    padding-left: 20px;
    margin-right: 10px;
  }
.font-setting {
  display: flex;
}
</style>
 @endsection