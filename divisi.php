<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Divisi</title>
    <style>
        @media screen and (min-width: 1000px) {
            body {
                width: 1000px;
                margin-left: auto;
                margin-right: auto;
            }
        }
        body {
            border: 1px solid grey;
            padding: 20px;
            font-family: garamond;
        }
        .header {
            height: 90px;
            padding: 10px;
            background-color: #add8e6;
        }
        .header-logo {
            float: left;
            margin-left: -85px;
            margin-right: -75px;
            margin-top: -60px;
            margin-bottom: -50px;
            padding: 10px;
        }
        .header-logo img {
            width: 250px;
            height: auto;
        }
        .header-list li {
            list-style: none;
            float: left;
            margin: 18px;
            font-size: 20px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .header-list a:hover {
            color: white;
        }
        .clear {
            clear: both;
        }
        .table {
            width: 100%;
            text-align: left;
        }
        tr, th, td {
            padding: 10px;
        }
        .isi-divisi {
            display: flex;
            justify-content: space-between; 
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-logo">
            <a href="index.php"><img src="img/logo.png"></a>
        </div>
        <div class="header-list">
            <ul>
                <li><div class="home"><a href="index.php">Home</a></div></li>
                <li><div class="divisi"><a href="divisi.php">Daftar Divisi</a></div></li>
                <li><div class="jabatan"><a href="jabatan.php">Daftar Jabatan</a></div></li>
                <li><div class="pengurus"><a href="index.php">Daftar Pengurus</a></div></li>
            </ul>
        </div>
    </div>

    <div class="clear"></div>

    <div class="main">
        <div class="judul">
            <h1><center>Daftar Divisi<center></h1>
        </div>
        <div class="tambah-divisi">
            <form action="action-tambah-divisi.php" method="POST">
                <input type='text' name='nama_divisi' placeholder='Masukkan divisi baru'/>
                <input type='submit' name='tambah_divisi' value="Tambah Divisi"/>
            </form>
        </div><br>
        <table class="table" rules="groups">
            <thead>
                <tr>
                    <th>Nama Divisi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("config.php");
                    $sql = "SELECT * FROM divisi";
                    $query = mysqli_query($con, $sql);
                    while($data = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                            echo "<td>".$data['nama_divisi']."</td>";
                            echo "<td class='isi-divisi'>";
                                $key = $data['id_divisi'];
                                echo "<form action='action-edit-divisi.php?key=$key' method='POST'>
                                        <input type='text' name='nama_divisi' placeholder='Masukkan divisi pengganti'/>
                                        <input type='submit' name='edit_divisi' value='Edit Divisi'/>
                                    </form>";
                                echo "<button><a href='action-hapus-divisi.php?key=$key'>Hapus Divisi</a></button>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>