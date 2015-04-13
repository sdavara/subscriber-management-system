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
              Subscription Confirmed
              <br>
              Your subscription to our list has been confirmed,Thank you for subscribing!
            </p>
          </div>

          <!-- subscription block -->
          <div class="subscription_block">
            <div>
              <a href="/"><button class="btn btn-success btn-block">Return to Homepage!</button></a>
            </div>
          </div>

@include('themes/default/includes/footer')