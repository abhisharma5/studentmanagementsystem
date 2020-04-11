<!DOCTYPE>
<html>
<head>
<title>Student Management System</title>
</head>
<body>
<h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to the Student Management System</h1>
<form method="post" action="index.php">
<table align="center" style="width:30%;" border="1">
<tr>
<td colspan="2" align="center">Student Information</td>
</tr>
<tr>
<td align="left">Choose Standard</td>
<td>
<select name="std" required>
<option values="1">1st</option>
<option values="2">2nd</option>
<option values="3">3rd</option>
<option values="4">4th</option>
<option values="5">5th</option>
<option values="6">6th</option>
</select>
</td>
</tr>
<tr>
<td align="left">Enter roll no.</td>
<td>
<input type="text" name="rollno" required>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
</tr>
</table>
</form>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
    $standard=$_POST['std'];
    $rollno=$_POST['rollno'];
    include('dbcon.php');
    $sql="SELECT * FROM `student` WHERE `rollno`='$rollno' AND `standard`='$standard'";
    $run=mysqli_query($con,$sql);
    if(mysqli_num_rows($run)>0)
    {
     $data=mysqli_fetch_assoc($run);
     ?>
      <table border="1" align="center" style="width:40%">
      <tr>
      <th colspan="3">Student Details</th>
      </tr>
      <tr>
      <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>"  style="max-height:200px; max-width:500px;"/></td>
      <th>Roll No.</th>
      <td><?php echo $data['rollno']; ?></td>
      </tr>
      <tr>
      <th>Name</th>
      <td><?php echo $data['name']; ?></td>
      </tr>
      <tr>
      <th>Standard</th>
      <td><?php echo $data['standard']; ?></td>
      </tr>
      <tr>
      <th>Parents contact no.</th>
      <td><?php echo $data['pcont']; ?></td>
      </tr> 
      <tr>
      <th>City</th>
      <td><?php echo $data['city']; ?></td>
      </tr>
      </table>


     <?php
    }
    else{
        echo "<script>
        alert('No student Found');
        </script>";
    }
}
?>