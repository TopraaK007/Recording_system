<?php

session_start();

if(isset($_SESSION["kullanici_adi"])){
    echo '<h3 style="color:white; text-align:center; background-color:blue;">'.$_SESSION["kullanici_adi"].' HOŞGELDİN!</h3>';
    echo "<a href='cikis.php' style='color:white; background-color:red; padding:5px 5px;text-decoration:none; margin:50%;'>Çıkış</a>";

}

?>