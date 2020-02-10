<?php
session_start();
if (isset($_SESSION["username"])){
  header('Location: home.php');
}
?>


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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                        <span class="sr-only"></span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="pull-left" href="home.php"><img class="nav-img" src="bank2.png"></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="nav_links"><a href="home.php">Home</a></li>
                        <li class="nav_links"><a href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" id="login_form">
        <form action="handle_login.php" method="POST">
            <div class="input-group input-group-lg col-xs-5 center-block">
                <label class="input-group-addon" for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Please Enter your username"><br>
            </div>
            <div class="input-group input-group-lg col-xs-5 center-block">
                <label class="input-group-addon" for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Please Enter your Password"
                        pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="must include small, capital letters and a minimum of 8 characters"><br>
            </div>
            <div class="input-group col-xs-5 center-block">
                <input type="submit" class = "btn btn-success btn-lg col-xs-12" id='submit_button' name="login" value="Sign in">
            </div>
            
        </form>
    </div>
</body>

</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
  }
  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>