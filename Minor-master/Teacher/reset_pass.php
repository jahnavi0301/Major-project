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
        <form method="post" action="send_link.php">
          <p>Enter roll number:</p>
          <input type="text" placeholder="Example 13401012017..."><br><br>
          <p>Enter new password:</p>
          <input type="password" name="password" placeholder="Atleast 8 chars"><br><br>
          <p>Confirm password:</p>
          <input type="password" name="password" placeholder="Just to be sure!"><br><br><br>
          <button type="button" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </body>
</html>