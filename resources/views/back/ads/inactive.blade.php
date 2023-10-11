@extends('back.ads.main')
@section('header')
  الإعلانات الموافقة عليها والنشطة
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
        url:'{{route('advertisements.getInactiveAds')}}',
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
          return data == '0' ? 'غير نشط' : 'نشط';
        }
      }, {
        data: 'expire_at',
        render: function (data) {
          if(data){
            return data.substring(0, 16).replace('T','-');
          }
          return '-';
        }
      }, {
        data: 'is_approved',
        render: function (data) {
          return '-';
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
