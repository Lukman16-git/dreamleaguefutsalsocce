<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo'<script>window.location="login2.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boking Lapangan | BokingFutsal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="home.php">Futsal Dream League Soccer</a></h1>
            <ul>
                <li><a href="home.php">Dashboard</a></li>
                <li><a href="profil2.php">Profil</a></li>
                <li><a href="boking-lapangan.php">Boking Lapangan</a></li>
                <li><a href="keluar2.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Boking Lapangan</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">-- Pilih Nama Anda --</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                    </select>
                    <select class="input-control" name="nama">
                        <option value="">--Pilih Lapangan--</option>
                        <option value="atas">Atas</option>
                        <option value="bawah">bawah</option>
                    </select>
                    <select class="input-control" name="jammulai" required>
                        <option value="">-- Jam Mulai --</option>
                        <option value="08.00">08.00</option>
                        <option value="09.00">09.00</option>
                        <option value="10.00">10.00</option>
                        <option value="11.00">11.00</option>
                        <option value="12.00">12.00</option>
                        <option value="13.00">13.00</option>
                        <option value="14.00">14.00</option>
                        <option value="15.00">15.00</option>
                        <option value="16.00">16.00</option>
                        <option value="17.00">17.00</option>
                        <option value="18.00">18.00</option>
                        <option value="19.00">19.00</option>
                        <option value="20.00">20.00</option>
                        <option value="21.00">21.00</option>
                        <option value="22.00">22.00</option>
                        <option value="23.00">23.00</option>
                    </select>
                    <select class="input-control" name="jamselesai" required>
                        <option value="">-- Jam Selesai --</option>
                        <option value="08.00">08.00</option>
                        <option value="09.00">09.00</option>
                        <option value="10.00">10.00</option>
                        <option value="11.00">11.00</option>
                        <option value="12.00">12.00</option>
                        <option value="13.00">13.00</option>
                        <option value="14.00">14.00</option>
                        <option value="15.00">15.00</option>
                        <option value="16.00">16.00</option>
                        <option value="17.00">17.00</option>
                        <option value="18.00">18.00</option>
                        <option value="19.00">19.00</option>
                        <option value="20.00">20.00</option>
                        <option value="21.00">21.00</option>
                        <option value="22.00">22.00</option>
                        <option value="23.00">23.00</option>
                    </select>
                    <table >
                    <p>Transfer Pembayaran Ke Rekening</p><br>
                    <p>123456</p><br>
                    <p>Jika sudah selesai melakukan pembayaran</p>
                    <p>Harap di upload bukti pembayarannya di bawah sini</p>
                    <p>Total Pembayaran Rp. 150.000</p>
                    </table>
                    <input type="file" name="gambar" class="input-control" required>
                    

                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        
                        // print_r($_FILES['gambar']);
                        // menampung inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $jammulai      = $_POST['jammulai'];
                        $jamselesai  = $_POST['jamselesai'];
                        $status     = $_POST['status'];

                        // menampung data file yang di upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        $newname = 'produk'.time().'.'.$type2;

                        // menampung data format yang diizinkan
                        $tipe_diizinkan = array('jpg','jpeg','png','gif');

                        // validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                            // jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        }else{
                            // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                            //proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, './produk/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                        null,
                                        '".$kategori."',
                                        '".$nama."',
                                        '".$jammulai."',
                                        '".$jamselesai."',
                                        '".$newname."',
                                        '".$status."',
                                        null
                                            ) ");
                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                            
                            }else{
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }
                    }
                ?>
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