@extends('front.layouts.main')
@section('css')
  <link rel="stylesheet" href="{{asset('front/css/custom/dashboard.css')}}">
@endsection
@section('content')
  @include('front.layouts.dash-header')

  <!--=====================================
            MY ADS PART START
=======================================-->
  <section class="myads-part mt-5 mb-3">
    <div class="container">

      <div class="row">
        @foreach($ads as $ad)
          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="product-card">
              <a href="{{route('front.ads.show',['id' => $ad->id])}}">
                <div class="product-media">
                  <div class="product-img">
                    <img
                      src="@php if($ad->image_path) {echo asset($ad->image_path); }else { echo asset('front/images/product/01.jpg'); }@endphp"
                      alt="details">
                  </div>
                  <div class="cross-vertical-badge product-badge">
                    <i class="fas fa-clipboard-check"></i>
                    <span>recommend</span>
                  </div>

                  <ul class="product-action">
                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  </ul>
                </div>
              </a>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  <li class="breadcrumb-item"><a href="#">{{$ad->category->category->name}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$ad->category->name}}</li>
                </ol>
                <h5 class="product-title">
                  <a href="{{route('front.ads.show',['id' => $ad->id])}}">{{$ad->title}}</a>
                </h5>
                <div class="product-meta">
                  <span><i class="fas fa-map-marker-alt"></i>{{$ad->city->name}}, {{$ad->city->state->name}}</span>
                  <span><i class="fas fa-clock"></i>{{$ad->updated_at->diffForHumans()}}</span>
                </div>
                <div class="product-info">
                  <h5 class="product-price">{{number_format($ad->price)}}<span>جنيه مصري</span></h5>
                  <div class="product-btn">
                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                  </div>
                </div>
                <div class="col-12">
                  <script id="kashier-iFrame"
                          src="https://checkout.kashier.io/kashier-checkout.js"
                          data-amount="100"
                          data-description="Credit"
                          data-mode="test"
                          data-hash="cac1b1033b9aabeb0d19957b05b7c64283bf103e1f53c9df397cb3814ed21364"
                          data-currency="EGP"
                          data-orderId="6434300165c1b"
                          data-allowedMethods="card"
                          data-merchantId="MID-15295-910"
                          data-merchantRedirect="http://oxl.test/payments/verify/kashier"
                          data-store="Laravel"
                          data-type="external" data-display="ar">
                  </script>
                  <button type="button" class="btn btn-warning btn-block mb-1">ترقية الإعلان <span class="fa fa-star"></span></button>
                  <form onsubmit="return confirm('هل انت متأكد من حذف الإعلان؟');" method="post" action="{{route('ads.destroy',$ad->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block mb-2" >حذف الإعلان</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        @endforeach
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="footer-pagection">
            <p class="page-info">Showing {{count($ads->items())}} Results</p>
            <ul class="pagination">
              @if($ads->currentPage() > 2)
                <li class="page-item">
                  <a class="page-link" href="{{$ads->url(1)}}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                  </a>
                </li>
              @endif
              @if($ads->currentPage() == 1)
                <li class="page-item"><a class="page-link active" href="{{$ads->url(1)}}">1</a></li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{$ads->previousPageUrl()}}">{{$ads->currentPage() - 1}}</a>
                </li>
                <li class="page-item">
                  <a class="page-link active" href="{{$ads->url($ads->currentPage())}}">{{$ads->currentPage()}}</a>
                </li>
              @endif
              @if($ads->lastPage() - $ads->currentPage() > 1)
                <li class="page-item"><a class="page-link"
                                         href="{{$ads->nextPageUrl()}}">{{$ads->currentPage() + 1}}</a></li>
                <li class="page-item"><a class="page-link"
                                         href="{{$ads->url($ads->currentPage() + 2)}}">{{$ads->currentPage() + 2}}</a>
                </li>
              @elseif($ads->lastPage() == $ads->currentPage())
              @else
                <li class="page-item"><a class="page-link"
                                         href="{{$ads->nextPageUrl()}}">{{$ads->currentPage() + 1}}</a></li>
              @endif
              @if($ads->lastPage() - $ads->currentPage() > 2)
                <li class="page-item">
                  <a class="page-link" href="{{$ads->url($ads->lastPage())}}">
                    <i class="fas fa-long-arrow-alt-left"></i>
                  </a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!--=====================================
              MY ADS PART END
  =======================================-->

@endsection



