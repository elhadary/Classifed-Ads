@extends('back.layouts.master')
@section('title')
  قائمة الفواتير
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
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">المستخدمين</h4>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row row-sm">
    <!--div-->

    <div class="col-xl-12">
      <div class="card mg-b-20">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">جميع المستخدمين</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="yajra" class="table key-buttons text-md-nowrap hover order-column cell-border	 stripe	">
              <thead>
              <tr>
                <th class="border-bottom-0" width="5%">#</th>
                <th class="border-bottom-0">الاسم</th>
                <th class="border-bottom-0">البريد الإلكتروني</th>
                <th class="border-bottom-0">رقم الهاتف</th>
                <th class="border-bottom-0">الرتبة</th>
                <th class="border-bottom-0" width="4%">العمليات</th>
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
          <h6 class="modal-title">تحديث بيانات مستخدم</h6>
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">اسم المستخدم</label>
            <input type="text" class="form-control" id="name" placeholder="" required>
            <span class="text-danger error-text name_error"></span>
          </div>
          <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" placeholder="">
            <span class="text-danger error-text email_error"></span>
          </div>
          <div class="form-group">
            <label for="phone">الهاتف</label>
            <input type="text" class="form-control" id="phone" placeholder="">
            <span class="text-danger error-text phone_error"></span>
          </div>
          <div class="form-group">
            <label for="rank">الرتبة</label>
            <select id='rank' class="form-control">
              @foreach($enum as $key => $value)
                <option value='{{$value}}'>{{$key}}</option>
              @endforeach
            </select>
            <span class="text-danger error-text rank_error"></span>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" id="txt_empid" value="0">
          <button class="btn ripple btn-primary" id="btn_save" type="button">حفظ التغييرات</button>
          <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلفاء التعديل</button>
        </div>
      </div>
    </div>
  </div>

  <!-- main-content closed -->
@endsection
@section('js')
  <!-- Internal Data tables -->
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
@section('ajax')
  <script type="text/javascript">
    let table = $('#yajra').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
      },
      processing: true,
      serverSide: true,
      ajax: "{{route('back.getAllUsers')}}",
      columns: [{
        data: 'id',
      }, {
        data: 'name',
      }, {
        data: 'email',
      }, {
        data: 'phone',
      }, {
        data: 'rank',
      }, {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      }
      ]
    });
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#btn_save').click(function () {
      let id = $('#txt_empid').val();

      let name = $('#name').val().trim();
      let email = $('#email').val().trim();
      let rank = $('#rank').val().trim();
      let phone = $('#phone').val().trim();

      // UPDATE USER
      $.ajax({
        url: "{{ route('users.update') }}",
        type: 'post',
        data: {_token: CSRF_TOKEN, id: id, name: name, email: email, rank: rank, phone: phone},
        dataType: 'json',
        beforeSend: function () {
          $(document).find('span.error-text').text('');
        },
        success: function (response) {
          if (response.status == 0) {
            $.each(response.error, function (prefix, val) {
              $('span.' + prefix + '_error').text(val)
            })
          } else if (response.success == 1) {

            // Empty and reset the values
            $('#name', '#email', '#phone').val('');
            $('#rank').val('user');
            $('#txt_empid').val(0);

            // Reload DataTable
            table.ajax.reload();
            $('#modaldemo8').modal('hide');

            // Close modal
            $('#updateModal').modal('toggle');
          } else {
            alert(response.msg);
          }
        }
      });


    });

    // Get user data for update

    $('#yajra').on('click', '.updateUser', function () {
      let id = $(this).data('id');

      $('#txt_empid').val(id);

      // AJAX request
      $.ajax({
        url: "{{ route('users.getUser') }}",
        type: 'post',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'json',

        success: function (response) {

          if (response.success == 1) {
            $(document).find('span.error-text').text('');
            $('#name').val(response.name);
            $('#email').val(response.email);
            $('#phone').val(response.phone);
            $('#rank').val(response.rank);

            table.ajax.reload();
          } else {
            alert("Invalid ID.");
          }
        }
      });

    });

    // Delete User

    $('#yajra').on('click', '.deleteUser', function () {
      var id = $(this).data('id');

      var deleteConfirm = confirm("هل انت متأكد من حذف المستخدم ؟");
      if (deleteConfirm == true) {
        // AJAX request
        $.ajax({
          url: "{{ route('users.delete') }}",
          type: 'post',
          data: {_token: CSRF_TOKEN, id: id},
          success: function (response) {
            if (response.success == 1) {

              // Reload DataTable
              table.ajax.reload();
            } else {
              alert("Invalid ID.");
            }
          }
        });
      }

    });

  </script>

@endsection
