<?php

      session_start();
      if(isset($_SESSION['first_name'])){
          $menu_btn_text= "Hello ".$_SESSION['first_name'];
        //   $menu_btn=$_SESSION['profile_btn'];
          $menu_btn="./user_Profile/user_profile.php";
          $appoint_btn="./appointment/appointment.php";
        }
        else{
            $menu_btn_text=" LOGIN / SIGNUP";
            $menu_btn="./login_signup/loginSignin.php";
            $appoint_btn="./login_signup/loginSignin.php";
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediHub.com</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!--  below link is font awesome link -->
    <script src="https://kit.fontawesome.com/1ec188ca56.js" crossorigin="anonymous"></script> 
    <!-- ********************** -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@402&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
</head>

<body>
    <!-- header start -->
    <header>
        <div class="mainclass">
            <div class="logo">
                <img src="imgs/logoDR.png" alt="img not fount">
            </div>
            <nav>
                <a href="#home">home</a>
                <a href="#home">about</a>
                <a href="#home">services</a>
                <a href="#home">contact</a>
            </nav>
            <div class="helpbtn">
                <a href=<?php echo $menu_btn?> target=""> <button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')"><i  class="fas fa-user-circle fa-lg"></i>&nbsp;&nbsp;<?php echo $menu_btn_text; ?></button></a>
            </div>
        </div>
        <main>
            <section class="left_sec">
                <h3>We Are Here For Your Care</h3>
                <h1>Book Appointment With Doctors Easily</h1>
                <p>We are here for your care 24/7 Any help Just call us</p>
                <a href=<?php echo $appoint_btn?> target=""><button id="btnID2" onmousedown="changebtn('btnID2')" onmouseup="leavbtn('btnID2')">MAKE AN APPOINTMENT</button></a>
            </section>
            <section class="right_sec">
                <figure>
                    <img id="img12" src="imgs/output-onlinepngtools (1).png" alt="img not found">
                </figure>
            </section>
        </main>
    </header>
    <!-- header end -->
    <div class="doctor_login_section">
            <div class="left_dr_sec">
                       <img id="dr_img_2" src="./imgs/img_drr.jpg" alt="image not found">
            </div>
            <div class="right_dr_sec">
                <div class="insider_right_dr_sec">
                    <h1>Are you Doctor?</h1>
                    <h3>join our business with easy sign-up/login</h3>
                    <a href="./login_signup/doctor_loginSignin.php" target=""><button id="btnID3" onmousedown="changebtn('btnID3')" onmouseup="leavbtn('btnID3')"><i class="fas fa-sign-in-alt fa-lg"></i>&nbsp;&nbsp;JOIN US !!</button></a>
     
                </div>
                    
            </div>
    </div>
   
    <!-- footer start -->
    <footer>
        <div class="mainfooter">
            <div class="list1">
                <ul>
                    <li>
                        <h4>MadiHUB</h4>
                    </li>
                    <li><a href="#home">About Us</a></li>
                    <li><a href="#home">Blog</a></li>
                    <li><a href="#home">Pricing</a></li>
                    <li><a href="#home">Careers</a></li>
                    <li><a href="#home">How it Works</a></li>
                    <li><a href="#home">What We Treat</a></li>
                </ul>
            </div>
            <div class="list2">
                <ul>
                    <li>
                        <h4>BUSSINESS</h4>
                    </li>
                    <li><a href="#home">For Business</a></li>
                    <li><a href="#home">Business Blog</a></li>
                    <li>
                        <h4>LEGAL</h4>
                    </li>
                    <li><a href="#home">Terms of Services</a></li>
                    <li><a href="#home">Privacy Policy</a></li>
                    <li><a href="#home">FAQ's</a></li>

                </ul>
            </div>
            <div class="list3">
                <ul>
                    <li>
                        <h4>MadiHUB Health India Pvt Ltd</h4>
                    </li>
                    <li>Bangalore,</li>
                    <li>
                        <p>6th Floor, Unit nos 3 & 4. Vayudooth Chambers,<br>
                            15 & 16, Trinity Junction,<br>
                            Mahatma Gandhi Road,<br>
                            Bangalore – 560001</p>
                    </li>
                    <li>
                        <h4>Contact</h4>
                    </li>
                    <li>91+ 6260299408</li>

                </ul>
            </div>
            <div class="list3">
                <ul>
                    <li>
                        <h4>SOCIAL LINK</h4>
                    </li>
                    <li><span class="fa fa-facebook-square" aria-hidden="true"></span> FaceBook</li>
                    <li><span class="fa fa-instagram" aria-hidden="true"></span> Instagram</li>
                    <li> <span class="fa fa-youtube-square" aria-hidden="true"></span> YouTube</li>
                    <li><span class="fa fa-twitter-square" aria-hidden="true"></span> Twitter</li>
                    <li><span class="fa fa-linkedin-square" aria-hidden="true"></span> Linkedin</li>
                </ul>
            </div>
            <div class="topbtn">
                <a href="#top" onclick=""><span class="fa fa-2x fa-arrow-circle-up" aria-hidden="true"></span></a>
            </div>
        </div>
    </footer>

    <!-- footer end -->
    <script>
        function changebtn(btnid) {
            document.getElementById(btnid).setAttribute("style", "background-color:rgba(83, 142, 252, 0.645); font-size: 14px;border-radius: 14px;");
        }
        function leavbtn(btnid) {
            document.getElementById(btnid).setAttribute("style", "background-color:rgba(0, 89, 255, 0.645);font-size: 14px;border-radius: 10px;");
        }
    </script>
</body>

</html>