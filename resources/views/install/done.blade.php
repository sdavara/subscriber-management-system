@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Installation </div>
        <div class="panel-body">
        <div> Done</div>

    <div class="row-fluid">
    That's it. All settings have been saved. Good to go !<br/>Please login with your username and password.
    </div>

     <div class="submit_button_main">
              <a href="{{url('/admin')}}"> Login </a>
            </div>


         </div>
        </div>
        </div>
        </div>
        </div>
@endsection