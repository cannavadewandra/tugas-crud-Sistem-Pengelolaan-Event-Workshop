<?php
include 'koneksi.php';

if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM tiket WHERE id_tiket='$id'");
    header("Location: daftar_tiket.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak kotak-lebar">
        <h2>Daftar Tiket Tersimpan</h2>
        <a href="form_tiket.php" class="btn-nav btn-tambah">+ Tambah Baru</a>
        
        <table>
            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Kuota</th>
                    <th>Benefit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tiket ORDER BY id_tiket DESC");
                while($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?php echo $row['tipe_tiket']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['kuota']; ?></td>
                    <td><?php echo $row['benefit']; ?></td>
                    <td>
                        <div class="aksi-flex">
                            <a href="form_tiket.php?id=<?php echo $row['id_tiket']; ?>" class="btn-edit" style="text-decoration:none;">Edit</a>
                            <a href="daftar_tiket.php?hapus=<?php echo $row['id_tiket']; ?>" class="btn-hapus" style="text-decoration:none;" onclick="return confirm('Yakin ingin menghapus tiket ini?');">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>