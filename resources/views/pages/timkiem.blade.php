@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bread-list bread_style">
    <li class="breadcrumb-item">
      <a href="{{url('/truyen-hay')}}">
        <i class="fa fa-home" style="margin-right:10px" aria-hidden="true"></i>Trang chủ </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
  </ol>
</nav>
<div class="container">
<div style="margin-top: 30px">
  <div style="display: flex; justify-content: space-between; margin-bottom: 10px">
  <h6 style="font-weight: bold">Bạn đang tìm kiếm theo {{$tukhoa}}</h6>
  </div>
  
  <div class="album py-1">
        @php
        $count = count($truyen);
        @endphp
        @if($count==0)
        <div class="col-md-12">
            <div class="card box-shadow bg-warning">
                <div class="card-body">
                    <p class="text-danger">Không tìm thấy truyện vui lòng quay lại sau.....</p>
                </div>
            </div>
        </div>
        @else
    <div>
      <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-3">
        @foreach($truyen as $key => $value)
        <div class="col col-content">
          <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="col-sm-9 d-flex flex-column" style="width: 130px">
            <img class="image-hover"  src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
            <div class="d-block justify-content-center align-items-center" style="margin-top: 12px">
            <h6 class="text-center fw-bold" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; width: 100%;">{{$value->tentruyen}}</h6>
              <div class="d-flex justify-content-center align-items-center">
              <button type="button" class="btn btn-sm btn-warning" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; width: 100%;">{{$value->tacgia}}</button>
              </div>
            </div>
          </a>
        </div>
        @endforeach
        @endif



     





    


  







      </div>
    </div>
  </div>


</div>
</div>
<style>
  a{
    text-decoration: none;
  }
</style>
@endsection