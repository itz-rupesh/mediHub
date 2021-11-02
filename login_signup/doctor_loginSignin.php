
            <!-- php code for login / register -->

<?php
session_start();
include '../connection.php';
$msg="";
if (isset($_POST['registration'])) {

    $d_name = $_POST['D_F_name']." ".$_POST['D_L_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $mobile = $_POST['contact_num'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $exp =$_POST['experience'];
    $degree_name =$_POST['degree_name'];
    $tag__name =$_POST['tag__name'];
    $office_location =$_POST['office_location'];
    $meeting_link =$_POST['meeting_link'];
    $description =$_POST['description'];
    // $myprofile =$_POST['myprofile'];

    // the path to store the uploaded image
    $target = "upload_img/".basename($_FILES['myprofile']['name']);
    
    //geting image from form data
    $image = $_FILES['myprofile']['name'];
 
    // encrypting password
    $encrypted_pwd = password_hash($pwd,PASSWORD_BCRYPT);
    
    // echo "<img src=\".$myprofile[].\" alt=\"error\" ";
    $insertquery = " INSERT INTO doctor_data (doctor_name, contact, email, location, experience ,gender,degree,description,office_location, meeting_link, tag_name,password,profile) 
            VALUES ('$d_name','$mobile','$email','$city','$exp','$gender','$degree_name','$description','$office_location','$meeting_link','$tag__name','$encrypted_pwd','$image')";
    
    $res = mysqli_query($con,$insertquery);
    // move the uploaded image into the folder : upload_img
   
     if(move_uploaded_file($_FILES['myprofile']['tmp_name'],$target)){
         ?>
         <script>
            alert("done");
         </script>
       <?php
     }
     else{
        ?>
           <script>
            alert("not done");
         </script>
          <?php
     }
     

    if ($res) {
    ?>
        <script>
            alert("data inserted successfully");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("data not inserted !!");
        </script>
   <?php

    }
}

else if(isset($_POST['loginform'])) {
    
    // if(!isset($_SESSION['first_name'])){
    //     // session_destroy();
    //     $_SESSION = array();
    //     // header('location:../index.php');
    // }

    $email = $_POST['loginEmail'];
    $user_enterd_pwd = $_POST['loginPwd'];
    
    $email_search = " select * from doctor_data where email = '$email'";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $encrypted_pwd =$email_pass['password'];
        
      
        
        
        // validation of password in case of password in database in encrypted
        $validation = password_verify($user_enterd_pwd,$encrypted_pwd);
        
        if($validation)
        {
            if(!isset($_SESSION['first_name'])){
                $_SESSION = array();
                // session_destroy();                          
                // // session_reset();
                // session_start();
                // header('location:../index.php');
            }
             // storing all the data in session storage, after login  
            $_SESSION['doctor_id']= $email_pass['doctor_id'];
            $_SESSION['first_name'] = $email_pass['doctor_name'];
            $_SESSION['contact'] = $email_pass['contact'];
            $_SESSION['email'] = $email_pass['email'];
            $_SESSION['location'] = $email_pass['location'];
            $_SESSION['experience'] = $email_pass['experience'];
            $_SESSION['gender'] = $email_pass['gender'];
            $_SESSION['degree'] = $email_pass['degree'];
            $_SESSION['description'] = $email_pass['description'];
            $_SESSION['office_location'] = $email_pass['office_location'];
            $_SESSION['meeting_link'] = $email_pass['meeting_link'];
            $_SESSION['tag_name'] = $email_pass['tag_name'];
            $_SESSION['profile'] = $email_pass['profile'];  // profile image
            

           ?>
                <script>
                   location.replace("../user_Profile/dr_profile.php");
                </script>
           <?php
        }
        else{
            ?>
            <script>alert("password incorrect !!!");</script>
            <?php
        }

    }
    else{
        ?>
        <script>alert(" Invalid Email !! ");</script>
        <?php
    }

}
            
?>

                   <!-- *********************** html code *******************************  -->
<!DOCTYPE html>
<html>
<head>
     <?php include 'links.php'; ?>
    <title>MediHub-login/sign-up</title>
</head>

<body>

    <div class="container register">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#sign-up" role="tab" aria-controls="profile" aria-selected="false">REGISTER</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-align form-new" id="login" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Enter Login Details</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="loginEmail" class="form-control" placeholder="Login ID*" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="loginPwd" class="form-control" placeholder="Your Password *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="loginform" class="btnContactSubmit" value="Login" required/>
                                        <a href="ForgetPassword.php" class="btnForgetPwd" value="Login">Forget Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show text-align form-new" id="sign-up" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Create an Account</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form action="./doctor_loginSignin.php" method="POST" enctype="multipart/form-data">
                                
                                    <div class="form-group">
                                        <input type="text" name="D_F_name" class="form-control" placeholder="First Name *"  required/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" name="D_L_name" class="form-control" placeholder="Last Name *" required/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" name="email" id = "mail_id" class="form-control" onchange="emailValidation()" placeholder="Email Address *"   required/>
                                        <i id="check_icon" class="fas fa-check-circle fa-lg"></i>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="pwd" class="form-control" placeholder="Create Password *" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="contact_num" minlength="10" maxlength="10" class="form-control" placeholder="Contact Number *" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="Your City *"  required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="age" minlength="2" maxlength="2" class="form-control" placeholder="Age *" required />
                                    </div>

                                    <div class="form-group">
                                        <p id="redio_btn">Select Gender :
                                            <input class="subButton" class="form-control" type="radio" value="male" name="gender" required> Male
                                            <input class="subButton" type="radio" value="female" name="gender" required> Female
                                            <input class="subButton" type="radio" value="other" name="gender" required> Other
                                        </p>
                                    </div>

                                    <!-- ******************* -->

                                    <div class="form-group">
                                        <input type="number" name="experience" minlength="1" maxlength="3" class="form-control" placeholder="Year of Experienca *" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="degree_name" class="form-control" placeholder="Degree(s) *" required/>
                                    </div>
                                    


                                    <div class="form-group">
                                        <select class="form-control" id="tag_name_field" name="tag__name" onchange="show_doctors_name(this.value)" required>
                                            <option class="hidden" value="" selected disabled>Specialist *</option>
                                            <?php
                                            $query1 = "select * from tag_table";
                                            $res1 = mysqli_query($con, $query1);
                                            while ($rows = mysqli_fetch_array($res1)) {
                                            ?>
                                                <option value="<?php echo $rows['tag_name']; ?>"><?php echo $rows['tag_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="office_location" name="office_location" placeholder="Office Location *" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="meeting_link" name="meeting_link" placeholder="Online Meeting link *" required />
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Description * " style="resize: none;" minlength="3" maxlength="300" rows="5" cols="10" value="" required></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                            <label for="myprofile" style="color: white;">Select Profile Picture (Only .jpg/.jpeg/.png) :</label>  
                                            <input type="file" class="form-control" id="myprofile" name="myprofile"  placeholder="Office Location *" accept="image/png,image/jpeg,image/jpg" required />
                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <p id="redio_btn">
                                            <input class="subButton" type="checkbox" name="policy" checked required> I Agree to privacy/policy
                                        </p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" name="registration" class="btnContactSubmit" value="SIGN-UP" />
                                        <input type="reset" name="reset" class="btnContactReset" value="RESET" />
                                        <!-- <a href="ForgetPassword.php" class="btnForgetPwd" value="Login">Forget Password?</a> -->
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

