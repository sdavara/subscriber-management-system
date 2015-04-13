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
                @else
                 <img src="/img/improwised.jpg">
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
          <div class="subscription_block">
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
 @include('themes/default/includes/footer')
