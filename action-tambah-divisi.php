<?php

    include("config.php");

    // cek apakah tombol tambah sudah diklik atau blum?
    if(isset($_POST['tambah_divisi'])){
        
        // ambil data dari formulir
        $nama_divisi = $_POST['nama_divisi'];
        
        // buat query
        $sql = "INSERT INTO divisi (nama_divisi) VALUES ('$nama_divisi')";
        $query = mysqli_query($con, $sql);
        
        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman divisi.php
            header('Location: divisi.php');
        } else {
             // kalau gagal tampilkan pesan
             die("Gagal menambahkan data...");
        }      
    } else {
        die("Akses dilarang...");
    }
?>