 @include('themes/default/includes/head')
  <body>

    <!-- logo -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="text-center">
            <div class="newsletter_logo">
              <img src="img/improwised.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- title -->
    <div class="container-fluid">
      <div class="row">
        <div class="text-center">
          <div class="newsletter_title">
            <h1>Improwised Newsletter</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- description -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="newsletter_description">
            <p>
              Thank you for your Subscription!
              <br>
              To complete the process, please click the link in the email we just sent you.
            </p>
          </div>

          <!-- subscription block -->
          <div class="subscription_block" >
            <div>
              <a href="/"><button class="btn btn-success btn-block">Return to Homepage!</button></a>
            </div>
          </div>

          <!-- social share & copywrite -->
          <div class="clearfix social_share_copywrite">
            <p class="social_share pull-right">
              <a href=""><i class="fa fa-facebook-square"></i></a>
              <a href=""><i class="fa fa-twitter-square"></i></a>
              <a href=""><i class="fa fa-google-plus-square"></i></a>
              <a href=""><i class="fa fa-linkedin-square"></i></a>
            </p>
            <p class="copywrite pull-left">© 2015. Improwised Technologies Pvt. Ltd.</p>
          </div>
        </div>
      </div>
    </div>
    @yield('scripts')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
@include('themes/default/includes/footer')