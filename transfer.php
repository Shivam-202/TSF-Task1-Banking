<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>

    <link rel="stylesheet" href="styling.css">
    <script src="captcha.js"></script>
     <!-- BootStrap CSS Link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body>
    <?php include "header.php"; ?>
         
         <?php
                       include "connection.php";

                       $getid = $_GET['custumid'];

                       $sql = "SELECT * FROM customer WHERE Id = $getid";
                       $result = mysqli_query($conn,$sql) or die("Query Failed");
                       if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)){
                    ?>

    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                   <div class="card text-center mx-auto" style="width: 23rem;margin-top:5rem; ">
                      <div class="card-body">
                        <h3 class="card-title">Transfer From</h3><hr>
                        
                       

                      
                        <div class="input-group mb-4">
                          <span class="input-group-text"><b>Full Name</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['First_Name'] ." " .$row['Last_Name']; ; ?>" readonly>
                        </div>

                        <div class="input-group mb-4">
                          <span class="input-group-text"><b>Email ID</b></span>
                          <input type="email" aria-label="First name" class="form-control" value="<?php echo $row['Email_Id'];?>" readonly>
                        </div>

                        <div class="input-group mb-4">
                          <span class="input-group-text"><b>Mobile Number</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['Mobile_Number'];?>" readonly>
                        </div>

                        <div class="input-group mb-4">
                          <span class="input-group-text"><b>Account Number</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['Account_Number'];?>" readonly>
                        </div>

                        <div class="input-group mb-4">
                          <span class="input-group-text"><b>Available Balance</b></span>
                          <input type="text" aria-label="First name" class="form-control" value=" <?php echo 'Rs. ' . $row['Balance'] . ' /-';?>" readonly>
                        </div>
                     
                      </div>
                   </div>
                </div>

                <div class="col-md-2">
                    <img src="arrow.png" style="height:80px; width:180px; margin-top:15rem;" alt="">
                </div>

                <div class="col-md-5">
                   <div class="card text-center mx-auto" style="width: 23rem;margin-top:2rem; ">
                      <div class="card-body">
                        <h3 class="card-title">Transfer To</h3><hr>
                        
                        <form action="transfermoney.php?custumid=<?php echo $row['Id'];?>" method="post">
                       
                        <div class="col-md-12 text-start mb-4">
                                <label for="lname" class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="accNumber" value="" placeholder="Enter Account Number" >
                        </div>
                        
                        <div class="col-md-12 text-start mb-4">
                                <label for="lname" class="form-label">Enter Amount</label>
                                <input type="text" class="form-control" name="amount" value="" placeholder="Enter Account Number" >
                        </div>

                        <div class="col-md-12 text-start mb-4">
                            <label for="lname" class="form-label">Enter Your Password</label>
                            <input type="password" class="form-control" name="password1" value="" placeholder="Enter Password" >
                        </div>

                        <div class="col-md-12 text-start mb-4">
                           <label for="lname" class="form-label">Re-Enter Your Password</label>
                           <input type="password" class="form-control" name="password2" value="" placeholder="Re-Enter Password" >
                        </div>
                   
                        <input class="btn btn-primary w-75 btn-sm" type="submit" name="submit" value="Click To Proceed">
                       
                      </form>
                    
                       
                </div>
               </div>
             </div>
          </div>
        </div>
    </section>

    <?php 
        }
     }                     
    ?>








</body>

<!-- BootStrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
    crossorigin="anonymous"></script>
</html>