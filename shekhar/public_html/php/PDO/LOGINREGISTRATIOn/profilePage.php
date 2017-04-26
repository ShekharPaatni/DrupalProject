
<?php
require 'Databaseconnectivity.php';
session_start();
$_SESSION['username'];
$connection=new DatabaseConnectivity();
$result=$connection->fetchValue($_SESSION['username']);
$_SESSION['password']=$result;
?>

<html>
<head>
  <title>Updating Details</title>
  <style>
  input[type="text"]
  {
  float: right;
  }
  div{
  margin-left: 30%;
  margin-top: 15%;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){

    $(this).on('click','#update',function(){
      var password=$("#password").val();
      var repassword=$('#repassword').val();
      if(password==repassword && password!="" && repassword!="" && password.length>10 && repassword.length>10 &&
      (/^[0-9a-zA-Z]+$/).test(repassword) && (/^[0-9a-zA-Z]+$/).test(password)){
        $("#result").text("Password Match");

        $.ajax({
          url: 'update.php',
          type: 'POST',
          data: {'password':password},
          success: function(data){
            console.log("Successfully update");
            alert(data);
            location.reload();
          },
          error: function(){
            console.log("error");
          }
        });

              }else {
        $("#result").text("Password doesn't match and it should be greter than 10");
        $("#result").css('color','red');
      }


    });
    $(this).on('click','#logout',function(){
      $.ajax({
        url: 'logout.php',
        type: 'POST',
        success: function(data){
            window.location.href=data.replace(/\"/g,'');
        },
        error: function(){
          console.log("error");
        }
      });

    });

  });
  </script>
  </head>
<body>
  <input type="button" value="LOGOUT" id="logout" style="float:right;margin-top:-15%;" />
<div>
<table>
<tr><td>Current Password:</td><td> <input type="text" value="<?php echo $_SESSION['password'] ?>" disabled="true"/></td></tr><br>
<tr><td>Password:</td><td><input type="text" id="password"/></td></tr>
<tr><td colspan="2"><span id="errorname"></span></td></tr><br>
<tr><td>Re-type Password:</td><td><input type="text" id="repassword"/></td></tr><br>
<tr><td colspan="2"><span id="nameError"></span></td></tr>
<tr><td></td><td style="float:right;"> <input type="button" value="update" id="update" ></td></tr>
<tr><td colspan="2"><span id="result"></span></td></tr>
</table>
</div>
</body>
</html>
