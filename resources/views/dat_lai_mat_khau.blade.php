
<link rel="stylesheet" href="{{ asset('../styles/css/changePass.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css">

<body>
<div class="mainDiv">
  <div class="cardStyle">
    <form action="" method="post" name="signupForm" id="signupForm">
    @csrf
      <img src="" id="signupLogo"/>
      
      <h2 class="formTitle">
       Cập nhật mật khẩu
      </h2>
      <i class="typcn typcn-eye" id="eye"></i>
    <div class="inputDiv">
      <label class="inputLabel" for="password">Mật khẩu mới</label>
      <input type="password" id="password" name="password" required>
    </div>
      
    <i class="typcn typcn-eye" id="eye2"></i>
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Xác nhận mật khẩu</label>
      <input type="password" id="confirmPassword" name="confirmPassword">
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" id="submitButton" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
        <span>Hoàn tất</span>
        <span id="loader"></span>
      </button>
    </div>
      
  </form>
  </div>
</div>
<script src="{{ asset('../styles/js/changePass.js') }}"></script>
</body>
