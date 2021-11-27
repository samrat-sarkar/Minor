<?php
$inse = '';
$fail = '';
session_start();
include 'config.php';
if (isset($_POST['Register'])) {

$UserID = mysqli_real_escape_string($con,$_POST['UserID']);
$Name = mysqli_real_escape_string($con,$_POST['name']);
$Password1 = mysqli_real_escape_string($con,$_POST['pass1']);
$Password2 = mysqli_real_escape_string($con,$_POST['pass2']);

      $sqll = "SELECT * FROM user WHERE UserID = '$UserID'";
      $result = mysqli_query($con,$sqll);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $UserIDD = $row['UserID'];   
      $count = mysqli_num_rows($result);
if ($UserID == $UserIDD) {
  $fail ='<div style="color:red;">User ID already exists</div>';
}else{

if ($Password1 == $Password2) {
$sql = "INSERT INTO user (Name, UserID, Password) VALUES ('$Name','$UserID', '$Password2')";
if ($con->query($sql) === TRUE) {
   $inse = '<div style=color:green;">Registered Successfully</div>';
} else {
  $fail ='<div style="color:red;">Registration Failed</div>';
}  
}else{
  $fail ='<div style="color:red;">Password Not Matched</div>';
}

}

}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Registration | User</title>
<link rel="stylesheet" type="text/css" href="css/index.css?v=<?php echo time(); ?>">
</head>
<body>   
<form action="" method="post">   
<table class="t1" border = "0" cellspacing = "5">
<tr>
<th style='font-family:OCR A Std, monospace;'><?php echo $inse ?><?php echo $fail ?></th>
</tr>
<tr>
<th style='font-family:OCR A Std, monospace;' colspan="3">Library Management System</th>
</tr>
<tr>
<th style='font-family:OCR A Std, monospace; font-size: 25px;' colspan="3">User Registration</th>
</tr>
<tr>
<td><input type="text" name="UserID" placeholder="Enter User ID" required></td>
</tr>
<tr>
<td><input type="text" name="name" placeholder="Enter Name" required></td>
</tr>
<tr>
<td><input type="password" name="pass1" placeholder="Enter Password" required></td>
</tr>
<tr>
<td><input type="password" name="pass2" placeholder="Enter Confirm Password" required></td>
</tr>
<tr>
<th colspan="3"><input type="submit" name="Register" value="Register"></th>
</tr>
</table>
<div class="ButtonConfig">
<a class="button1" href="index2.php">User Login</a>
</div>
</form>  
</body>
</html>