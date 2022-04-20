<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Pengurus</title>
	<style>
		body {
			width: 800px;
			margin: auto;
            background-image: url('img/bali.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: garamond;
			color: black;
        }
		form {
			margin-top: 50px;
			margin-bottom: 50px;
			padding-top: 1px;
			padding-left: 30px;
			padding-right: 40px;
			padding-bottom: 20px;
			background-color: #b0c4de;
			border-radius: 30px;
		}

		form .text input {
			float: right;
			width: 490px;
			border-radius: 20px;
			background-color: rgba(255, 255, 255, 0.5);
			padding-left: 10px;
			
		}

		form .text label {
			line-height: 30px;
			font-size: 18px;
		}

		form .select select {
			float: right;
			width: 505px;
			border-radius: 20px;
			background-color: rgba(255, 255, 255, 0.5);
			padding-left: 10px;

		}

		form .submit {
			text-align: center;
		}

		form .submit input {
			background-color: #afeeee;
			width: 100px;
			padding: 5px;
			border-radius: 20px;
			font-size: 15px;
		}

		h1 {
			text-align: center;
			color: black;
			padding: 5px;
		}

		p input[type="submit"]:hover {
            background: #87cefa;
        }	</style>
</head>
<body>
    <?php 
        include("config.php");

        if( !isset($_GET['key_master']) ){
            // kalau tidak ada id di query string
            header('Location: detail.php');
        }

        //ambil id dari query string
        $key_master = $_GET['key_master'];

        // buat query untuk ambil data dari database
        $sql1 = "SELECT * FROM pengurus WHERE id_pengurus = '$key_master'";
        $query1 = mysqli_query($con, $sql1);
        $data1 = mysqli_fetch_assoc($query1);

        // jika data yang di-edit tidak ditemukan
        if( mysqli_num_rows($query1) < 1 ){
            die("Data tidak ditemukan...");
        }
    ?>


	<form action="action-edit-pengurus.php" method="POST">
        <header>
            <h1>Form Edit Pengurus</h1>
        </header>
		<p class="text">
			<label for="nama_pengurus">Nama</label>
			<input type="text" name="nama_pengurus" value="<?php echo $data1['nama_pengurus']?>"/>
		</p>
        <p class="text">
			<label for="nim_pengurus">NIM</label>
			<input type="text" name="nim_pengurus" value="<?php echo $data1['nim_pengurus']?>"/>
		</p>
        <p class="text">
			<label for="semester">Semester</label>
			<input type="text" name="semester" value="<?php echo $data1['semester']?>"/>
		</p>
		<p class="select">
			<label for="nama_divisi">Divisi</label>
			<select name="nama_divisi">
                <?php
                    include("config.php");
                    $sql2 = "SELECT * FROM divisi";
                    $query2 = mysqli_query($con, $sql2);
                    while($data2 = mysqli_fetch_array($query2))
                    {
                        echo "<option value = '" .$data2['id_divisi']. "'>".$data2['nama_divisi']."</option>";
                    }
                ?>
			</select>
		</p>
        <p class="select">
            
			<label for="jabatan">Jabatan</label>
			<select name="jabatan">
                <?php
                    include("config.php");
                    $sql3 = "SELECT * FROM jabatan";
                    $query3 = mysqli_query($con, $sql3);
                    while($data3 = mysqli_fetch_array($query3))
                    {
                        echo "<option value = '" .$data3['id_jabatan']. "'>".$data3['jabatan']."</option>";
                    }
                ?>
			</select>
		</p>
		<p class="submit">
			<input type="submit" value="Simpan" name="simpan"/>
		</p>
	</form>
</body>
</html>
