<?php

    include("config.php");

    if( !isset($_GET['key_master']) ){
        // kalau tidak ada id di query string
        header('Location: detail.php');
    }

    //ambil id dari query string
    $key_master = $_GET['key_master'];

    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['simpan'])){
    
        // ambil data dari formulir
        $nama_pengurus = $_POST['nama_pengurus'];
        $nim_pengurus = $_POST['nim_pengurus'];
        $semester = $_POST['semester'];
        $divisi = $_POST['nama_divisi'];
        $jabatan = $_POST['jabatan'];
        
        // buat query update 
        $sql = "UPDATE pengurus SET nama_pengurus = '$nama_pengurus', nim_pengurus = '$nim_pengurus', 
                semester = '$semester', id_divisi = '$divisi', id_jabatan = '$jabatan' WHERE 
                id_pengurus = $key_master";
        $query = mysqli_query($con, $sql);
   
        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman detail.php
            header('Location: detail.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    } else {
        die("Akses dilarang...");
    }

?>