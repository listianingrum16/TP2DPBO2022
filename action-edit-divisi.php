<?php

    include("config.php");

    if( !isset($_GET['key']) ){
        // kalau tidak ada id di query string
        header('Location: divisi.php');
    }

    //ambil id dari query string
    $key = $_GET['key'];

    // cek apakah tombol edit divisi sudah diklik atau blum?
    if(isset($_POST['edit_divisi'])){
    
        // ambil data dari formulir
        $nama_divisi = $_POST['nama_divisi'];
        
        // buat query update 
        $sql = "UPDATE divisi SET nama_divisi='$nama_divisi' WHERE id_divisi = $key";
        $query = mysqli_query($con, $sql);
   
        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman divisi.php
            header('Location: divisi.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    } else {
        die("Akses dilarang...");
    }

?>