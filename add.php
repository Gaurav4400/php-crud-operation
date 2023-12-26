<?php
require_once("header.php");
require_once "conn.php";
session_start();
if (isset($_POST['submitbtn'])) {
    echo "hey";
    $name = $_POST['fname'] . " " . $_POST['lname'];
    $email = $_POST['student_email'];
    $phone = !empty($_POST['phone']) ? $_POST['phone'] : 'NULL';
    $qualification = $_POST['qualification'];
    $city = !empty($_POST['city']) ? $_POST['city'] : NULL;
    $mentor_id = (int) $_SESSION['mid'];

    if ($_FILES["profilepic"]["name"] != '') {
        $ppic = $_FILES["profilepic"]["name"];

        if ($_FILES["profilepic"]["size"] > 500000) {
            $_SESSION['img_status'] = "Sorry, your file is too large.";
            $_SESSION['img_status_code'] = "error";
        } else {
            $extension = substr($ppic, strlen($ppic) - 4, strlen($ppic));
            $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
            if ($extension == "jpeg") {
                $extension = ".jpeg";
            }
            if (!in_array($extension, $allowed_extensions)) {
                $_SESSION['img_status'] = "Invalid format. Only jpg / jpeg/ png /gif format allowed";
                $_SESSION['img_status_code'] = "error";
            } else {
                $imgnewfile = md5($imgfile) ./*time().*/ $extension;
                echo $imgnewfile . "<br>";
                // if (file_exists("profilepics/" . $imgnewfile)) {
                //     // echo "Sorry, file already exists.";
                //     $_SESSION['img_status'] = "file already exists.";
                //     $_SESSION['img_status_code'] = "error";
                // } else {
                move_uploaded_file($_FILES["profilepic"]["tmp_name"], "profilepics/" . $imgnewfile);
                // echo $_FILES["profilepic"]["tmp_name"]."<br>";
                if (!empty($_GET['id'])) {
                    if (isset($_POST['delete_img'])) {
                        $id = $_GET["id"];
                        $query = "select profilepic from results where id='$id'";
                        if ($result = $conn->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                $imgpath = $row['profilepic'];
                            }
                            unlink("profilepics/$imgpath");
                        }
                        $query = "UPDATE results SET profilepic='' WHERE id = '$id'";
                        if (mysqli_query($conn, $query)) {
                            $_SESSION['status'] = "Image deleted Successfully";
                            $_SESSION['status_code'] = "success";
                            // header("location: add.php?id=$id");
                        } else {
                            $_SESSION['status'] = "image not deleted";
                            $_SESSION['status_code'] = "error";
                            echo "Something went wrong. Please try again later.";
                        }
                    }
                    $sql = "UPDATE results SET `name`= '$name', `email`= '$email',`phone`='$phone', `qualification`= '$qualification', `city`='$city',`profilepic`='$imgnewfile'  WHERE id= " . $_GET["id"] . " && m_id= " . $mentor_id;
                    $message = " updated ";
                } else {
                    $message = "registered";
                    $sql = "INSERT INTO results (`name`, `email`,`phone`, `qualification`,`city`,`m_id` , `profilepic`) VALUES ('$name', '$email','$phone' , '$qualification','$city', $mentor_id , '$imgnewfile')";
                }
                if (mysqli_query($conn, $sql)) {

                    $_SESSION['status'] = "Student " . $message . " Successfully ";
                    $_SESSION['status_code'] = "success";
                    echo $_SESSION['status'];
                    header("location: index.php");
                } else {
                    $_SESSION['status'] = "Student not " . $message;
                    $_SESSION['status_code'] = "error";
                    header('location:index.php');
                }
                // }
            }
        }
    } else {
        // echo $ppic."<br>";
        if (!empty($_GET['id'])) {
            if (isset($_POST['delete_img'])) {
                $id = $_GET["id"];
                $query = "select profilepic from results where id='$id'";
                if ($result = $conn->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $imgpath = $row['profilepic'];
                    }
                    unlink("profilepics/$imgpath");
                }
                $query = "UPDATE results SET profilepic='' WHERE id = '$id'";
                // echo $query;
                if (mysqli_query($conn, $query)) {
                    $_SESSION['status'] = "Image deleted Successfully";
                    $_SESSION['status_code'] = "success";
                    // header("location: add.php?id=$id");
                } else {
                    $_SESSION['status'] = "image not deleted";
                    $_SESSION['status_code'] = "error";
                    echo "Something went wrong. Please try again later.";
                }
            }
            $sql = "UPDATE results SET `name`= '$name', `email`= '$email',`phone`='$phone', `qualification`= '$qualification', `city`='$city' WHERE id= " . $_GET["id"] . " && m_id= " . $mentor_id;
            $message = " updated ";
        } else {
            $message = "registered";
            $sql = "INSERT INTO results (`name`, `email`,`phone`, `qualification`,`city`,`m_id` ) VALUES ('$name', '$email','$phone' , '$qualification','$city', $mentor_id )";
        }
        // echo "<br>" . $sql;

        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Student " . $message . " Successfully ";
            $_SESSION['status_code'] = "success";
            echo $_SESSION['status'];
            header("location: index.php");
        } else {
            $_SESSION['status'] = "Student not " . $message;
            $_SESSION['status_code'] = "error";
            header('location:index.php');
        }
    }
}
?>
<center>
    <div style="width:20%; display: flex; flex-direction:row;align-items:center; justify-content:space-between;">
        <div class="">
            <h1 style="margin-top:2%; ">
                <?php

                if (isset($_GET["id"])) {
                    printf("<h1>Update data</h1>");
                } else {
                    printf("<h1>Add Record</h1>");
                }
                ?>
            </h1>
        </div>
        <div class="form-group" style="margin-top: 0.5%; left:80%">
            <a href="index.php" class="btn btn-primary">Back </a>
        </div>
    </div>
</center>
<section>
    <div class="container" style="margin-top:2%; width: 35%; height:80%;  ">

        <?php
        require_once "conn.php";
        if (isset($_GET["id"]) && $_GET['id'] != '') {
            $heading = "Update data";
            // echo $_GET["id"];
            $mentor_id = (int) $_SESSION['mid'];
            $mtrid = "SELECT m_id FROM results WHERE id = " . $_GET["id"];
            if ($result = $conn->query($mtrid)) {
                while ($row = $result->fetch_assoc()) {
                    $check_mentor = $row['m_id'];
                }
            }
            if ($check_mentor == $mentor_id) {
                $sql_query = "SELECT * FROM results WHERE id = " . $_GET["id"] . " AND m_id= " . $mentor_id . ';';
                // echo $sql_query;
                if ($result = $conn->query($sql_query)) {
                    while ($row = $result->fetch_assoc()) {

                        $Id = $row['id'];
                        $Name = $row['name'];
                        $name_parts = explode(" ", $Name);
                        $first_name = $name_parts[0];
                        $last_name = $name_parts[1];
                        $Email = $row['email'];
                        $Phone = $row['phone'];
                        $Qualification = $row['qualification'];
                        $imgurl = $row['profilepic'];
                        $City = $row['city'];
                    }
                }
            } else {
                $_SESSION['status'] = "Student not found";
                $_SESSION['status_code'] = "error";
                echo $_SESSION['status'] . "  " . $check_mentor . "  " . $mentor_id;
                header("location: index.php");
            }
        }
        ?>

        <form id="record" action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row-lg-3">
                    <label for="">Profile photo</label>
                    <div style="display: flex; flex-direction:row; width:100%; height:80%;">
                        <?php
                        if (isset($_GET['id']) && $imgurl != '') {
                            echo "<img src='profilepics/" . $imgurl . "' width='140px' height='140px'>";
                        ?>
                     <div style="display: flex; flex-direction:column;justify-content:flex-end; width:80%; height:100%">
                        <div style="padding-left: 40px; width :50%;">
                            <form action="" method="post">
                                <i class="fa-solid fa-trash  btn btn-primary" style="font-size: 25px;">
                                    <input type="checkbox" name="delete_img" value="Delete" style="width: 20px; height:20px; margin-top:12%">
                                </i>
                            </form>
                        </div>
                        <?php
                                } elseif ($_GET['id']) {
                                    echo "<img src='profilepics/dummy.jpg' width='120px' height='120px'>";
                                }
                        ?>
                        <div style="padding-left: 40px;height:40%" > 
                            <input type="file" class="form-control btn btn-primary " name="profilepic" id="profilepic" style="width:100%; margin-top:8%;">
                        </div>
                      </div>
                  </div>
                </div>

                    <div class="form-group row-lg-3" style="margin-top: 2%;">
                        <label for="">First Name *</label>
                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $first_name ?>">
                    </div>
                    <div class="form-group row-lg-3" style="margin-top: 2%;">
                        <label for="">Last Name *</label>
                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $last_name ?>">

                    </div>
                    <div class="form-group row-lg-3" style="margin-top: 2%;">
                        <label for="">Email *</label>
                        <input type="text" name="student_email" id="email" class="form-control" value="<?php echo $Email ?>">
                    </div>
                    <div class="form-group row-lg-2" style="margin-top: 2%;">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php if ($row['phone'] != "NULL") echo $row['phone'];
                                                                                                else echo ""; ?>">
                    </div>
                    <div class="form-group  row-lg-2" style="margin-top: 2%;">
                        <label for="">Qualification *</label>
                        <select name="qualification" id="qualification" class="form-control">
                            <option selected hidden><?php echo $Qualification; ?></option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="BBA">BBA</option>
                            <option value="BTECH">BTECH</option>
                            <option value="BCA">BCA</option>
                        </select>
                    </div>
                    <div class="form-group row-lg-3" style="margin-top: 2%; margin-bottom:5%">
                        <label for="">city</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $City ?>">
                    </div>

                    <div class="form-group row-lg-2" style="display: grid;align-items:  flex-end;" style="margin-top: 2%;">
                        <input type="submit" name="submitbtn" id="submit_button" class="btn btn-primary">

                    </div>

                </div>
        </form>
        <!-- <button name="submitbtn" id="submit_button">submit</button> -->
    </div>
</section>
<script>
    function myimg() {
        Swal.fire({
            position: "center",
            icon: "<?php echo $_SESSION['img_status_code'] ?>",
            title: "<?php echo $_SESSION['img_status'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
<?php
if (isset($_SESSION['img_status']) && $_SESSION['img_status'] != '') {
    echo '<script>myimg();</script>';
    unset($_SESSION['img_status']);
    // unset($_SESSION['img_status_code']);
}
?>
<?php
require_once("footer.php");
?>