  @include('themes/default/includes/head')
  <body>
    <!-- logo -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="text-center">
            <div class="newsletter_logo">

            @if($settings->logo)
              <img src="uploads/{{$settings->logo}}">
            @endif

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
          @if($settings->title)
                  <h1>{{$settings->title}}</h1>
          @endif

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
            @if($settings->description)
                 {{$settings->description}}
            @endif
            </p>
          </div>


          <div class="subscribed_number">
            <p>Join the 100+ readers who subscribed so far!</p>
          </div>


          <!-- subscription block -->
          <div class="subscription_block" >
             @if (Session::has('message'))
                <div class="alert alert-info">
                  <p>{{ Session::get('message') }}</p>
                </div>
            @endif

             <form id="subscription_block" role="form" method="POST" action="/subscribe">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="Email">Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="Email">
                {!! ($errors->first('email', '<span class="help-inline" style="color:#e85c41">:message</span>')) !!}


              </div>
              <div class="form-group">
                <label for="Fname">First Name</label>
                <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" id="Fname">
               {!! ($errors->first('firstName', '<span class="help-inline" style="color:#e85c41">:message</span>')) !!}
              </div>
              <div class="form-group">
                <label for="Lname">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" id="Lname">
                 {!! ($errors->first('lastName', '<span class="help-inline" style="color:#e85c41">:message</span>')) !!}
              </div>
               <button type="submit" class="btn btn-success btn-block" name="submit" id="submit">Subscribe</button>
            </form>
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
