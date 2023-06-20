<?php   
    // print_r(['john', 'honf'])
    // var_dump(false);
    // var_export("hell")
    // $name = 'van';
    // $age = 19;
    // echo "$name is $age years old."
    // $sum = '2' + '3';
    // var_dump($sum);//5

    //const
    // define('SERVER_NAME', 'localhost');
    // echo "sever: ".SERVER_NAME;

    // echo 'we talk about Array<br>';
    // $some_number = [1,2,3,4];
    // // var_dump($some_number);
    // // print_r($some_number);
    // //associative array
    // $color = [
    //     3 => 'red',
    //     5 => 'green',
    //     7 => 'blue'
    // ];
    // echo $color[5];

    // $hex_color = [
    //     'red' => '#FF0000',
    //     'green' => '#00FF00',
    //     'blue'=> '#0000FF'
    // ];
    // echo $hex_color['green'];

    // var_dump(json_encode($color));


    // //conditionals
    // $age = 30;
    // if($age >= 18) {
    //     echo "lon hon 18 tuoi";
    // } else {
    //     echo('fbi open the door');
    // }

    // $date_time = date('F j');
    // echo $date_time;


    // $conmments = ['good', 'like', 'well'];
    // if(empty($conmments)) {
    //     echo " there are some comments";
    // }
    // $first_comment = $conmments[0] ?? 'no comments';
    // echo $first_comment;

    // //swtich nhu bth

    


    // //iteratoins(loop)
    // for($i = 0; $i < 10; $i++) {
    //     echo $i;
    // }
    // $i = 2;
    // while($i < 20) {
    //     echo "i < $i<br>";
    //     $i++;
    // }
    // $fruits = ['apple', 'orange', 'lemon'];
    // foreach($fruits as $index => $fruit) {
    //     echo "$index - $fruit <br>"; 
    // }
    // $person = [
    //     'full_name' => 'nguenducvan',
    //     'email' => 'nguyenducvan260903@gmail.com',
    //     'age' => 19
    // ];
    // foreach($person as $key => $value) {
    //     echo "$key : $value <br>";
    // }




    //function
    // $y = 22;
    // function sayHello($name) {
    //     global $y;
    //     echo $y;
    //     $x = 123;
    //     echo "hello $name";
    // }
    // sayHello("Van");

    // function sum($a = 0, $b = 0) {
    //     return $a + $b;
    // }
    // echo sum();

    // $substract = fn($a, $b) => $a / $b;
    // echo $substract(4, 2);
    //count(arr);
    //in_array('hoang', arr);
    //array_push($name, 'elmon') them vao cuoi
    //array_unshift($name, 'satosi') them vao dau

    //array_pop($name); xoa phan tu cuoi cung
    //array_shift($name); xoa phan tu dau tien
    //unset($name[3]); xoa phan tu bat ki nhung khong sua lai index vi du xoa 2 thi van 0 1 3 4
    

    //array_chunk($name,  3); chia moi mang co 3 phan tu 
    //array_merge($arr1, $arr2); gop 2 mang
    //$arr1 = [...$arr2];clone 1 mang(sao chep)
    //array_combine($a, $b); //ghep 2 mảng thanh 1 đối tượng!!!
    // $numbers = range(1, 10);
    // print_r($numbers);

    // $squared_numbers = array_map(function($each_number) {
    //     return $each_number * $each_number;
    // }, $numbers);
    // print_r($squared_numbers);

    // //filter an array
    // $filtered_numbers = array_filter($numbers, 
    //     fn($each_number) => $each_number % 2 == 0);
    // print_r($filtered_numbers);







    //string function
    // $full_name = 'nguyen duc van';
    // echo "length " .strlen($full_name);
    // //reverse 
    // echo strrev($full_name);
    // //lowercase, uppercase
    // echo strtolower($full_name);
    // echo strtoupper($full_name);
    // //find and replace
    // echo str_replace(' ', '-', $full_name);
    // if(str_starts_with(strtolower($full_name), 'nguyen')) {
    //     echo "his name starts with nguyen<br>";
    // }

    // if(str_ends_with(strtolower($full_name), 'van')) {
    //     echo "his name starts with van<br>";
    // }

    // echo "<h1>html string</h1>";
    // echo htmlspecialchars("<h1>html string</h1>");

    // printf('<br> %s likes %s', '<h1>Van</h1>', 'mercedes g63');
    // printf('pi = %f', 3.14);







    //super global
    // print_r($_SERVER);
    // print_r($_GET);
    // print_r($_POST);
    // if(isset($_GET['name'])){        
    //     echo $_GET['name'];
    // }
    // if(isset($_GET['age'])){        
    //     echo $_GET['age'];
    // }
    //?name=van&age=18

    // $name = $_GET['name'] ?? ''; //coalescing
    // $age = $_GET['age'] ?? 18;
    // echo $name;
    // echo $age;
    //POST









    //cookies
    // setcookie('name', 'van', time() + 24*3600);//1 day
    // if(isset($_COOKIE['name'])) {
    //     echo $_COOKIE['name'];
    // }
    //xoa cookies
    // setcookie('name' ,' ', time() - 24*3600);






    //session
    // session_start();
    // if(isset($_POST['submit'])) {
    //     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $password = $_POST['password'];
    //     if($email == 'nguyenducvan@gmail.com' && $password == '123456') {
    //         $_SESSION['email'] = $email;
    //         //redirect
    //         header('Location: ./dashboard.php');
    //     } else {
    //         echo "Incorrect email/password";
    //     }
    // }  
    
    



    





    //file
    //read/write
    // $file_path = './fruts.txt';
    // if(file_exists($file_path)) {
    //     //echo readfile($file_path);//31 is number of bytes of the file
    //     $file_handle = fopen($file_path, 'r');
    //     $file_content = fread($file_handle, filesize($file_path));
    //     fclose(($file_handle));
    //     echo $file_content;
    // } else {
    //     //not exist
    //     $file_handle = fopen($file_path, 'w');
    //     $file_content = 'banana'.PHP_EOL.'mango'.PHP_EOL.'grape';
    //     fwrite($file_handle, $file_content);
    //     fclose($file_handle);
    // }
    
    
    // if(isset($_POST['submit'])) {
    //     $permitted_extentions = ['png', 'jpg', 'jpeg', 'gif'];
    //     $file_name = $_FILES['upload']['name'];
    //     if(!empty($file_name)) {
    //         //print_r($_FILES);
    //         $file_size = $_FILES['upload']['size'];
    //         $file_tmp_name = $_FILES['upload']['tmp_name'];
    //         $generated_file_name = time().'-'.$file_name;
    //         $destination_path = "uploads/${generated_file_name}";
    //         $temp = explode('.', $file_name);
    //         $file_extension = strtolower(end($temp));
    //         echo "$file_name<br>, $file_size<br>, $file_extension<br>, $destination_path<br>";

    //         //validate file extension permitted
    //         if(in_array($file_extension, $permitted_extentions)) {
    //             if($file_size < 1000000) {
    //                 //ok, move form temp folder to/ upload
    //                 move_uploaded_file($file_tmp_name, $destination_path);
    //                 $error_message = '<p style="color:green">File is uploaded</p>';
    //             }else {
    //                 $error_message = '<p style="color:red">File is to big</p>';
    //             }
    //         }else {
    //             $error_message = '<p style="color:red">Invalid file type</p>';
    //         }
    //     }else {
    //         $error_message = '<p style="color:red">No file selected, please try again</p>';
    //     }
    // }










    //exception
    // function divide($a, $b) {
    //     if(!$b) {
    //         throw new Exception("Cannot divide by zero");
    //     }
    //     return $a / $b;
    // }
    // try {
    //     echo divide(10, 5);
    //     echo divide(5, 0);
    //     echo 'no errors';
    // } catch(Exception $e) {
    //     echo "Caught exception: " .$e->getMessage() ,"\n"; 
    // } finally {
    //     echo "Finally come here...";
    // }
    // echo "Program runs here...";










    //oop
    // class User{
    //     protected $name;
    //     public $email;
    //     public $age;
    //     public $password;

    //     public function __construct($name, $email, $age, $password) {
    //         $this->$name = $name;
    //         $this->$email = $email;
    //         $this->$age = $age;
    //         $this->$password = $password;
    //     }

    //     function set_name($name) {
    //         $this->name = $name;
    //     }
    //     function get_name() {
    //         return $this->name;
    //     }
    // }
    // $user1 = new User('van', 'nguyenducvan@gmail.com', 19, '123124');
    // $user2 = new User('lun', 'nguyenducvan@gmail.com', 19, '123124');
    // // $user1->name = 'van';
    // // $user1->email = 'nguyenducvan@gmail.com';
    // // $user1->age = 43;
    // // $user1->password = '123345';
    // // $user1->set_name('van');
    // // $user2->set_name('lun');
    // // print_r($user1);
    // // print_r($user2);
    // // echo $user1->get_name()."<br>";
    // // echo $user2->get_name()."<br>";

    // //inheritance
    // class Employee extends User {
    //     public $title;
    //     public function __construct($name, $email, $age, $password, $title) {
    //         parent::__construct($name, $email, $age, $password);
    //         $this->title = $title;
    //     }
    //     public function get_title() {
    //         return $this->title;
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>Login to your account</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="">
            <label for="email">Your email: </label>
            <input type="email" name="email">
        </div>
        <div class="">
            <label for="password">Your password: </label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="submit" name=submit>
    </form> -->



    <!-- <h1>File upload in PHP</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"
        method="POST"
        enctype="multipart/form-data"
        >
        Choose your image to upload
        <input type="file" name="upload">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php echo $error_message ?? ' '?> -->
</body>
</html>