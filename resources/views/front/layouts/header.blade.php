<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <!--=====================================
              META-TAG PART START
  =======================================-->
  <!-- REQUIRE META -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- TEMPLATE META -->
  <meta name="name" content="Classicads">
  <meta name="type" content="Classified Advertising">
  <meta name="title" content="Classicads - Classified Ads HTML Template">
  <meta name="keywords"
        content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
  <!--=====================================
              META-TAG PART END
  =======================================-->

  <!-- FOR WEBPAGE TITLE -->
  <title>Home - Classidcads</title>

  <!--=====================================
              CSS LINK PART START
  =======================================-->
  <!-- FAVICON -->
  <link rel="icon" href="{{asset('front/images/favicon.png')}}">

  <!-- FONTS -->
  <link rel="stylesheet" href="{{asset('front/fonts/flaticon/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('front/fonts/font-awesome/fontawesome.css')}}">

  <!-- VENDOR -->
  <link rel="stylesheet" href="{{asset('front/css/vendor/slick.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/vendor/bootstrap.min.css')}}">

  <!-- CUSTOM -->
  <link rel="stylesheet" href="{{asset('front/css/custom/main.css')}}">
  @yield('css')
  <!--=====================================
              CSS LINK PART END
  =======================================-->
</head>
<body>
<!--=====================================
            HEADER PART START
=======================================-->
<header class="header-part">
  <div class="container">
    <div class="header-content">
      <div class="header-left">

        <a href="/" class="header-logo">
          <img src="{{asset('front/images/logo.png')}}" alt="logo">
        </a>
        @auth
          <a href="{{route('ads.index')}}" class="header-widget header-user">
            <img src="{{asset('front/images/user.png')}}" alt="user">
            <span>إعلاناتي</span>
          </a>
          @if(\Illuminate\Support\Facades\Auth::user()->rank == 'admin')
            <a href="{{route('dashboard')}}" class="header-widget header-user mr-3">
              <span>لوحة تحكم الأدمن</span>
            </a>
          @endif
        @endauth
        @guest
          <a href="{{route('login')}} " class="header-widget header-user">
            <img src="{{asset('front/images/user.png')}}" alt="user">
            <span>تسجيل الدخول او تسجيل حساب جديد</span>
          </a>
        @endguest
        <button type="button" class="header-widget search-btn">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <form class="header-form">
        <div class="header-search">
          <button type="submit" title="Search Submit "><i class="fas fa-search"></i></button>
          <input type="text" placeholder="أبحث عن اي شيء...">
          <button type="button" title="Search Option" class="option-btn"><i class="fas fa-sliders-h"></i></button>
        </div>
        <div class="header-option">
          <div class="option-grid">
            <div class="option-group"><input type="text" placeholder="City"></div>
            <div class="option-group"><input type="text" placeholder="State"></div>
            <div class="option-group"><input type="text" placeholder="Min Price"></div>
            <div class="option-group"><input type="text" placeholder="Max Price"></div>
            <button type="submit"><i class="fas fa-search"></i><span>Search</span></button>
          </div>
        </div>
      </form>

        <div class="header-right">
          @auth
          <ul class="header-list">
            <li class="header-item">
              <a href="front/bookmark.html" class="header-widget">
                <i class="fas fa-heart"></i>
                <sup>0</sup>
              </a>
            </li>
            <li class="header-item">
              <button type="button" class="header-widget">
                <i class="fas fa-envelope"></i>
                <sup>0</sup>
              </button>
              <div class="dropdown-card">
                <div class="dropdown-header">
                  <h5>message (2)</h5>
                  <a href="front/message.html">view all</a>
                </div>
                <ul class="message-list">
                  <li class="message-item unread">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img active">
                        <img src="{{asset('front/images/avatar/01.jpg')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>miron mahmud <span>now</span></h6>
                        <p>How are you my best frien...</p>
                      </div>
                      <span class="message-count">4</span>
                    </a>
                  </li>
                  <li class="message-item">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img active">
                        <img src="{{asset('front/images/avatar/03.jpg')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>shipu ahmed <span>3m</span></h6>
                        <p><span>me:</span>How are you my best frien...</p>
                      </div>
                    </a>
                  </li>
                  <li class="message-item unread">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img">
                        <img src="{{asset('front/images/avatar/02.jpg')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>tahmina bonny <span>2h</span></h6>
                        <p>How are you my best frien...</p>
                      </div>
                      <span class="message-count">12</span>
                    </a>
                  </li>
                  <li class="message-item">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img active">
                        <img src="{{asset('front/images/avatar/04.jpg')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>nasrullah <span>5d</span></h6>
                        <p>How are you my best frien...</p>
                      </div>
                    </a>
                  </li>
                  <li class="message-item">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img">
                        <img src="{{asset('front/images/user.png')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>saikul azam <span>7w</span></h6>
                        <p><span>me:</span>How are you my best frien...</p>
                      </div>
                    </a>
                  </li>
                  <li class="message-item">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img active">
                        <img src="{{asset('front/images/avatar/02.jpg')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>munni akter <span>9m</span></h6>
                        <p>How are you my best frien...</p>
                      </div>
                    </a>
                  </li>
                  <li class="message-item">
                    <a href="front/message.html" class="message-link">
                      <div class="message-img active">
                        <img src="{{asset('front/images/avatar/03.jpg')}}" alt="avatar">
                      </div>
                      <div class="message-text">
                        <h6>shahin alam <span>1y</span></h6>
                        <p>How are you my best frien...</p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="header-item">
              <button type="button" class="header-widget">
                <i class="fas fa-bell"></i>
                <sup>0</sup>
              </button>
              <div class="dropdown-card">
                <div class="dropdown-header">
                  <h5>Notification (1)</h5>
                  <a href="front/notification.html">view all</a>
                </div>
                <ul class="notify-list">
                  <li class="notify-item active">
                    <a href="front/#" class="notify-link">
                      <div class="notify-img">
                        <img src="{{asset('front/images/avatar/01.jpg')}}" alt="avatar">
                      </div>
                      <div class="notify-content">
                        <p class="notify-text"><span>miron mahmud</span> has added the advertisement post of your <span>booking</span>
                          to his wishlist.</p>
                        <span class="notify-time">just now</span>
                      </div>
                    </a>
                  </li>
                  <li class="notify-item">
                    <a href="front/#" class="notify-link">
                      <div class="notify-img">
                        <img src="{{asset('front/images/avatar/02.jpg')}}" alt="avatar">
                      </div>
                      <div class="notify-content">
                        <p class="notify-text"><span>tahmina bonny</span> gave you a <span>comment</span> and 5 star
                          <span>review.</span></p>
                        <span class="notify-time">2 hours ago</span>
                      </div>
                    </a>
                  </li>
                  <li class="notify-item">
                    <a href="front/#" class="notify-link">
                      <div class="notify-img">
                        <img src="{{asset('front/images/avatar/03.jpg')}}" alt="avatar">
                      </div>
                      <div class="notify-content">
                        <p class="notify-text"><span>shipu ahmed</span> and <span>4 other</span> have seen your contact
                          number</p>
                        <span class="notify-time">3 minutes ago</span>
                      </div>
                    </a>
                  </li>
                  <li class="notify-item">
                    <a href="front/#" class="notify-link">
                      <div class="notify-img">
                        <img src="{{asset('front/images/avatar/02.jpg')}}" alt="avatar">
                      </div>
                      <div class="notify-content">
                        <p class="notify-text"><span>miron mahmud</span> has added the advertisement post of your <span>booking</span>
                          to his wishlist.</p>
                        <span class="notify-time">5 days ago</span>
                      </div>
                    </a>
                  </li>
                  <li class="notify-item">
                    <a href="front/#" class="notify-link">
                      <div class="notify-img">
                        <img src="{{asset('front/images/avatar/04.jpg')}}" alt="avatar">
                      </div>
                      <div class="notify-content">
                        <p class="notify-text"><span>labonno khan</span> gave you a <span>comment</span> and 5 star <span>review.</span>
                        </p>
                        <span class="notify-time">4 months ago</span>
                      </div>
                    </a>
                  </li>
                  <li class="notify-item">
                    <a href="front/#" class="notify-link">
                      <div class="notify-img">
                        <img src="{{asset('front/images/avatar/01.jpg')}}" alt="avatar">
                      </div>
                      <div class="notify-content">
                        <p class="notify-text"><span>azam khan</span> and <span>4 other</span> have seen your contact
                          number</p>
                        <span class="notify-time">1 years ago</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          @endauth
          @auth @elseauth @endauth
          <a href=" @auth {{route('ads.create')}} @else {{route('login')}} @endauth" class="btn btn-inline post-btn">
            <span>انشر إعلانك</span>
            <i class="fas fa-plus-circle"></i>

          </a>
        </div>

    </div>
  </div>
</header>
<!--=====================================
            HEADER PART END
=======================================-->
