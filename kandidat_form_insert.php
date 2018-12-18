<?php
require_once("headerpage.php");
?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Kandidat</li>
    </ol>
    <div class="row">
        <div class="col-6">
            <h1>Tambah Kandidat</h1>

            <?php
            if(isset($_SESSION["username"]) and $_SESSION["aturan"] == "admin") {
                echo "<form action=\"kandidat_insert.php\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label for=\"NamaKandidat\">Nama Kandidat:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NamaKandidat\">
                    </div>
                    <h2>Input Nilai Tes</h2>
                    <h3>Tes 1 - IST</h3>
                    <div class=\"form-group\">
                        <label for=\"C1CF1\">C1CF1 - Common Sense :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF1\" maxlength='1' size=\"1\" min='0' max='9' >
                        <label for=\"C1CF2\">C1CF2 - Verbalisasi Ide :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF2\" maxlength='1' size=\"1\" min='0' max='9' >
                        <label for=\"C1CF3\">C1CF3 - Sistematika Berpikir :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF3\" maxlength='1' size=\"1\" min='0' max='9' >
                        <label for=\"C1CF4\">C1CF4 - Penalaran dan Solusi Real :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF4\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C1CF5\">C1CF5 - Konsentrasi :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF5\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C1CF6\">C1CF6 - Logika Praktis :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF6\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C1SF1\">C1SF1 - Fleksibilitas Berpikir :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1SF1\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C1SF2\">C1SF2 - Imajinasi Kreatif :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1SF2\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C1SF3\">C1SF3 - Antisipasi :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1SF3\" maxlength='1' size=\"1\" min='0' max='9'>
                    </div>
                    <h3>Tes 2 - Tes Pauli</h3>
                    <div class=\"form-group\">
                        <label for=\"C2CF1\">C2CF1 - Energi Psikis(Jml) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2CF1\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C2CF2\">C2CF2 - Ketelitian dan Tanggungjawab (Be) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2CF2\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C2CF3\">C2CF3 - Kehati-hatian (Sa) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2CF3\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C2SF1\">C2SF1 - Pengendalian Perasaan (Si) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2SF1\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C2CF2\">C2CF2 - Dorongan Berprestasi (Ti) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2SF2\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C2CF3\">C2CF3 - Vitalitas dan Perencanaan (TP) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2SF3\" maxlength='1' size=\"1\" min='0' max='9'>
                    </div>
                    <h3>Tes 3 - DISC Personality Test</h3>
                    <div class=\"form-group\">
                        <label for=\"C3CF1\">C3CF1 - Dominance :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3CF1\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C3CF2\">C3CF2 - Influence :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3CF2\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C3CF3\">C3CF3 - Steadiness :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3CF3\" maxlength='1' size=\"1\" min='0' max='9'>
                        <label for=\"C3SF1\">C3SF1 - Compliance :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3SF1\" maxlength='1' size=\"1\" min='0' max='9'>
                    </div>                   
                    <button type=\"submit\" class=\"btn btn-default\">Submit</button>
                </form>";

            }else {
                echo " <h2>Anda tidak memiliki hak untuk menambah kandidat</h2>";?>

            <?php  }
            ?>

        </div>
    </div>

<?php
require_once("footerpage.php");
?>