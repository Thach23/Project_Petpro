@if($login)
<ul class="navbar-nav mx-auto">
    <li class="nav-item dropdown megamenu">
        <a href="#" class="nav-link dropdown-toggle-mob" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="px-3">Hi {{$name}}</span>
            <svg width="24px" height="24px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#030708" />
                <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#030708" />
            </svg>
        </a>
        <div class="menu-back-div dropdown-menu megamenu-content" role="menu" aria-labelledby="dropdown04">
            <div class="megamenu-content-wrap">
                <ul class="list-unstyled">
                    <li><a style="color:black!important;" class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                    <li><a style="color:black!important;" class="dropdown-item" href="{{route('dangxuat')}}">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </li>
</ul>
@else
<a href="{{route('dangnhap')}}" class="btn bg-orange btn-shadow">Đăng nhập</a>
@endif