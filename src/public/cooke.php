<?php
// khoi tao cooke
$name = 'khanh';
$value = ' thu7';
$time = 10 ;
setcookie($name, $value, time()+ $time);
if (isset($_COOKIE['khanh'])){
    echo $_COOKIE[''];
}

