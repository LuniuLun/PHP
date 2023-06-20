<?php
    require './components/header.php';
    echo "<h1>List of feedback</h1>";
    $sql = "SELECT name, email, body from feedback;";

    if($connection != null) {
        try{
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
            $feedbacks = $statement->fetchAll();
            echo '<ul class="list-group">';
            foreach($feedbacks as $feedback) {
                $name = $feedback['name'] ?? '';
                $email = $feedback['email'] ?? '';
                $body = $feedback['body'] ?? '';
                //echo "<h3>$name ,$email, $body</h3>";
                echo "<li class='list-group-item'>";
                echo "<p>$name</p>";
                echo "<p>$email</p>";
                echo "<p>$body</p>";
                echo "</li>";
            }
            echo '</ul>';
        } catch(PDOException $e) {
            echo "Cannot query database. Error: " .$e->getMessage();
        }
    }

    include './components/footer.php';
?> 


