<?php 
 include 'connec.php';
 $servername="localhost";
 $username="root";
 $password="";
 $db="yog";
 $conn=mysqli_connect($servername,$username,$password,$db);
 if($conn)
 {
    
    ?>
    <script>
    // alert("connection successfully");
    </script>
    <?php 
 }
 else{
        echo"not connected successfully";
 } 
 $expense_today =0;
 $yester_expense = 0;
 $yester_expense1 = 0;
 $yester_expense2 = 0;
 $yester_expense3 = 0;
 $yester_expense4 = 0;
 $yester_expense5 = 0;
 $total_sum=0;
$select_query="select * from expense_record";
$query= mysqli_query($conn,$select_query);
$nums=mysqli_num_rows($query);
if($nums>0)
{
    while($res=mysqli_fetch_array($query))
    { 

        $current_date = date('Y-m-d');
    
        $expense_date = date('Y-m-d',strtotime($res['date']));
        if($current_date == $expense_date){
        $expense_today +=$res['today_expense'];
        $total_sum += $expense_today;
        }
        else if($expense_date ==  date('Y-m-d',strtotime('-1 days '))){
           $yester_expense += $res['today_expense'];
           $total_sum += $yester_expense;
        }
        else if($expense_date == date('Y-m-d',strtotime('-2 days ')) ){
            $yester_expense1 += $res['today_expense'];
            $total_sum += $yester_expense1;
         }
         else if($expense_date == date('Y-m-d',strtotime('-3 days '))){
            $yester_expense2 += $res['today_expense'];
            $total_sum += $yester_expense2;
         }
         else if($expense_date == date('Y-m-d',strtotime('-4 days ')) ){
            $yester_expense3 += $res['today_expense'];
            $total_sum += $yester_expense3;
         }
         else if($expense_date == date('Y-m-d',strtotime('-5 days ')) ){
            $yester_expense4 += $res['today_expense'];
            $total_sum += $yester_expense4;
         }
         else if($expense_date == date('Y-m-d',strtotime('-6 days ')) ){
            $yester_expense5 += $res['today_expense'];
            $total_sum += $yester_expense5;
         }

  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="expense.css">
   
</head>
<body>

    <div>
        <h1>Weekly Spend</h1>
        <span id="weekly-spend"></span>
        <form method="POST" action="" class="form">
       <input type="text" name="expense" placeholder="enter expense">
       <input type="submit" name="sub"placeholder="submit">
       <a href="sel.php"> Click to see data </a>
        </form>
    
    </div>
<div id="date"> <span class="days" id="day-0"></span> <span class="days" id="day-1"></span> <span class="days" id="day-2"></span> <span id="day-3" class="days"></span> <span id="day-4" class="days"></span> <span id="day-5" class="days"></span> <span id="day-6" class="days"></span> </div>
<div> <h3>Transaction</h3><input type="button" value="+" class="but"><hr id="range"></hr> <span id="total-sum">Total Sum <?php echo"($total_sum)"?></span></div>
<script>
    var today = document.getElementById('day-6');
    var a=new Date();
    today.innerHTML = "<p class='spend'>"+<?php echo"($expense_today)"; ?>+ "<hr></hr></p><p class='week-date'>" +  a.getDate() + '/' + (a.getMonth()+1);
    var day5 = document.getElementById('day-5');
    day5.innerHTML ="<p class='spend'>"+<?php echo"($yester_expense)"; ?>+  "<hr></hr></p><p class='week-date'>" +   (a.getDate()-1)+ '/' + (a.getMonth()+1);
    var day4= document.getElementById('day-4');
    day4.innerHTML = "<p class='spend'>"+<?php echo"($yester_expense1)"?>+  "<hr></hr></p><p class='week-date'>" +  (a.getDate()-2)+ '/' + (a.getMonth()+1);
    var day3= document.getElementById('day-3');
    day3.innerHTML ="<p class='spend'>"+<?php echo "($yester_expense2)"?>+  "<hr></hr></p><p class='week-date'>" +  (a.getDate()-3)+ '/' + (a.getMonth()+1) + "</p>";
    var day2= document.getElementById('day-2');
    day2.innerHTML ="<p class='spend'>"+<?php echo "($yester_expense3)"?>+  "<hr></hr></p><p class='week-date'>" +  (a.getDate()-4)+ '/' + (a.getMonth()+1);
    var day1= document.getElementById('day-1');
    day1.innerHTML = "<p class='spend'>"+<?php echo"($yester_expense4)"?>+  "<hr></hr></p><p class='week-date'>" +  (a.getDate()-5)+ '/' + (a.getMonth()+1);
    var day0= document.getElementById('day-0');
    day0.innerHTML = "<p class='spend'>"+<?php echo "($yester_expense5)"?>+  "<hr></hr></p><p class='week-date'>" +  (a.getDate()-6)+ '/' + (a.getMonth()+1);
    
    </script>
     

</body>
</html>

