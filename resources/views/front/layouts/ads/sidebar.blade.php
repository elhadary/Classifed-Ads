@php
  $cities = \App\Models\City::query()->select('id','name')->withCount('ads')->get();
  $states = \App\Models\State::query()->select('id','name')->withCount('ads')->get();
  $categories = \App\Models\Category::query()->select('id','name')->withCount('ads')->get();
  $sub_categories = \App\Models\SubCategory::query()->select('id','name')->withCount('ads')->get();
@endphp


<div class="col-lg-4 col-xl-3">
  <div class="row">
    <div class="col-md-6 col-lg-12">
      <div class="product-widget">
        <h6 class="product-widget-title">إختيار مدينة</h6>

        <ul class="product-widget-list ">
          @foreach($cities as $city)
            <li class="product-widget-item">
              <label class="product-widget-label" for="chcek10">
                <a class="header-widget header-user" href="{{route('cityAds',$city->id)}}">
                  <span class="product-widget-text">{{$city->name}}</span>
                  <span class="product-widget-number">({{$city->ads_count}})</span>
                </a>
              </label>
            </li>
        @endforeach
      </div>
    </div>
    <div class="col-md-6 col-lg-12">
      <div class="product-widget">
        <h6 class="product-widget-title">إختيار محافظة</h6>

        <ul class="product-widget-list ">
          @foreach($states as $state)
            <li class="product-widget-item">
              <label class="product-widget-label" for="chcek10">
                <a class="header-widget header-user" href="{{route('stateAds',$state->id)}}">
                  <span class="product-widget-text">{{$state->name}}</span>
                  <span class="product-widget-number">{{$state->ads_count}}</span>
                </a>
              </label>
            </li>
        @endforeach
      </div>
    </div>
    <div class="col-md-6 col-lg-12">
      <div class="product-widget">
        <h6 class="product-widget-title">إختيار فئة</h6>

        <ul class="product-widget-list ">
          @foreach($categories as $category)
            <li class="product-widget-item">
              <label class="product-widget-label" for="chcek10">
                <a class="header-widget header-user" href="{{route('mainCategoryAds',$category->id)}}">
                  <span class="product-widget-text">{{$category->name}}</span>
                  <span class="product-widget-number">({{$category->ads_count}})</span>
                </a>
              </label>
            </li>
        @endforeach
      </div>
    </div>
    <div class="col-md-6 col-lg-12">
      <div class="product-widget">
        <h6 class="product-widget-title">إختيار صنف</h6>

        <ul class="product-widget-list ">
          @foreach($sub_categories as $sub)
            <li class="product-widget-item">
              <label class="product-widget-label" for="chcek10">
                <a class="header-widget header-user" href="{{route('subCategoryAds',$sub->id)}}">
                  <span class="product-widget-text">{{$sub->name}}</span>
                  <span class="product-widget-number">({{$sub->ads_count}})</span>
              </label>
              </a>
            </li>
        @endforeach
      </div>
    </div>
  </div>
</div>
