<?php
    session_start();
    session_destroy();
    echo '<script>alert("Apakah anda yakin ingin keluar ?")</script>';
    echo '<script>window.location="login2.php"</script>';
?>