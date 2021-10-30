<?php
session_start();
if (!isset($_SESSION['first_name'])) {
    header('location:../index.php');
}

$nav_bnt_name = "Dr ".$_SESSION['first_name'];

if (!$_SESSION['first_name']) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="../css/user_profile.css" rel="stylesheet" type="text/css" />
    <script src="../js/dr_profile.js"></script>
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
                    <a href="../index.php"><i class="fas fa-home fa-2x"></i></a>
                </div>
                <div class="heading_text">
                    <h2> user profile</h2>
                </div>
            </div>
            <div class="profile_body">
                <div class="profile_intro">
                    <div class="profile_img">
                        <?php echo "<img src='../login_signup/upload_img/" . $_SESSION['profile'] . "'>"; ?>
                    </div>
                    <div class="user_name">
                        <h2> <?php echo "Hello, Dr. " . $_SESSION['first_name'];  ?> </h2>
                    </div>
                </div>
                <div class="user_details">

                    <!-- row 1 -->

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Full Name :
                        </div>
                        <div class="row_detail_value">
                            <?php echo "Dr. " . $_SESSION['first_name']; ?>
                        </div>
                    </div>

                    <!-- row 2 -->

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Email :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['email']  ?>

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
                            Gender :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['gender'];  ?>

                        </div>
                    </div>

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Location :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['location'];  ?>

                        </div>
                    </div>

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Experience :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['experience'] . " year";  ?>
                        </div>
                    </div>

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Degree :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['degree'] . " year";  ?>
                        </div>
                    </div>

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Specialist :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['tag_name'] . " year";  ?>
                        </div>
                    </div>

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Office Location :
                        </div>
                        <div class="row_detail_value">
                            <?php echo $_SESSION['office_location'];  ?>
                            
                        </div>
                    </div>

                    <div class="detail_row">
                        <div class="row_detail_name">
                            Meeting Link :
                        </div>
                        <div class="row_detail_value" id="meet_link_div">
                            <a id= "meet_link" href=<?php echo $_SESSION['meeting_link']; ?> target="_blank"><?php echo $_SESSION['meeting_link']; ?></a>
                            &nbsp;<i  onclick="changeLink(<?php echo $_SESSION['doctor_id'] ?>)" class="fas fa-edit fa-sm"></i>
                        </div>
                    </div>




                    <!-- row footer button -->




                    <div class="button_row">
                        <div class="appointment_btn">
                            <a href="../booked_appointment/dr_appointments.php" target=""><button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')">BOOKED APPOINTMENTS</button></a>

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