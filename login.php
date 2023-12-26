<?php 
// ob_start();
session_start(); 
?>
<?php include "header.php" ?>
<?php
require_once "conn.php";

if (isset($_POST['signin'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * from mentors WHERE memail = '$email' AND password = '$password'";
  $user = mysqli_query($conn, $query);

  if (!$user) {

    die('query Failed' . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_array($user)) {

    $user_id = $row['mid'];
    $user_name = $row['mname'];
    $user_email = $row['memail'];
    $user_password = $row['password'];
  }

  if ($user_email == $email  &&  $user_password == $password) {

    $_SESSION['mid'] = $user_id;       // Storing the value in session
    $_SESSION['mname'] = $user_name;   // Storing the value in session
    $_SESSION['memail'] = $user_email; // Storing the value in session
    echo $query , $user_id;
    header("location: index.php?page=1");
  } else {
    // $_SESSION["error"] ="username/password incorrect";
    $_SESSION['status'] = "username/password incorrect";
    $_SESSION['status_code'] = "error";
    //  header('location: login.php');

  }
}
?>


<div class="container" style="min-height:60vh;">
  <div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
    <h1 class="text-center">Sign In</h1>
    <hr>
    <form action="" method="post" id="mentor_record">
      <div class="mb-3">
        <label for="email" class="form-label">Email ID</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
        <!-- <small class="text-muted">Your email is safe with us.</small> -->
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
        <!-- <small class="text-muted">Do not share your password.</small> -->
      </div>
      <div class="mb-3">
        <input type="submit" name="signin" value="Sign In" class="btn btn-primary">
      </div>
      <p>Need an account? <a href="register.php">Sign Up</a> here </p>
    </form>
    <div class="err">

    </div>
  </div>

</div>
<script>
  function myfun() {
    Swal.fire({
      position: "center",
      icon: "<?php echo $_SESSION['status_code'] ?>",
      title: "<?php echo $_SESSION['status'] ?>",
      showConfirmButton: false,
      timer: 1500
    });
  }
</script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
  echo '<script>myfun();</script>';
  unset($_SESSION['status']);
}
?>
<?php include 'footer.php' ?>