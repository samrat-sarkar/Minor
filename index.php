<?php
$error = '';
session_start();
include 'config.php';
if (isset($_POST['login'])) {

     $UserID = mysqli_real_escape_string($con,$_POST['UserID']);
     $Password = mysqli_real_escape_string($con,$_POST['pass']);

      $sql = "SELECT * FROM administrator WHERE UserID = '$UserID' and Password = '$Password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $UserID = $row['UserID'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
          
      if($count == 1) {
          session_start();
          $row["UserID"] = $UserID;
          $_SESSION['UserID'] = $UserID;
          header('location:home.php');
      }else {
          $error = '<div class = "error">Error : Invalid Credentials</div>';
      }

}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Login | Admin</title>
<link rel="stylesheet" type="text/css" href="css/admin.css?v=<?php echo time(); ?>">
</head>
<body>   
<form action="" method="post">   
<table class="t1" border = "0" cellspacing = "5">
<tr>
<th style='font-family:OCR A Std, monospace;'><?php echo $error ?></th>
</tr>
<tr>
<th style='font-family:OCR A Std, monospace;' colspan="3">Library Management System</th>
</tr>
<tr>
<th style='font-family:OCR A Std, monospace; font-size: 25px;' colspan="3">Administrator Login</th>
</tr>
<tr>
<td><input type="text" name="UserID" placeholder="Enter User ID" required></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Enter Password" required></td>
</tr>
<tr>
<th colspan="3"><input type="submit" name="login" value="Login"></th>
</tr>
</table>
</form>  
</body>
</html>