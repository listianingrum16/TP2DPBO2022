<?php

    include("config.php");

    if( isset($_GET['key_master']) ){

        // ambil id dari query string
        $key_master = $_GET['key_master'];

        // buat query hapus
        $sql = "DELETE FROM pengurus WHERE id_pengurus = $key_master";
        $query = mysqli_query($con, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            header('Location: index.php');
        } else {
            echo $key_master;
            die("Gagal menghapus...");
        }
    }else {
        die("Akses dilarang...");
    }

?>