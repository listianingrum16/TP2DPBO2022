<?php
    // menghubungkan php dengan MySQL
    $con = mysqli_connect("localhost", "root", "", "db_ormawa");

    // jika gagal menghubungkan ke database 
    if(!$con){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
?>