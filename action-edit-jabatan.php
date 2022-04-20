<?php

    include("config.php");

    if( !isset($_GET['key']) ){
        // kalau tidak ada id di query string
        header('Location: jabatan.php');
    }

    //ambil id dari query string
    $key = $_GET['key'];

    // cek apakah tombol edit divisi sudah diklik atau blum?
    if(isset($_POST['edit_jabatan'])){
    
        // ambil data dari formulir
        $jabatan = $_POST['jabatan'];
        
        // buat query update 
        $sql = "UPDATE jabatan SET jabatan='$jabatan' WHERE id_jabatan = $key";
        $query = mysqli_query($con, $sql);
   
        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman jabatan.php
            header('Location: jabatan.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    } else {
        die("Akses dilarang...");
    }

?>