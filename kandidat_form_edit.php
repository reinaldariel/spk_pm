<?php
require_once("headerpage.php");
require_once("koneksi.php");
?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Kandidat</li>
    </ol>
    <div class="row">
        <div class="col-6">
            <h1>Ubah Data Kandidat</h1>

            <?php
            $id = $_GET['id'];
            $stmt = $conn->prepare('select * from kandidat WHERE k_nomor = "'.$id.'"');
            $stmt->execute();
            $stmt->bind_result($k_nomor, $C1CF1, $C1CF2, $C1CF3, $C1CF4, $C1CF5, $C1CF6, $C1SF1, $C1SF2, $C1SF3, $C2CF1, $C2CF2, $C2CF3, $C2SF1, $C2SF2, $C2SF3, $C3CF1, $C3CF2, $C3CF3, $C3SF1, $k_nama);
while ($stmt->fetch()) {

    if (isset($_SESSION["username"]) and $_SESSION["aturan"] == "admin") {
        echo "
                <form action=\"kandidat_edit.php\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label for=\"NoK\">Nomor Kandidat:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NoK\" value='" . $k_nomor . "' readonly>
                    
                        <label for=\"NamaKandidat\">Nama Kandidat:</label>
                        <input type=\"text\" class=\"form-control\" name=\"NamaKandidat\" value='" . $k_nama . "'>
                    </div>
                    <h2>Input Nilai Tes</h2>
                    <h3>Tes 1 - IST</h3>
                    <div class=\"form-group\">
                        <label for=\"C1CF1\">C1CF1 - Common Sense :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF1\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1CF1 . "'>
                        <label for=\"C1CF2\">C1CF2 - Verbalisasi Ide :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF2\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1CF2 . "'>
                        <label for=\"C1CF3\">C1CF3 - Sistematika Berpikir :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF3\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1CF3 . "'>
                        <label for=\"C1CF4\">C1CF4 - Penalaran dan Solusi Real :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF4\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1CF4 . "'>
                        <label for=\"C1CF5\">C1CF5 - Konsentrasi :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF5\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1CF5 . "'>
                        <label for=\"C1CF6\">C1CF6 - Logika Praktis :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1CF6\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1CF6 . "'>
                        <label for=\"C1SF1\">C1SF1 - Fleksibilitas Berpikir :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1SF1\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1SF1 . "'>
                        <label for=\"C1SF2\">C1SF2 - Imajinasi Kreatif :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1SF2\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1SF2 . "'>
                        <label for=\"C1SF3\">C1SF3 - Antisipasi :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C1SF3\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C1SF3 . "'>
                    </div>
                    <h3>Tes 2 - Tes Pauli</h3>
                    <div class=\"form-group\">
                        <label for=\"C2CF1\">C2CF1 - Energi Psikis(Jml) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2CF1\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C2CF1 . "'>
                        <label for=\"C2CF2\">C2CF2 - Ketelitian dan Tanggungjawab (Be) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2CF2\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C2CF2 . "'>
                        <label for=\"C2CF3\">C2CF3 - Kehati-hatian (Sa) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2CF3\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C2CF3 . "'>
                        <label for=\"C2SF1\">C2SF1 - Pengendalian Perasaan (Si) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2SF1\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C2SF1 . "'>
                        <label for=\"C2CF2\">C2CF2 - Dorongan Berprestasi (Ti) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2SF2\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C2SF2 . "'>
                        <label for=\"C2CF3\">C2CF3 - Vitalitas dan Perencanaan (TP) :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C2SF3\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C2SF3 . "'>
                    </div>
                    <h3>Tes 3 - DISC Personality Test</h3>
                    <div class=\"form-group\">
                        <label for=\"C3CF1\">C3CF1 - Dominance :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3CF1\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C3CF1 . "'>
                        <label for=\"C3CF2\">C3CF2 - Influence :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3CF2\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C3CF2 . "'>
                        <label for=\"C3CF3\">C3CF3 - Steadiness :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3CF3\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C3CF3 . "'>
                        <label for=\"C3SF1\">C3SF1 - Compliance :</label>
                        <input type=\"number\" class=\"form-control\" name=\"C3SF1\" maxlength='1' size=\"1\" min='0' max='9' value='" . $C3SF1 . "'>
                    </div>                   
                    <button type=\"submit\" class=\"btn btn-default\">Submit</button>
                </form>
                ";

    } else {
        echo " <h2>Anda tidak memiliki hak untuk mengedit kandidat</h2>"; ?>

    <?php }
}
$stmt->close();
            ?>

        </div>
    </div>

<?php
require_once("footerpage.php");
?>