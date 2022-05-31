<?php
error_reporting(E_ALL ^ E_WARNING); 
     
    $servername = "localhost";
    $username = "id19022089_dnut";
    $password = "SFD-z4*vQFVwJ6w";
    $dbname = "id19022089_url" ;
    
    
    
    $uname = $_POST["uname"] ;
    $pwd = $_POST["pwd"];
    
    $tok_obj->name = "" ;
    $tok_obj->uname = "" ;
    $tok_obj->CRTPWD = true ;
    $tok_obj->CRTUNAME = true ;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT PWD,NAME FROM user WHERE U_NAME = '$uname' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
           // output data of each row
           while($row = $result->fetch_assoc()) {
               
               if(!strcmp($pwd,$row["PWD"])){
                    $tok_obj->name = $row["NAME"] ;
                    $tok_obj->uname = $uname ;
               }
               else
                $tok_obj->CRTPWD = false ;
           }
    }
    else{
        $tok_obj->CRTUNAME = false ;
        
    }
    
    //echo json_encode($tok_obj);
    $jsun = json_encode($tok_obj) ;
    $base64 = base64_encode($jsun);
    
    $myArr = array($jsun,$base64);

    $myJSON = json_encode($myArr);

    echo $myJSON;
?>