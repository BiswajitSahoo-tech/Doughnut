<?php
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_GET["tok"], false);

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
    
    $sql = "SELECT *FROM master WHERE U_ID = '$obj->uname' ";
    $result = $conn->query($sql);
    
    echo "<table style='padding: 50px; border-spacing: 20px;  border: black;'>" ;
    
    /* align-items: center; */
    /* padding-left: 50%; */
    
    echo "<tr>" ;
    echo "<th>Seriel No.</th>" ;
    echo "<th>User Id</th>" ;
    echo "<th>Int Id</th>" ;
    echo "<th>URL</th>" ;
    echo "<th>Description</th>" ;
    echo "<th>Date</th>" ;
    echo "<th>SURL</th>" ;
    echo "<th>Click Count</th>" ;
    echo "<tr>" ;
    if ($result->num_rows > 0) {
        
           // output data of each row
           while($row = $result->fetch_assoc()) {
               
               echo "<tr>" ;
               echo "<td>".$row["SR_NO"]."</td>" ;
               echo "<td>".$row["U_ID"]."</td>" ;
               echo "<td>".$row["INT_ID"]."</td>" ;
               echo "<td>".$row["URL"]."</td>" ;
               echo "<td>".$row["DESRC"]."</td>" ;
               echo "<td>".$row["DATE"]."</td>" ;
               echo "<td>".$row["S_URL"]."</td>" ;
               echo "<td>".$row["COUNT"]."</td>" ;
               echo "</tr>" ;
                
               
               
               //echo "SR_NO: " . $row["SR_NO"]. " - ID: " . $row["INT_ID"]. " - URL: " . $row["URL"]. " -S_URL: ".$row["S_URL"]." -COUNT: ".$row["COUNT"]."<br>";
               // echo "INT_ID" . $row["INT_ID"]. "<br>" ;
           }
           
           
        }
        else{
            
            
            
        }
    
    

?>