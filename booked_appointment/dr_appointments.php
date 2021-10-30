<?php
    session_start();
    include '../connection.php';

    $nav_bnt_name = "Dr ".$_SESSION['first_name'];

    if (!$_SESSION['first_name']) {
      header('location:../index.php');
    }

    $doctor_id = $_SESSION['doctor_id'];
    $query = "select a.appointment_id, a.first_name, a.last_name, d.doctor_name, a.appointment_mode, d.meeting_link, d.office_location,DATE_FORMAT(a.appointment_date, '%W %d %M %Y') as appointment_date, a.slot_time, a.symptoms
              from appointment_data a, doctor_data d
              where a.doctor_id = d.doctor_id and d.doctor_id='$doctor_id' and a.status='true' order by a.appointment_date, a.slot_id";
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
  <script src="../js/dr_appointments.js"></script>
  <title>Booked Appointments</title>
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
      <a href="../user_Profile/dr_profile.php" target=""> <button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')"><i class="fas fa-user-circle fa-lg"></i>&nbsp;&nbsp;<?php echo $nav_bnt_name; ?></button></a>
    </div>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-md-6">  
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Today's Booked Appointments</h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Meeting Link</th>
                <th>Mode</th>       
                <th>Date</th>
                <th>Slot Time</th>
                <th>Symptoms</th>
                <th>Status</th>
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
                          <td ><?php $id =$row['appointment_id']; echo $id; ?></td>
                          <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                          <td><a href="<?php echo $row['meeting_link']; ?>" target="_blank">Join Meeting</a></td>
                          <td><?php echo $row['appointment_mode']; ?></td>
                          <td><?php echo $row['appointment_date']; ?></td>
                          <td><?php echo $row['slot_time']; ?></td>
                          <td><?php echo $row['symptoms']; ?></td>
                          <td><button id = "<?php echo $id; ?>" style="width:70px;border:none; border-radius:5px; background-color:rgb(91, 216, 91);" onclick="myFunction(<?php echo $id; ?>)">Pending</button></td>
                          <td><button style="width:30px; height: 25px; border:0ch; background-color:white; color:red ;" onclick="deleteRecord(<?php echo $id; ?>)"> <i class="fas fa-trash-alt fa-lg"></i></button>                   
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
      <!-- <div class="appointment_btn">
        <a href="../appointment/appointment.php" target=""><button id="btnID1" onmousedown="changebtn('btnID1')" onmouseup="leavbtn('btnID1')">MAKE AN APPOINTMENT</button></a>
      </div> -->
      <div class="logout_btn">
        <a href="../login_signup/logout.php" target=""><button id="btnID2" onmousedown="changebtn('btnID2')" onmouseup="leavbtn('btnID2')">LOGOUT</button></a>
      </div>
    </div>
  </div>
</body>

</html>