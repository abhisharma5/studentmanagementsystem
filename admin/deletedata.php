<?php 
include('../dbcon.php');
$rollno=$_POST['rollno'];
    $name=$_POST['fullname'];
    $city=$_POST['city'];
    $pcont=$_POST['contactno'];
    $std=$_POST['std'];
    $id=$_POST['sid'];  
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$imagename");
$qry="DELETE FROM `student` WHERE `student`.`id`=$id";        
    $run = mysqli_query($con,$qry);
    if($run == true)
    {
      ?>
        <script>
        alert('deleted data Successfully');
        window.open('deletestudent.php?sid=<?php echo $id; ?>','_self');
        </script>
        
    <?php
    
     }
     ?>