<?php
session_start();

$emp_id = $_POST["emp_id"];
$emp_pass = $_POST["pass"];

include_once("koneksi.php");

try{
    $stmt = $conn->prepare('select pgw_id,pgw_nama,pgw_jabatan from pegawai where pgw_id=? and pgw_password=?');
    $stmt->bind_param("ss", $emp_id, $emp_pass);
    $stmt->execute();
    $stmt->bind_result($id, $nama, $aturan);

    //cek jika ada data pengguna
    while($stmt->fetch()) {
        $isloginsuccess = true;

        $_SESSION["username"] = $id;
        $_SESSION["aturan"] = $aturan;
        $_SESSION["nama"] = $nama;
    }

    if($isloginsuccess==true){
        header("Location: /spk_pm/index.php");
    }
    else {
        $pesan = "ID Pegawai/Password yang anda masukan tidak sesuai";
        header("Location: /spk_pm/index.php?pesan=$pesan");
    }
}
catch(Exception $e){
    $error = $e->getMessage();
}
finally{
    $stmt->close();
    $conn->close();
}


?>