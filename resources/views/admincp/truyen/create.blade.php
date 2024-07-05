@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Thêm truyện</div>
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
            </div> @endif <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                <input id="slug" name="tentruyen" onkeyup="ChangeToSlug();" value="{{old('tentruyen')}}" type="text" class="form-control" placeholder="Tên truyện...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                <input id="convert_slug"  name="slug_truyen" value="{{old('slug_truyen')}}" type="text" class="form-control" placeholder="Slug truyện...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                <input id="slug_tacgia" name="tacgia" onkeyup="ChangeToSlugTacGia();" value="{{old('tacgia')}}" type="text" class="form-control" placeholder="Tên tác giả...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug tác giả</label>
                <input id="convert_slug_tacgia"  name="slug_tacgia" value="{{old('slug_tacgia')}}" type="text" class="form-control" placeholder="Slug tác giả...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                <input name="tukhoa" value="{{old('tukhoa')}}" type="text" class="form-control" placeholder="Từ khóa...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                <input type="file" class="form-control-file" name="hinhanh" onchange="previewImage(this);">
                <div class="preview-image-container">
                <img id="preview-image" src="" alt="Preview Image" class="image-hover" style="display:none; max-width:300px; max-height:300px;">
                </div>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                <textarea name="tomtat" id="noidung_chuong" class="form-control" rows="5" style="resize: none"></textarea>
              </div>


              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                <select name="theloai" class="form-select" aria-label="Default select example">
                    @foreach($theloai as $key => $muc)
                    <option value="{{$muc->id}}">{{$muc->tentheloai}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select name="kichhoat" class="form-select" aria-label="Default select example">
                    <option value="0" @if(old('kichhoat') == '0') selected @endif>Kích hoạt</option>

                    <option value="1" @if(old('kichhoat') == '1') selected @endif>Không kích hoạt</option>
                  </select>
              </div>
              <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
