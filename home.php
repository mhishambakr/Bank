<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <title>Document</title>
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
                        <?php
                            session_start();
                            if (isset($_SESSION["username"])){
                                echo '<li class="nav_links"><a href="deposit_name.php">deposit_name</a></li>
                                <li class="nav_links"><a href="deposit_id.php">deposit_id</a></li>
                                <li class="nav_links"><a href="withdraw_name.php">withdraw_name</a></li>
                                <li class="nav_links"><a href="withdraw_visa.php">withdraw_visa</a></li>
                                <li class="nav_links"><a href="customers.php">customers</a></li>
                                <li class="nav_links"><a href="logout.php">Logout</a></li>';
                            }else{
                                echo '<li class="nav_links"><a href="login.php">Login</a></li>
                                <li class="nav_links"><a href="register.php">Register</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="jumbotron">
            <p><span class='glyphicon glyphicon-heart'></span> Welcome to our bank</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span4"><img class="center-block" id="bank_img" src="bank.jpg" alt=""></div>
        </div>
    </div>
    
    <footer class="page-footer font-small blue pt-4">
        
        <div class="footer-copyright text-center py-3">© 2020 Copyright: bank
        </div>
        
    </footer>
</body>
</html>


<?php
// session_start();
// if (isset($_SESSION["username"])){
//     echo "<a href='deposit_name.php'>deposit_name</a><br>";
//     echo "<a href='deposit_id.php'>deposit_id</a><br>";
//     echo "<a href='withdraw_name.php'>withdraw_name</a><br>";
//     echo "<a href='withdraw_visa.php'>withdraw_visa</a><br>";
//     echo "<a href='logout.php'>Logout</a>";
// }else{
//     echo "<a href='login.php'>Login</a>";
// }