var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirmPassword");

document.getElementById('signupLogo').src = "https://s3-us-west-2.amazonaws.com/shipsy-public-assets/shipsy/SHIPSY_LOGO_BIRD_BLUE.png";
enableSubmitButton();

var eye = document.getElementById('eye');

eye.addEventListener('click',togglePass);

function togglePass(){

   eye.classList.toggle('active');

   (password.type == 'password') ? password.type = 'text' : password.type = 'password';
}

var eye2 = document.getElementById('eye2');

eye2.addEventListener('click',togglePass2);

function togglePass2(){

   eye2.classList.toggle('active');

   (confirmPassword.type == 'password') ? confirmPassword.type = 'text' : confirmPassword.type = 'password';
}

function validatePassword() {
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Mật khẩu không trùng khớp");
    return false;
  } else {
    confirm_password.setCustomValidity('');
    return true;
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function enableSubmitButton() {
  document.getElementById('submitButton').disabled = false;
  document.getElementById('loader').style.display = 'none';
}

function disableSubmitButton() {
  document.getElementById('submitButton').disabled = true;
  document.getElementById('loader').style.display = 'unset';
}

function validateSignupForm() {
  var form = document.getElementById('signupForm');
  
  for(var i=0; i < form.elements.length; i++){
      if(form.elements[i].value === '' && form.elements[i].hasAttribute('required')){
        console.log('Vui lòng điền đầy đủ!');
        return false;
      }
    }
  
  if (!validatePassword()) {
    return false;
  }
  

}
