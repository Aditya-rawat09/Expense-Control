<?php
 $servername="localhost";
 $username="root";
 $password="";
 $db="yog";
 $conn=mysqli_connect($servername,$username,$password,$db);
 if($conn)
 {
    
    ?>
    <script>
    alert("connection successfully");
    </script>
    <?php 
 }
 else{
        echo"not connected successfully";
 } 
 if(isset($_POST['sub']))
    {
       $expense=$_POST['expense'];
       $sql="INSERT INTO `expense_record`(id ,date,today_expense) VALUES (NULL , now(),'$expense')";
       $res = mysqli_query($conn,$sql);
       if ($res)
       {
        echo"Details submitted Successfully!!";
    } 
    else
     {
        echo"Details not submitted Successfully!!";
    }
    mysqli_close($conn);
}
