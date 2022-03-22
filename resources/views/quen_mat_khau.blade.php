<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quên mật khẩu</title>
    <link rel = "icon" href = "../images/logoTeam.png" type = "image/x-icon">
    <script src="../styles/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/css/login.css">
  
</head>

<body id="particles-js">
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"> </span> 
    <form method="post" action="{{route('quenMatKhau')}}" name="form1" class="box" onsubmit="return checkStuff()">
    @csrf
    <h4>Admin<span> Travel app</span></h4>
      <h5>Nhập email để lấy lại mật khẩu</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <input type="submit" value="Gửi email xác nhận" class="btn1">
      </form>

      <span class="dnthave" style="color:red; top: 283px; left: 60px;" > @if($errors->has('email')) {{$errors->first('email')}} <br>@endif  </span>
      
      @if (session('notification'))
      <span class="dnthave" style="color:red; top: 283px; left: 8px;" > {{ session('notification') }} <br>  </span>
      @endif
      <!-- <a href="#" class="dnthave">Don’t have an account? Sign up</a> -->
  </div> 
       <div class="footer">
      <span>Made with <i class="fa fa-heart pulse"></i> <a href="https://www.google.de/maps/place/Augsburger+Puppenkiste/@48.360357,10.903245,17z/data=!3m1!4b1!4m2!3m1!1s0x479e98006610a511:0x73ac6b9f80c4048f"><a href="https://codepen.io/lordgamer2354">By Thunder Team</a></span>
    </div>
</div>


<script src="../styles/js/login.js"></script>

</body>
</html>

