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
        <li class="breadcrumb-item active">Ubah Ketentuan (Bobot dan Nilai Acuan)</li>
    </ol>


    <div id="myModaledit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <p>Edit data dengan id :</p>
                        <div class=\"form-group\">
                            <label for=\"id\">ID :</label>
                            <input class="form-control" id="cekIDedit" type="text" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type='button' id='btnEdit' class='btn btn-primary'>Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="myModaleditSK" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <p>Edit data dengan id :</p>
                        <div class=\"form-group\">
                            <label for=\"id\">ID :</label>
                            <input class="form-control" id="cekIDeditSK" type="text" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type='button' id='btnEditSK' class='btn btn-primary'>Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php

            $sql = "SELECT * FROM kriteria";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($nk,$nak,$bk);
            ?>

            <table class="table table-bordered table-striped" id="tbl_k">
                <tr>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Bobot</th>
                    <th>Edit</th>
                </tr>

                <?php while($stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $nk ?></td>
                        <td><?php echo $nak ?></td>
                        <td><?php echo $bk ?></td>
                        <td><a class="btn btn-warning"><i id='btnShowEdit' data-toggle='modal' data-target='#myModaledit' class="fa fa-edit"></i></a></td>
                    </tr>
                <?php } ?>
            </table>

            <?php
            $stmt->close();
            ?>
        </div>

        <div class="col-md-12">
            <?php

            $sql = "SELECT * FROM sub_kriteria";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($sk1,$sk2,$sk3,$sk4,$sk5,$sk6);
            ?>
            <table class="table table-bordered table-striped" id="tbl_sk">
                <tr>
                    <th>Kode Sub Kategori</th>
                    <th>Nama Sub Kategori</th>
                    <th>Tipe</th>
                    <th>Bobot</th>
                    <th>Nilai Acuan</th>
                    <th>Kategori Acuan</th>
                    <th>Edit</th>

                </tr>

                <?php while($stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $sk1 ?></td>
                        <td><?php echo $sk2 ?></td>
                        <td><?php echo $sk3 ?></td>
                        <td><?php echo $sk4 ?></td>
                        <td><?php echo $sk5 ?></td>
                        <td><?php echo $sk6 ?></td>
                        <td><a class="btn btn-warning"><i id='btnShowEdit' data-toggle='modal' data-target='#myModaleditSK' class="fa fa-edit"></i></a></td>
                     </tr>
                <?php } ?>
            </table>

            <?php
            $stmt->close();
            ?>
        </div>

    </div>
    <script>

        var id;
        $("#tbl_k").on("click", "tr", function () {
            id = $(this).find("td").eq(0).text();
            $("#cekIDedit").val(id);
        });

        var id2;
        $("#tbl_sk").on("click", "tr", function () {
            id2 = $(this).find("td").eq(0).text();
            $("#cekIDeditSK").val(id2);
        });
        $("#btnEdit").click(function () {
            window.location.assign("kriteria_edit_form.php?id="+ id +"");
        });
        $("#btnEditSK").click(function () {
            window.location.assign("sk_edit_form.php?id="+ id2 +"");
        });

    </script>
<?php
require_once("footerpage.php");
?>