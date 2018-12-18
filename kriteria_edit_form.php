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
            $stmt = $conn->prepare('select * from kriteria WHERE k_nomor = "'.$id.'"');
            $stmt->execute();
            $stmt->bind_result($k_nomor, $k_nm, $k_bbt);
            while ($stmt->fetch()) {

                if (isset($_SESSION["username"])) {
                    echo "
                <form action=\"kriteria_edit.php\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label for=\"NoK\">Nomor Kriteria:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NoK\" value='" . $k_nomor . "' readonly>
                    
                        <label for=\"NamaK\">Nama Kriteria:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NamaK\" value='" . $k_nm . "' readonly>
                        
                        <label for=\"Bbt\">Bobot :</label>
                        <input type=\"number\" class=\"form-control\" name=\"Bbt\" maxlength='2' size=\"2\" min='0' max='99' value='" . $k_bbt . "'>
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