@extends('front.layouts.main')
@section('css')
  <link rel="stylesheet" href="{{asset('front/css/custom/ad-details.css')}}">
@endsection
@section('content')


  <!--=====================================
              AD DETAILS PART START
  =======================================-->

  <section class="inner-section ad-details-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 m-auto">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <!-- PRICE CARD -->
              <div class="common-card price">
                <h3>@php echo number_format($ad->price) @endphp
                  جنيه مصري
                  <span>@if($ad->is_negotiable) قابل للتفاوض @endif</span>
                </h3>
                <i class="fas fa-tag"></i>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <!-- NUMBER CARD -->
              <button type="button" class="common-card number" data-toggle="modal" data-target="#number">
                <h3>(+20)<span>Click to show</span></h3>
                <i class="fas fa-phone"></i>
              </button>
            </div>
          </div>

          <!-- AD DETAILS CARD -->
          <div class="common-card">
            <ol class="breadcrumb ad-details-breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{$ad->category->category->name}}</li>
              <li class="breadcrumb-item"><a href="#">{{$ad->category->name}}</a></li>
            </ol>
            <h5 class="ad-details-address">{{$ad->city->name}}, {{$ad->city->state->name}}</h5>
            <h3 class="ad-details-title">{{$ad->title}}</h3>

            <div class="ad-details-slider-group">
              <div class="ad-details-slider slider-arrow">
                <div>
                  <img src="@php if($ad->image_path) {echo asset($ad->image_path); }else { echo asset('front/images/product/01.jpg'); }@endphp" alt="details">
                </div>

              </div>
              <div class="cross-vertical-badge ad-details-badge">
                <i class="fas fa-clipboard-check"></i>
                <span>recommend</span>
              </div>
            </div>
            <div class="ad-details-action">
              <button type="button" class="wish">حفظ <i class="fas fa-heart"></i></button>
              <button type="button">إبلاغ عن مخالفة <i class="fas fa-exclamation-triangle"></i></button>
              <button type="button" data-toggle="modal" data-target="#ad-share">
                مشاركة
                <i class="fas fa-share-alt"></i>
              </button>
            </div>
          </div>


          <!-- DESCRIPTION CARD -->
          <div class="common-card">
            <div class="card-header">
              <h5 class="card-title">الوصف</h5>
            </div>
            <p class="ad-details-desc">{{$ad->description}}</p>
          </div>


          <!-- AUTHOR CARD -->
          <div class="common-card">
            <div class="card-header">
              <h5 class="card-title">بيانات البائع</h5>
            </div>
            <div class="ad-details-author">
              <a href="#" class="author-img active">
                <img src="{{asset('front/images/avatar/01.jpg')}}" alt="avatar">
              </a>
              <div class="author-meta">
                <h4><a href="#">{{$ad->user->name}}</a></h4>
                <h5>انضم: {{date('d-m-Y', strtotime($ad->user->created_at))}}</h5>
              </div>
              <div class="author-widget">
                <button type="button" title="Number" class="fas fa-phone" data-toggle="modal" data-target="#number"></button>
                <a href="profile.html" title="Profile" class="fas fa-eye"></a>
                <a href="message.html" title="Message" class="fas fa-envelope"></a>
              </div>
              <ul class="author-list">
                <li><h6>عدد الإعلانات</h6><p>{{count($ad->user->ads)}}</p></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-lg-12">
              <!-- SAFETY CARD -->
              <div class="common-card">
                <div class="card-header">
                  <h5 class="card-title">نصائح للسلامة</h5>
                </div>
                <div class="ad-details-safety">
                  <p>تحقق من المنتج قبل شرائه</p>
                  <p>ادفع عندما تستلم المنتج فقط</p>
                  <p>احذر العروض الغير واقعيه</p>
                  <p>قابل البائع في مكان آمن</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--=====================================
              AD DETAILS PART END
  =======================================-->


  <!--=====================================
              RELATED PART START
  =======================================-->
  <section class="inner-section related-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>Related This <span>Ads</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="related-slider slider-arrow">
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="{{asset('front/images/product/01.jpg')}}" alt="product">
                </div>
                <div class="product-type">
                  <span class="flat-badge sale">sale</span>
                </div>
                <ul class="product-action">
                  <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                  <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                </ul>
              </div>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                </ol>
                <h5 class="product-title">
                  <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$1500<span>/negotiable</span></h5>
                  <div class="product-btn">
                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="{{asset('front/images/product/03.jpg')}}" alt="product">
                </div>
                <div class="product-type">
                  <span class="flat-badge sale">sale</span>
                </div>
                <ul class="product-action">
                  <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                  <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                </ul>
              </div>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  <li class="breadcrumb-item"><a href="#">stationary</a></li>
                  <li class="breadcrumb-item active" aria-current="page">books</li>
                </ol>
                <h5 class="product-title">
                  <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$470<span>/fixed</span></h5>
                  <div class="product-btn">
                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="{{asset('front/images/product/10.jpg')}}" alt="product">
                </div>
                <div class="product-type">
                  <span class="flat-badge sale">sale</span>
                </div>
                <ul class="product-action">
                  <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                  <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                </ul>
              </div>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  <li class="breadcrumb-item"><a href="#">automobile</a></li>
                  <li class="breadcrumb-item active" aria-current="page">private car</li>
                </ol>
                <h5 class="product-title">
                  <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$3300<span>/fixed</span></h5>
                  <div class="product-btn">
                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="{{asset('front/images/product/09.jpg')}}" alt="product">
                </div>
                <div class="product-type">
                  <span class="flat-badge sale">sale</span>
                </div>
                <ul class="product-action">
                  <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                  <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                </ul>
              </div>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  <li class="breadcrumb-item"><a href="#">animals</a></li>
                  <li class="breadcrumb-item active" aria-current="page">cat</li>
                </ol>
                <h5 class="product-title">
                  <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$900<span>/Negotiable</span></h5>
                  <div class="product-btn">
                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="{{asset('front/images/product/02.jpg')}}" alt="product">
                </div>
                <div class="product-type">
                  <span class="flat-badge sale">sale</span>
                </div>
                <ul class="product-action">
                  <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                  <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                </ul>
              </div>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  <li class="breadcrumb-item"><a href="#">fashion</a></li>
                  <li class="breadcrumb-item active" aria-current="page">shoes</li>
                </ol>
                <h5 class="product-title">
                  <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$384<span>/fixed</span></h5>
                  <div class="product-btn">
                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="center-50">
            <a href="ad-column3.html" class="btn btn-inline">
              <i class="fas fa-eye"></i>
              <span>view all related</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
              RELATED PART START
  =======================================-->

@endsection

@section('modal')


  <div class="modal fade" id="number">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Contact this Number</h4>
          <button class="fas fa-times" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <h3 class="modal-number" dir="ltr">{{$ad->user->phone}}</h3>
        </div>
      </div>
    </div>
  </div>

@endsection



