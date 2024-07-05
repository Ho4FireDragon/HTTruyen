@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Cập nhật truyện</div>
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
            </div> @endif <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                <input id="slug" onkeyup="ChangeToSlug();" name="tentruyen" value="{{$truyen->tentruyen}}" type="text" class="form-control" placeholder="Tên thể loại...">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                <input id="convert_slug" name="slug_truyen" value="{{$truyen->slug_truyen}}" type="text" class="form-control" placeholder="Slug thể loại...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                <input type="file" class="form-control-file" name="hinhanh" onchange="previewImage(this);">
                <div class="preview-image-container">
                <img id="image_s" class="image-hover" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" style="max-width:300px; max-height:300px;">
                <img id="preview-image" class="image-hover" src="" alt="Preview Image" style="display:none; max-width:300px; max-height:300px;">
                </div>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                <textarea name="tomtat" id="noidung_chuong" class="form-control" rows="5" style="resize: none">{{$truyen->tomtat}}</textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                <input id="slug_tacgia" name="tacgia" onkeyup="ChangeToSlugTacGia();" value="{{$truyen->tacgia}}" type="text" class="form-control" placeholder="Tên tác giả...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug tác giả</label>
                <input id="convert_slug_tacgia"  name="slug_tacgia" value="{{$truyen->slug_tacgia}}" type="text" class="form-control" placeholder="Slug tác giả...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                <input name="tukhoa" value="{{$truyen->tukhoa}}" type="text" class="form-control" placeholder="Từ khóa...">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                <select name="theloai" class="form-select" aria-label="Default select example">
                    @foreach($theloai as $key => $muc)
                    <option {{$muc->id==$truyen->theloai_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tentheloai}}</option>
                    @endforeach
                  </select>
              </div>
              
              
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select name="kichhoat" class="form-select" aria-label="Default select example">
                    @if($truyen->kichhoat==0)
                    <option selected value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                    @else
                    <option value="0">Kích hoạt</option>
                    <option selected value="1">Không kích hoạt</option>
                    @endif
                  </select>
              </div>
              <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
