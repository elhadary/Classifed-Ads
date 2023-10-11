<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
  <div class="main-sidebar-header active">
    <a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img
        src="{{URL::asset('back/assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
    <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img
        src="{{URL::asset('back/assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
    <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img
        src="{{URL::asset('back/assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
    <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img
        src="{{URL::asset('back/assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
  </div>
  <div class="main-sidemenu">
    <div class="app-sidebar__user clearfix">
      <div class="dropdown user-pro-body">
        <div class="">
          <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('back/assets/img/faces/6.jpg')}}"><span
            class="avatar-status profile-status bg-green"></span>
        </div>
        <div class="user-info">
          <h4 class="font-weight-semibold mt-3 mb-0">Petey Cruiser</h4>
          <span class="mb-0 text-muted">Premium Member</span>
        </div>
      </div>
    </div>
    <ul class="side-menu">
      <li class="slide">
        <a class="side-menu__item" href="{{ route('dashboard') }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
            <path
              d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
          </svg>
          <span class="side-menu__label">الرئيسية</span></a>
      </li>
      <li class="side-item side-item-category">القوائم</li>
      <li class="slide">
        <a class="side-menu__item" href="{{ route('users.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path xmlns="http://www.w3.org/2000/svg" id="Vector"
                  d="M17 20C17 18.3431 14.7614 17 12 17C9.23858 17 7 18.3431 7 20M21 17.0004C21 15.7702 19.7659 14.7129 18 14.25M3 17.0004C3 15.7702 4.2341 14.7129 6 14.25M18 10.2361C18.6137 9.68679 19 8.8885 19 8C19 6.34315 17.6569 5 16 5C15.2316 5 14.5308 5.28885 14 5.76389M6 10.2361C5.38625 9.68679 5 8.8885 5 8C5 6.34315 6.34315 5 8 5C8.76835 5 9.46924 5.28885 10 5.76389M12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11C15 12.6569 13.6569 14 12 14Z"
                  stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="side-menu__label">المستخدمين</span></a>

      <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/>
            <path
              d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/>
          </svg>
          <span class="side-menu__label">الإعلانات</span><i class="angle fe fe-chevron-down"></i></a>
        <ul class="slide-menu">
          <li><a class="slide-item" href="{{ route('advertisements.index') }}">جميع الإعلانات</a></li>
          <li><a class="slide-item" href="{{ route('advertisements.active') }}">  الإعلانات الموافق عليها والنشطة</a></li>
          <li><a class="slide-item" href="{{ route('advertisements.underReview') }}">إعلانات تحت المراجعة</a></li>
          <li><a class="slide-item" href="{{ route('advertisements.inactive') }}">الإعلانات المنتهية</a></li>
        </ul>
      </li>

    </ul>
  </div>
</aside>
<!-- main-sidebar -->
