<?php
include 'koneksi.php';

$id_tiket = ''; $tipe = ''; $harga = ''; $kuota = ''; $benefit = '';

if(isset($_GET['id'])) {
    $id_tiket = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = '$id_tiket'");
    $data = mysqli_fetch_assoc($query);
    
    $tipe = $data['tipe_tiket'];
    $harga = $data['harga'];
    $kuota = $data['kuota'];
    $benefit = $data['benefit'];
}

if(isset($_POST['simpan'])) {
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $kuota = $_POST['kuota'];
    $benefit = $_POST['benefit'];
    $id = $_POST['id_tiket'];

    if($id == '') {
        mysqli_query($conn, "INSERT INTO tiket (tipe_tiket, harga, kuota, benefit) VALUES ('$tipe', '$harga', '$kuota', '$benefit')");
    } else {
        mysqli_query($conn, "UPDATE tiket SET tipe_tiket='$tipe', harga='$harga', kuota='$kuota', benefit='$benefit' WHERE id_tiket='$id'");
    }
    
    header("Location: daftar_tiket.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pengelolaan Event & Workshop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak">
        <h2>Ticketing Event Workshop</h2>
        <form method="POST" action="">
            <input type="hidden" name="id_tiket" value="<?php echo $id_tiket; ?>">

            <label>Tipe Tiket:</label> 
            <select name="tipe" required>
                <option value="">-- Pilih --</option>
                <option value="Early Bird" <?php if($tipe == 'Early Bird') echo 'selected'; ?>>Early Bird</option>
                <option value="Regular" <?php if($tipe == 'Regular') echo 'selected'; ?>>Regular</option>
                <option value="VIP" <?php if($tipe == 'VIP') echo 'selected'; ?>>VIP</option>
            </select>
            
            <label>Harga:</label> 
            <input type="number" name="harga" value="<?php echo $harga; ?>" required>
            
            <label>Kuota:</label> 
            <input type="number" name="kuota" value="<?php echo $kuota; ?>" required>
            
            <label>Benefit:</label> 
            <textarea name="benefit" required rows="3"><?php echo $benefit; ?></textarea>
            
            <button type="submit" name="simpan">Simpan Tiket</button>
        </form>
        <a href="daftar_tiket.php" class="btn-nav btn-kembali">Lihat Daftar Tiket &rarr;</a>
    </div>
</body>
</html>