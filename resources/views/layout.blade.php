<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
        <title>HTTTruyen</title>
        <style>

.welcome {
  background-color: #fff;
  overflow: hidden;
}

.welcome .marquee {
  display: inline-block;
  margin-bottom: 0;
  animation: marquee 20s linear infinite;
}

@keyframes marquee {
  0% {
    transform: translateX(100%);
  }
  
  100% {
    transform: translateX(-100%);
  }
}
.bg-title:hover {
  transform: scale(1.1);
  transition: transform 0.3s ease-in-out;
}
.bg-title {
  position: relative;
  cursor: pointer;
  border: 3px solid #000;
  border-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='100' height='100' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'%3E %3Cstyle%3Epath%7Banimation:stroke 5s infinite linear%3B%7D%40keyframes stroke%7Bto%7Bstroke-dashoffset:776%3B%7D%7D%3C/style%3E%3ClinearGradient id='g' x1='0%25' y1='0%25' x2='0%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%232d3561' /%3E%3Cstop offset='25%25' stop-color='%23c05c7e' /%3E%3Cstop offset='50%25' stop-color='%23f3826f' /%3E%3Cstop offset='100%25' stop-color='%23ffb961' /%3E%3C/linearGradient%3E %3Cpath d='M1.5 1.5 l97 0l0 97l-97 0 l0 -97' stroke-linecap='square' stroke='url(%23g)' stroke-width='3' stroke-dasharray='388'/%3E %3C/svg%3E") 1;
}
.bg-title img{
  height: 185px;
  z-index: 1;
}
.bg-title .content{
  position: absolute;
  bottom: 0;
  left: 0;
  background-color: rgba(0, 35, 82, 0.7);
  z-index: 999;
  width: 100%;
  color: #fff;
}
.col-content {
  cursor: pointer;
}
.image-hover {
  border: 3px solid orange;
  height: 195px;
}
.image-hover:hover {
  transform: scale(1.1);
  transition: transform 0.3s ease-in-out;
}
.bread_style {
  padding: 10px;
  border-radius: 5px;
}
.bread_style li a {
  text-decoration: none;
}
  /* Style for the pagination links */
  .pagination {
  display: flex;
  justify-content: center;
 
}

.pagination li {
  display: inline-block;
  margin-right: 10px;
  font-size: 16px;
}

.pagination li a {
  display: block;
  background-color: #f5f5f5;
  color: #333;
  border-radius: 5px;
}

.pagination li a:hover {
  background-color: #333;
  color: #fff;
}

.pagination .active a {
  background-color: #333;
  color: #fff;
}
.page-link.active, .active > .page-link {
  border-radius: 5px;
}

</style>
    </head>
    <body style="background-color: #ddd; overflow-x: hidden;">
    <div>
          <!-- menu -->
          <div>
          <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container-fluid">
              <a class="navbar-brand " href="{{url('/truyen-hay')}}">
                <i class="fa fa-wheelchair" style="margin-right: 10px" aria-hidden="true"></i>HTTTruyen </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bars" aria-hidden="true" style="margin-right: 5px"></i>Thể loại </a>
                    <ul class="dropdown-menu dropdown-menu-dark bg-secondary" aria-labelledby="navbarDropdown"> @foreach($theloai as $key => $the) <li>
                        <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>
                      </li> @endforeach </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-cog" aria-hidden="true" style="margin-right: 5px"></i>Tùy chỉnh </a>
                    <ul class="dropdown-menu dropdown-menu-dark bg-secondary" aria-labelledby="navbarDropdown">
                      <li class="font-setting" id="font-size-li">
                      <a class="dropdown-item d-flex justify-content-center flex-column" href="#">
                          <p> <i class="fa fa-font" style="margin-right: 10px" aria-hidden="true"></i>Font size</p>
                          <input type="number" id="font-size-input" min="14" max="20">
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item d-flex justify-content-center flex-column" href="#">
                          <p> <i class="fa fa-pie-chart" style="margin-right: 10px" aria-hidden="true"></i>Themes</p>
                          <select id="theme-select" onchange="changeTheme()" class="form-select" aria-label="Default select example">
                            <option value="dark">Dark</option>
                            <option value="light">Light</option>
                          </select>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="d-flex justify-content-between" style="margin-right: 30px">
                <!-- tim kiem -->
                  <form autocomplete="off" class="d-block" method="POST" action="{{url('tim-kiem/')}}">
                  @csrf
                  <div class="d-flex">
                  <input class="form-control" id="keywords" name="tukhoa" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                  <button class="btn btn-warning text-light" style="margin-left: 10px" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                  </div>
                    <div id="search_ajax" style="margin-top: 10px"></div>
                  </form>
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true" style="margin-right: 5px"></i>{{ Auth::user()->name }}</a>
                      <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end bg-secondary" aria-labelledby="navbarDropdown">
                        <li>
                          <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" style="margin-right: 10px" aria-hidden="true"></i>Đăng xuất</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                        <li>
                        <a class="dropdown-item {{ Auth::user()->is_admin!=1 ? 'd-none' : '' }}" href="{{ route('home') }}"><i class="fa fa-cogs" style="margin-right: 10px" aria-hidden="true"></i>Quản lý</a>
                        </li>
                      </ul>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          </div>

          <!-- slide-welcome -->



          <div style="margin-top: 15px">
            <!-- Slider --> @yield('slide')
            <!-- Truyện mới --> @yield('content')
            <!-- footer -->
            <hr />
            <div class="d-flex justify-content-between align-content-center m-4">
              <div class="col col-sm-10">HTTtruyen-Được thành lập bởi bộ ba Hòa, Thái, Thịnh,với mục tiêu phát triển thành trang web đọc truyện lớn nhất VN.🥳</div>
              <a href="#" class="btn btn-primary">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
              </a>
            </div>
             <!-- footer -->

          </div>


        </div>
       <script src="{{ asset('js/app.js') }}" defer></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
       <script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        200: {
            items: 2,
        },
        300: {
            items: 3,
        },
        600: {
            items: 4,
        },
        800: {
            items: 5,
        },
        1000: {
            items: 8,
            loop: false
        }
    }
})
       </script>
       <!-- tim kiem nang cao -->
       <script type="text/javascript">
        $('#keywords').keyup(function(){
          var keywords = $(this).val();
          if(keywords != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url: "{{url('/timkiem-ajax')}}",
              method:"POST",
              data: {keywords:keywords, _token:_token},
              success:function(data){
                $('#search_ajax').fadeIn();
                $('#search_ajax').html(data);
              }
            });
          }else{
            $('#search_ajax').fadeOut();
          }
        });

        $(document).on('click', '.li_search_ajax', function(){
          $('#keywords').val($(this).text());
          $('#search_ajax').fadeOut()
        });
       </script>
<!--route chuong -->
       <script type="text/javascript">
        $('.select-chuong').on('change', function(){
          var url = $(this).val();
          if(url){
            window.location = url
          }
        });
        current_chuong();
        function current_chuong(){
          var url = window.location.href;
          $('select[name="select-chuong"]').find('opition[value="'+url+'"]').attr("selected", true);
        }
       </script>
       <!-- theme -->
       <script>
function changeTheme() {
  var select = document.getElementById("theme-select");
  var theme = select.options[select.selectedIndex].value;
  var welcome = document.getElementsByClassName("welcome")[0];
  var contentcard = document.getElementsByClassName("contentcard")[0];
  var body = document.getElementsByTagName("body")[0];
  if (theme === "dark") {
    body.style.backgroundColor = "#333";
    body.style.color = "#fff";
    welcome.style.backgroundColor = "#ddd";
    welcome.style.color = "orange";
    contentcard.style.backgroundColor = "#333";
    contentcard.style.color = "#fff";
    contentcard.style.borderColor = "#fff";
    localStorage.setItem("theme", "dark");
  } else if (theme === "light") {
    localStorage.removeItem("theme", "dark");
    body.style.backgroundColor = "#ddd";
    body.style.color = "#000";
    welcome.style.backgroundColor = "#fff";
    welcome.style.color = "#000";
    contentcard.style.backgroundColor = "#ddd";
    contentcard.style.color = "#000";
    contentcard.style.borderColor = "rgba(0, 0, 0, 0.175)";
    localStorage.setItem("theme", "light");
  }
}

var savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
  var select = document.getElementById("theme-select");
  select.value = "dark";
  changeTheme();
} else if (savedTheme === "light") {
  var select = document.getElementById("theme-select");
  select.value = "light";
  changeTheme();
} else {
  localStorage.removeItem("theme");
}
</script>
<!-- thay doi font size -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const fontSizeInput = document.getElementById('font-size-input');
  var font_content = document.getElementsByClassName("font_content")[0];
  const storedFontSize = localStorage.getItem('fontSize');
  if (storedFontSize) {
    font_content.style.fontSize = storedFontSize;
    fontSizeInput.value = parseInt(storedFontSize);
  }
  
  fontSizeInput.addEventListener('input', () => {
    let fontSize = fontSizeInput.value;
    fontSize = Math.min(Math.max(parseInt(fontSize), 14), 20); // giới hạn giá trị từ 14 đến 20
    fontSize = `${fontSize}px`;
    font_content.style.fontSize = fontSize;
    localStorage.setItem('fontSize', fontSize);
  });
});

</script>

<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('noidung_comment');
</script>
<script>
  $(document).ready(function() {
  $('.btn-edit').click(function() {
    $('.form-edit').toggleClass('d-none');
  });
});
</script>

    </body>
</html>
