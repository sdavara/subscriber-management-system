@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Installation - Admin Account</div>
        <div class="panel-body">
        <div> Admin Account</div>

        <form class="form-horizontal" method="post" id="signupForm" action="{{url('install/adminaccount')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

             <div class="form-group">
              <label class="col-md-4 control-label">E-mail:</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" required="true">
              </div>
            </div>


            <label class="col-md-4 control-label">First Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Last Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password" required="true">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation" required="true">
              </div>
            </div>



            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Create my Account
                </button>
              </div>
            </div>
          </form>
         </div>
        </div>
        </div>
        </div>
        </div>
@endsection