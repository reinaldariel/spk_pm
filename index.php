<?php
require_once("headerpage.php");
?>

<!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <h1>SPK - Profile Matching Pemilihan Kenaikan Jabatan</h1>
                <?php
                if(isset($_SESSION["username"])) {
                    echo "Selamat datang ".$_SESSION["nama"].", silakan pilih menu pengelolaan di samping kiri";

                }else {
                    echo "Selamat datang, pegawai silakan login untuk melakukan  pengelolaan";?>
                    </div>
                    <div class="col-6">
                        <br>
                        <form action="proseslogin.php" method="post">
                            <div class="form-group">
                                <label for="username">ID Pegawai:</label>
                                <input type="text" class="form-control" name="emp_id">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password:</label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form><br>
                        <?php  }
                ?>
                <?php
                if(isset($_GET["pesan"]) && $_GET["pesan"]!=""){
                    echo "<span class='alert alert-danger'>".$_GET["pesan"]."</span>";
                }
                ?>
            </div>
        </div>
    <!-- /.container-fluid-->
<?php
require_once("footerpage.php");
?>
