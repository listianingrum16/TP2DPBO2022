<?php

    include("config.php");

    if( isset($_GET['key']) ){

        // ambil id dari query string
        $key = $_GET['key'];

        // buat query hapus
        $sql = "DELETE FROM jabatan WHERE id_jabatan = $key";
        $query = mysqli_query($con, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            header('Location: jabatan.php');
        } else {
            die("Gagal menghapus...");
        }
    }else {
        die("Akses dilarang...");
    }

?>