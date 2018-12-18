<?php
require_once("koneksi.php");
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM employee WHERE emp_id = ?");
$stmt->bind_param("s", $id);
try{
    $stmt->execute();
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $pesan = "Pegawai dengan id $id berhasil dihapus.";
    header("Location: /hotel_peterpan/admin_manage.php?pesan=$pesan");
}catch(Exception $e){
    $pesan = "Proses hapus pegawai gagal, kesalahan:".$e->getMessage();
    header("Location: /hotel_peterpan/admin_create.php?pesan=$pesan");
}finally {
    $stmt->close();
    $conn->close();
}