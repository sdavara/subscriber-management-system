@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Subscribers</div>
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

        <table class="table table-bordered admin-table-th">
          <thead>
            <tr>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Email</th>
              <th>Confirmation Code</th>
              <th>Confirmation</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          @if (sizeOf($subscribers)>0)
            @foreach ($subscribers as $subscriber)
            <tr>
              <td>{{$subscriber->firstName}}  </td>
              <td>{{$subscriber->lastName}}  </td>
              <td>{{$subscriber->email}}  </td>
              <td>{{$subscriber->confirmation_code}}  </td>
              <td>
                @if($subscriber->confirmed)
                  Confirmed
                @else
                  Pending
                @endif
              </td>
              <td>{{$subscriber->status}}  </td>
            </tr>
            @endforeach
            @endif

          </tbody>
        </table>
        </div>
      </div>
      </div>
      </div>
      </div>
      @stop