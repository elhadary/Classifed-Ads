@extends('back.layouts.master')
@section('css')
  <!--  Owl-carousel css-->
  <link href="{{URL::asset('back/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
  <!-- Maps css -->
  <link href="{{URL::asset('back/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبًا بك !</h2>
      </div>
    </div>
  </div>
  <!-- /breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-primary-gradient">
        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">عدد جميع الإعلانات</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$allAds}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-success-gradient">
        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">عدد الإعلانات النشطة</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$activeAds}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-danger-gradient">
        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">عدد الإعلانات بإنتظار الموافقة</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$pendingAds}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-warning-gradient">
        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">عدد الإعلانات المنتهية</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$inactiveAds}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- row closed -->

  <!-- row opened
  <div class="row row-sm">
    <div class="col-md-12 col-lg-12 col-xl-7">
      <div class="card">
        <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0">Order status</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
          <p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival. To begin, enter your order number.</p>
        </div>
        <div class="card-body">
          <div class="total-revenue">
            <div>
              <h4>120,750</h4>
              <label><span class="bg-primary"></span>success</label>
            </div>
            <div>
              <h4>56,108</h4>
              <label><span class="bg-danger"></span>Pending</label>
            </div>
            <div>
              <h4>32,895</h4>
              <label><span class="bg-warning"></span>Failed</label>
            </div>
          </div>
          <div id="bar" class="sales-bar mt-4"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-xl-5">
      <div class="card card-dashboard-map-one">
        <label class="main-content-label">Sales Revenue by Customers in USA</label>
        <span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>
        <div class="">
          <div class="vmap-wrapper ht-180" id="vmap2"></div>
        </div>
      </div>
    </div>
  </div>
   row closed -->

  </div>
  </div>
  <!-- Container closed -->
@endsection
@section('js')
  <!--Internal  Chart.bundle js -->
  <script src="{{URL::asset('back/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
  <!-- Moment js -->
  <script src="{{URL::asset('back/assets/plugins/raphael/raphael.min.js')}}"></script>
  <!--Internal  Flot js-->
  <script src="{{URL::asset('back/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
  <script src="{{URL::asset('back/assets/js/dashboard.sampledata.js')}}"></script>
  <script src="{{URL::asset('back/assets/js/chart.flot.sampledata.js')}}"></script>
  <!--Internal Apexchart js-->
  <script src="{{URL::asset('back/assets/js/apexcharts.js')}}"></script>
  <!-- Internal Map -->
  <script src="{{URL::asset('back/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <script src="{{URL::asset('back/assets/js/modal-popup.js')}}"></script>
  <!--Internal  index js -->
  <script src="{{URL::asset('back/assets/js/index.js')}}"></script>
  <script src="{{URL::asset('back/assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
