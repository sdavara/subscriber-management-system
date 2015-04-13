
 <!-- social share -->
          <div class="clearfix social_share_copywrite">
              <p class="social_share pull-right">
              @if($settings->facebook)
                <a target="_blank" href={{$settings->facebook}}><i class="fa fa-facebook-square"></i></a>
              @else
                <a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook-square"></i></a>
              @endif
              @if($settings->twitter)
                <a target="_blank" href={{$settings->twitter}}><i class="fa fa-twitter-square"></i></a>
              @else
              <a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter-square"></i></a>
              @endif
              @if($settings->googleplus)
                <a target="_blank" href={{$settings->googleplus}}><i class="fa fa-google-plus-square"></i></a>
              @else
              <a target="_blank" href="https://plus.google.com"><i class="fa fa-google-plus-square"></i></a>
              @endif
              @if($settings->linkedin)
                <a target="_blank" href={{$settings->linkedin}}><i class="fa fa-linkedin-square"></i></a>
              @else
              <a target="_blank" href="https://www.linkedin.com"><i class="fa fa-linkedin-square"></i></a>
              @endif
             </p>
             <p class="copywrite pull-left">© 2015. Improwised Technologies Pvt. Ltd.</p>
           </div>
        </div>
      </div>
    </div>

    @yield('scripts')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>

  <script type="text/javascript">
  $(document).ready(function (errors){
   @if(($errors->first('firstName')) || ($errors->first('email')) || ($errors->first('lastName')) )
    $('#submit').focus();
  @endif
  });
</script>

</html>