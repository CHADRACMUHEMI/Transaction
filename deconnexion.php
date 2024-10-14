<?php
if(isset($_COOKIE["admin"])){
    unset($_COOKIE["admin"]);
    setcookie("admin","",time()-10);
    header("location: login.php");
}
if(isset($_COOKIE["reception"])){
    unset($_COOKIE["reception"]);
    setcookie("reception","",time()-10);
    header("location: login.php");

}

if(isset($_COOKIE["caisse"])){
    unset($_COOKIE["caisse"]);
    setcookie("caisse","",time()-10);
    header("location: login.php");

}
?>