@extends('../layout') @section('slide') @include('pages.slide') @endsection @section('content')
<!-- TRUYỆN MỚI CẬP NHẬT -->
<div class="container">
  <div style="margin-top: 30px">
    <div style="display: flex; justify-content: space-between; margin-bottom: 10px">
      <h6 style="font-weight: bold">TRUYỆN MỚI CẬP NHẬT <i class="fa fa-star" aria-hidden="true" style="margin-left: 10px"></i>
      </h6>
    </div>

    <div class="container album py-1">
      <div>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-3"> @foreach($truyen as $key => $value) <div class="col col-content">
            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="col-sm-9 d-flex flex-column" style="width: 130px">
              <img class="image-hover" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
              <div class="d-block justify-content-center align-items-center" style="margin-top: 12px">
                <h6 class="text-center fw-bold" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; width: 100%;">{{$value->tentruyen}}</h6>
                <div class="d-flex justify-content-center align-items-center">
                  <button type="button" class="btn btn-sm btn-warning" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; width: 100%;">{{$value->tacgia}}</button>
                </div>
              </div>
            </a>
          </div> @endforeach </div>
      </div>
    </div>
    <!-- paginate -->
    <div class="d-flex flex-row-reverse mt-3">
    {{ $truyen->links() }}
    </div>


  </div>
</div>
<style>
  a {
    text-decoration: none;
  }
</style> @endsection