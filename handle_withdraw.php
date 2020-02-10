<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>

<body>
    <?php
    echo "<hr>";
    // if (isset($_SESSION["username"])){
    //     echo '<nav id="navbar">
        
    //     <a href="login.php" id="" class="navlink">Login</a>
    //     <a href="register.php" id="" class="navlink">Register</a>
        
    //     </nav>';
        
    // } else{
    //     echo '<nav id="navbar">
    //     <a href="home.php" id="" class="navlink">Home</a>
    //     <a href="form.php" id="" class="navlink">Add a book</a>
    //     <a href="logout.php" id="" class="navlink">Logout</a>
        
    //     </nav>';
    // }  
    ?>

    <?php
    session_start();
    if (isset($_SESSION["username"])){

    }else{
        header('Location: home.php');
    }

    include 'database.php';
    echo '
    <div class="container">
        <div class="jumbotron">';

    if (isset($_POST['visaNum']) && isset($_POST['visaPassword'])){
        $visaNum = $_POST['visaNum'];
        $visaPassword = $_POST['visaPassword'];
        $amount = $_POST['amount'];        
        $withdraw = new Database("localhost");
        $withdraw->conn();
        $withdraw->withdraw2($visaNum, $visaPassword, $amount);
    } elseif(isset($_POST['cust'])){
        $cust = $_POST['cust'];
        $amount = $_POST['amount'];    
        $withdraw = new Database("localhost");
        $withdraw->conn();
        $withdraw->withdraw($cust, $amount);
    }else{
        echo '<span style="font-size:25px;">Something wrong. Please try again.</span>';
    }
    echo '
        </div>
    </div>';    
    
    ?>

    
</body>

</html>
