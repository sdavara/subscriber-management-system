
<script type="text/javascript">
  $(document).ready(function (errors){
   @if(($errors->first('firstName')) || ($errors->first('email')) || ($errors->first('lastName')) )
    $("button[name='submit']").focus();
  @endif
  });
</script>
</html>