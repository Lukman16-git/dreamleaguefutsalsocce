<?php
    session_start();
    include 'db.php';
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | BokingFutsal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
    <!-- header -->
    <!-- header -->
    <header>
        <div class="container">
            <h1><a>Futsal Dream League Soccer</a></h1>
            <ul>
                <li><a href="daftar.php">Daftar</a></li>
                <li><a href="login2.php">Login</a></li>
                
            </ul>
        </div>
    </header>


    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Daftar</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" class="input-control" placeholder="Nama Lengkap" required>
                    <input type="text" name="hp" class="input-control" placeholder="No HP"required>
                    <input type="text" name="alamat" class="input-control"placeholder="Alamat" required>
                    <input type="email" name="email" class="input-control" placeholder="Email" required>
                    <input type="password" name="pass" placeholder="Password" class="input-control">
                    <input type="submit" name="daftar" value="Daftar" class="btn">
                </form>
                <?php
                    if(isset($_POST['daftar'])){
                        
                        // print_r($_FILES['gambar']);
                        // menampung inputan dari form
                        $nama   = ucwords($_POST['nama']);
                        $hp       = ucwords($_POST['hp']);
                        $alamat      = ucwords($_POST['alamat']);
                        $email      = $_POST['email'];
                        $pass       = $_POST['pass'];    
                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                                                null,
                                                '".$nama."',
                                                '".$hp."',
                                                '".$alamat."',
                                                '".$email."',
                                                '".$pass."'
                                                 ) ");
                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            header('location:login2.php');
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                        
                    }
                ?>
                <br><br>
                Sudah Punya Akun ? Silahkan <a href="login2.php">Login</a>
            </div>
        </div>
    </div>

    <!-- content -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Boking Futsal - </small>
        </div>
    </footer>
</body>
</html>