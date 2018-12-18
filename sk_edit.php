<?php

require_once("koneksi.php");

$id_k = $_POST["NoK"];
$Bbt = $_POST["Bbt"];
$NA = $_POST["NA"];



$stmt = $conn->prepare("UPDATE sub_kriteria SET sk_bobot = ?,sk_nilai_acuan = ? WHERE sk_nomor = ?");
$stmt->bind_param("iis", $Bbt,$NA,$id_k);

try{
    $stmt->execute();
    $pesan = "Kriteria $NamaK berhasil diubah.";
    header("Location: /spk_pm/kriteria_manage.php?pesan=$pesan");
}catch(Exception $e){
    $pesan = "Proses tambah Kandidat gagal, kesalahan:".$e->getMessage();
    header("Location: /spk_pm/sk_edit_form.php?id=$id_k");
}finally {
    $stmt->close();
    $conn->close();
}
?>