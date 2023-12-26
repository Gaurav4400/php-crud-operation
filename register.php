<?php include 'header.php' ?>

<?php
require_once "conn.php";
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['mentor_email'];
  $password = $_POST['password'];

  $query = "INSERT INTO mentors (mname,memail,password) VALUES('{$name}','{$email}','{$password}')";
  // echo $query;
  $addUser = mysqli_query($conn, $query);

  if (!$addUser) {
    $_SESSION['status'] = "User not added";
        $_SESSION['status_code'] = "error";
        header('location: register.php');
  } else {
    $_SESSION['status'] = "User added Successfully";
    $_SESSION['status_code'] = "success";
    header('location: login.php');
  }
}
?>
<div class="container" style="min-height:60vh;">
  <div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
    <h1 class="text-center">Sign Up</h1>
    <hr>
    <form action="" method="post" id="mentor_record">
      <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" autocomplete="off">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email ID</label>
        <input type="email" class="form-control" name="mentor_email" placeholder="Enter your email" autocomplete="off">
        <!-- <small class="text-muted">Your email is safe with us.</small> -->
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        <!-- <small class="text-muted">Do not share your password.</small> -->
      </div>
      <div class="mb-3">
        <label for="password_confirm" class="form-label"> Confirm Password</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Re-enter your password">
        
      </div>
      <div class="mb-3">
        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary">
      </div>
      <p>Already have an account? <a href="login.php">Sign In</a> here </p>
    </form>
  </div>
</div>
<?php include 'footer.php' ?>