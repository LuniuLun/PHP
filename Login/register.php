<?php
    require './db.php';
    $name = $email = $country = $password = '';
    $name_error = $email_error = $password_error = '';
    if(isset($_POST['register'])) {
      // echo "Form submited";
      //getting the data
      if(empty($_POST['username'])) {
        $name_error = 'Username is required!!!';
      }else $name = htmlspecialchars($_POST['username']);

      if(empty($_POST['email'])) {
        $email_error = 'Email is required!!!';
      }else $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

      if(empty($_POST['password'])) {
        $password_error = 'Password is required!!!';
      }else $password = htmlspecialchars($_POST['password']);

      $country = htmlspecialchars($_POST['country']) ?? '';
      $validate_sucess = empty($name_error) && empty($email_error) && empty($password_error);
      if($validate_sucess) {
        $sql = "INSERT INTO users(name, email, password, country) values (?, ?, ?, ?)";
        try {
          $statement = $connection->prepare($sql);
          $statement->bindParam(1, $name);
          $statement->bindParam(2, $email);
          $statement->bindParam(3, $password);
          $statement->bindParam(4, $country);
          $statement->execute();
          header('Location: login.php');
        } catch(PDOException $e) {
          echo "Cannot insert feedback into database. Error: " .$e->getMessage();
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
  <title>Register</title>
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
             
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="POST" name="register" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg <?php echo $name ? 'is-invalid' : ' '?> " id="username" placeholder="Username">
                  <p class="text-danger" > <?php echo $name_error?></p>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg <?php echo $email ? 'is-invalid': ' ' ?> " id="email" placeholder="Email">
                  <p class="text-danger"> <?php echo $email_error?> </p>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg <?php echo $password ? 'is-invalid': ' ' ?> " id="password" placeholder="Password">
                  <p class="text-danger"> <?php echo $password_error?> </p>
                </div>
                <div class="form-group">
                  <select name="country" class="form-control form-control-lg" id="country">
                    <option value="">Country</option>
                    <option value="United States of America">United States of America</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="India">India</option>
                    <option value="Germany">Germany</option>
                    <option value="Argentina">Argentina</option>
                    <option value="VietNam">VietNam</option>
                  </select>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="iagree" value="1" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP"/>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
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
