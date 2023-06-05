<?php

include("baglanti.php");
$username_err="";
$mail_err="";
$password_err="";
$parolatkr_err="";
if (isset($_POST["kaydet"])) {
    $name = $_POST["kullaniciadi"];
    $email = $_POST["email"];
    $password = $_POST["parola"];

    $ekle = "INSERT INTO kullanicilar (kullanici_adi,email,parola) VALUES ('$name','$email','$password')";
// ***doğrulamalar***

    if (empty($name)) {
        $username_err='Kullanıcı boş geçilemez!';
    } 
    else if(strlen($name)<5){
        $username_err="Kullanıcı adı en az 5 karakterden oluşmalıdır!";
    }
    else if (!preg_match('/^[a-z\d_]{5,20}$/i', $name)) {
        $username_err="Kullanıcı adı büyük,küçük harf ve rakamdan oluşmalıdır!";
    }
    if(empty($email)){
        $mail_err="Email boş geçilemez!";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail_err = "Geçersiz email formatı!";
    }
    if(empty($password)){
        $password_err="Parola boş geçilemez!";
    }
    if(empty($_POST["parolatkr"])){
        $parolatkr_err="Parola tekrar boş geçilemez!";
    }
    else if($password!=$_POST["parolatkr"]){
        $parolatkr_err="Parolalar uyuşmuyor!";
    }
    
    else {
        if ($baglanti->query($ekle) === TRUE) {
            echo '<div class="alert alert-success" role="alert">
            Kayıt Başarılı
          </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Kayıt Yapılamadı!
          </div>';
        }
    }
}
$baglanti->close();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Kayıt Sistemi</title>
</head>

<body style="background-image: url('resim.jpeg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;">
    <div class="container-sm p-5" style="width: 360px;">
        <div class="card p-5" style="top:45px; background-color: rgba(0, 0, 0, 0.5);">
            <form action="kayit.php" method="POST">
                <div class="mb-3" style="text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    <label for="exampleInputEmail1" style="color:#fff;" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control 
                    
                    <?php
                        if(!empty($username_err)){
                            echo "is-invalid";
                        }
                    ?>
                    
                    " id="exampleInputEmail1" name="kullaniciadi">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                            echo $username_err;
                        ?>
                    </div>
                </div>


                <div class="mb-3" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
                    <label for="exampleInputEmail1" style="color:#fff;" class="form-label">Email Adresi</label>
                    <input type="email" class="form-control 
                    
                    <?php
                        if(!empty($mail_err)){
                            echo "is-invalid";
                        }
                    ?>
                    
                    " id="exampleInputEmail1" name="email">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                            echo $mail_err;
                        ?>
                    </div>
                </div>

                <div class="mb-3" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    <label for="exampleInputPassword1" style="color:#fff;" class="form-label">Parola</label>
                    <input type="password" class="form-control 
                    
                    <?php
                        if(!empty($password_err)){
                            echo "is-invalid";
                        }
                    ?>
                    
                    " id="exampleInputPassword1" name="parola">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                            echo $password_err;
                        ?>
                    </div>
                </div>

                <div class="mb-3" style="text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    <label for="exampleInputPassword1" style="color:#fff;" class="form-label">Parola Tekrar</label>
                    <input type="password" class="form-control 
                    
                    <?php
                        if(!empty($parolatkr_err)){
                            echo "is-invalid";
                        }
                    ?>
                    
                    " id="exampleInputPassword1" name="parolatkr">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                            echo $parolatkr_err;
                        ?>
                    </div>
                </div>

                <div class="button" style="padding-left:50px">
                <button type="submit" name="kaydet" class="btn btn-dark">Kaydet</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>