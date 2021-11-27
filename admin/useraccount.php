<?php
include 'config.php';
session_start();
$UserID = $_SESSION['UserID'];

if (!isset($_SESSION['UserID'])) {
        header('Location: ../index.php');
}

$id99=$_GET['id'];
$Name99=$_GET['A'];
$UserID99=$_GET['B'];
$verify99=$_GET['C'];
$Alock99=$_GET['D'];

    if ($verify99==1) {
        $msg1="<div class='bg-success text-white'>Verified</div>";
    }else{
        $msg1="<div class='bg-danger text-white'>Not Verified</div>";
    }

    if ($Alock99==0) {
        $msg2="<div class='bg-success text-white'>NO</div>";
    }else{
        $msg2="<div class='bg-danger text-white'>YES</div>";
    }

?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>Access | Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
                  background: #fc4a1a;
                  background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);
                  background: linear-gradient(to right, #f7b733, #fc4a1a);
            }
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #007bff;">
      <div class="navbar-brand text-warning font-weight-bolder">
    <img src="https://ums.lpu.in/images/lpu_logo.png" width="35" height="35" class="d-inline-block align-top" alt="">Library Management System
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <div class="nav-item nav-link active font-weight-bolder text-dark"><span class="badge badge-pill badge-warning"><?php echo "[ Hey ".$UserID; ?> ]</span><span class="sr-only">(current)</span>
      </div>
    </div>
  </div>
</nav>   
   

<div class="container p-3 my-3 bg-primary text-white">
<h1 class="text-center">Access Panel</h1>

          <form action="" method="post"> 
          <table class="table table-dark table-hover">
          <tbody>
          <tr>
          <th>Name :</th><td><input type='text' name='Name' class='form-control' style="background-color: #007bff;" value='<?php echo "$Name99"?>' readonly></td>
          </tr>
          <tr>
          <th>User ID :</th><td><input type='text' name='UserID' class='form-control' style="background-color: #007bff;" value='<?php echo "$UserID99"?>' readonly></td>
          </tr>
          <tr>
          <th>Account Status : <?php echo $msg1 ?></th>
          <td><select name="verify" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
          <option value="1">Verified</option>
          <option value="0">Not Verified</option>
          </select>
          </td>
          </tr>
          <tr>
          <th>Blocked : <?php echo $msg2 ?></th>
          <td><select name="Alock" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
          <option value="1">YES</option>
          <option value="0">NO</option>
          </select>
          </td>
          </tr>
          <tr>
          <th colspan="2"><div class="d-flex justify-content-center">
          <input class="btn btn-outline-warning" type="submit" name="Save" value="SAVE">
          </div></th>
          </tr>
          </tbody>
          </table>
          </form>

<?php 
$id99=$_GET['id'];
if (isset($_POST['Save'])) {
$Name = mysqli_real_escape_string($con,$_POST['Name']);
$UserID = mysqli_real_escape_string($con,$_POST['UserID']);
$verify = mysqli_real_escape_string($con,$_POST['verify']);
$Alock = mysqli_real_escape_string($con,$_POST['Alock']);

echo $Name;echo $verify;echo $Alock;

$query = "UPDATE user SET Name='$Name',UserID='$UserID',verify='$verify',Alock='$Alock' WHERE ID='$id99'";
$data = mysqli_query($con,$query);
if ($data) {
    echo '<script>alert("Record Updated Successfully")</script>';
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= https://samratsarkar.in/minor/main/admin/userlist">
    <?php
}else{
          echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Error Unable to Edit</th>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 
}

}
?>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

