<?php 

session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>YXE Events Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../images/evening.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper">
               <h6>Welcome To YXEEVENTS</h6>
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="../actions/loginprocess.php" method="POST" eenctype="multipart/form-data" onsubmit="return validateForm(event);">
              <?php 
                  if(isset($_SESSION['errors'])){
                    $errors = $_SESSION['errors'];
                    foreach($errors as $error) {
                      ?>
                        <small style="color: red"><?=$error."<br>";?></small> 
                      <?php 
                    }
                  }
                  $_SESSION['errors'] = null; 
                ?>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="loginemail" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="loginpassword" id="password" class="form-control" placeholder="Enter Password" required>
                  </div>
                  <button name="submit" id="button" class="btn btn-block login-btn mb-4"> Login </button>
                </form>
                <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
                <p class="login-card-footer-text">Don't have an account? <a href="register.php" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
