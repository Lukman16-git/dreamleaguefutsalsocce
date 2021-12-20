<?php
    session_start();
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admind WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index | BokingFutsal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="medsos">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- header -->
    <header>
        <div class="container">
            <h1><a>Futsal Dream League Soccer</a></h1>
            <ul>
                <li><a href="daftar.php">Daftar</a></li>
                <li><a href="loginbaru.php">Login</a></li>
                
            </ul>
        </div>
    </header>

    <!-- banner -->
    <section class="banner">
        <h2>WELCOME TO MY WEBSITE</h2>
    </section>

    <!-- About -->
    <section class="about">
        <div class="container">
            <h3>ABOUT</h3>
            <p>Futsal was popularized in Montevideo, Uruguay in 1930, by Juan Carlos Ceriani. The uniqueness of futsal received attention throughout South America, especially in Brazil. The skill developed in this game can be seen in the world famous style that Brazilian players display outdoors, on regular-sized pitches. Pele, the famous Brazilian star, for example, developed his talent in futsal. While Brazil continues to be the center of world futsal, the game is now played under the patronage of the Fédération Internationale de Football Association worldwide, from Europe to Central and North America as well as Africa, Asia and Oceania</p>
        </div>
    </section>

    <!-- service -->
    <section class="service">
        <div class="container">
            <h3>CONTACT INFORMATION ADMIN</h3>
            <div class="box2">
                <div class="col-4">
                    <div class="icon"></div>
                    <h4>Address</h4>
                    <p><?php echo $a->admin_address ?></p>
                </div>
                <div class="col-4">
                    <div class="icon"></div>
                    <h4>Email</h4>
                    <p><?php echo $a->admin_email ?></p>
                </div>
                <div class="col-4">
                    <div class="icon"></div>
                    <h4>Telp.</h4>
                    <p>(021) 123456</p>
                </div>
                <div class="col-4">
                    <div class="icon"></div>
                    <h4>Hp</h4>
                    <p><?php echo $a->admin_telp ?></p>
                </div>     
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31736.049507700613!2d106.92641448870886!3d-6.129868395475729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a21a9e2dcb74b%3A0x3a25646dfdc3581f!2sAsrama%20Polri%20ex%20brimob%20Cilincing!5e0!3m2!1sid!2sid!4v1639902687357!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>


    <!-- footer -->
    <div class="footer">
        <div class="container">
            <small>Copyright &copy; 2021 - Boking Futsal - </small>
        </div>
    </div>
    
</body>
</html>