<?php

$flag = (int)$_POST["flag"] ;
$str = $_POST["string"];
$rstr = "" ;
if($flag == 1){//encode
    
    $rstr =  base64_encode($str);
 
}
else{//decode
    $rstr =  base64_decode($str);
}

echo $rstr ;

?>