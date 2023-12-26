<?php
require('conn.php');
// require("header.php");

if (isset($_POST['student_email'])) {

    $email = $_POST['student_email'];
    $id = $_GET['id'];
    if ($id != '')
        $qsql = "SELECT * FROM results WHERE email = '$email' and id != $id";
    else
        $qsql = "SELECT email FROM results WHERE email = '$email'";

    $result = mysqli_query($conn, $qsql);
    $rowcount = mysqli_num_rows($result);
   
    if ($rowcount > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
}

if (isset($_POST['mentor_email'])) {

    $email = $_POST['mentor_email'];
    $qsql = "SELECT memail FROM mentors WHERE memail = '$email'";
    $result = mysqli_query($conn, $qsql);
    $rowcount = mysqli_num_rows($result);
    
    if ($rowcount > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
}
?>