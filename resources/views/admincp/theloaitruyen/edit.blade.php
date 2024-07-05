@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Cập nhật thể loại</div>
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
            </div> @endif <form method="POST" action="{{route('theloai.update',[$theloai->id])}}">
                @method('PUT')
                @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                <input id="slug" onkeyup="ChangeToSlug();" name="tentheloai" value="{{$theloai->tentheloai}}" type="text" class="form-control" placeholder="Tên thể loại...">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                <input id="convert_slug" name="slug_theloai" value="{{$theloai->slug_theloai}}" type="text" class="form-control" placeholder="Slug thể loại...">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select name="kichhoat" class="form-select" aria-label="Default select example">
                    @if($theloai->kichhoat==0)
                    <option selected value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                    @else
                    <option value="0">Kích hoạt</option>
                    <option selected value="1">Không kích hoạt</option>
                    @endif
                  </select>
              </div>
              <button type="submit" name="themtheloai" class="btn btn-primary">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
