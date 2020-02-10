<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Register</h1>
        </div>
        <div class="Jumbotron">
            <?php

            if (isset($_POST["username"])){
                
            } else{
                header('Location: home.php');
            }

            class Database{
                public $servername;
                public $dbuser;
                public $dbpassword;
                public $dbname;
                public $conn;
                function __construct($serverName){ 
                    echo "<span style='font-size:25px;'>Welcome to our site<br></span>";
                }

                function conn(){
                    $this->servername = "localhost";
                    $this->dbuser = "root";
                    $this->dbpassword = ""; 
                    $this->dbname = "bank";
                    $this->conn = new mysqli($this->servername,$this->dbuser,$this->dbpassword,$this->dbname); 
                    if ($this->conn->connect_error){
                        die("Connection failed: ".$conn->connect_error); 
                    } else{
                        // echo "connected successfully<br>";
                    }
                }
                //======================================QUERY======================================

                public $query;   
                public $username;
                public $password;

                function registerUser(){
                    $this->username = $_POST["username"];
                    $this->password = $_POST["password"];
                    
                    $this->query = "INSERT INTO `users`(`username`, `password`) 
                    VALUES ('$this->username','$this->password')";

                    $result=$this->conn->QUERY($this->query);
                    
                    echo "<span style='font-size:25px;'>Registered.<br></span>
                    <span style='font-size:25px;'>username: $this->username<br></span>
                    <span style='font-size:25px;'>Password: $this->password<br></span>";
                    echo "<span style='font-size:25px;'><a href='login.php'>Login</a></span>";
                    
                }
                function checkUser(){
                    $this->username = $_POST["username"];
                    $this->query = "SELECT * 
                    FROM `users` 
                    WHERE `username` = '$this->username'";
                    
                    $result=$this->conn->QUERY($this->query);

                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) { 
                            echo "<span style='font-size:25px;'>This username already exists. <a href='register.php'>Try again</a><br></span>";
                        }
                    } else {
                        $this->registerUser();
                    }
                }
            }
            echo "<div class='jumbotron'>";
            $errors = [];
            if (empty($_POST["username"])){
                $errors[] = "<span style='font-size:25px;'>Please enter a valid username</span>";
            }
            if (empty($_POST["password"])){
                $errors[] = "<span style='font-size:25px;'>Please enter a valid password</span>";
            }

            if(count($errors)>0){
                foreach ($errors as $error){
                    echo $error.'<br>';
                }
                echo "<span style='font-size:25px;'><a href='register.php'>Try again</a><br></span>";
            }else{
                if (isset($_POST["adminPassword"])){
                    if ($_POST["adminPassword"] == '0'){
                        $newUser = new Database("localhost");
                        $newUser->conn();
                        $newUser->checkUser();
                    }else{
                        echo "<span style='font-size:25px;'>Please enter correct admin password. <a href='register.php'>Try again</a><br></span>";
                    }
                }
                // else{
                //     echo "<span>Please enter admin password. <a href='register.php'>Try again</a><br></span>";
                // }
            }
            
            echo "</div>";

            ?>
        </div>
    </div>
</body>

</html>





