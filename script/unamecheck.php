<?php
    header("Content-Type: application/json; charset=UTF-8");
    $uname = $_GET["uname"];

    $servername = "localhost";
    $username = "id19022089_dnut";
    $password = "SFD-z4*vQFVwJ6w";
    $dbname = "id19022089_url" ;
    
    
    
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT U_NAME FROM user";
    $result = $conn->query($sql);
    
    $flag = 1 ;
    if ($result->num_rows > 0) {
        
           // output data of each row
           while($row = $result->fetch_assoc()) {
               
              if(!strcmp($row["U_NAME"],$uname)){
                  $flag = 0;
                  break ;
              }
                
               
               
               //echo "SR_NO: " . $row["SR_NO"]. " - ID: " . $row["INT_ID"]. " - URL: " . $row["URL"]. " -S_URL: ".$row["S_URL"]." -COUNT: ".$row["COUNT"]."<br>";
               // echo "INT_ID" . $row["INT_ID"]. "<br>" ;
           }
           
           
        }
       
       echo $flag ;
    
    

?>