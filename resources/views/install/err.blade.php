@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">

        <div class="panel-body">

          <p style="color:red">Something went wrong and we have noted that. Thank you for understanding.</p>
          <br>
           <a href="{{url('/admin')}}">Go back to Dashboard ?</a>

        </div>
        </div>
      </div>
      </div>
      </div>
@endsection