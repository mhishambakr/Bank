<div class="database">

    <?php


    // if (isset($_SESSION["username"])){
        
    // } else{
    //     header('Location: home.php');
    // }

    class Database{
        public $servername;
        public $dbuser;
        public $dbpassword;
        public $dbname;
        public $conn;
        // function __construct($serverName){ 
        //     echo "Welcome to our site<br>";
        // }
        // function __destruct(){
        //     echo "Thank You<br>";
            
        // }

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
        public $book;
        function knowCredit($cust){
            $this->query = "SELECT `credit` 
            FROM `accounts` 
            WHERE `id` = '$cust'
            OR `name`= '$cust'
            OR `visaNum`= '$cust'";

            $result=$this->conn->QUERY($this->query);
            
            
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
                    $oldCredit = $row["credit"];
                    return $oldCredit;
                }
            }
        }
        function deposit($cust, $value){
            $oldCredit = $this-> knowCredit($cust);
            $newCredit = $oldCredit + $value;

            $this->query = "UPDATE `accounts` 
            SET `credit`='$newCredit' 
            WHERE `name`= '$cust'
            OR `id`='$cust'";
            $result=$this->conn->QUERY($this->query);
            
            echo '<span style="font-size:25px;">new credit = '.$newCredit.'</span>'; 
        }
        function withdraw($cust, $value){
            $oldCredit = $this-> knowCredit($cust);
            if ($oldCredit >= $value){
                $newCredit = $oldCredit - $value;
                
                $this->query = "UPDATE `accounts` 
                SET `credit`='$newCredit' 
                WHERE `name`= '$cust'
                OR `id`='$cust'";
                $result=$this->conn->QUERY($this->query);
                echo '<span style="font-size:25px;">new credit = '.$newCredit.'</span>';
            } else{
                echo "<span style='font-size:25px;'>not enough balance</span>";
            }   
        }
        
        function withdraw2($visaNum, $visaPassword, $value){
            if ($this->checkCust($visaNum, $visaPassword) == true){
                $oldCredit = $this-> knowCredit($visaNum);
                if ($oldCredit >= $value){
                    $newCredit = $oldCredit - $value;
                    
                    $this->query = "UPDATE `accounts` 
                    SET `credit`='$newCredit' 
                    WHERE `visaNum`= '$visaNum'";
                    $result=$this->conn->QUERY($this->query);
                    echo '<span style="font-size:25px;">new credit = '.$newCredit.'</span>';
                } else{
                    echo "<span style='font-size:25px;'>not enough balance</span>";
                }   
            }else{
                echo '<span style="font-size:25px;">Wrong Visa number or password</span>';
            }
            
        }
        function checkCust($visaNum, $visaPass){
            $this->query = "SELECT * 
            FROM `accounts` 
            WHERE `visaNum` = '$visaNum'
            AND `visaPass`= '$visaPass'";

            $result=$this->conn->QUERY($this->query);
            
            
            if ($result->num_rows > 0) { 
                return true;
            }
            return false;
        }

        function customers(){
            $this->query = "SELECT * 
            FROM `accounts` 
            ORDER BY `credit`DESC";

            $result=$this->conn->QUERY($this->query);
            
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
                    echo '<span style="font-size:25px;">'.$row["name"].' || '.$row["credit"].'</span><br>';
                }
            }
        }
    }
    ?>
</div>