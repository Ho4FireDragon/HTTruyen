@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Cập nhật chương</div>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="card-body"> @if (session('status')) <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div> @endif <form method="POST" action="{{route('chuong.update',[$chuong->id])}}">
                @method('PUT')
                @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                <input id="slug" name="tieude" onkeyup="ChangeToSlug();" value="{{$chuong->tieude}}" type="text" class="form-control" placeholder="Tên chương...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug chương</label>
                <input id="convert_slug"  name="slug_chuong" value="{{$chuong->slug_chuong}}" type="text" class="form-control" placeholder="Slug chương...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                <select name="truyen_id" class="form-select" aria-label="Default select example">
                  @foreach($truyen as $key => $value)
                    <option {{$chuong->truyen_id==$value->id ? 'selected' : ''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                   @endforeach
                  </select>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                <textarea name="noidung" id="noidung_chuong" class="form-control" rows="5" value="{{$chuong->noidung}}}">{{$chuong->noidung}}</textarea>
              </div>



              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select name="kichhoat" class="form-select" aria-label="Default select example">
                @if($chuong->kichhoat==0)
                    <option selected value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                    @else
                    <option value="0">Kích hoạt</option>
                    <option selected value="1">Không kích hoạt</option>
                    @endif
                  </select>
              </div>
              <button type="submit" name="themchuong" class="btn btn-primary">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
