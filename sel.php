<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            border:2px solid black;
            display:inline-block;
            background-color:yellowgreen;
            position:relative;
            left:48%;

        }
        table thead tr th{
            border:4px solid black;
            background-color:pink;
            color:black;
          
            
        }
        
        table tbody tr td{
            /* border:4px solid black; */
            background-color:yellowgreen;
            color:black;
            width:50%;
        }
    .tabl{
            
            border:2px solid red;
            width:700px;
            height:auto;
            position:relative;
            left:30%;
    }
    

        </style>
</head>
<body>
    <div class="heading">
        <h1> EXPENSE </h1>
    </div>
    <div class="tabl">
        <table cellpadding="2" cellspacing="2">
            <thead>
                <tr>
                 <th align="left">ID&nbsp;</th>
                     <th align="left" >DATE&nbsp;</th>
                 <th>Expense&nbsp;</th> 
                </tr>
             </thead>
             <tbody>
                <?php
                include 'connec.php';
                $select_query="select * from expense_record";
                $query= mysqli_query($conn,$select_query);
                $nums=mysqli_num_rows($query);
                if($nums>0)
                {
                    while($res=mysqli_fetch_array($query))
                    {
                        ?>
                        <tr>
                            <td> <?php echo $res['id'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> <?php echo $res['date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> <?php echo $res['today_expense'];?>&nbsp; </td>
                    </tr>
                    <?php
                    }
                
                }
                
                   
                 ?>
                    </div>
                    </tbody>
                    </table>
                    </body>
                    </html>
       
