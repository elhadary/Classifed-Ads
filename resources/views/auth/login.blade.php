<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <!--=====================================
              META-TAG PART START
  =======================================-->
  <!-- REQUIRE META -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- TEMPLATE META -->
  <meta name="name" content="Classicads">
  <meta name="type" content="Classified Advertising">
  <meta name="title" content="Classicads - Classified Ads HTML Template">
  <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
  <!--=====================================
              META-TAG PART END
  =======================================-->

  <!-- FOR WEBPAGE TITLE -->
  <title>Classicads - User Form</title>

  <!--=====================================
              CSS LINK PART START
  =======================================-->
  <!-- FOR PAGE TITLE ICON -->
  <link rel="icon" href="front/images/favicon.png">

  <!-- FOR FONTAWESOME -->
  <link rel="stylesheet" href="front/fonts/font-awesome/fontawesome.css">

  <!-- FOR BOOTSTRAP -->
  <link rel="stylesheet" href="front/css/vendor/bootstrap.min.css">

  <!-- FOR COMMON STYLE -->
  <link rel="stylesheet" href="front/css/custom/main.css">

  <!-- FOR USER FORM PAGE STYLE -->
  <link rel="stylesheet" href="front/css/custom/user-form.css">
  <!--=====================================
              CSS LINK PART END
  =======================================-->
</head>
<body>
<!--=====================================
            USER-FORM PART START
=======================================-->
<section class="user-form-part">

  <div class="user-form-category">
    <div class="user-form-header">
      <a href="front/#"><img src="front/images/logo.png" alt="logo"></a>
      <a href="front/index.html"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="user-form-category-btn">
      <ul class="nav nav-tabs">
        <li><a href="front/#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
        <li><a href="front/#register-tab" class="nav-link" data-toggle="tab">sign up</a></li>
      </ul>
    </div>

    <div class="tab-pane active" id="login-tab">
      <div class="user-form-title">
        <h2>مرحبًا !</h2>
        @if ($errors)
          <span class="text-danger">{{ $errors->first() }}</span>
        @endif
      </div>
      <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <input name="email" type="text" class="form-control" placeholder="البريد الإلكتروني">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <input name="password" type="password" class="form-control" id="pass" placeholder="كلمة السر">
              <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
              <small class="form-alert">Password must be 6 characters</small>
            </div>
          </div>

          <div class="col-12">
            <div class="form-group">
              <button type="submit" class="btn btn-inline">
                <span>تسجيل الدخول</span>
                <i class="fas fa-unlock"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
      <div class="user-form-direction">
        <p><span>تسجيل حساب جديد</span> </p>
      </div>
    </div>

    <div class="tab-pane" id="register-tab">
      <div class="user-form-title">
        <h2>Register</h2>
        <p>Setup a new account in a minute.</p>
      </div>
      <ul class="user-form-option">
        <li>
          <a href="front/#">
            <i class="fab fa-facebook-f"></i>
            <span>facebook</span>
          </a>
        </li>
        <li>
          <a href="front/#">
            <i class="fab fa-twitter"></i>
            <span>twitter</span>
          </a>
        </li>
        <li>
          <a href="front/#">
            <i class="fab fa-google"></i>
            <span>google</span>
          </a>
        </li>
      </ul>
      <div class="user-form-devider">
        <p>or</p>
      </div>
      <form>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Phone number">
              <small class="form-alert">Please follow this example - 01XXXXXXXXX</small>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password">
              <button class="form-icon"><i class="eye fas fa-eye"></i></button>
              <small class="form-alert">Password must be 6 characters</small>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Repeat Password">
              <button class="form-icon"><i class="eye fas fa-eye"></i></button>
              <small class="form-alert">Password must be 6 characters</small>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="signup-check">
                <label class="custom-control-label" for="signup-check">I agree to the all <a href="front/#">terms & consitions</a> of bebostha.</label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <button type="submit" class="btn btn-inline">
                <i class="fas fa-user-check"></i>
                <span>Create new account</span>
              </button>
            </div>
          </div>
        </div>
      </form>
      <div class="user-form-direction">
        <p>Already have an account? click on the <span>( sign in )</span> button above.</p>
      </div>
    </div>
  </div>
  <div class="user-form-banner">
    <div class="user-form-content">
      <a href="front/#"><img src="front/images/logo.png" alt="logo"></a>
      <h1>Olx</h1>
    </div>
  </div>

</section>
<!--=====================================
            USER-FORM PART END
=======================================-->


<!--=====================================
            JS LINK PART START
=======================================-->
<!-- FOR BOOTSTRAP -->
<script src="front/js/vendor/jquery-1.12.4.min.js"></script>
<script src="front/js/vendor/popper.min.js"></script>
<script src="front/js/vendor/bootstrap.min.js"></script>

<!-- FOR INTERACTION -->
<script src="front/js/custom/main.js"></script>
<!--=====================================
            JS LINK PART END
=======================================-->
</body>
</html>






