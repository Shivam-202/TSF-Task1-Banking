<?php     
      
       $randitem = array('A','B','s','t','u','v','w','C','D','E','F','G','H','I','3','4',5,'x','y','z','6','7','J','K','L','M','N','O','P','Q','d','e','f','g','h','i','j','R','S','T','U','k','l','m','n','o','p','q','r','V','W','X','Y','Z','0','1','2','8','9','a','b','c');
       $index = array_rand($randitem, 6);
       $randomNum = $randitem[$index[0]] . $randitem[$index[1]] . $randitem[$index[2]] . $randitem[$index[3]] . $randitem[$index[4]] . $randitem[$index[5]];
    
       $cookie_name = "captch";
       $cookie_value =  $randomNum;
       
       setcookie($cookie_name,$cookie_value,time()+(600),"/");

    
?>

<?php
    if(isset($_POST['save'])){
        include "connection.php";
        


       $fname = mysqli_real_escape_string($conn,$_POST['fname']);
       $lname = mysqli_real_escape_string($conn,$_POST['lname']);
       $fathername = mysqli_real_escape_string($conn,$_POST['fathername']);
       $mobilenumber = mysqli_real_escape_string($conn,$_POST['mobilenumber']);
       $mail = mysqli_real_escape_string($conn,$_POST['mail']);
       $accountnumber = mysqli_real_escape_string($conn,$_POST['accountnumber']);
       $pincode = mysqli_real_escape_string($conn,$_POST['pincode']);
       $repincode = mysqli_real_escape_string($conn,$_POST['repincode']);
       $genders = mysqli_real_escape_string($conn,$_POST['genders']); 
       $balance = mysqli_real_escape_string($conn,$_POST['balance']);
       $captchar =mysqli_real_escape_string($conn,$_POST['captchar']);
      
       $randvalue =  $_COOKIE[$cookie_name];
       

       if($pincode == $repincode){

        if($randvalue == $captchar){
       $sql = "INSERT INTO customer (First_Name,Last_Name,Fathers_Name,Mobile_Number,Email_Id,Account_Number,Pin_Code,Gender,Balance)
               VALUES ('{$fname}','{$lname}','{$fathername}','{$mobilenumber}','{$mail}','{$accountnumber}','{$pincode}','{$genders}','{$balance}')";
       
       if(mysqli_query($conn,$sql)){
             header("Location: users.php"); 
        }else{
            echo '<script>';
            echo 'alert("Customer Added Unsuccessfully!!")';
            echo '</script>';
     }
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("Captcha Wrong, Enter same Captcha!!");';
        echo '</script>';
    }
  }
    else{
      
        echo '<script type="text/javascript">';
        echo 'alert("Password must be same!!");';
        echo '</script>';
       
       
        
    
     }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>

    <link rel="stylesheet" href="styling.css">

     <!-- BootStrap CSS Link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body>



<?php include "header.php"; ?>

    <section id="home">
        <div class="container-fluid">
            <div class="row mx-auto" >
            <!-- ms-5 ps-5 -->
                <div class="col-md-12 mt-3 mx-auto"> 
                    <h1 class="text-center">Open New Account In SKY BANK</h1>
        
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="row g-2 mt-3" method="post">
                            
                              <div class="col-md-3 mx-auto ms-4">
                            
                                <label for="fname" class="form-label">First name</label>
                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="" required>
                            </div>
                            <div class="col-md-3 mx-auto ms-4" >
                           
                                <label for="lname" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" required>
                            </div>
                            <div class="col-md-3 mx-auto ms-4 mb-4">
                          
                                <label for="lname" class="form-label">Father's name</label>
                                <input type="text" class="form-control" name="fathername" value="" placeholder="Father's Name" required>
                            </div>

                            <div class="col-md-3 col-md-3 mx-auto ms-4">
                                <label for="lname" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="mobilenumber" value="" placeholder="Mobile Number" required>
                            </div>
                            <div class="col-md-3 col-md-3 mx-auto ms-4">
                                <label for="mail" class="form-label">Email Id</label>
                                <input type="email" class="form-control" name="mail" placeholder="Email" required>
                            </div>
                            <div class="col-md-3 col-md-3 mx-auto ms-4 mb-4">
                                <label for="lname" class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="accountnumber" value="" placeholder="Account Number" required>
                            </div>
                            <div class="col-md-3 col-md-3 mx-auto ms-4">
                                <label for="lname" class="form-label">Create Pin Code</label>
                                <input type="password" class="form-control" name="pincode" value="" placeholder="Enter 4 Digit Pin Code" required>
                            </div>
                            <div class="col-md-3 col-md-3 mx-auto ms-4">                           
                                  <label for="lname" class="form-label">Re-Enter Pin Code</label>
                                <input type="password" class="form-control" name="repincode" value="" placeholder="Re-Enter 4 Digit Pin Code" required>
                            </div>

                            <div class="col-md-3 mx-auto ms-4 mb-4">                           
                                <label class="form-label ">Gender :</label>
                                <div class="form-check-inline" style="margin-top:-5px">
                                  <span class="ps-2">
                                    <input type="radio" class="form-check-input" id="male" name="genders" value="Male">
                                    <label for="male" class="form-check-label">Male</label>
                                  </span>
                                  <span class="ps-2">
                                    <input type="radio" class="form-check-input" id="female" name="genders"
                                        value="FeMale">
                                    <label for="female" class="form-check-label">Female</label>
                                  </span>
                                  <span class="ps-2">
                                    <input type="radio" class="form-check-input" id="other" name="genders"
                                        value="Other">
                                    <label for="other" class="form-check-label">Other</label>
                                  </span>
                                 </div>
                            </div>

                            <div class="col-md-5 mx-auto ms-4 mb-4">
                                <label for="lname" class="form-label">How Many Rs. with You want to open Account??</label>
                                <input type="text" class="form-control" name="balance" value="" placeholder="Enter Amount" required>
                            </div>
                         
                            <div class="col-md-2 mx-auto ms-4">
                            <label for="lname" class="form-label">Captcha</label>
                                <input type="text" id="capch" class="form-control text-center bg-dark" style="color:yellow; padding-top:0px; padding-bottom:0px; font-size:1.5rem; font-weight:600; letter-spacing: 5px;" value="<?php echo  $randomNum; ?>" readonly>
                            </div>
                            <div class="col-md-2 mx-auto ms-4 mb-4">
                                <label for="lname" class="form-label">Enter Captcha</label>
                                <input type="text" id="entcapch" class="form-control w-100" name="captchar" placeholder="Enter Captcha" required>
                            </div>

                        
                            <div class="col-md-4 mx-auto mb-5">
                                <input type="submit" class="btn btn-primary w-100" name="save" value="Open Account" > 
                               
                            </div>
                                  
                         
                        </form>

                    
                </div>
            </div>
        </div>
    </section>

   
</body>


<!-- BootStrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
    crossorigin="anonymous"></script>

</html>