@extends('front.layouts.main')
@section('css')
  <link rel="stylesheet" href="{{asset('front/css/custom/ad-post.css')}}">
@endsection
@section('content')

  @include('front.layouts.dash-header')

  <section class="adpost-part">
    <div class="container">

      <section class="adpost-part" id="success_msg" style="display: none">
        <div class="alert alert-success" role="alert">
          <hr>
          <h4 class="alert-heading text-center">تم إرسال طلب نشر الإعلان بنجاح </h4>
          <hr>
        </div>
      </section>
      <section class="adpost-part" id="error_msg" style="display: none">
        <div class="alert alert-danger" role="alert">
          <hr>
          <h4 class="alert-heading text-center">يرجى تصحيح الآخطاء </h4>
          <hr>
        </div>
      </section>

      <div class="row">
        <div class="col-lg-12">
          <form enctype="multipart/form-data" id="create-ad" class="adpost-form">
            @csrf
            <div class="adpost-card">
              <div class="adpost-title">
                <h3>تفاصيل الإعلان</h3>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">

                    <label class="form-label">عنوان الإعلان</label>
                    <input id="title" name="title" type="text" class="form-control  invalid_title"
                           value="{{ old('title') }}">
                    <span class="text-danger error-text title_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-label">المحافظة</label>
                    <select id="state" name="state" class="form-control custom-select invalid_state">
                      <option disabled selected value></option>
                      @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                      @endforeach
                    </select>
                    <span class="text-danger error-text state_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-label">المدينة</label>
                    <select disabled id="city" name="city" class="form-control custom-select  invalid_city">
                      <option disabled selected value></option>
                      {{--                      @foreach($cities as $city)--}}
                      {{--                        <option @if($city->id == old('city')) selected--}}
                      {{--                                @endif value="{{$city->id}}">{{$city->name}}</option>--}}
                      {{--                      @endforeach--}}
                    </select>
                    <span class="text-danger error-text city_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-label">التصنيف الرئيسي</label>
                    <select id="main_category" name="main_category"
                            class="form-control custom-select  invalid_main_category">
                      <option disabled selected value></option>
                                            @foreach($categories as $category)
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                    </select>
                    <span class="text-danger error-text main_category_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-label">التصنيف الفرعي</label>
                    <select disabled id="sub_category" name="sub_category"
                            class="form-control custom-select  invalid_sub_category">
                      <option disabled selected value></option>
                    </select>
                    <span class="text-danger error-text sub_category_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-label">السعر</label>
                    <input name="price" type="number" class="form-control  invalid_price"
                           placeholder="" value="{{old('price')}}">
                    <span class="text-danger error-text price_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-label">الصورة
                    </label>
                    <input id="image" name="image" type="file" class="form-control invalid_image">
                    <span class="text-danger error-text image_error"></span>
                  </div>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <button id="clear_image" class="btn btn-info btn-block" type="button">إلغاء الصورة</button>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-label">الوصف</label>
                    @error('description')
                    <div class="alert alert-danger @error('description') is-invalid @enderror">{{ $message }}</div>
                    @enderror
                    <div class="alert alert-danger" id="descriptionError"></div>

                    <textarea id="description" name="description" class="form-control invalid_description"
                              placeholder="يرجى كتابة الوصف هنا">{{old('description')}}</textarea>
                    <span class="text-danger error-text description_error"></span>

                  </div>
                </div>
              </div>
            </div>
            <div class="adpost-card pb-2">

              <div class="form-group text-right">
                <button id="save" class="btn btn-success btn-block">
                  <i class="fas fa-check-circle"></i>
                  <span>نشر الإعلان</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('script.ajax')
  <script>
    $(document).on('click','#clear_image',function (e) {
      e.preventDefault();
      $('#image').val('');
    })
    /// CITIES
    $(document).on('change', '.invalid_state', function (e) {
      let state_id = e.target.value;
      $.ajax({
        url: "{{ route('getCities') }}",
        type: "GET",
        data: {
          state_id: state_id
        },
        success: function (data) {
          $('#city').empty().append('<option disabled selected value></option>').removeAttr('disabled');
          $.each(data.cities[0].cities, function (index, city) {
            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
          })
        }
      })
    });
    /// SUB CATEGORIES
    $(document).on('change', '.invalid_main_category', function (e) {
      let cat_id = e.target.value;
      $.ajax({
        url: "{{route('getSubCategories')}}",
        type: "GET",
        data: {
          cat_id: cat_id
        },
        success: function (data) {
          $('#sub_category').empty().append('<option disabled selected value></option>').removeAttr('disabled');
          $.each(data.subcategories[0].sub_categories, function (index, sub_category) {
            $('#sub_category').append('<option value="' + sub_category.id + '">' + sub_category.name + '</option>');
          })
        }
      })
    });

    //// SAVE BUTTON
    $(document).on('click', '#save', function (e) {
      $('.is-invalid').removeClass('is-invalid');
      e.preventDefault();
      var formData = new FormData($('#create-ad')[0]);
      $.ajax({
        type: 'post',
        enctype: "multipart/form-data",
        url: "{{route('adStore')}}",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
          $(document).find('span.error-text').text('');
          $('#success_msg').hide();
          $('#error_msg').hide();

        },
        success: function (response) {
          if (response.status === 1) {
            $('#success_msg').show();
            $('html, body').scrollTop($("#top").offset().top);
            $('.form-control').val('');

          } else if (response.status === 0) {
            $('#error_msg').show();
            $.each(response.errors, function (prefix, val) {
              $('span.' + prefix + '_error').text(val);
              $('.invalid_' + prefix).addClass('is-invalid');
            });

            $('html, body').scrollTop($("#top").offset().top);

          } else {
            console.log(response);
            $('#success_msg').show().val('حدث خطأ ما');
            $('html, body').scrollTop($("#top").offset().top);
          }


        }, error: function (error) {
          console.log(error)
          // $('#nameError').html(error.responseJson.error[0]);

        }
      })
    })
    ;

  </script>
@endsection




