<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{$settings->title}}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


    <!-- font owsome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/newsletter.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- logo -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="text-center">
            <div class="newsletter_logo">
              <img src="uploads/{{$settings->logo}}">
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
            <h1>{{$settings->title}}</h1>
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
            {{$settings->description}}
            </p>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
          </div>


          <div class="subscribed_number">
            <p>Join the 2800+ readers who subscribed so far!</p>
          </div>


          <!-- subscription block -->
          <div class="subscription_block">
             <form role="form" method="POST" action="/subscribe">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="Email">Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="Email">
              </div>
              <div class="form-group">
                <label for="Fname">First Name</label>
                <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" id="Fname">
              </div>
              <div class="form-group">
                <label for="Lname">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" id="Lname">
              </div>
              <button type="submit" class="btn btn-success btn-block">Subscribe</button>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>