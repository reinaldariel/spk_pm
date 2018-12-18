<?php
require_once("koneksi.php");
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM kandidat WHERE k_nomor = ?");
$stmt->bind_param("s", $id);
try{
    $stmt->execute();
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $pesan = "Kandidat dengan id $id berhasil dihapus.";
    header("Location: /spk_pm/kandidat_manage.php?pesan=$pesan");
}catch(Exception $e){
    $pesan = "Proses hapus kandidat gagal, kesalahan:".$e->getMessage();
    header("Location: /spk_pm/kandidat_manage.php?pesan=$pesan");
}finally {
    $stmt->close();
    $conn->close();
}