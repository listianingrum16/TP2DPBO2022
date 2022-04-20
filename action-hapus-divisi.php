<?php

    include("config.php");

    if( isset($_GET['key']) ){

        // ambil id dari query string
        $key = $_GET['key'];

        // buat query hapus
        $sql = "DELETE FROM divisi WHERE id_divisi = $key";
        $query = mysqli_query($con, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            header('Location: divisi.php');
        } else {
            die("Gagal menghapus...");
        }
    }else {
        die("Akses dilarang...");
    }

?>