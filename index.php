<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>SELAMAT DATANG</h2>
    </div>
    <div class="btn">
        <form action="" method="post">
            <label for="">Nama Barang:</label>
            <input type="text" name="nama" class="box1" require>
            <br>
            <label for="">Jumlah Barang:</label>
            <input type="number" name="jumlah" class="box2">
            <br>
            <label for="">Harga Barang:</label>
            <input type="number" name="harga" class="box3" require>
            <br><br>
            <button type="submit" name="submit" class="btn-box">Tambah</button>
            <button type="submit" name="reset" class="btn-box2">Hapus Data</button>
            <button type="submit" name="cetak" class="btn-box3"><a href="cetak.php">Cetak</a></button>
        </form>
        
    </div>
    <?php
        session_start();
        
        if(!isset($_SESSION['kasir'])) {
            $_SESSION['kasir'] = array();
        }

        if (isset($_POST['nama']) && isset($_POST['jumlah']) && isset($_POST['harga'])){
            $data = array(
                'nama' => $_POST['nama'],
                'jumlah' => $_POST['jumlah'],
                'harga' => $_POST['harga'],
            );
            array_push($_SESSION['kasir'], $data);
        };
        
        if (isset($_GET['hapus'])) {
            $index = $_GET['hapus'];
            unset($_SESSION['kasir'][$index]);
            header('location: http://localhost/projectkasir/');
            exit;
        }
        
        echo '<div class="tabel">';
        echo '<table>';
        echo '<tr>';
        echo '<th>Nama Barang</th>';
        echo '<th>Jumlah Barang</th>';
        echo '<th>Harga Barang</th>';
        echo '<th>Aksi</th>';
        echo '</tr>';
        
        foreach($_SESSION['kasir'] as $index => $value){
        echo "<tr>";
        echo '<td>'.$value['nama'].'<td>';
        echo '<td>'.$value['jumlah'].'<td>';
        echo '<td>'.$value['harga'].'<td>';
        echo '<td><a href="?hapus='.$index.'">Hapus</a><td>';
        echo '<tr>';
        }
        echo '</table>';

        if(isset($_POST['reset'])){
            session_destroy();
            header('location: http://localhost/projectkasir/');
            exit;
        }
        ?>
        </div>
</body>
</html>