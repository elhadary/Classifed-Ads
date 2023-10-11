
<!--=====================================
            FOOTER PART PART
=======================================-->
  <div class="footer-end">
    <div class="container">
      <div class="footer-end-content">
        <p>All Copyrights Reserved &copy; 2021 - Developed by <a href="front/#">Mironcoder</a></p>
      </div>
    </div>
  </div>
<!--=====================================
            FOOTER PART END
=======================================-->
@yield('modal')

<!--=====================================
          CURRENCY MODAL PART START
=======================================-->
<div class="modal fade" id="currency">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Choose a Currency</h4>
        <button class="fas fa-times" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <button class="modal-link active">United States Doller (USD) - $</button>
        <button class="modal-link">Euro (EUR) - €</button>
        <button class="modal-link">British Pound (GBP) - £</button>
        <button class="modal-link">Australian Dollar (AUD) - A$</button>
        <button class="modal-link">Canadian Dollar (CAD) - C$</button>
      </div>
    </div>
  </div>
</div>
<!--=====================================
          CURRENCY MODAL PART END
=======================================-->


<!--=====================================
          LANGUAGE MODAL PART END
=======================================-->
<div class="modal fade" id="language">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Choose a Language</h4>
        <button class="fas fa-times" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <button class="modal-link active">English</button>
        <button class="modal-link">bangali</button>
        <button class="modal-link">arabic</button>
        <button class="modal-link">germany</button>
        <button class="modal-link">spanish</button>
      </div>
    </div>
  </div>
</div>
<!--=====================================
           LANGUAGE MODAL PART END
=======================================-->


<!--=====================================
            JS LINK PART START
=======================================-->
<!-- VENDOR -->
<script src="{{asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('front/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('front/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/vendor/slick.min.js')}}"></script>

<!-- CUSTOM -->
<script src="{{asset('front/js/custom/slick.js')}}"></script>
<script src="{{asset('front/js/custom/main.js')}}"></script>

@yield('script.ajax')

<!--=====================================
            JS LINK PART END
=======================================-->
</body>
</html>
