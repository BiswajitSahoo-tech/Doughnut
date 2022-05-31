<?php
//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
//header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: application/json; charset=UTF-8");
//echo $_POST["url"] ;

// $jsn = $_POST["url"] ;
// //echo $jsn ;
// $obj = json_decode($jsn);
/*
url : "" ,
                     INVALID_URL : false,
                     EMPTY_URL : false,
                     SUCCES : false,
                     DB_INSER_FAIL : false
*/

$obj = json_decode($_POST["url"], false);
$url = $obj->url ;
$u_id = $obj->uid ;
$desc = $obj->desc ;



if (empty($url)) {
    $obj->EMPTY_URL = true ;
  } else {
    $url = test_input($url);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $obj->INVALID_URL = true ; 
      $url = "" ;
    }
  }

 


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function IDtosURl($id){
    $surl = "" ;
    $map = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ;
    while((int)$id){
        $surl = $surl.$map[$id%62] ;
        $id /= 62 ;
        
    }
    
    return strrev($surl) ;
}
if(!empty($url)){
    
    $servername = "localhost";
    $username = "id19022089_dnut";
    $password = "SFD-z4*vQFVwJ6w";
    $dbname = "id19022089_url" ;
    $surl = "" ;
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT INT_ID FROM master";
    $result = $conn->query($sql);
    $g_ID = rand(100000,999999); $flag = 0 ;
    if ($result->num_rows > 0) {
        while(!$flag){
          // output data of each row
          while($row = $result->fetch_assoc()) {
               
              if($g_ID == (int)$row["INT_ID"]){
                  $flag = 1 ;
                  break ;
              }
               
               
              //echo "SR_NO: " . $row["SR_NO"]. " - ID: " . $row["INT_ID"]. " - URL: " . $row["URL"]. " -S_URL: ".$row["S_URL"]." -COUNT: ".$row["COUNT"]."<br>";
              // echo "INT_ID" . $row["INT_ID"]. "<br>" ;
          }
          if($flag){
              $g_ID = rand(100000,999999);
              $flag = 0 ;
          }
          else
              break ;
           
           
        }
        
        $surl = IDtosURL($g_ID) ;
        $obj->surl = $surl;
    
        
        
    } else {
        
      $surl = IDtosURL($g_ID) ; 
      $obj->surl = $surl;
        
       
    }
    
    //$i_sql = "INSERT INTO master (INT_ID,URL,S_URL) VALUES ( ".$g_ID." , '".$url."' , '"."$surl"."' )" ;
    $i_sql = "INSERT INTO master (U_ID,INT_ID,URL,DESRC,S_URL) VALUES ( '$u_id',$g_ID,'$url','$desc','$surl')";
    
    if ($conn->query($i_sql) === TRUE) {
        $obj->SUCCES = true ;
      
    } else {
      $obj->DB_INSER_FAIL = true ;
      echo $conn->error ;
    }
    
    
    $conn->close();
    
    echo json_encode($obj);

   
    
    
}

?>
