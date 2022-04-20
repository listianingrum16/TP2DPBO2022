<?php

    include("config.php");

    // cek apakah tombol tambah sudah diklik atau blum?
    if(isset($_POST['tambah']))
    {
        
        // ambil data dari formulir
        $nama_pengurus = $_POST['nama_pengurus'];
        $nim_pengurus = $_POST['nim_pengurus'];
        $semester = $_POST['semester'];
        $divisi = $_POST['nama_divisi'];
        $jabatan = $_POST['jabatan'];

        //menyiapkan validasi gambar yang akan di upload
        $file=$_FILES['foto_pengurus']['name'];
        $tmp_dir=$_FILES['foto_pengurus']['tmp_name'];
        $ukuran=$_FILES['foto_pengurus']['size'];

        //
        $direktori='img/'; //path tempat simpan
        $ektensi=strtolower(pathinfo($file, PATHINFO_EXTENSION)); //dapatkan info gambar
        $valid_ektensi=array('jpeg','jpg','png'); //ektensi yang dibloehin
        $gambar=rand(1000,1000000).".".$ektensi;
 
        //mulai validasi
        //cek ektensi gambar
        if(in_array($ektensi, $valid_ektensi)) 
        {

            //cek ukuran gambar
            if(!$ukuran < 1000000) 
            { //jika lebih
                move_uploaded_file($tmp_dir, $direktori.$gambar);
            
                // buat query
                $sql = "INSERT INTO pengurus (nama_pengurus, nim_pengurus, semester, id_divisi, id_jabatan, foto_pengurus)
                        VALUES ('$nama_pengurus', '$nim_pengurus', '$semester', '$divisi', '$jabatan', '$gambar')";
                $query = mysqli_query($con, $sql);
            }
        }
        
        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman listProvinsi.php dengan status=sukses
            header('Location: index.php');
        } else {
             // kalau gagal tampilkan pesan
             die("Gagal menambahkan data...");
        }      
    } else {
        die("Akses dilarang...");
    }

?>