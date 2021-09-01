<?php
include 'config.php';
if (isset($_POST['login'])) {

     $Email = mysqli_real_escape_string($con,$_POST['email']);
     $Password = mysqli_real_escape_string($con,$_POST['pass']);

      $sql = "SELECT * FROM administrator WHERE Email = '$Email' and Password = '$Password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $Email = $row['Email'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
          
      if($count == 1) {
          $Email = $row["Email"];
          session_start();
          header("location: home.php");
      }else {
          echo '<div class = "error">Error : Invalid Email or Password</div>';
      }

}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>   
<form action="" method="post">   
<table class="t1" border = "1" cellspacing = "5">
<tr>
<th style='font-family:OCR A Std, monospace;' colspan="3">Library Management System</th>
</tr>
<tr>
<th style='font-family:OCR A Std, monospace; font-size: 25px;' colspan="3">Administrator Login</th>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Enter Email"></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Enter Password"></td>
</tr>
<tr>
<th colspan="3"><input type="submit" name="login" value="LOGIN"></th>
</tr>
</table>
</form>  
</body>
</html>