<?php
$surl = $_SERVER['REQUEST_URI'] ;
$s_url = substr($surl,7);
$int_id = 0 ;
$len = strlen($s_url);
$asc = 0;
for($i = 0 ; $i < $len ; $i++){
        $asc = ord($s_url[$i]);
    
        if (97 <= $asc && $asc <= 122)
          $int_id = $int_id*62 + $asc - 97;
        if (65 <= $asc && $asc <= 90)
          $int_id = $int_id*62 + $asc - 65 + 26;
        if (48 <= $asc && $asc <= 57)
          $int_id = $int_id*62 + $asc - 48 + 52;
}

// echo $int_id ;
// echo "<br>";
?>
<?php
    $servername = "localhost";
    $username = "id19022089_dnut";
    $password = "SFD-z4*vQFVwJ6w";
    $dbname = "id19022089_url" ;
    $url = "" ;
    $count = 0 ;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT URL,COUNT FROM master WHERE INT_ID = ".$int_id ;
    $result = $conn->query($sql) ;
    if($result->num_rows > 0){
       $row = $result->fetch_assoc();
       $url = $row['URL'];
       
       $count = $row['COUNT']+1;
       //echo "<br>".$count ;
       //$u_sql = "UPDATE master SET COUNT = ".$count."WHERE INT_ID = ".$int_id ;
       $u_sql = "UPDATE master SET COUNT = $count WHERE INT_ID = $int_id";
       $conn->query($u_sql) ;
        
    }
    else
      die ("Bhai Kya Kar Raha Hai Tu?") ;
      
    $conn->close() ;
    header("Location:$url");
    exit();
    
?>