<?php
     session_start();
     if(!isset($_SESSION['first_name'])){
         header('location:../index.php');
     }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ec188ca56.js" crossorigin="anonymous"></script> 
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@402&display=swap" rel="stylesheet">
    <link href="../css/user_profile.css" rel="stylesheet" type="text/css" />

    <title>My Account</title>
</head>

<body>
<div class="mainclass">
        <div class="logo">
            <img src="../imgs/logoDR.png" alt="img not fount">
        </div>
        <nav>
            <a href="../index.php">home</a>
            <a href="#home">about</a>
            <a href="#home">services</a>
            <a href="#home">contact</a>
        </nav>
    </div>
    <div class="outer_main_div">

        <div class="inner_main_div">

            <div class="profile_header">
                <div class="home_icon">
                   <a href="../index.php"><i class="fas fa-home fa-2x" ></i></a> 
                </div>
                <div class="heading_text">
                    <h2> user profile</h2>
                </div>
            </div>
            <div class="profile_body">
                <div class="profile_intro">
                    <div class="profile_img">
                    <img src="../imgs/default-profile-picture1.jpg" alt="image not found">
                    </div>
                    <div class="user_name">
                        <h2> <?php echo "Hello, ".$_SESSION['first_name'];  ?> </h2>
                    </div>
                </div>
                <div class="user_details">
                    
                    <!-- row 1 -->
                    
                    <div class="detail_row">
                        <div class="row_detail_name">
                            Full Name :
                         </div>
                        <div class="row_detail_value">
                             <?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];  ?>
                        </div>
                    </div>
                    
                    <!-- row 2 -->
                    
                    <div class="detail_row">
                        <div class="row_detail_name">
                            Email :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['email_id']  ?>

                        </div>
                    </div>
                    
                    <!-- row 2 -->
                    

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Contact :
                        </div>
                        <div class="row_detail_value">
                           <?php echo  $_SESSION['contact'];  ?>

                        </div>
                    </div>

                    
                    <div class="detail_row">
                        <div class="row_detail_name">
                            Gender:
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['gender'];  ?>
                            
                        </div>
                    </div>
                    
                    <div class="detail_row">
                        <div class="row_detail_name">
                            Age :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['age']." year";  ?> 
                        </div>
                    </div>
                    
                    
                    <div class="detail_row">
                        <div class="row_detail_name">
                            Location :
                        </div>
                        <div class="row_detail_value">
                           <?php echo $_SESSION['city'];  ?>

                        </div>
                    </div>

                    
                    
       

                    <!-- row footer button -->

            
                    
                    
                    <div class="button_row">
                        <div class="appointment_btn">
                             <a href="../booked_appointment/patient_appointments.php" target=""><button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')">MY APPOINTMENT</button></a>

                            <!-- <input type="button" name="appointment" value="take appointment" />  -->
                        </div>
                        <div class="appointment_btn">
                             <a href="../appointment/appointment.php" target=""><button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')">MAKE AN APPOINTMENT</button></a>

                            <!-- <input type="button" name="appointment" value="take appointment" />  -->
                        </div>
                        <div class="logout_btn">
                        <a href="../login_signup/logout.php" target=""><button id="btnID2" onmousedown="changebtn('btnID2')" onmouseup="leavbtn('btnID2')">LOGOUT</button></a>
                            

                           <!-- <input type="button" name="logout" value="LOGOUT" />  -->
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        function changebtn(btnid) {
            document.getElementById(btnid).setAttribute("style", "background-color:rgba(83, 142, 252, 0.645);font-size: 14px;border-radius: 14px;");
        }
        function leavbtn(btnid) {
            document.getElementById(btnid).setAttribute("style", "background-color:rgba(0, 89, 255, 0.645);font-size: 14px;border-radius: 10px;");
        }
    </script>
</body>

</html>