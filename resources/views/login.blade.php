<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login</title>
    <link rel = "icon" href = "../images/logoTeam.png" type = "image/x-icon">
    <script src="../styles/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body id="particles-js">
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"> </span> 
    <form method="post" action="{{route('login')}}" name="form1" class="box" onsubmit="return checkStuff()">
    @csrf
    <h4>Admin<span> Travel app</span></h4>
      <h5>Sign in to your account.</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        <label>
          <input type="checkbox">
          <span></span>
          <small class="rmb">Remember me</small>
        </label>
        <a href="/admin/quenmatkhau" class="forgetpass">Forget Password?</a>
        <input type="submit" value="Sign in" class="btn1">
      </form>

      <span class="dnthave" style="color:red" > @if($errors->has('email')) {{$errors->first('email')}} <br>@endif  </span>
        <!-- <a href="#" class="dnthave">Don’t have an account? Sign up</a> -->
  </div> 
       <div class="footer">
      <span>Made with <i class="fa fa-heart pulse"></i> <a href="https://www.google.de/maps/place/Augsburger+Puppenkiste/@48.360357,10.903245,17z/data=!3m1!4b1!4m2!3m1!1s0x479e98006610a511:0x73ac6b9f80c4048f"><a href="https://codepen.io/lordgamer2354">By Thunder Team</a></span>
    </div>
</div>
@if (session('notification'))
<div class="alert alert-success" role="alert" id="alert-success" style="
    position: fixed;
    top: 629px;
    left: 23px;
    width: 95%;
    z-index: 9999;
    border-radius: 0px;
    background-color: chartreuse;
    height: 50px;
    font-weight: bold;
    text-align: center;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="
            position: fixed;
          top: 646px;
          left: 804px;
          height: 20px;
          width: 20px;
          background-color: unset;" ><span aria-hidden="true" style="
         position: fixed;
          top: 649px;
          left: 810px;
          font-weight: bold;
          font-size: larger;
    ">&times;</span></button>
      <p>{{ session('notification') }}</p>
</div>
<script>
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
@endif
<canvas class="particles-js-canvas-el" width="623" height="344" style="width: 100%; height: 100%;"></canvas>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
<script src="https://cldup.com/S6Ptkwu_qA.js"></script>
<script src="../styles/js/login.js"></script>

</body>
</html>

