<?php
    
    error_reporting(E_ALL ^ E_WARNING); 
     
    $servername = "localhost";
    $username = "id19022089_dnut";
    $password = "SFD-z4*vQFVwJ6w";
    $dbname = "id19022089_url" ;
    
    
     
    $tokobj->name = "" ;
   // $obj->pwd = "" ;
    $tokobj->uname = "" ;
    $tokobj->DB_INSER = true ;
    $tokobj->SUCES = true ;
    $tokobj->FAIL = false ;
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    
    $var = $_POST["x"] ;
    $obj = json_decode($var);
    $name = $obj->fname." ".$obj->lname ;
    $u_name = $obj->uname ;
    $pwd = $obj->pwd ;
    $email = $obj->email ;
    $lat = (float)$obj->lat ;
    $lan = (float)$obj->lan ;
    
    $sql = "INSERT INTO user (U_NAME,EMAIL,PWD,LAT,LNG,NAME) VALUES ('$u_name','$email','$pwd',$lat,$lan,'$name')" ;
    if ($conn->query($sql) === TRUE) {
       //echo "New record created successfully";
      // $obj->pwd = $pwd ;
       $tokobj->uname = $u_name ;
       $tokobj->name = $name ;
       
    } else {
       //echo "Error: " . $sql . "<br>" . $conn->error;
       $tokobj->DB_INSER = false ;
       $tokobj->SUCES = false ;
       $tokobj->FAIL = true ;
    }
    
    
    $conn->close();
    
    $jsun = json_encode($tokobj) ;
    $base64 = base64_encode($jsun);
    
    $myArr = array($jsun,$base64);

    $myJSON = json_encode($myArr);

    echo $myJSON;
    
    
?>