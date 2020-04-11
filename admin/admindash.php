<?php 
session_start();
if(isset($_SESSION['uid'])){

}
else{
    header('location: ../login.php');
}
?>
<?php 
include('titleheader.php');
?>
<!DOCTYPE>
<html> 
<head>
<title>Admin</title>
</head>
<body>
<div class="dashboard">
 <table style="width:50%" align="center">
 <tr>
 <td>1.</td><td><a href="addstudent.php">Add Student Details</td>
 </tr>
 <tr>
 <td>2.</td><td><a href="updatestudet.php">Update Student Details</td>
 </tr>
 <tr>
 <td>3.</td><td><a href="deletestudent.php">Delete Student Details</td>
 </tr>
 </table>

</div>




</body>