<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      @if($settings->title)
        {{$settings->title}}
      @else
       News Letter
      @endif
    </title>

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


    <!-- font owsome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/Theme.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="body">
    <div class="layer"></div>
    <div class="content">


      <div class="container">
        <div class="row">

          <!-- logo -->
          <div class="logo">
           @if($settings->logo)
              <img src="uploads/{{$settings->logo}}" height="50">
           @else
              <img src="/img/improwised.jpg" height="50">
           @endif

          </div>


          <!-- title -->
          <div class="title clearfix">
            <div class="col-sm-12">
              <div class="text-center">
               @if($settings->title)
                  <h1> {{$settings->title}}</h1>
               @else
                  <h1>News Letter</h1>
               @endif
              </div>
            </div>
          </div>


          <!-- description -->
          <div class="des clearfix">

            <div class="col-sm-7">
               @if($settings->description)
                  <p> {{$settings->description}} </p>
               @else
                   <p> Welcome </p>
               @endif
            </div>

            <div class="col-sm-5">
            <div class="subscriptionBox">

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
            </div>
          </div>

          <!-- social share -->
          <div class="clearfix social_share_copywrite">
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