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
        <li class="breadcrumb-item active">Daftar Kandidat</li>
    </ol>


    <div id="myModaledit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kandidat</h4>
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
    <div id="myModalDel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Kandidat</h4>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <p>Hapus data dengan id :</p>
                        <div class=\"form-group\">
                            <label for=\"id\">ID :</label>
                            <input class="form-control" id="cekIDdel" type="text" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type='button' id='btnDelete' class='btn btn-primary'>Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="myModalDelAll" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete All Kandidat</h4>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <p>Hapus semua data kandidat?</p>
                    </div>
                    <div class="modal-footer">
                        <button type='button' id='btnDelAll' class='btn btn-primary'>Hapus</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            $limit = 10;
            if (isset($_GET["page"])) {
                $page  = $_GET["page"];
            } else {
                $page=1;
            };

            $start_from = ($page-1) * $limit;
            $stmt = $conn->prepare('select * from kandidat');
            $stmt->execute();
            $stmt->bind_result($k_nomor, $C1CF1, $C1CF2, $C1CF3, $C1CF4, $C1CF5, $C1CF6, $C1SF1, $C1SF2, $C1SF3, $C2CF1, $C2CF2, $C2CF3, $C2SF1, $C2SF2, $C2SF3, $C3CF1, $C3CF2, $C3CF3, $C3SF1, $k_nama);
            ?>
            <a class="btn btn-primary" href="kandidat_form_insert.php">Tambah kandidat</a>
            <a class="btn btn-danger" id='btnShowDeleteAll' data-toggle='modal' data-target='#myModalDelAll'>Hapus Semua Data Kandidat</a>
            <br>
            <br>
            <table class="table table-bordered table-striped" id="tbl_kandidat">
                <?php while($stmt->fetch()) { ?>

                <tr>
                    <th>No Kandidat</th>
                    <th>Nama</th>
                    <td>Edit Kandidat</td>
                    <td>Hapus Kandidat</td>
                </tr>
                <tr>
                    <td><?php echo $k_nomor?></td>
                    <td><?php echo $k_nama ?></td>
                    <td><a class="btn btn-warning"><i id='btnShowEdit' data-toggle='modal' data-target='#myModaledit' class="fa fa-edit"></i></a></td>
                    <td><a class="btn btn-danger"><i id='btnShowDelete' data-toggle='modal' data-target='#myModalDel' class="fa fa-remove"></i></a></td>
                </tr>
                <tr>
                    <th colspan="10" style="text-align: center">C1 IST Test</th>
                </tr>
                <tr>
                    <th>CF1</th>
                    <th>CF2</th>
                    <th>CF3</th>
                    <th>CF4</th>
                    <th>CF5</th>
                    <th>CF6</th>
                    <th>SF1</th>
                    <th>SF2</th>
                    <th>SF3</th>
                </tr>
                <tr>
                    <td><?php echo $C1CF1 ?></td>
                    <td><?php echo $C1CF2 ?></td>
                    <td><?php echo $C1CF3 ?></td>
                    <td><?php echo $C1CF4 ?></td>
                    <td><?php echo $C1CF5 ?></td>
                    <td><?php echo $C1CF6 ?></td>
                    <td><?php echo $C1SF1 ?></td>
                    <td><?php echo $C1SF2 ?></td>
                    <td><?php echo $C1SF3 ?></td>
                </tr>
                <tr>
                    <th colspan="6" style="text-align: center">C2 Tes Pauli</th>
                </tr>
                <tr>
                    <th>CF1</th>
                    <th>CF2</th>
                    <th>CF3</th>
                    <th>SF1</th>
                    <th>SF2</th>
                    <th>SF3</th>
                </tr>
                <tr>
                    <td><?php echo $C2CF1 ?></td>
                    <td><?php echo $C2CF2 ?></td>
                    <td><?php echo $C2CF3 ?></td>
                    <td><?php echo $C2SF1 ?></td>
                    <td><?php echo $C2SF2 ?></td>
                    <td><?php echo $C2SF3 ?></td>
                </tr>
                <tr>
                    <th colspan="4" style="text-align: center">C3 DISC</th>
                </tr>
                <tr>
                    <th>CF1</th>
                    <th>CF2</th>
                    <th>CF3</th>
                    <th>SF1</th>
                </tr>
                    <tr>
                        <td><?php echo $C3CF1 ?></td>
                        <td><?php echo $C3CF2 ?></td>
                        <td><?php echo $C3CF3 ?></td>
                        <td><?php echo $C3SF1 ?></td>
                    </tr>
                    <tr>
                        <th colspan="4\"></th>
                    </tr>
                <?php } ?>

            </table>
            <?php
            $stmt->close();

            $sqlpaging = "SELECT COUNT(k_nomor) FROM kandidat";
            $result = $conn->query($sqlpaging);
            $row = $result->fetch_row();
            $total_records = $row[0];
            $total_pages = ceil($total_records / $limit);
            $pagLink = "<ul class='pagination pagination-sm'>";
            for ($i=1; $i<=$total_pages; $i++) {
                $pagLink .= "<li><a href='kandidat_manage.php?page=".$i."'>".$i."</a></li>";
            };
            echo $pagLink . "</ul>";

            $conn->close();
            ?>
        </div>

    </div>
    <script>

        var id;
        $("#tbl_kandidat").on("click", "tr", function () {
            id = $(this).find("td").eq(0).text();
            $("#cekIDedit").val(id);
            $("#cekIDdel").val(id);
        });
        $("#btnEdit").click(function () {
            window.location.assign("kandidat_form_edit.php?id="+ id +"");
        });
        $("#btnDelete").click(function () {
            window.location.assign("kandidat_delete.php?id="+ id +"");
        });
        $("#btnDelAll").click(function () {
            window.location.assign("kandidat_delete_all.php");
        });

    </script>
<?php
require_once("footerpage.php");
?>