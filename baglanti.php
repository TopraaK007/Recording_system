<?php

$host="localhost";
$kullanici="root";
$parola="";
$vt="uyelik";

$baglanti=new mysqli($host,$kullanici,$parola,$vt);
if($baglanti->connect_error){
    die("veri tabanına bağlanırken hata oluştu:".$baglanti->connect_error);
}


?>