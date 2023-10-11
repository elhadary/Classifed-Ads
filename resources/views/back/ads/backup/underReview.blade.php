@extends('back.layouts.master')
@section('title')
  قائمة الإعلانات
@endsection
@section('meta')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
  <!-- Internal Data table css -->
  <link href="{{URL::asset('back/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
  <link href="{{URL::asset('back/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('back/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
  <link href="{{URL::asset('back/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('back/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('back/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
  <link href="{{URL::asset('back/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
  <link href="{{URL::asset('back/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection


@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">جميع الإعلانات</h2>
      </div>
    </div>
  </div>
  <!-- /breadcrumb -->
@endsection
@section('content')
  <div class="row row-sm">
    <!--div-->

    <div class="col-xl-12">
      <div class="card mg-b-20">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">جميع الإعلانات</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
        </div>
        <div class="alert alert-success text-center mt-3" id="successDiv" style="display:none"></div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="yajra" class="table key-buttons text-md-nowrap hover order-column cell-border	 stripe	">
              <thead>
              <tr>
                <th class="border-bottom-0 wd-2">#</th>
                <th class="border-bottom-0">العنوان</th>
                <th class="border-bottom-0">المدينة</th>
                <th class="border-bottom-0">الفئة الفرعية</th>
                <th class="border-bottom-0">السعر</th>
                <th class="border-bottom-0 wd-2">العمليات</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--/div-->
  </div>

  <!-- row closed -->
  </div>
  <!-- Container closed -->
  </div>

  <div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">تحديث بيانات الإعلان</h6>
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="alert alert-success text-center mt-3" id="successModalDiv" style="display:none;"></div>

        <div class="modal-body">
          <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" class="form-control" id="title" placeholder="" required>
            <span class="text-danger error-text title_error"></span>
          </div>
          <div class="form-group">
            <label for="state_id">المحافظة</label>
            <select id='state_id' class="form-control">
              @foreach($states as $state)
                <option value='{{$state->id}}'>{{$state->name}}</option>
              @endforeach
            </select>
            <span class="text-danger error-text state_id_error"></span>
          </div>
          <div class="form-group">
            <label for="city_id">المدينة</label>
            <select id='city_id' class="form-control">
              {{--              @foreach($enum as $key => $value)--}}
              {{--                <option value='{{$value}}'>{{$key}}</option>--}}
              {{--              @endforeach--}}
            </select>
            <span class="text-danger error-text city_id_error"></span>
          </div>
          <div class="form-group">
            <label for="main_category_id">الفئة الرئيسية</label>
            <select id='main_category_id' class="form-control">
              @foreach($categories as $category)
                <option value='{{$category->id}}'>{{$category->name}}</option>
              @endforeach
            </select>
            <span class="text-danger error-text main_category_id_error"></span>
          </div>
          <div class="form-group">
            <label for="sub_category_id">الفئة الفرعية</label>
            <select id='sub_category_id' class="form-control">
              {{--              @foreach($enum as $key => $value)--}}
              {{--                <option value='{{$value}}'>{{$key}}</option>--}}
              {{--              @endforeach--}}
            </select>
            <span class="text-danger error-text sub_category_id_error"></span>
          </div>
          <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" class="form-control" id="price" placeholder="" required>
            <span class="text-danger error-text price_error"></span>
          </div>
          <div class="form-group">
            <label for="description">التفاصيل</label>
            <textarea class="form-control" id="description" placeholder="" required>
            </textarea>
            <span class="text-danger error-text description_error"></span>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" id="ad_id" value="0">
          <button class="btn ripple btn-primary" id="btn_save" type="button">حفظ التغييرات</button>
          <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلفاء التعديل</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('ajax')
  <script type="text/javascript">
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    {{--    DATATABLE   --}}

    let table = $('#yajra').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
      },
      processing: true,
      serverSide: true,
      order: [[0, "desc"]],
      ajax: '{{route('advertisements.getUnderReviewAds')}}',
      columns: [{
        data: 'id',

      }, {
        data: 'title',
      }, {
        data: 'city.name',
        name: 'city.name'
      }, {
        data: 'category.name',
      }, {
        data: 'price'
      }, {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false,
      }
      ]
    });

    {{-- GETTING DATA OF A SPECIFIC AD--}}

    $('#yajra').on('click', '.editRecord', function () {
      let id = $(this).data('id');
      $('#ad_id').val(id);
      $.ajax({
        url: "{{ route('advertisements.getAd') }}",
        type: 'post',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'json',

        success: function (response) {

          if (response.success == 1) {
            $(document).find('span.error-text').text('');
            $('#title').val(response.title);
            $('#main_category_id').val(response.main_id);
            $.ajax({
              url: "{{ route('category.getSubCategories') }}",
              type: 'post',
              data: {_token: CSRF_TOKEN, id: $('#main_category_id').val()},
              dataType: 'json',
              success: function (response) {
                if (response.success == 1) {
                  $('#sub_category_id').empty();
                  $.each(response['subCategories'], function (index, sub) {
                    $('#sub_category_id').append('<option value="' + sub.id + '">' + sub.name + '</option>');
                  })

                } else {
                  alert("Invalid ID.");
                }
              }
            });
            $('#sub_category_id').val(response.sub_category_id);
            $('#state_id').val(response.state_id);
            $.ajax({
              url: "{{ route('state.getCities') }}",
              type: 'post',
              data: {_token: CSRF_TOKEN, id: $('#state_id').val()},
              dataType: 'json',
              success: function (response) {
                if (response.success == 1) {
                  $('#city_id').empty();
                  $.each(response['cities'], function (index, city) {
                    $('#city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
                  })

                } else {
                  alert("Invalid ID.");
                }
              }
            });
            $('#city_id').val(response.city);
            $('#price').val(response.price);
            $('#description').val(response.description);

          } else {
            alert("Invalid ID.");
          }
        }
      });
    });

    {{-- {{  PRESSING SAVE BUTTON  }} --}}

    $(document).on('click', '#btn_save', function () {
      let id = $('#ad_id').val();

      let title = $('#title').val().trim();
      let state = $('#state_id').val();
      let city = $('#city_id').val();
      let main = $('#main_category_id').val();
      let sub = $('#sub_category_id').val();
      let price = $('#price').val().trim();
      let description = $('#description').val().trim();

      $.ajax({
        url: '{{route('advertisements.update')}}',
        type: 'put',
        data: {
          _token: CSRF_TOKEN,
          id: id,
          title: title,
          state_id: state,
          city_id: city,
          main_category_id: main,
          sub_category_id: sub,
          price: price,
          description: description
        },
        dataType: 'json',
        beforeSend: function () {
          $('#successModalDiv').hide().text('').removeClass('alert-success').removeClass('alert-danger');
          $(document).find('span.error-text').text('');
        },
        success: function (response) {
          if (response['error'] === 0) {
            if (response['status'] === 1) {
              $('#successModalDiv').show().text('تم التعديل بنجاح').addClass('alert-success');
            } else {
              $('#successModalDiv').show().text('لا يوجد إعلان بهذا الرقم، يرجى إعادة تحميل الصفحة والمحاولة مجددًا').addClass('alert-danger');
            }
          } else {
            $('#successModalDiv').show().text('يرجى تصحيح الأخطاء').addClass('alert-danger');
            $.each(response.errors, function (prefix, val) {
              $('span.' + prefix + '_error').text(val);
              $('.invalid_' + prefix).addClass('is-invalid');
            });
          }

        },
        error: function (response) {
          alert('Error');
        }
      });
    });
    {{--   EDITING SUB_CATEGORIES AND CITIES OPTIONS ACCORDING TO SELECTED PARENT   --}}
    /// SUB_CATEGORY
    $(document).on('change', '#main_category_id', function () {
      let cat_id = $('#main_category_id').val();
      $.ajax({
        url: "{{ route('category.getSubCategories') }}",
        type: 'post',
        data: {_token: CSRF_TOKEN, id: cat_id},
        dataType: 'json',
        success: function (response) {
          if (response.success == 1) {
            $('#sub_category_id').empty().append('<option disabled selected value></option>').removeAttr('disabled');
            $.each(response['subCategories'], function (index, sub) {
              $('#sub_category_id').append('<option value="' + sub.id + '">' + sub.name + '</option>');
            })

          } else {
            alert("Invalid ID.");
          }
        }
      })
    });

    /// CITY
    $(document).on('change', '#state_id', function () {
      let state_id = $('#state_id').val();
      $.ajax({
        url: "{{ route('state.getCities') }}",
        type: 'post',
        data: {_token: CSRF_TOKEN, id: state_id},
        dataType: 'json',
        success: function (response) {
          if (response.success == 1) {
            $('#city_id').empty().append('<option disabled selected value></option>').removeAttr('disabled');
            $.each(response['cities'], function (index, city) {
              $('#city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
            })

          } else {
            alert("Invalid ID.");
          }
        }
      })
    });


    {{--    DELETING SPECIFIC RECORD   --}}

    $('#yajra').on('click', '.deleteRecord', (function () {
      let id = $(this).data('id');
      let deleteConfirm = confirm("هل انت متأكد من حذف الإعلان ؟");
      if (deleteConfirm === true) {
        $.ajax({
          url: '{{route('advertisements.destroy')}}',
          type: 'delete',
          data: {_token: CSRF_TOKEN, id: id},
          beforeSend: function () {
            $('#successDiv').hide().text('').removeClass('alert-danger').addClass('alert-success');
          },
          success: function () {
            table.ajax.reload();
            $('#successDiv').show().text('تم حذف الإعلان بنجاح')
          },
          error: function () {
            $('#successDiv').show().text('حدث خطأ ما').removeClass('alert-success').addClass('alert-danger');
          }
        })
      }
    }));


  </script>

@endsection

@section('js')
  <!--Internal  Chart.bundle js -->
  <script src="{{URL::asset('back/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/jszip.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <!--Internal  Datatable js -->
  <script src="{{URL::asset('back/assets/js/table-data.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
  <script src="{{URL::asset('back/assets/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{URL::asset('back/assets/js/modal.js')}}"></script>
@endsection
