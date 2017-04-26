<html>
<head>
<title>Registration cum Login form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="registration.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">
<style>
.main{
display: inline-block;
width:40%;
margin-left: 5%;
vertical-align: top;
padding-bottom: 2%;
}
.boxes{
  width:100%;
  padding:8px 8px;
  font-family: 'Monda', sans-serif;
  vertical-align: top;


}
input[type=button]{
  font-size: 16px;
width: 200px;
  float: right;
  background-color: #4CAF50;
  color: white;
  padding: 3px 5px;
  border-radius: 1em;
  font-family: 'Monda', sans-serif;
}
legend{
  font-size: 26px;
}

</style>
</title>
</head>
<body>
  <center>
<div style="display:block;border:2px solid #FF5733;margin: 0% auto;position:relative;top:120px; width:80%;">
    <div class="main">
    <form>
      <legend><b><u>Registration</b></u></legend><br>

      <input type="text" class="boxes" placeholder="Enter Email" id="username" required/><br>
      <span id="nameerror"></span>
      <input type="password" class="boxes" placeholder="Enter Password" id="password" required /><br>
      <span id="passerror"></span><br>
      <font  font-family="'Monda', sans-serif">Gender <font color="red">*</font></font>:
      <input type="radio" name="gender" value="Male" checked>Male
      <input type="radio" name="gender" value="Female">Female<br><br>
      <input type="button" value="Register yourself" id="registrationClick" />
    </form>
  </div>
  <div class="main">
    <form>
      <legend><b><u>Login</b></u></legend><br>
      <input type="text" class="boxes" placeholder="Enter username" id="name" required/><br>
      <input type="password" class="boxes" placeholder="Enter Password" id="pass" required /><br>
      <span id="errorLogin"></span>
      <br><br><br><input type="button" value="Login"id="loginClick" >
    </form>
  </div>
</div>
</center>
</body>
</html>
