@extends('back.ads.main')
@section('header')
  إعلانات تحت المراجعة
@endsection

@section('ajax.table')
  <script>
    let table = $('#yajra').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
      },
      processing: true,
      serverSide: true,
      order: [[0, "desc"]],
      ajax: {
        url:'{{route('advertisements.getUnderReviewAds')}}',
        type: 'post',
        data: {_token: CSRF_TOKEN},
      },
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
        data: 'price',
        render: function (data) {
          let formatting_options = {
            style: 'currency',
            currency: 'EGP',
            minimumFractionDigits: 2,
          }
          let numberWithDollar = data.toLocaleString("en-US",
            formatting_options);
          return numberWithDollar;
        }
      }, {
        data: 'is_active',
        render: function (data) {
          return '-'
        }
      },{
        data: 'expire_at',
        render: function () {
          return '-'
        }
      }, {
        data: 'is_approved',
        render: function (data) {
          return data == '0' ? 'لم تتم الموافقة عليه' : 'تم الموافقة عليه';
        }
      }, {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false,
      }
      ]
    });
  </script>
@endsection
