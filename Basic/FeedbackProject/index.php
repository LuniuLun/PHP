<?php
    echo "This is a very small project";
?> 

<?php require './components/header.php';
    $name = $email = $body = '';
    $name_error = $email_error = $body_error = '';
    if(isset($_POST['submit'])) {
        if(empty($_POST['name'])) {
            $name_error = 'Name is requied';
        }else {
            $name = htmlspecialchars($_POST['name']);
        }
        if(empty($_POST['email'])) {
            $email_error = 'Email is requied';
        }else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }
        if(empty($_POST['body'])) {
            $body_error = 'Body is requied';
        }else {
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }    
        $validate_sucess = empty($name_error) && empty($email_error) && empty($body_error);
        if($validate_sucess) {
            $sql = "INSERT INTO feedback(name, email, body) VALUES (?,?,?)";
            try{
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $name);
                $statement->bindParam(2, $email);
                $statement->bindParam(3, $body);
                $statement->execute();
                //echo "Inserted feedback succesfully";
                header("Location: feedback.php");
            }catch(PDOException $e) {
                echo "Cannot insert feedback into database. Error: " .$e->getMessage();
            }
        }
    }
?>
    <h1>Enter your feedback here</h1>
    <form class="px-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" placeholder="name@example.com"
                    class="form-control <?php echo $email_error ? 'is-invalid' : '';?>" >
            <p class="text-danger">
                <?php echo $name_error; ?>
            </p>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control <?php echo $email_error ? 'is-invalid' : '';?>" placeholder="name">
            <p class="text-danger">
                <?php echo $email_error; ?>
            </p>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Example textarea</label>
            <textarea name="body" class="form-control <?php echo $body_error ? 'is-invalid' : '';?>" rows="3" placeholder="Enter your feedback"></textarea>
            <p class="text-danger">
                <?php echo $body_error; ?>
            </p>
        </div>
        <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
    </form>
<?php include './components/footer.php'?>
