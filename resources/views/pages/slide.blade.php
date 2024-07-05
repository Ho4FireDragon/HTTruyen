<!-- slide -->
<div class="container">
<h6 style="font-weight: bold">TRUYỆN HOT<i class="fa fa-fire" aria-hidden="true" style="margin-left: 10px"></i></h6>
<div class="container owl-carousel owl-theme ">
@foreach($truyen_hay as $key => $value)
    <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
      <div class="item bg-title">
        <img  src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
        <div class="content content_1">
          <p class="title_truyen">{{$value->tentruyen}}</p>
        </div>
      </div>
    </a>
@endforeach    
</div>
</div>
<style>
  .content_1 {
    display: relative;
    padding: 0 10px;
  }
  .content_1 .title_truyen{
    margin-top: 10px;
    margin-bottom: 5px;
  }
  .title_truyen {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: block;
    width: 100%;
  }
</style>