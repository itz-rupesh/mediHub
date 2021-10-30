
            <!-- php code for login / register -->

<?php
session_start();
include '../connection.php';
if (isset($_POST['registration'])) {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $mobile = $_POST['contact_num'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    
    $encrypted_pwd = password_hash($pwd,PASSWORD_BCRYPT);
    // echo "$email , $password , $f_name , $l_name , $mobile , $gender , $city";
    $insertquery = " INSERT INTO user_data (email_id, pwd ,first_name,last_name,contact,gender,city,age) VALUES ('$email','$encrypted_pwd','$f_name','$l_name','$mobile','$gender','$city','$age') ";
    
  
    $res = mysqli_query($con,$insertquery);

    if ($res) {
    ?>
        <script>
            alert("data inserted !!");
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

    $email = $_POST['loginEmail'];
    $user_enterd_pwd = $_POST['loginPwd'];
    
    $email_search = " select * from user_data where email_id = '$email'";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $encrypted_pwd =$email_pass['pwd'];
        
        // storing all the data in session storage, after login  
        $_SESSION['first_name'] = $email_pass['first_name'];
        $_SESSION['last_name'] = $email_pass['last_name'];
        $_SESSION['email_id'] = $email_pass['email_id'];
        $_SESSION['contact'] = $email_pass['contact'];
        $_SESSION['gender'] = $email_pass['gender'];
        $_SESSION['city'] = $email_pass['city'];
        $_SESSION['age'] = $email_pass['age'];
        // $_SESSION['username'] = $email_pass['first_name'];

        // validation of password in case of password in database in encrypted
        $validation = password_verify($user_enterd_pwd,$encrypted_pwd);
        
        if($validation)
        {
            // $_SESSION['profile_btn']="./user_Profile/user_profile.php";
           ?>
                <script>
                   location.replace("../user_Profile/user_profile.php");
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

    // echo "$emaill  $passwordd";
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
    <!-- <?php
            session_start();
            ?> -->
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
                                <form action="./loginSignin.php" method="POST">
                                    <div class="form-group">
                                        
                                        <input type="text" name="email" id="mail_id" class="form-control" onchange="emailValidation()" placeholder="Email Address *"   required/>
                                        <i id="check_icon" class="fas fa-check-circle fa-lg"></i>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pwd" class="form-control" placeholder="Create Password *" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="f_name" class="form-control" placeholder="First Name *"  required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="l_name" class="form-control" placeholder="Last Name *" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="contact_num" minlength="10" maxlength="10" class="form-control" placeholder="contact number *" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="age" minlength="1" maxlength="3" class="form-control" placeholder="age *" required />
                                    </div>
                                    <div class="form-group">
                                        <p id="redio_btn">Select Gender :
                                            <input class="subButton" class="form-control" type="radio" value="male" name="gender" required> Male
                                            <input class="subButton" type="radio" value="female" name="gender" required> Female
                                            <input class="subButton" type="radio" value="other" name="gender" required> Other
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="Your City *"  required/>
                                    </div>

                                    <div class="form-group">
                                        <p id="redio_btn">
                                            <input class="subButton" type="checkbox" name="policy" checked required> I Agree to privacy/policy
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="registration" class="btnContactSubmit" value="SIGN-UP" />
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

