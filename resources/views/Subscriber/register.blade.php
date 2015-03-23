@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Subscribe</div>
        <div class="panel-body">

        @if (Session::has('message'))
            <div class="alert alert-info">
              <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
          <form class="form-horizontal" role="form" method="POST" action="/subscribe">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
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
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Subscribe
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
