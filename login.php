<?php

include("baglanti.php");
$username_err="";
$password_err="";
if (isset($_POST["giris"])) {
    $name = $_POST["kullaniciadi"];
    $password = $_POST["parola"];

// ***doğrulamalar***

    if (empty($name)) {
        $username_err='Kullanıcı boş geçilemez!';
    } 
    
    if(empty($password)){
        $password_err="Parola boş geçilemez!";
    }
    if(isset($name)&& isset($password)){
        $secim="SELECT * FROM kullanicilar WHERE kullanici_adi='$name'";
        $calistir=mysqli_query($baglanti,$secim);
        $kayitsayisi=mysqli_num_rows($calistir);
        if($kayitsayisi>0)
        {
            $ilgilikayit=mysqli_fetch_assoc($calistir);
            $sifre=$ilgilikayit["parola"];
            if($password === $sifre)
            {
                session_start();
                $_SESSION["kullanici_adi"]=$ilgilikayit["kullanici_adi"];
                $_SESSION["email"]=$ilgilikayit["email"];
                header("location:profile.php");
            }
            else{
                echo  '<div class="alert alert-danger" role="alert">
            Parola Yanlış!
          </div>';
            }
        }
        else
        {
            echo  '<div class="alert alert-danger" role="alert">
            Kullanıcı Adı Yanlış!
          </div>';
        }
           
    }
    $baglanti->close();
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Üye Giriş Sistemi</title>
</head>

<body style="background-image: url('resim.jpeg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;">
    <div class="container-sm p-5" style="width: 360px;">
        <div class="card p-5" style="top:45px; background-color: rgba(0, 0, 0, 0.5);">
            <form action="login.php" method="POST">
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
                    <div class="button" style="padding-left:50px">
                <button type="submit"name="giris" class="btn btn-dark">Giriş</button>
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