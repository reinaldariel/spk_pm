<?php

require_once("koneksi.php");

$NamaPgw = $_POST["TNamaPegawai"];
$Gender = $_POST["TNamaPegawai"];
$Telp = $_POST["TPhone"];
$Alamat = $_POST["TaAlamat"];
$Password = $_POST["TPwd"];
$UlPassword = $_POST["TPwdUlang"];
$Posisi = $_POST["Sposisi"];

$awalan_id = "rcp00";
$sql = "SELECT COUNT(emp_id) FROM employee";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($jml_emp);
while ($stmt->fetch()) {
    if ($jml_emp > 9) {
        $awalan_id = "rcp0";
    } else if ($jml_emp > 99) {
        $awalan_id = "rcp";
    }
    $id_pgw = $awalan_id . (string)($jml_emp + 1);
}
$target_dir = "images/employee/";
$namafile = uniqid().basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $namafile;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $stmt = $conn->prepare("INSERT INTO employee VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $id_pgw, $NamaPgw, $Gender, $Telp, $Alamat, $Password, $Posisi, $namafile);
    try{
        $stmt->execute();
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $pesan = "Pegawai $NamaPgw berhasil ditambahkan.";
        header("Location: /hotel_peterpan/admin_manage.php?pesan=$pesan");
    }catch(Exception $e){
        $pesan = "Proses tambah pegawai gagal, kesalahan:".$e->getMessage();
        header("Location: /hotel_peterpan/admin_create.php?pesan=$pesan");
    }finally {
        $stmt->close();
        $conn->close();
    }
}
?>