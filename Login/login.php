<?php
  session_start();
  require './db.php';
  $email = $password = $remember = '';
  $email_error = $password_error = '';
  $sql = "SELECT * FROM users";
  if(isset($_POST['login'])) {
    if(!empty($_POST['remember'])) $remember = $_POST['remember'];
    if(empty($_POST['email'])) {
      $email_error = 'Enter your email!!!';
    } $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if(empty($_POST['password'])) {
      $password_error = 'Enter your password!!!';
    } $password = htmlspecialchars($_POST['password']);
    $check = empty($email_error) && empty($password_error);
    if($check) {
      $sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
      try{
        $statement = $connection->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->bindParam(2, $password);
        $statement->execute();
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        $feedbacks = $statement->fetchAll();
        if(count($feedbacks) === 1) {
          // echo "login success";
          $_SESSION['email'] = $email;
          if($remember == 1) {
            setcookie('email', $email, time() + 60*60*24*10, "/");
            setcookie('password', $password, time() + 60*60*24*10, "/");
          }
          header("Location: dashboard.php");
        }else {

        }
      }catch(PDOException $e) {
        echo "Can't check data: " .$e->getMessage();
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email" value="<?php echo $_COOKIE['email'] ?? '' ?>">
                  <p class="text-danger"><?php echo $email_error ?? ''?></p>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" value="<?php echo $_COOKIE['password'] ?? '' ?>">
                  <p class="text-danger"><?php echo $password_error ?? ''?></p>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name ="login" value="SIGN IN" />
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember" value="1" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>
