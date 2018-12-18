<?php
require_once("koneksi.php");
require_once("headerpage.php");
?>
    <style>
        li {
            float: left;
            list-style: outside none none;
            padding-left: 5px; }
    </style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Bobot Selisih</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php

            $stmt = $conn->prepare('select * from selisih_nilai_gap');
            $stmt->execute();
            $stmt->bind_result($s,$b);
            ?>
            <table class="table table-bordered table-striped" id="tbl_b">
                <tr>
                    <th>Selisih</th>
                    <th>Bobot</th>
                </tr>
                <?php while($stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $s?></td>
                        <td><?php echo $b ?></td>
                    </tr>
                    <tr>
<?php }?>
            </table>
            <?php
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
<?php
require_once("footerpage.php");
?>