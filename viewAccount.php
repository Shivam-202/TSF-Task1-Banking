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
     

    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card text-center mx-auto" style="width: 40rem;margin-top:0.5rem; ">
                      <div class="card-body">
                        <h3 class="card-title">Search Account</h3><hr>
                       
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                        
                        <div class="col-md-8 text-start mx-auto mb-2">
                            <input type="text" class="form-control" name="accnum" placeholder="Search Account Number" value="" required>
                        </div>
                      
                            <input class="btn btn-success" type="submit" name="submit" value="Search">           

                       </form>

                       <?php
                           include "connection.php";
                           
                         $getAccNum = $_POST['accnum'];

                          $sql = "SELECT * FROM customer WHERE Account_Number = '{$getAccNum}'";
                          $result = mysqli_query($conn,$sql);
                          if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                
                       ?>


                       <div class="input-group mb-2">
                          <span class="input-group-text"><b>Full Name</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['First_Name'] ." " .$row['Last_Name']; ?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text"><b>Father's Name</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['Fathers_Name']; ?>" readonly>
                        </div>
                   
                        <div class="input-group mb-3">
                          <span class="input-group-text"><b>Email ID</b></span>
                          <input type="email" aria-label="First name" class="form-control" value="<?php echo $row['Email_Id'];?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text"><b>Mobile Number</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['Mobile_Number'];?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text"><b>Account Number</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['Account_Number'];?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text"><b>Available Balance</b></span>
                          <input type="text" aria-label="First name" class="form-control" value=" <?php echo 'Rs. ' . $row['Balance'] . ' /-';?>" readonly>
                        </div>
                     
                        <div class="input-group mb-3">
                          <span class="input-group-text"><b>Gender</b></span>
                          <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['Gender'];?>" readonly>
                        </div>

                        <?php 
                           } 
                         
                        } 
                        else{
                            echo "<h1 style='color:red;text-align:center; margin-top:0rem;'>No Data Found!!</h1>";
                           }
                        
                        ?>
                      </div>
                   </div>
                </div>
                </div>
        </div>
    </section>
    


    <?php 
    //     }
    //  }                     
    ?>