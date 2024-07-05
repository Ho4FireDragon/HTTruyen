@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bread-list  bread_style">
    <li class="breadcrumb-item">
      <a href="{{url('/truyen-hay')}}">
        <i class="fa fa-home" style="margin-right:10px" aria-hidden="true"></i>Trang chủ </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{url('the-loai/'.$truyen->theloaitruyen->slug_theloai)}}">{{$truyen->theloaitruyen->tentheloai}}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>
<div class="container row noidung">
  <div class="col-md-9">
  <div class="col-md-9 d-flex">
      @php
      $mucluc = count($chuong);
      @endphp
  <div class="col-md-3">
    <img class="image-hover" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}">
    </div>
    <div class="col-md-9 noidung2">
      <ul>
        <li>Tên truyện: {{$truyen->tentruyen}}</li>
        <li>Tác giả: {{$truyen->tacgia}}</li>
        <li>Thể loại: <a href="{{url('the-loai/'.$truyen->theloaitruyen->slug_theloai)}}">{{$truyen->theloaitruyen->tentheloai}}</a></li>
        <li>Số chương: {{$mucluc}}</li>
        <li>Số lượt xem: {{$truyen->luotxem}}</li>
        @if($chuong_dau)
        <li><a href="{{url('xem-chuong/'.$chuong_dau->slug_chuong)}}" class="btn btn-sm btn-primary" onclick="saveLastReadChapter('{{$chuong_dau->slug_chuong}}')">Đọc ngay</a>
</li>
        <li><a href="{{url('xem-chuong/'.$chuong_moi->slug_chuong)}}" class="btn btn-sm btn-success mt-1">Đọc chương mới nhất</a></li>
        @else
        <li><button class="btn btn-sm btn-warning" disabled>Chương đang cập nhật</button></li>
        @endif
      </ul>
    </div>
  </div>
    <div class="col-md-12 card mt-3 contentcard">
    <div class="card-body">
    <h5 class="card-title">Tóm tắt nội dung</h5>
      <h6 class="card-text font_content">{{!! $truyen->tomtat !!}}</h6>
      </div>
    </div>
    <h6 style="margin-top: 10px">Từ khóa tìm kiếm: </h6>
    @php
    $tukhoa = explode(",", $truyen->tukhoa);
    @endphp
    <div class="tagcloud05">
      <ul>
        @foreach($tukhoa as $key => $tu)
        <li><a href="{{url('tag/'.\Str::slug($tu))}}"><span>{{$tu}}</span></a></li>
        @endforeach
      </ul>
    </div>
    <h5 style="margin-top: 10px">Mục lục</h5>
    <ul class="mucluctruyen">
      @if($mucluc>0)
      @foreach($chuong as $key => $chap)
      <li><a href="{{url('xem-chuong/'.$chap->slug_chuong)}}">{{$chap->tieude}}</a></li>
      @endforeach
      @else
      <li>Mục lục đang cập nhật vui lòng quay lại sau....</li>
      @endif
    </ul>
    <h5>Truyện cùng thể loại</h5>
    <div class="row">
    @foreach($cungtheloai as $key => $value)
      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="col-md-3 d-flex flex-column justify-content-between mb-5" style="width: 160px">
        <img class="image-hover"  src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
        <div class="d-flex flex-column" style="margin-top: 13px">
        <h6 class="text-center fw-bold" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; width: 100%;">{{$value->tentruyen}}</h6>
        <button type="button" class="btn btn-sm btn-warning" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; width: 100%;">{{$value->tacgia}}</button>
      </div>
      </a>
    @endforeach
     <!-- paginate -->
     <div class="d-flex flex-row-reverse">
    {{ $cungtheloai->links() }}
    </div>
    </div>
</div>
  <div class="col-md-3">
      <h5>Truyện hay xem nhiều</h5>
      @foreach($truyen_hay as $key => $value)
      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="col-md-3 d-flex flex-column justify-content-between" style="width: 135px">
        <img class="image-hover"  src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
        <div class="d-flex flex-column" style="margin-top: 13px">
          <h6 class="text-center fw-bold">{{$value->tentruyen}}</h6>
          <!-- <p class="text-center"><i class="fa fa-eye" aria-hidden="true" style="margin-right: 10px"></i>{{$value->luotxem}}</p> -->
        </div>
      </a>
      @endforeach   

      
  </div>
</div>
<script>
function saveLastReadChapter(slug) {
  localStorage.setItem('lastReadChapter', slug);
}
</script>
<style>
  a{ text-decoration: none;}
  .bread-list{
    padding-left: 20px;
  }
  nav .breadcrumb .breadcrumb-item a{
    text-decoration: none;
  }
  nav .breadcrumb .breadcrumb-item a i{
    margin-right: 10px;
  }
  .noidung{
    padding-left: 20px;
  }
  .noidung2 ul{
    list-style: none;
  }
  .noidung2 ul li{
    margin-bottom: 5px;
  }
  .noidung2 ul li a{
    text-decoration: none;
  }
  .mota{
    margin-top: 10px;
  }
  .mucluctruyen li a{
     text-decoration: none;
  }
  /* tu khoa */
  
.tagcloud05 ul {
	margin: 0;
	padding: 0;
	list-style: none;
}
.tagcloud05 ul li {
	display: inline-block;
	margin: 0 0 .3em 1em;
	padding: 0;
}
.tagcloud05 ul li a {
	position: relative;
	display: inline-block;
	height: 30px;
	line-height: 30px;
	padding: 0 1em;
	background-color: #3498db;
	border-radius: 0 3px 3px 0;
	color: #fff;
	font-size: 13px;
	text-decoration: none;
	-webkit-transition: .2s;
	transition: .2s;
}
.tagcloud05 ul li a::before {
	position: absolute;
	top: 0;
	left: -15px;
	content: '';
	width: 0;
	height: 0;
	border-color: transparent #3498db transparent transparent;
	border-style: solid;
	border-width: 15px 15px 15px 0;
	-webkit-transition: .2s;
	transition: .2s;
}
.tagcloud05 ul li a::after {
	position: absolute;
	top: 50%;
	left: 0;
	z-index: 2;
	display: block;
	content: '';
	width: 6px;
	height: 6px;
	margin-top: -3px;
	background-color: #fff;
	border-radius: 100%;
}
.tagcloud05 ul li span {
	display: block;
	max-width: 100px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
}
.tagcloud05 ul li a:hover {
	background-color: #555;
	color: #fff;
}
.tagcloud05 ul li a:hover::before {
	border-right-color: #555;
}
.contentcard {
  background-color: #ddd
}
</style>
@endsection