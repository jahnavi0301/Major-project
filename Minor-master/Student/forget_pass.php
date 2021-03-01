<!-- 1. send OTP to email
2. verify whether it is correct as typed one
3. ask to enter and confirm password -->
<?php 
//send OTP

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/dashstyle.css">
  </head>
  <body style="background-color: rgb(221, 221, 221);">
    <div class="header">
      <a href="#" class="logo"><img src="./images/igdtuwLogo.png"></a>
       <a href="#" class="clg-name">Indira Gandhi Delhi Technical University for Women</a>
   </div>
    <div class="jumbotron" style="border-top: 1px ridge;">
      <div style="padding-bottom: 30px;">
        <a class="btn btn-primary btn-lg" href="/Home Page and Blackboard/startpage.html" role="button">Back To Home Page</a>
      </div>
      <div style="margin-left: 100px;padding: 50px; border-left: 1px solid black;">
        <h1 class="display-4">Reset Password</h1>
        <p class="lead">Enter the following details:</p>
        <hr class="my-4">
        <form method="post" action="process.php">
          <p>Enter your email:</p>
          <input type="email" placeholder="abc@gmail.com"  name="email"><br><br>
          <a href="process_otp.php"><button type="button" class="btn btn-success">Send OTP</button></a><br><br>
          <p>Enter the secret key sent to the email:</p>
          <input type="text" placeholder="Enter 6 digit OTP"><br><br>
          <a href="reset_pass.php"><button type="button" class="btn btn-primary">Submit</button></a>
      </form>
      </div>
    </div>
  </body>
</html>