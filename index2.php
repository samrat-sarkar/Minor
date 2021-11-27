<?php
$error = '';
session_start();
include 'config.php';
if (isset($_POST['login'])) {

     $UserID = mysqli_real_escape_string($con,$_POST['UserID']);
     $Password = mysqli_real_escape_string($con,$_POST['pass']);

      $sql = "SELECT * FROM user WHERE UserID = '$UserID' and Password = '$Password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $UserID = $row['UserID'];
      $Verifyy = $row['verify'];  
      $Lock = $row['Alock'];

      $count = mysqli_num_rows($result);
       

      if ($count == 1) {
          if ($Verifyy==0) {
              $error ='<div class = "error">Account Verification Pending</div>';
          }else{
               if ($Lock==0) {
          $_SESSION['UserIDD'] = $UserID;
          header('location:home2.php');
               }else{
                    $error ='<div class = "error">Account has been Blocked</div>';
               }

          }

        }else {
            $error ='<div class = "error">Error : Invalid Credentials</div>';
        }

         

}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Login | User</title>
<link rel="stylesheet" type="text/css" href="css/index.css?v=<?php echo time(); ?>">
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
<th style='font-family:OCR A Std, monospace; font-size: 25px;' colspan="3">User Login</th>
</tr>
<tr>
<td><input type="text" name="UserID" placeholder="Enter User ID" value="87654321" required></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Enter Password" value="TEST" required></td>
</tr>
<tr>
<th colspan="3"><input type="submit" name="login" value="Login"></th>
</tr>
</table>
<div class="ButtonConfig">
<a class="button1" href="index3.php">User Registration</a>
</div>
</form>  
</body>
</html>