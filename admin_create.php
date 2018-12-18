<?php
require_once("headerpage.php");
?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Pegawai</li>
    </ol>
    <div class="row">
        <div class="col-6">
            <h1>Tambah Pegawai</h1>

            <?php
            if(isset($_SESSION["username"]) and $_SESSION["aturan"] == "admin") {
                echo "
                <form action=\"admin_insert.php\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label for=\"TNamaPegawai\">Nama Pegawai:</label>
                        <input type=\"text\" class=\"form-control\" name=\"TNamaPegawai\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"RBGender\">Jenis Kelamin:</label>
                        <input type=\"radio\" name=\"RBGender\" value=\"Male\"> Male<br>
                        <input type=\"radio\" name=\"RBGender\" value=\"Female\"> Female<br>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"Jumlah\">Jumlah:</label>
                        <input type=\"number\" class=\"form-control\" name=\"Jumlah\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"HargaBeli\">Harga Beli:</label>
                        <input type=\"number\" class=\"form-control\" name=\"HargaBeli\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"HargaJual\">Harga Jual:</label>
                        <input type=\"number\" class=\"form-control\" name=\"HargaJual\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"fileToUpload\">Gambar:</label>
                        <input type=\"file\" name=\"fileToUpload\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Submit</button>
                </form>
                ";

            }else {
            echo " <h2>Anda tidak memiliki hak untuk menambah pegawai</h2>";?>

            <?php  }
            ?>

        </div>
    </div>

<?php
require_once("footerpage.php");
?>