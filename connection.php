<?php


// https://gentle-depths-81662.herokuapp.com/


// $username="root";
// $password="";
// $server='localhost';
// $database="onlinedrproject";

$servername = "mysql-56168-0.cloudclusters.net";
$username = "admin";
$password = "bbCxAn2R";
$dbname   = "onlinedrproject";
$dbServerPort = "19848";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname, $dbServerPort,);


// $con=mysqli_connect($server,$username,$password,$database);
// $db = mysqli_select_db($con,$database);

if($con){
    // echo "connection successfull";
    ?>
     <script>
         alert("connection successful !!");
     </script>
   
    <?php
}else{
    // die("no connection ".mysqli_connect_error());
    echo "connection not successfull";

}

?>


