
<html>
<head>
<title> Login cum Registration</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$(this).on('click','#regist',function(){

var username=$('#username').val();
var password=$('#password').val();
var gender=$('input[type=radio]:checked').val();

$.ajax({
url: 'Regist.php',
type: 'POST',
data: {'username':username,'password':password,'gender':gender},

success: function(data){		
		console.log("successfully");			
			if($(data).find('#msg'))
			alert("invalid");
				else{
				alert("valid");
				}				
			},
error: function(data){
		console.log("error");
		}

	});
});


});

</script>
</head>
<body>


<center>
<div style="margin: 0 auto;margin-top:15%"><div style="display:inline-block;width:400px">

Registration Form<br>
<input type="text" placeholder="Enter the UserName" id="username"  />
<span id="usernameRegistError" ></span>
<br>
<input type="password" placeholder="Password" id="password"/>
<span id="passwordRegistError"></span>
<br>Gender
<input type="radio" name="gender" value="male" id="gender" />Male
<input type="radio" name="gender" value="female" id="gender"/> Female
<br>
<input type="button" value="Register" id="regist"/>

</div>
<div style="display:inline-block;vertical-align:top;width:400px">

Login<br>
<input type="text" placeholder="username" id="name" />
<span id="usernameError"></span>
<br><input type="text" placeholder="password" id="pass" />
<span id="passwordError"></span>
<br>
<input type="button" value="Login" />

</div><div>
<center>
</body>
</html>
