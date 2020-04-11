<?php 
session_start();
if(isset($_SESSION['uid'])){

}
else{
    header('location: ../login.php');
}
?>
<?php 
include('header.php');
include('titleheader.php');
?><br><br>
 <form action="addstudent.php" method="post" enctype="multipart/form-data">
<table border="1" style="width:50%; background-color:#1DEFEF;" align="center">
<tr>
<th>Roll No.</th>
<td><input type="text" name="rollno" placeholder="Enter your Roll no." required></td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="fullname" placeholder="Enter your Name" required></td>
</tr>
<tr>
<th>City</th>
<td><input type="text" name="city" placeholder="Enter your city" required></td>
</tr>
<tr>
<th>Parents Contact no.</th>
<td><input type="text" name="contactno" placeholder="Enter your Parent's contact no." required></td>
</tr>
<tr>
<th>Standard</th>
<td> <input type="number" name="std" placeholder="Enter your standard" required></td>
</tr>
<tr>
<th>Image</th>
<td><input type="file" name="simg" required></td>
</tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
</table>
</form>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
    include('../dbcon.php');
    $rollno=$_POST['rollno'];
    $name=$_POST['fullname'];
    $city=$_POST['city'];
    $pcont=$_POST['contactno'];
    $std=$_POST['std'];
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$imagename");
    $qry="INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$rollno', '$name', '$city', '$pcont', '$std', '$imagename')";
    $run = mysqli_query($con,$qry);
    if($run)
    {
        ?>
        <script>
        alert('data inserted Successfully');
        </script>
        
    <?php
    
     }
     
}
?>