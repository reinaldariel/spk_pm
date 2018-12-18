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
        <li class="breadcrumb-item active">Daftar Pegawai</li>
    </ol>


    <div id="myModaledit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit buku</h4>
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
                    <h4 class="modal-title">Edit buku</h4>
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
            $sql = "SELECT emp_id,emp_name,emp_gender,emp_phone,emp_address,emp_pass,emp_position FROM employee ORDER BY emp_id ASC LIMIT ?,?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $start_from, $limit);
            $stmt->execute();
            $stmt->bind_result($empid,$empnama,$empgend,$emptelp,$empaddress,$emppass,$empaturan);
            ?>
            <a class="btn btn-primary" href="admin_create.php">Tambah Pegawai</a>
            <br>
            <br>

            <table class="table table-bordered table-striped" id="tbl_emp">
                <tr>
                    <th>Employee ID</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Password</th>
                    <th>Posisi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php while($stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $empid ?></td>
                        <td><?php echo $empnama ?></td>
                        <td><?php echo $empgend ?></td>
                        <td><?php echo $emptelp ?></td>
                        <td><?php echo $empaddress ?></td>
                        <td><?php echo $emppass ?></td>
                        <td><?php echo $empaturan ?></td>
                        <td><a class="btn btn-warning"><i id='btnShowEdit' data-toggle='modal' data-target='#myModaledit' class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-danger"><i id='btnShowDelete' data-toggle='modal' data-target='#myModalDel' class="fa fa-remove"></i></a></td>
                    </tr>
                <?php } ?>
            </table>

            <?php
            $stmt->close();

            $sqlpaging = "SELECT COUNT(emp_id) FROM employee";
            $result = $conn->query($sqlpaging);
            $row = $result->fetch_row();
            $total_records = $row[0];
            $total_pages = ceil($total_records / $limit);
            $pagLink = "<ul class='pagination pagination-sm'>";
            for ($i=1; $i<=$total_pages; $i++) {
                $pagLink .= "<li><a href='admin_manage.php?page=".$i."'>".$i."</a></li>";
            };
            echo $pagLink . "</ul>";

            $conn->close();
            ?>
        </div>

    </div>
    <script>

        var id;
        $("#tbl_emp").on("click", "tr", function () {
            id = $(this).find("td").eq(0).text();
            $("#cekIDedit").val(id);
            $("#cekIDdel").val(id);
        });
        $("#btnEdit").click(function () {
            window.location.assign("edit-form-barang.php?id="+ id +"");
        });
        $("#btnDelete").click(function () {
            window.location.assign("admin_delete.php?id="+ id +"");
        });

    </script>
<?php
require_once("footerpage.php");
?>