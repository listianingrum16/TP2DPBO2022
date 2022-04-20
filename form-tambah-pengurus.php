<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Pengurus</title>
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

		form .file input {
			float: right;
			width: 505px;
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
        }
	</style>
</head>
<body>
	<form action="action-tambah-pengurus.php" method="POST" enctype="multipart/form-data">
        <header>
            <h1>Form Tambah Pengurus</h1>
        </header>
		<p class="text">
			<label for="nama_pengurus">Nama</label>
			<input type="text" name="nama_pengurus"/>
		</p>
        <p class="text">
			<label for="nim_pengurus">NIM</label>
			<input type="text" name="nim_pengurus"/>
		</p>
        <p class="text">
			<label for="semester">Semester</label>
			<input type="text" name="semester"/>
		</p>
		<p class="select">
			<label for="nama_divisi">Divisi</label>
			<select name="nama_divisi">
                <?php
                    include("config.php");
                    $sql1 = "SELECT * FROM divisi";
                    $query1 = mysqli_query($con, $sql1);
                    while($data1 = mysqli_fetch_array($query1))
                    {
                        echo "<option value = '" .$data1['id_divisi']. "'>".$data1['nama_divisi']."</option>";
                    }
                ?>
			</select>
		</p>
        <p class="select">
			<label for="jabatan">Jabatan</label>
			<select name="jabatan">
                <?php
                    include("config.php");
                    $sql2 = "SELECT * FROM jabatan";
                    $query2 = mysqli_query($con, $sql2);
                    while($data2 = mysqli_fetch_array($query2))
                    {
                        echo "<option value = '" .$data2['id_jabatan']. "'>".$data2['jabatan']."</option>";
                    }
                ?>
			</select>
		</p>
		<p class="file">
			<label for="foto_pengurus">Upload Foto Diri</label>
			<input type="file" name="foto_pengurus" required="">
		</p>
		<p class="submit">
			<input type="submit" value="Tambah" name="tambah"/>
		</p>
	</form>
</body>
</html>
