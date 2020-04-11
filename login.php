<?php
session_start();
if(isset($_SESSION['uid'])){
    header('location:admin/admindash.php');
}
?>
<!DOCTYPE>
<html>
<head>
<title>Login </title>
</head>
<body>
<h1 align="center">Admin Login</h1>
<form action="login.php" method="post">
<table  align="center" style="width:30%;">
<tr>
<td>Username</td><td><input type="text" name="username" required></td>
</tr>
<tr>
<td>Password</td><td><input type="password" name="password" required></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
</tr>

</table>

</form>




</body>

</html>
<?php 
include('dbcon.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $qry="SELECT * FROM `admin` WHERE `username` ='$username' AND `password`='$password';";
    $run=mysqli_query($con,$qry);
    $row=mysqli_num_rows($run);
    if($row<1)
    { ?>
        <script>alert('username and password does not exist');
        window.open('login.php','_self');
        </script>
        <?php
    }
else{
$data=mysqli_fetch_assoc($run);
$id=$data['id'];
$_SESSION['uid']=$id;
header('location:admin/admindash.php');
}

}
?>