<section class="single-banner dashboard-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="single-content">
          <h2>نشر إعلان جديد</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="dash-header-part">
  <div class="container">
    <div class="dash-header-card">
      <div class="row">
        <div class="col-lg-5">
          <div class="dash-header-left">
            <div class="dash-avatar">
              <a href="#"><img src="{{asset('front/images/avatar/01.jpg')}}" alt="avatar"></a>
            </div>
            <div class="dash-intro">
              <h4><a href="#">{{$user->name}}</a></h4>
              <ul class="dash-meta">
                <li>
                  <i class="fas fa-phone-alt"></i>
                  <span>{{$user->phone}}</span>
                </li>
                <li>
                  <i class="fas fa-envelope"></i>
                  <span>{{$user->email}}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="dash-header-right">
            <div class="dash-focus dash-list">
              <h2>{{$count}}</h2>
              <p>إعلان منشور</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

      </div>
      <div class="row"  id="top">
        <div class="col-lg-12">
          <div class="dash-menu-list">
            <ul>

              <li><a @isset($active) @if($active == 'ads.create')  class="active" @endif @endisset href="{{route('ads.create')}}">نشر إعلان جديد</a></li>
              <li><a  @isset($active) @if($active == 'ads.index')  class="active" @endif @endisset href={{route('ads.index')}}>إعلاناتي</a></li>
              <li><a href="setting.html">الإعدادات</a></li>
              <li><a href="bookmark.html">الإعلانات المحفوظة</a></li>
              <li><a href="message.html">الرسائل</a></li>
              <li><a href="notification.html">الإشعارات</a></li>
              <li><a href="{{route('logout')}}">تسجيل الخروج</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
