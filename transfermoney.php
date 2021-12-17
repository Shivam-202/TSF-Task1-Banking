<?php include "header.php"; ?>

<?php

       include "connection.php";

        $accountnum = mysqli_real_escape_string($conn,$_POST['accNumber']);
        $amount = mysqli_real_escape_string($conn,$_POST['amount']);
        $pass1 = mysqli_real_escape_string($conn,$_POST['password1']);
        $pass2 = mysqli_real_escape_string($conn,$_POST['password2']);
        $getid = $_GET['custumid'];

       $sql = "SELECT * FROM customer WHERE Account_Number = '$accountnum'";
       $result = mysqli_query($conn,$sql) or die("Query Failed");

       $sql1 = "SELECT * FROM customer WHERE Id = '$getid'";
       $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
       $row1 = mysqli_fetch_assoc($result1);

       $amtcalculate = $row1['Balance'];
       $PinCode =  $row1['Pin_Code'];

       if($pass1 == $pass2){
        if($pass1 == $PinCode){
          if($amtcalculate > $amount){
             if(mysqli_num_rows($result) > 0 && $row1['Account_Number'] != $accountnum ){
                while($row = mysqli_fetch_assoc($result)){
                   $sql2 = "UPDATE customer SET Balance = ('{$row1["Balance"]}' - $amount) WHERE Id = $getid";
                   mysqli_query($conn,$sql2);

                   $sql3 = "UPDATE customer SET Balance = ('{$row["Balance"]}' + $amount) WHERE Account_Number = '$accountnum'";
                   mysqli_query($conn,$sql3);

                   echo "<h1 style='color:Green;text-align:center; padding-top:12rem;'>Amount Transfer Successfully!! </h1>" . "<center><a type='button' class='btn btn-info' href='view.php?custumid={$row1['Id']}'>View Details</a></center>";
                 
               }    
      
            } 
            else{
               echo "<h1 style='color:red;text-align:center; padding-top:12rem;'>Account Number is Not Exist!!</h1>";
            }  
         }
         else{
             echo "<h1 style='color:red;text-align:center; padding-top:12rem;'>Insufficiant Amount!!</h1>";
         }
       }
    
    else{
        echo "<h1 style='color:red;text-align:center; padding-top:12rem;'>Pin Code Is Wrong!!</h1>";
    }
       }
       else{
        echo '<script type="text/javascript">';
        echo 'alert("Password must be same!!");';
        echo '</script>';
       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    
    <link rel="stylesheet" href="styling.css">
      <!-- BootStrap CSS Link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body id="home">


</body>
</html>