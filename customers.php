<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>
<body>
    
</body>
</html>

<?php

session_start();
if (isset($_SESSION["username"])){

}else{
    header('Location: home.php');
}

echo '
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
                            <li class="nav_links"><a href="deposit_name.php">deposit_name</a></li>
                            <li class="nav_links"><a href="deposit_id.php">deposit_id</a></li>
                            <li class="nav_links"><a href="withdraw_name.php">withdraw_name</a></li>
                            <li class="nav_links"><a href="withdraw_visa.php">withdraw_visa</a></li>
                            <li class="nav_links"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>';

include 'database.php';
echo '
<div class="container">
    <div class="jumbotron">';


    $cust = new Database("localhost");
    $cust->conn();
    $cust->customers();

echo '
    </div>
</div>';  