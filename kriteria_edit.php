<?php

require_once("koneksi.php");

$id_k = $_POST["NoK"];
$NamaK = $_POST["NamaK"];
$Bbt = $_POST["Bbt"];


$stmt = $conn->prepare("UPDATE kriteria SET k_bobot = ? WHERE kriteria.k_nomor = ?");
$stmt->bind_param("is", $Bbt,$id_k);

try{
    $stmt->execute();
    $pesan = "Kriteria $NamaK berhasil diubah.";
    header("Location: /spk_pm/kriteria_manage.php?pesan=$pesan");
}catch(Exception $e){
    $pesan = "Proses tambah Kandidat gagal, kesalahan:".$e->getMessage();
    header("Location: /spk_pm/kriteria_edit_form.php?id=$id_k");
}finally {
    $stmt->close();
    $conn->close();
}
?>