var oldPassword = document.getElementById('oldPassword');
var eye = document.getElementById('eye');

if(eye){
	eye.addEventListener('click',togglePass);
}


//show hide pass
function togglePass(){

   eye.classList.toggle('active');

   (oldPassword.type == 'password') ? oldPassword.type = 'text' : oldPassword.type = 'password';
}

var pwd = document.getElementById('pwd');
var eye2 = document.getElementById('eye2');

if(eye2){
	eye2.addEventListener('click',togglePass2);
}

//show hide pass
function togglePass2(){

   eye2.classList.toggle('active');

   (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
}
//show hide pass
var confirmPwd = document.getElementById('confirmPwd');
var eye3 = document.getElementById('eye3');

if(eye3){
	eye3.addEventListener('click',togglePass3);
}

function togglePass3(){

   eye3.classList.toggle('active');

   (confirmPwd.type == 'password') ? confirmPwd.type = 'text' : confirmPwd.type = 'password';
}

// ss với mật khẩu cũ
 $(function () {
        $("#submitButton").click(function () {
            var password = $("#oldPassword").val();
            var confirmPassword = $("#hidenCheck").val();
			
			var newPass = $("#pwd").val();
			var confirmPass = $("#confirmPwd").val();
			
			if(password == "" && confirmPassword == "" && newPass == ""){
				if (password != confirmPassword) {
               // alert("Mật khẩu cũ không khớp!.");
			    document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'Mật khẩu cũ không khớp!';
			
                return false;
            }
			if(newPass != confirmPass) {
				document.getElementById('messageConfirm').style.color="red";
				document.getElementById('messageConfirm').innerHTML = "Mật khẩu mới không khớp!";
				return false;
			}
		}
            
            return true;
        });
    });