<?php
session_start();
include '../connection.php';

$nav_bnt_name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
if (!$_SESSION['first_name']) {
    header('location:../index.php');
}

$user_mail = $_SESSION['email_id'];
$query = "select a.appointment_id,a.first_name, a.last_name, d.doctor_name, d.meeting_link,d.office_location,a.appointment_mode, DATE_FORMAT(a.appointment_date, '%W %d-%M-%Y') as appointment_date, a.slot_time
          from appointment_data a,doctor_data d 
          where a.doctor_id = d.doctor_id  and a.email='$user_mail' and status='true' order by a.appointment_date, a.slot_id";
$res = mysqli_query($con, $query);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ec188ca56.js" crossorigin="anonymous"></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="../css/patient_appointments.css" type="text/css">
    <script src="../js/patient_appointments.js"></script>
    <title>My Appointments</title>
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
        <div class="helpbtn">
            <a href="../user_Profile/user_profile.php" target=""> <button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')"><i class="fas fa-user-circle fa-lg"></i>&nbsp;&nbsp;<?php echo $nav_bnt_name; ?></button></a>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;My Appointments</h3>
                        <div class="pull-right">
                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                <i class="glyphicon glyphicon-filter"></i>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                    </div>
                    <table class="table table-hover"  id="dev-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Mode</th>
                                <th>Meeting Link</th>
                                <th>Clinic Location</th>
                                <th>Date </th>
                                <th>Slot Time</th>
                                <!-- <th>Time</th> -->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($row_count = mysqli_num_rows($res)) {
                                while ($row = mysqli_fetch_array($res)) {

                                ?>
                                    <tr>
                                        <td><?php echo $row['appointment_id']; ?></td>
                                        <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                        <td><?php echo "Dr. " . $row['doctor_name']; ?></td>
                                        <td><?php echo $row['appointment_mode']; ?></td>
                                        <td><a href="<?php echo $row['meeting_link']; ?>" target="_blank">Join Meeting</a></td>
                                        <td ><?php echo $row['office_location']; ?></td>
                                        <td><?php echo $row['appointment_date']; ?></td>
                                        <td><?php echo $row['slot_time']; ?></td>
                                    </tr>

                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8" style="text-align: center; font-weight: bold; font-size:large"> No Record found </td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="button_row">
            <div class="appointment_btn">
                <a href="../appointment/appointment.php" target=""><button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')">MAKE AN APPOINTMENT</button></a>
            </div>
            <div class="logout_btn">
                <a href="../login_signup/logout.php" target=""><button id="btnID2" onmousedown="changebtn('btnID2')" onmouseup="leavbtn('btnID2')">LOGOUT</button></a>
            </div>
        </div>
    </div>
</body>

</html>