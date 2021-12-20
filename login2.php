<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login User | BokingFutsal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php
            if(isset($_POST['submit']))
            {  
                session_start(); 
                include 'db.php';
                $cek = mysqli_query($conn,"SELECT * FROM tb_category WHERE email = '".$_POST['email']."' AND password = '".$_POST['pass']."'");
                $row = mysqli_fetch_array($cek);
                $count = mysqli_num_rows($cek);
                if($count > 0)
                {
                    
                    $_SESSION['nama'] = $row['nama'];
                    header('location:home.php');
                }
                else
                {
                    echo 'Email dan Password Salah!';
                }
            }  
        ?>
        <br><br>
                Belum Punya Akun ? Silahkan <a href="daftar.php">Daftar</a>
    </div>
</body>
</html>