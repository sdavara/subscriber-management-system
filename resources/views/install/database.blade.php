@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Installation - Database Details</div>
        <div class="panel-body">
        <div> Please enter the Database Credentials</div>

        <form class="form-horizontal" role="form" method="POST" id="newpassform" name="newpassform" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label class="col-md-4 control-label">Host</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="Host"  id="host" placeholder="Host" required="true">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Database</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="database" name="database" placeholder="Database" required="true">
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-4 control-label">Username</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="true">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
              </div>
            </div>



            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </div>
            </div>
            </form>



          </div>
        </div>
        </div>
    </div>
  </div>
</div>
@endsection