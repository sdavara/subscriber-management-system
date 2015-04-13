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
                  <h1>{{$settings->title}}</h1>
               @else
                   <h1>News Letter</h1>
               @endif

              </div>
            </div>
          </div>


          <!-- description -->
          <div class="des clearfix">
          <div>
            <p>
              Subscription Confirmed
            <br>
              Your subscription to our list has been confirmed,Thank you for subscribing!
            </p>
            <p>
              <a href="/"><button class="btn btn-success">Return to Homepage!</button></a>
            </p>
          </div>
          </div>
          @include('themes/dark/includes/footer')
