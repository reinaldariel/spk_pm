<?php
require_once("headerpage.php");
require_once("koneksi.php");
?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Kriteria</li>
    </ol>
    <div class="row">
        <div class="col-6">
            <h1>Ubah Data Kandidat</h1>

            <?php
            $id = $_GET['id'];
            $stmt = $conn->prepare('select * from sub_kriteria WHERE sk_nomor = "'.$id.'"');
            $stmt->execute();
            $stmt->bind_result($sk_nomor, $sk_nm,$sk_tipe, $sk_bbt, $sk_na,$k_acuan);
            while ($stmt->fetch()) {

                if (isset($_SESSION["username"])) {
                    echo "
                <form action=\"sk_edit.php\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label for=\"NoK\">Nomor Sub Kriteria:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NoK\" value='" . $sk_nomor . "' readonly>
                    
                        <label for=\"NamaK\">Nama Sub Kriteria:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NamaK\" value='" . $sk_nm . "' readonly>
                        
                        <label for=\"TipeK\">Tipe:</label>
                        <input type=\"text\" class=\"form-control\" name=\"TipeK\" value='" . $sk_tipe . "' readonly>
                        
                        <label for=\"Bbt\">Bobot:</label>
                        <input type=\"number\" class=\"form-control\" name=\"Bbt\" maxlength='2' size=\"2\" min='0' max='99' value='" . $sk_bbt . "'>
                        
                        <label for=\"NA\">Nilai Acuan:</label>
                        <input type=\"number\" class=\"form-control\" name=\"NA\" maxlength='2' size=\"2\" min='0' max='9' value='" . $sk_na . "'>
                        
                        <label for=\"acuanK\">Kriteria Acuan:</label>
                        <input type=\"text\" class=\"form-control\" name=\"acuanK\" value='" . $k_acuan . "' readonly>
                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Submit</button>
                </form>
                ";

                } else {
                    echo " <h2>Anda tidak memiliki hak untuk mengedit</h2>"; ?>

                <?php }
            }
            $stmt->close();
            ?>

        </div>
    </div>

<?php
require_once("footerpage.php");
?>