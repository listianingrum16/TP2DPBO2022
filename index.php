<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengurus</title>
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
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .content li {
            list-style: none;
            text-align: center;
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
                <li><div class="divisi"><a href="divisi.php">Daftar Divisi</a></div></li>
                <li><div class="jabatan"><a href="jabatan.php">Daftar Jabatan</a></div></li>
                <li><div class="pengurus"><a href="index.php">Daftar Pengurus</a></div></li>
            </ul>
        </div>
    </div>

    <div class="clear"></div>

    <div class="main">
        <div class="judul">
            <h1><center>Daftar Pengurus<center></h1>
        </div>
        <div class="tambah-pengurus">
            <button>
                <a href="form-tambah-pengurus.php">Tambah Data Pengurus</a>
            </button>
        </div>
        <?php
            include("config.php");
            $sql1 = "SELECT * FROM divisi";
            $query1 = mysqli_query($con, $sql1);
            while($data1 = mysqli_fetch_array($query1))
            {
                echo "<div class='nama-divisi'>";
                    echo "<h2>".$data1['nama_divisi']."</h2>";
                echo "</div>";

                $key1 = $data1['id_divisi'];

                $sql2 = "SELECT * FROM pengurus WHERE id_divisi = $key1";
                $query2 = mysqli_query($con, $sql2);
                echo "<div class='content'>";
                    while($data2 = mysqli_fetch_array($query2))
                    {
                        $key_master = $data2['id_pengurus'];

                        echo "<ul>";
                            echo "<li><a href='detail.php?key_master=$key_master'><img src='img/" .$data2['foto_pengurus']. "'alt='Foto Diri' width='150px' height='auto'></a></li>";
                            echo "<li><a href='detail.php?key_master=$key_master'>".$data2['nama_pengurus']."</a></li>";

                            $key2 = $data2['id_jabatan'];

                            $sql3 = "SELECT * FROM jabatan WHERE id_jabatan = $key2";
                            $query3 = mysqli_query($con, $sql3);
                            $data3 = mysqli_fetch_array($query3);
                            echo "<li><a href='detail.php?key_master=$key_master'>".$data3['jabatan']."</a></li>";
                        echo "</ul>";
                    }
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>