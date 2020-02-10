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
            <h1>Sign in</h1>
        </div>
        <div class="jumbotron">
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

                function checkUser(){
                    $this->username = $_POST["username"];
                    $this->password = $_POST["password"];
                    
                    $this->query = "SELECT `username`, `password` 
                    FROM `users` 
                    WHERE `username` = '$this->username'";
                    
                    $result=$this->conn->QUERY($this->query);

                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) { 
                            if ($this->password == $row["password"]){
                                $username = $_POST["username"];
                                $password = $_POST["password"];


                                session_start();

                                $_SESSION["username"] = $username;
                                $_SESSION["password"] = $password;
                                // header('Location: home.php');

                                echo "<span style='font-size:25px;'>Welcome, go to <a href='home.php'>Home</a> or <a href='logout.php'>Logout</a></span>";
                            } else{
                                echo "<span style='font-size:25px;'>Wrong password<br></span>";
                                echo "<span style='font-size:25px;'><a href='login.php'>Try again</a></br></span>";
                            }

                        }
                    } else {
                        echo "<span style='font-size:25px;'>User name doesn't exist<br></span>";
                        echo "<span style='font-size:25px;'><a href='login.php'>Try again</a></br></span>";
                    }
                }
            }


            $signUser = new Database("localhost");
            $signUser->conn();
            $signUser->checkUser();



            ?>
        </div>
    </div>
</body>

</html>
