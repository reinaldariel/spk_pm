<?php

require_once("koneksi.php");

$id_k = $_POST["NoK"];
$NamaK = $_POST["NamaKandidat"];
$C1CF1 = $_POST["C1CF1"];
$C1CF2 = $_POST["C1CF2"];
$C1CF3 = $_POST["C1CF3"];
$C1CF4 = $_POST["C1CF4"];
$C1CF5 = $_POST["C1CF5"];
$C1CF6 = $_POST["C1CF6"];
$C1SF1 = $_POST["C1SF1"];
$C1SF2 = $_POST["C1SF2"];
$C1SF3 = $_POST["C1SF3"];

$C2CF1 = $_POST["C2CF1"];
$C2CF2 = $_POST["C2CF2"];
$C2CF3 = $_POST["C2CF3"];
$C2SF1 = $_POST["C2SF1"];
$C2SF2 = $_POST["C2SF2"];
$C2SF3 = $_POST["C2SF3"];

$C3CF1 = $_POST["C3CF1"];
$C3CF2 = $_POST["C3CF2"];
$C3CF3 = $_POST["C3CF3"];
$C3SF1 = $_POST["C3SF1"];


$stmt = $conn->prepare("UPDATE kandidat SET C1CF1 = ?,C1CF2 = ?,C1CF3 = ?,C1CF4 = ?,C1CF5 = ?,C1CF6 = ?,C1SF1 = ?,C1SF2 = ?,C1SF3 = ?,C2CF1 = ?,C2CF2 = ?,C2CF3 = ?,C2SF1 = ?,C2SF2 = ?,C2SF3 = ?,C3CF1 = ?,C3CF2 = ?,C3CF3 = ?,C3SF1 = ?,k_nama = ? WHERE kandidat.k_nomor = ?");
$stmt->bind_param("iiiiiiiiiiiiiiiiiiiss", $C1CF1,$C1CF2,$C1CF3,$C1CF4,$C1CF5,$C1CF6,$C1SF1,$C1SF2,$C1SF3,$C2CF1,$C2CF2,$C2CF3,$C2SF1,$C2SF2,$C2SF3,$C3CF1,$C3CF2,$C3CF3,$C3SF1,$NamaK,$id_k);

try{
    $stmt->execute();
    $pesan = "Kandidat $NamaK berhasil ditambahkan.";
    header("Location: /spk_pm/kandidat_manage.php?pesan=$pesan");
}catch(Exception $e){
    $pesan = "Proses tambah Kandidat gagal, kesalahan:".$e->getMessage();
    header("Location: /spk_pm/kandidat_form_edit.php?id=$id_k");
}finally {
    $stmt->close();
    $conn->close();
}

?>