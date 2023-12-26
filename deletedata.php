<?php
require_once "conn.php";
// include "header.php";
session_start();
$id = $_GET["id"];
// echo $id;
$mentor_id = (int) $_SESSION['mid'];
$mtrid = "SELECT m_id FROM results WHERE id = " . $_GET["id"];
// echo  $mtrid;
if ($result = $conn->query($mtrid)) {
    while ($row = $result->fetch_assoc()) {
        $check_mentor = $row['m_id'];
    }
}
if ($check_mentor == $mentor_id) {
    $query="select profilepic from results where id='$id'";
    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $imgpath = $row['profilepic'];
        } 
        unlink("profilepics/$imgpath");
    }
   
    
    $query = "DELETE FROM results WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "data deleted Successfully";
        $_SESSION['status_code'] = "success";
        header("location: index.php");
    } else {
        $_SESSION['status'] = "data not deleted";
        $_SESSION['status_code'] = "error";
        header("location: index.php");
    }
} else {
    $_SESSION['status'] = "Student not found";
    $_SESSION['status_code'] = "error";
    header('location: index.php');
}
// echo $_SESSION['status'];
?>