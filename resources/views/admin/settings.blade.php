@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Settings</div>
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

            <div class="form-group">
              <label class="col-md-4 control-label">Title</label>

              <div class="col-md-6">
                <label type="text" class="form-control" name="Newtitle" id="Newtitle" readonly style="display:block">{{{ Input::old('title', isset($settings) ? $settings->title : null) }}}</label>
              </div>
              <button  type="button" class="btn btn-info" id="title_change" onclick="change(this.id)">Change</button>

              <div class="col-md-6" id="titleblock" style="display:none" >
                <form class="form-horizontal form-inline" role="form" method="POST" action="@if(isset($settings)){{ URL::to('/admin/settings/'.$settings->id) }}
                        @else{{ URL::to('admin/settings/add') }}@endif"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  class="form-control input-medium"type="text" name="title" id="title"  value ="{{{ Input::old('title', isset($settings) ? $settings->title : null) }}}" />
                  <button  type="submit" name="Save" class="btn btn-primary" >Save</button>
                  <button  type="button" name="Cancel" id="title_cancel"  value="Cancel" class="btn btn-info" onclick="cancel(this.id)">Cancel</button>
                </form>
              </div>
              <br>
            </div>
            <br>

            <div class="form-group">
              <label class="col-md-4 control-label">Sub Title</label>

              <div class="col-md-6">
                <label type="text" class="form-control" name="Newsubtitle"  id="Newsubtitle"  readonly style="display:block">{{{ old('subtitle',isset($settings) ? $settings->subtitle : null) }}}</label>
               </div>
              <button type="button" class="btn btn-info" id="subtitle_change" onclick="change(this.id)">Change</button>

              <div class="col-md-6" id="subtitleblock" style="display:none">
               <form class="form-horizontal form-inline" role="form" method="POST" action="@if(isset($settings)){{ URL::to('/admin/settings/'.$settings->id) }}
                        @else{{ URL::to('admin/settings/add') }}@endif"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="form-control" type="text" name="subtitle" id="subtitle"  value="{{{ old('subtitle',isset($settings) ? $settings->subtitle : null) }}}" class="input-medium"  />
                  <button style="align:right" type="submit" name="Save" class="btn btn-primary">Save</button>
                  <input style="align:right" type="button" name="Cancel" value="Cancel" id="subtitle_cancel" onclick="cancel(this.id)" class="btn btn-info"/>
                </form>
              </div>
              <br>
            </div>
            <br>

            <div class="form-group">
              <label class="col-md-4 control-label">Logo</label>

              <div class="col-md-6">
                <label type="text" class="form-control" name="Newlogo" id="Newlogo" value="" readonly style="display:block">{{{ old('logo',isset($settings) ? $settings->logo : null) }}}</label>
              </div>
              <button type="button" class="btn btn-info" id="logo_change" onclick="change(this.id)">Change</button>

              <div class="col-md-6" id="logoblock" style="display:none">
              <form class="form-horizontal form-inline" role="form" method="POST" action="@if(isset($settings)){{ URL::to('/admin/settings/'.$settings->id) }}
                        @else{{ URL::to('admin/settings/add') }}@endif"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="form-control" type="file" name="logo" id="logo" class="input-medium" value="{{{ old('logo',isset($settings) ? $settings->logo : null) }}}"  />
                  <button type="submit" name="Save" class="btn btn-primary">Save</button>
                  <input type="button" name="Cancel" value="Cancel" id="logo_cancel" onclick="cancel(this.id)" class="btn btn-info"/>
              </form>
              </div>
              <br>

            </div>
            <br>

            <div class="form-group">
              <label class="col-md-4 control-label">Description</label>

              <div class="col-md-6">
                <textarea class="form-control"  name="Newdescription" id="Newdescription" value="{{{ old('description',isset($settings) ? $settings->description : null) }}}" class="input-medium" readonly style="display:block" >
                {{{ old('description',isset($settings) ? $settings->description : null) }}}</textarea>
              </div>

              <button type="button" class="btn btn-info" id="description_change" onclick="change(this.id)">Change</button>

              <div class="col-md-6" id="descriptionblock" style="display:none">
               <form class="form-horizontal form-inline" role="form" method="POST" action="@if(isset($settings)){{ URL::to('/admin/settings/'.$settings->id) }}
                        @else{{ URL::to('admin/settings/add') }}@endif"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <textarea  class="form-control" type="text" name="description" id="description" value="{{{ old('description',isset($settings) ? $settings->description : null) }}}" class="input-medium">
                  {{{ old('description',isset($settings) ? $settings->description : null) }}}</textarea>
                  <button type="submit" name="Save" class="btn btn-primary">Save</button>
                  <input type="button" name="Cancel" value="Cancel" id="description_cancel" onclick="cancel(this.id)" class="btn btn-info"/>
                </form>
              </div>
              <br>
            </div>
            <br>
            <br>

            <div class="form-group">
              <label class="col-md-4 control-label">Theme</label>

              <div class="col-md-6">
                <label type="text" class="form-control" name="Newtheme" value="" id="Newtheme" readonly style="display:block">{{{ old('theme',isset($settings) ? $settings->theme : null) }}}</label>
              </div>

              <button type="button" class="btn btn-info" id="theme_change" onclick="change(this.id)">Change</button>

               <div class="col-md-6" id="themeblock" style="display:none">
               <form class="form-horizontal form-inline" role="form" method="POST" action="@if(isset($settings)){{ URL::to('/admin/settings/'.$settings->id) }}
                        @else{{ URL::to('admin/settings/add') }}@endif"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="form-control" type="text" name="theme" id="theme" value="index" class="input-medium"  />
                  <button type="submit" name="Save" class="btn btn-primary">Save</button>
                  <input type="button" name="Cancel" value="Cancel" id="theme_cancel" onclick="cancel(this.id)" class="btn btn-info"/>
                </form>
              </div>
             </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type = "text/javascript">

  function change(id){
    var index = id.indexOf('_');
    var element = id.substr(0,index);
    document.getElementById("New"+element).style.display="none";
    document.getElementById(element+"_change" ).style.display="none";
    document.getElementById(element+"block").style.display="block";
  }

  function cancel(id){
    var index = id.indexOf('_');
    var element = id.substr(0,index);
    document.getElementById("New"+element).style.display="block";
    document.getElementById(element+"_change" ).style.display="block";
    document.getElementById(element+"block").style.display="none";

  }

</script>​
@stop