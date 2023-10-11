@extends('front.layouts.main')



@section('content')

  <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
  <section class="inner-section single-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="single-content">
            <h2>جميع الإعلانات</h2>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=====================================
            SINGLE BANNER PART END
  =======================================-->


  <!--=====================================
              AD LIST PART START
  =======================================-->
  <section class="inner-section ad-list-part">
    <div class="container">
      <div class="row content-reverse">
        @include('front.layouts.ads.sidebar')
        <div class="col-lg-8 col-xl-9">
          <div class="row">
            @foreach($ads->items() as $ad)
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">

                <div class="product-card">
                  <a href="{{route('front.ads.show',['id' => $ad->id])}}">
                    <div class="product-media">
                      <div class="product-img">
                        <img src="@php if($ad->image_path) {echo asset($ad->image_path); }else { echo asset('front/images/product/01.jpg'); }@endphp" alt="details">
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
                      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('mainCategoryAds',['id' => $ad->category->category->id])}}">{{$ad->category->category->name}}</a></li>

                      <li class="breadcrumb-item"><a href="{{route('subCategoryAds',['id' => $ad->category->id])}}">{{$ad->category->name}}</a></li>
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
                                             href="{{$ads->url($ads->currentPage() + 2)}}">{{$ads->currentPage() + 2}}</a></li>
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
      </div>
    </div>
  </section>
  <!--=====================================
              AD LIST PART END
  =======================================-->

@endsection




