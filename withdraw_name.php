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
                            <li class="nav_links"><a href="deposit_id.php">deposit_id</a></li>
                            <li class="nav_links"><a href="deposit_name.php">deposit_name</a></li>
                            <li class="nav_links"><a href="withdraw_visa.php">withdraw_visa</a></li>
                            <li class="nav_links"><a href="customers.php">customers</a></li>
                            <li class="nav_links"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>';
    
    echo "
    <div class='container' id='login_form'>
        <form action='handle_withdraw.php' method='post'>
            <div class='input-group input-group-lg col-xs-5 center-block'>
                <label for='cust' class='input-group-addon'>Choose customer name:</label>
                <select class='form-control' name='cust' id='cust'>
                    <option value='Mohamed'>Mohamed</option>
                    <option value='Ahmed'>Ahmed</option>
                    <option value='Mahmoud'>Mahmoud</option>
                </select><br>
            </div>
            <div class='input-group input-group-lg col-xs-5 center-block'>
                <label for='amount' class='input-group-addon'>Enter amount to withdraw:</label>
                <input type='number' class='form-control' name='amount' id='amount' min=1>
            </div>
            <div class='input-group col-xs-5 center-block'>
                <input type='submit' class = 'btn btn-success btn-lg col-xs-12' value='Withdraw'>
            </div>
        </form>
    </div>";
} else{
    header('Location: home.php');
}
?>

