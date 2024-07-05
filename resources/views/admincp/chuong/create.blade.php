@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Thêm chương</div>
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
            </div> @endif <form method="POST" action="{{route('chuong.store')}}">
                @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                <input id="slug" name="tieude" onkeyup="ChangeToSlug();" value="{{old('tieude')}}" type="text" class="form-control" placeholder="Tên chương...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug chương</label>
                <input id="convert_slug"  name="slug_chuong" value="{{old('slug_chuong')}}" type="text" class="form-control" placeholder="Slug chương...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                <select name="truyen_id" class="form-select" aria-label="Default select example">
                  @foreach($truyen as $key => $value)
                    <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                   @endforeach
                  </select>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                <textarea name="noidung" id="noidung_chuong" class="form-control" value="{{old('noidung')}}"></textarea>
              </div>



              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select name="kichhoat" class="form-select" aria-label="Default select example">
                    <option value="0" @if(old('kichhoat') == '0') selected @endif>Kích hoạt</option>

                    <option value="1" @if(old('kichhoat') == '1') selected @endif>Không kích hoạt</option>
                  </select>
              </div>
              <button type="submit" name="themchuong" class="btn btn-primary">Thêm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
