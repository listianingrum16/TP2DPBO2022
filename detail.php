<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengurus</title>
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
        .header-list li a:hover {
            color: white;
        }
        .edit-pengurus, .hapus-pengurus {
            float: left;
            margin-right: 10px;
        }
        .clear {
            clear: both;
        }
        .content {
            margin-left: -40px;
            margin-top: 20px;
        }
        .content li {
            list-style: none;
            text-align: left;
            font-size: 18px;
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
                <li><div class="home"><a href="index.php">Home</a></div></li>
                <li><div class="divisi"><a href="divisi.php">Daftar Divisi</a></div></li>
                <li><div class="jabatan"><a href="jabatan.php">Daftar Jabatan</a></div></li>
                <li><div class="pengurus"><a href="index.php">Daftar Pengurus</a></div></li>
            </ul>
        </div>
    </div>

    <div class="clear"></div>

    <div class="main">
        <?php
            include("config.php");
            $key_master = $_GET['key_master'];

            echo "<div class='judul'>
                <h1>Detail Pengurus</h1>
            </div>";
            echo "<div class='edit-pengurus'>
                <button>
                    <a href='form-edit-pengurus.php?key_master=$key_master'>Edit Data Pengurus</a>
                </button>
            </div>";
            echo "<div class='hapus-pengurus'>
                <button>
                    <a href='action-hapus-pengurus.php?key_master=$key_master'>Hapus Data Pengurus</a>
                </button>
            </div>";

            echo "<div class='clear'></div>";

            echo "<div class='content'>";
                $sql1 = "SELECT * FROM pengurus WHERE id_pengurus = $key_master";
                $query1 = mysqli_query($con, $sql1);
                while($data1 = mysqli_fetch_array($query1))
                {
                    echo "<ul>";
                        echo "<li><img src='img/" .$data1['foto_pengurus']. "'alt='Foto Diri' width='175px' height='auto'></li>";
                        echo "<br>";
                        echo "<li>Nama:  ".$data1['nama_pengurus']."</li>";
                        echo "<li>NIM: ".$data1['nim_pengurus']."</li>";
                        echo "<li>Semester: ".$data1['semester']."</li>";

                        $id_divisi = $data1['id_divisi'];
                        $sql2 = "SELECT * FROM divisi WHERE id_divisi = $id_divisi";
                        $query2 = mysqli_query($con, $sql2);
                        $data2 = mysqli_fetch_array($query2);
                        echo "<li>Divisi: ".$data2['nama_divisi']."</li>";

                        $id_jabatan = $data1['id_jabatan'];
                        $sql3 = "SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan";
                        $query3 = mysqli_query($con, $sql3);
                        $data3 = mysqli_fetch_array($query3);
                        echo "<li>Jabatan: ".$data3['jabatan']."</li>";
                    echo "</ul>";
                }
            echo "</div>";
        ?>
    </div>
    
</body>
</html>