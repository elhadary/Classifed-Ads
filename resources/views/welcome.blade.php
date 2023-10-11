@extends('front.layouts.main')
@section('css')
  <link rel="stylesheet" href="{{asset('front/css/custom/index.css')}}">
@endsection
@section('content')

  <!--=====================================
            BANNER PART START
=======================================-->
  <section class="banner-part">
    <div class="container">
      <div class="banner-content">
        <h1>يمكنك #شراء #تأجير #بيع اي شيء من هنا.</h1>
        <a href="{{route('front.ads.index')}}" class="btn btn-outline">
          <i class="fas fa-eye"></i>
          <span>تصفح جميع الإعلانات</span>
        </a>
      </div>
    </div>
  </section>
  <!--=====================================
              BANNER PART END
  =======================================-->


  <!--=====================================
              SUGGEST PART START
  =======================================-->
  <section class="suggest-part">
    <div class="container">
      <div class="suggest-slider slider-arrow">
        @foreach($categories as $category)
          <a href="{{route('mainCategoryAds',$category->id)}}" class="suggest-card">
            <img src="front/images/suggest/automobile.png" alt="car">
            <h6>{{$category->name}}</h6>

            <p>({{$category->ads_count}}) ads</p>
          </a>
        @endforeach
      </div>
    </div>
  </section>
  <!--=====================================
              SUGGEST PART END
  =======================================-->


  <!--=====================================
              RECOMEND PART START
  =======================================-->
  <section class="section recomend-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>Our Recommend <span>Ads</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum
              repudiandae veniam maxime tenetur.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="recomend-slider slider-arrow">
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="front/images/product/01.jpg" alt="product">
                </div>
                <div class="cross-vertical-badge product-badge">
                  <i class="fas fa-clipboard-check"></i>
                  <span>recommend</span>
                </div>
                <div class="product-type">
                  <span class="flat-badge booking">booking</span>
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
                  <li class="breadcrumb-item"><a href="front/#">Luxury</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                </ol>
                <h5 class="product-title">
                  <a href="front/ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$1500<span>/Per Day</span></h5>
                  <div class="product-btn">
                    <a href="front/compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="front/images/product/03.jpg" alt="product">
                </div>
                <div class="cross-vertical-badge product-badge">
                  <i class="fas fa-clipboard-check"></i>
                  <span>recommend</span>
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
                  <li class="breadcrumb-item"><a href="front/#">stationary</a></li>
                  <li class="breadcrumb-item active" aria-current="page">books</li>
                </ol>
                <h5 class="product-title">
                  <a href="front/ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$470<span>/fixed</span></h5>
                  <div class="product-btn">
                    <a href="front/compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="front/images/product/10.jpg" alt="product">
                </div>
                <div class="cross-vertical-badge product-badge">
                  <i class="fas fa-clipboard-check"></i>
                  <span>recommend</span>
                </div>
                <div class="product-type">
                  <span class="flat-badge rent">rent</span>
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
                  <li class="breadcrumb-item"><a href="front/#">automobile</a></li>
                  <li class="breadcrumb-item active" aria-current="page">private car</li>
                </ol>
                <h5 class="product-title">
                  <a href="front/ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$3300<span>/per month</span></h5>
                  <div class="product-btn">
                    <a href="front/compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="front/images/product/09.jpg" alt="product">
                </div>
                <div class="cross-vertical-badge product-badge">
                  <i class="fas fa-clipboard-check"></i>
                  <span>recommend</span>
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
                  <li class="breadcrumb-item"><a href="front/#">animals</a></li>
                  <li class="breadcrumb-item active" aria-current="page">cat</li>
                </ol>
                <h5 class="product-title">
                  <a href="front/ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$900<span>/Negotiable</span></h5>
                  <div class="product-btn">
                    <a href="front/compare.html" title="Compare" class="fas fa-compress"></a>
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-card">
              <div class="product-media">
                <div class="product-img">
                  <img src="front/images/product/02.jpg" alt="product">
                </div>
                <div class="cross-vertical-badge product-badge">
                  <i class="fas fa-clipboard-check"></i>
                  <span>recommend</span>
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
                  <li class="breadcrumb-item"><a href="front/#">fashion</a></li>
                  <li class="breadcrumb-item active" aria-current="page">shoes</li>
                </ol>
                <h5 class="product-title">
                  <a href="front/ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                  <span><i class="fas fa-clock"></i>30 min ago</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">$384<span>/fixed</span></h5>
                  <div class="product-btn">
                    <a href="front/compare.html" title="Compare" class="fas fa-compress"></a>
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
            <a href="front/ad-list-column3.html" class="btn btn-inline">
              <i class="fas fa-eye"></i>
              <span>view all recommend</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
              RECOMEND PART START
  =======================================-->




  <!--=====================================
              CITY PART START
  =======================================-->
  <section class="section city-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>المدن التي تحتوي علي اكثر <span>الإعلانات</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($cities as $city)

          <div class="col-sm-6 col-md-6 col-lg-3">
            <a href="{{route('cityAds',$city->id)}}" class="city-card"
               style="background: url(front/images/cities/02.jpg) no-repeat center; background-size: cover">
              <div class="city-content">
                <h4>{{$city->name}}</h4>
                <p>({{$city->ads_count}}) إعلان </p>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="center-20">
            <a href="front/cities.html" class="btn btn-inline">
              <i class="fas fa-eye"></i>
              <span> جميع المدن</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
              CITY PART END
  =======================================-->


  <!--=====================================
              CATEGORY PART START
  =======================================-->
  <section class="section category-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>الفئات التي تحتوى على اكثر <span>الإعلانات</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($categories as $category)
          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="category-card">
              <div class="category-head">
                <img src="front/images/category/electronics.jpg" alt="category">
                <a href="{{route('mainCategoryAds',$category->id)}}" class="category-content">
                  <h4>{{$category->name}}</h4>
                  <p>({{$category->ads_count}})</p>
                </a>
              </div>
              <ul class="category-list">
                @foreach($category->subCategories as $sub)
                  <li><a href="{{route('subCategoryAds',$sub->id)}}"><h6>{{$sub->name}}</h6><p>({{$sub->ads_count}})</p></a></li>
                @endforeach
              </ul>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="center-20">
            <a href="front/category-list.html" class="btn btn-inline">
              <i class="fas fa-eye"></i>
              <span>جميع الفئات</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
              CATEGORY PART END
  =======================================-->


  <!--=====================================
              INTRO PART START
  =======================================-->
  <section class="intro-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>هل لديك شىء تريد الإعلان عنه ؟</h2>
            <a href="{{route('ads.create')}}" class="btn btn-outline">
              <i class="fas fa-plus-circle"></i>
              <span>انشر إعلانك الآن</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
              INTRO PART END
  =======================================-->


  <!--=====================================
               PRICE PART START
  =======================================-->
  <section class="price-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>Best Reliable Pricing Plans</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum
              repudiandae veniam maxime tenetur.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="price-card">
            <div class="price-head">
              <i class="flaticon-bicycle"></i>
              <h3>$00</h3>
              <h4>Free Plan</h4>
            </div>
            <ul class="price-list">
              <li>
                <i class="fas fa-plus"></i>
                <p>1 Regular Ad for 7 days</p>
              </li>
              <li>
                <i class="fas fa-times"></i>
                <p>No Credit card required</p>
              </li>
              <li>
                <i class="fas fa-times"></i>
                <p>No Top or Featured Ad</p>
              </li>
              <li>
                <i class="fas fa-times"></i>
                <p>No Ad will be bumped up</p>
              </li>
              <li>
                <i class="fas fa-plus"></i>
                <p>Limited Support</p>
              </li>
            </ul>
            <div class="price-btn">
              <a href="front/user-form.html" class="btn btn-inline">
                <i class="fas fa-sign-in-alt"></i>
                <span>Register Now</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="price-card price-active">
            <div class="price-head">
              <i class="flaticon-car-wash"></i>
              <h3>$23</h3>
              <h4>Standard Plan</h4>
            </div>
            <ul class="price-list">
              <li>
                <i class="fas fa-plus"></i>
                <p>1 Recom Ad for 30 days</p>
              </li>
              <li>
                <i class="fas fa-times"></i>
                <p>No Featured Ad Available</p>
              </li>
              <li>
                <i class="fas fa-times"></i>
                <p>No Ad will be bumped up</p>
              </li>
              <li>
                <i class="fas fa-times"></i>
                <p>No Top Ad Available</p>
              </li>
              <li>
                <i class="fas fa-plus"></i>
                <p>Basic Support</p>
              </li>
            </ul>
            <div class="price-btn">
              <a href="front/user-form.html" class="btn btn-inline">
                <i class="fas fa-sign-in-alt"></i>
                <span>Register Now</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="price-card">
            <div class="price-head">
              <i class="flaticon-airplane"></i>
              <h3>$49</h3>
              <h4>Premium Plan</h4>
            </div>
            <ul class="price-list">
              <li>
                <i class="fas fa-plus"></i>
                <p>1 Featured Ad for 60 days</p>
              </li>
              <li>
                <i class="fas fa-plus"></i>
                <p>Access to All features</p>
              </li>
              <li>
                <i class="fas fa-plus"></i>
                <p>With Recommended</p>
              </li>
              <li>
                <i class="fas fa-plus"></i>
                <p>Ad Top Category</p>
              </li>
              <li>
                <i class="fas fa-plus"></i>
                <p>Priority Support</p>
              </li>
            </ul>
            <div class="price-btn">
              <a href="front/user-form.html" class="btn btn-inline">
                <i class="fas fa-sign-in-alt"></i>
                <span>Register Now</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
               PRICE PART END
  =======================================-->


  <!--=====================================
               BLOG PART START
  =======================================-->
  <section class="blog-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h2>Read Our <span>Recent Articles</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum
              repudiandae veniam maxime tenetur.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-slider slider-arrow">
            <div class="blog-card">
              <div class="blog-img">
                <img src="front/images/blog/01.jpg" alt="blog">
                <div class="blog-overlay">
                  <span class="marketing">Marketing</span>
                </div>
              </div>
              <div class="blog-content">
                <a href="front/#" class="blog-avatar">
                  <img src="front/images/avatar/01.jpg" alt="avatar">
                </a>
                <ul class="blog-meta">
                  <li>
                    <i class="fas fa-user"></i>
                    <p><a href="front/#">MironMahmud</a></p>
                  </li>
                  <li>
                    <i class="fas fa-clock"></i>
                    <p>02 Feb 2021</p>
                  </li>
                </ul>
                <div class="blog-text">
                  <h4><a href="front/blog-details.html">Lorem ipsum dolor sit amet eius minus elit cum quaerat
                      volupt.</a></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum
                    perspiciatis...</p>
                </div>
                <a href="front/blog-details.html" class="blog-read">
                  <span>read more</span>
                  <i class="fas fa-long-arrow-alt-left"></i>
                </a>
              </div>
            </div>
            <div class="blog-card">
              <div class="blog-img">
                <img src="front/images/blog/02.jpg" alt="blog">
                <div class="blog-overlay">
                  <span class="advertise">advertise</span>
                </div>
              </div>
              <div class="blog-content">
                <a href="front/#" class="blog-avatar">
                  <img src="front/images/avatar/02.jpg" alt="avatar">
                </a>
                <ul class="blog-meta">
                  <li>
                    <i class="fas fa-user"></i>
                    <p><a href="front/#">LabonnoKhan</a></p>
                  </li>
                  <li>
                    <i class="fas fa-clock"></i>
                    <p>02 Feb 2021</p>
                  </li>
                </ul>
                <div class="blog-text">
                  <h4><a href="front/blog-details.html">Lorem ipsum dolor sit amet eius minus elit cum quaerat
                      volupt.</a></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum
                    perspiciatis...</p>
                </div>
                <a href="front/blog-details.html" class="blog-read">
                  <span>read more</span>
                  <i class="fas fa-long-arrow-alt-left"></i>
                </a>
              </div>
            </div>
            <div class="blog-card">
              <div class="blog-img">
                <img src="front/images/blog/03.jpg" alt="blog">
                <div class="blog-overlay">
                  <span class="safety">safety</span>
                </div>
              </div>
              <div class="blog-content">
                <a href="front/#" class="blog-avatar">
                  <img src="front/images/avatar/03.jpg" alt="avatar">
                </a>
                <ul class="blog-meta">
                  <li>
                    <i class="fas fa-user"></i>
                    <p><a href="front/#">MironMahmud</a></p>
                  </li>
                  <li>
                    <i class="fas fa-clock"></i>
                    <p>02 Feb 2021</p>
                  </li>
                </ul>
                <div class="blog-text">
                  <h4><a href="front/blog-details.html">Lorem ipsum dolor sit amet eius minus elit cum quaerat
                      volupt.</a></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum
                    perspiciatis...</p>
                </div>
                <a href="front/blog-details.html" class="blog-read">
                  <span>read more</span>
                  <i class="fas fa-long-arrow-alt-left"></i>
                </a>
              </div>
            </div>
            <div class="blog-card">
              <div class="blog-img">
                <img src="front/images/blog/04.jpg" alt="blog">
                <div class="blog-overlay">
                  <span class="security">security</span>
                </div>
              </div>
              <div class="blog-content">
                <a href="front/#" class="blog-avatar">
                  <img src="front/images/avatar/04.jpg" alt="avatar">
                </a>
                <ul class="blog-meta">
                  <li>
                    <i class="fas fa-user"></i>
                    <p><a href="front/#">TahminaBonny</a></p>
                  </li>
                  <li>
                    <i class="fas fa-clock"></i>
                    <p>02 Feb 2021</p>
                  </li>
                </ul>
                <div class="blog-text">
                  <h4><a href="front/blog-details.html">Lorem ipsum dolor sit amet eius minus elit cum quaerat
                      volupt.</a></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum
                    perspiciatis...</p>
                </div>
                <a href="front/blog-details.html" class="blog-read">
                  <span>read more</span>
                  <i class="fas fa-long-arrow-alt-left"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-btn">
            <a href="front/blog-list.html" class="btn btn-inline">
              <i class="fas fa-eye"></i>
              <span>view all blogs</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
               BLOG PART END
  =======================================-->

@endsection




