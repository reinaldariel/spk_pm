<?php

require_once("koneksi.php");

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


$awalan_id = "k000";
$sql = "SELECT COUNT(k_nomor) FROM kandidat";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($jml_k);
while ($stmt->fetch()) {
    if ($jml_k > 9) {
        $awalan_id = "k00";
    } else if ($jml_k > 99) {
        $awalan_id = "k0";
    } else if ($jml_k > 999) {
        $awalan_id = "k";
    }
    $id_k = $awalan_id . (string)($jml_k + 1);
}
$stmt->close();

    $stmt = $conn->prepare("INSERT INTO kandidat VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("siiiiiiiiiiiiiiiiiiis", $id_k,$C1CF1,$C1CF2,$C1CF3,$C1CF4,$C1CF5,$C1CF6,$C1SF1,$C1SF2,$C1SF3,$C2CF1,$C2CF2,$C2CF3,$C2SF1,$C2SF2,$C2SF3,$C3CF1,$C3CF2,$C3CF3,$C3SF1,$NamaK);
    try{
        $stmt->execute();
        $pesan = "Kandidat $NamaK berhasil ditambahkan.";
        header("Location: /spk_pm/kandidat_manage.php?pesan=$pesan");
    }catch(Exception $e){
        $pesan = "Proses tambah Kandidat gagal, kesalahan:".$e->getMessage();
        header("Location: /spk_pm/kandidat_form_insert.php?pesan=$pesan");
    }finally {
        $stmt->close();
        $conn->close();
    }

?>