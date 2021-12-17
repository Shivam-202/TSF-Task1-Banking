<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>

    <link rel="stylesheet" href="styling.css">

     <!-- BootStrap CSS Link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body id="home">

    <?php include "header.php"; ?>
    <section style="background-image: linear-gradient(180deg, orange, white,green);
    height: 100%;">
   
        <div class="container-xl">
           <div class="row" >
              <div class="col-md-12 mx-auto mt-5 mb-4"> 
           
                 <table class="table table-dark table-hover table-bordered text-center">
        
                   <thead>
                    <?php
                       include "connection.php";
                       $sql = "SELECT * FROM customer";
                       $result = mysqli_query($conn,$sql) or die("Query Failed");
                       if(mysqli_num_rows($result) > 0){
                    ?>

                     <tr>
                        <th scope="col">id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Total Balance</th>
                        <th scope="col">Transfer Money</th>
                        <th scope="col">Action</th>
                     </tr>
                   </thead>
              
                   <tbody class="table table-info table-sm table-hover">
                   <?php 
                             while($row = mysqli_fetch_assoc($result)){
                    ?>
                     <tr>
                        <th scope="row"><?php echo $row['Id'] ?></th>
                        <td><?php echo $row['First_Name'] ?></td>
                        <td><?php echo $row['Last_Name'] ?></td>
                        <td><?php echo $row['Account_Number'] ?></td>
                        <td><?php echo $row['Mobile_Number'] ?></td>
                        <td><?php echo "Rs. " .$row['Balance'] . " /-" ?></td>
                        <td> 
                          <div class="col-md-12" >
                            <a class="btn btn-warning w-75 btn-sm" href="transfer.php?custumid=<?php echo $row['Id'];?>" role="button">Transfer</a>
                          </div>
                        </td>
                        <td> 
                          <div class="col-md-12" >
                            <a class="btn btn-danger w-100 btn-sm" href="delete.php?custumid=<?php echo $row['Id'];?>" role="button">Delete</a>
                          </div>
                        </td>
                     </tr>
                     
<?php } ?>
                   
 </tbody>
                   <?php 
                     }
                     else{
                       echo "<h1 style='color:blue;text-align:center; margin-top:12rem;'>Customer's List is Empty, Please Add Coustomer's</h1>";
                     }
                   
                   ?>
              </table>
          </div>
        </div>
    </div>
</section>


</body>
</html>