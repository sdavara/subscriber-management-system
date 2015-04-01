@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Installation</div>
        <div class="panel-body">
        <div>  Minimum Requirements</div>


        <div>
          <?php $flag= true; ?>
        <ul>
          <li>
          @if(version_compare(phpversion(),"5.4",">="))
          <img src="{{asset('/img/right.png')}}"/>  PHP Version Compatible
          @else
          <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/>PHP Version Not Compatible
          @endif
          </li>

          <li>
          @if(extension_loaded('pdo'))
          <img src="{{asset('/img/right.png')}}"/>  PDO Enabled
          @else
          <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/>PDO Disabled
          @endif
        </li>
        <li>
          @if(extension_loaded('mcrypt'))
          <img src="{{asset('/img/right.png')}}"/>  Mcrypt Extension Enabled
          @else
           <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/>Mcrypt Extension Disabled
          @endif
        </li>

        <li>
          @if(extension_loaded('gd'))
          <img src="{{asset('/img/right.png')}}"/> GD Extension Enabled
          @else
          <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/>GD Extension Disabled
          @endif
        </li>
        <li>
          @if(is_writable(public_path().'//uploads'))
          <img src="{{asset('/img/right.png')}}"/> uploads folder is Writable
          @else
          <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/> uploads folder is not Writable
          @endif
        </li>

        <li>
          @if(is_writable(storage_path().'/logs'))
          <img src="{{asset('/img/right.png')}}"/> storage/logs is folder is Writable
          @else
          <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/> storage/logs folder is not Writable
          @endif
        </li>

        <li>
          @if(is_writable(storage_path().'/framework/views'))
          <img src="{{asset('/img/right.png')}}"/> storage/views is folder is Writable
          @else
          <?php $flag = false; ?>
          <img src="{{asset('/img/wrong.png')}}"/>storage/views folder is not Writable
          @endif
        </li>
        </ul>

            <?php if($flag == false){?>
            <div>
              <input type="submit"  onClick="location.reload(true)" value="Try Again !"/>
            </div>
          <?php }else{ ?>
            <div>
              <a href="{{url('install/database')}}"> Let's Begin ! </a>
            </div>
          <?php } ?>

        </div>


        </div>
        </div>
    </div>
  </div>
</div>
@endsection

