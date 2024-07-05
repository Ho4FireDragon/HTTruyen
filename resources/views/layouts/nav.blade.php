<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}"><i class="fa fa-home" style="margin-right: 10px" aria-hidden="true"></i>Admin</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-bars" style="margin-right: 10px" aria-hidden="true"></i>
            Thể loại
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a></li>
            <li><a class="dropdown-item" href="{{route('theloai.index')}}">Liệt kê thể loại</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-leanpub" style="margin-right: 10px" aria-hidden="true"></i>
            Truyện
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm truyện</a></li>
            <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê truyện</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-bookmark" style="margin-right: 10px" aria-hidden="true"></i>
            Chương
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('chuong.create')}}">Thêm chương</a></li>
            <li><a class="dropdown-item" href="{{route('chuong.index')}}">Liệt kê chương</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user" style="margin-right: 10px" aria-hidden="true"></i>
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('user.index')}}">Quản lý users</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-commenting" aria-hidden="true"></i>
            Bình luận
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('binhluan.index')}}">Quản lý bình luận</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>