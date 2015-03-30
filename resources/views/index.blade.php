<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Improwised Newsletter</title>

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
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
          </div>


          <div class="subscribed_number">
            <p>Join the 2800+ readers who subscribed so far!</p>
          </div>


          <!-- subscription block -->
          <div class="subscription_block" >
             @if (Session::has('message'))
                <div class="alert alert-info">
                  <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            {!!Form::open(['url'=>'/subscribe','method'=>'POST','id'=>'subscription_block'])!!}

            <div class="form-group">
              {!! Form::label('email','Email',['class'=>'control-label']) !!}
              {!! Form::text('email',Input::old('email'), ['id' => 'email' ,'class' => 'form-control']) !!}
              {!! ($errors->first('email', '<span class="help-inline" style="color:#e85c41">:message</span>')) !!}
            </div>

            <div class="form-group">
              {!! Form::label('firstName','First Name',['class'=>' control-label']) !!}
              {!! Form::text('firstName',Input::old('firstName'), ['id' => 'firstName' ,'class' => 'form-control']) !!}
              {!! ($errors->first('firstName', '<span class="help-inline" style="color:#e85c41">:message</span>')) !!}
            </div>

            <div class="form-group">
              {!! Form::label('lastName','Last Name',['class'=>' control-label']) !!}
              {!! Form::text('lastName',Input::old('lastName'), ['id' => 'lastName' ,'class' => 'form-control']) !!}
              {!! ($errors->first('lastName', '<span class="help-inline" style="color:#e85c41">:message</span>')) !!}
            </div>

            <div class="form-group">
              {!! Form::submit('Subscribe',array('id' => 'submit' ,'class'=>'btn btn-success btn-block')) !!}
            </div>

            {!!Form::close()!!}

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

<script type="text/javascript">
  $(document).ready(function (errors){
   @if(($errors->first('firstName')) || ($errors->first('email')) || ($errors->first('lastName')) )
    $("button[name='submit']").focus();
  @endif
  });
</script>


</html>


