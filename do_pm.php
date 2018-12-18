<?php
include_once("koneksi.php");
require_once("headerpage.php");
$bobotAkhir=array();
$rataC1CF=array();
$rataC1SF=array();
$rataC2CF=array();
$rataC2SF=array();
$rataC3CF=array();
$rataC3SF=array();
$nama=array();
$nomor=array();
$C1=array();
$C2=array();
$C3=array();
$CAkhir=array();
$Nilai_NA = array();
$BC=array();
$BCS=array();
try{
    //cek selisih
    $stmt = $conn->prepare('select * from kandidat');
    $stmt->execute();
    $stmt->bind_result($k_nomor, $C1CF1, $C1CF2, $C1CF3, $C1CF4, $C1CF5, $C1CF6, $C1SF1, $C1SF2, $C1SF3, $C2CF1, $C2CF2, $C2CF3, $C2SF1, $C2SF2, $C2SF3, $C3CF1, $C3CF2, $C3CF3, $C3SF1, $k_nama);
    $count = $stmt->num_rows;
    ?>
<table class="table table-bordered table-striped" id="tbl_emp">
    <tr>
        <th colspan="22">Data Awal</th>
    </tr>
    <tr>
        <th rowspan="2">No Kandidat</th>
        <th rowspan="2" >Nama</th>
        <th colspan="9" style="text-align: center">C1</th>
        <th colspan="6" style="text-align: center">C2</th>
        <th colspan="4" style="text-align: center">C3</th>
    </tr>
    <tr>
        <th>C1CF1</th>
        <th>C1CF2</th>
        <th>C1CF3</th>
        <th>C1CF4</th>
        <th>C1CF5</th>
        <th>C1CF6</th>
        <th>C1SF1</th>
        <th>C1SF2</th>
        <th>C1SF3</th>
        <th>C2CF1</th>
        <th>C2CF2</th>
        <th>C2CF3</th>
        <th>C2SF1</th>
        <th>C2SF2</th>
        <th>C2SF3</th>
        <th>C3CF1</th>
        <th>C3CF2</th>
        <th>C3CF3</th>
        <th>C3SF1</th>
    </tr>
    <?php
    while($stmt->fetch()) { ?>
                     <tr>
                         <td><?php echo $k_nomor?></td>
                         <td><?php echo $k_nama ?></td>
                        <td><?php echo $C1CF1 ?></td>
                        <td><?php echo $C1CF2 ?></td>
                        <td><?php echo $C1CF3 ?></td>
                        <td><?php echo $C1CF4 ?></td>
                        <td><?php echo $C1CF5 ?></td>
                        <td><?php echo $C1CF6 ?></td>
                        <td><?php echo $C1SF1 ?></td>
                        <td><?php echo $C1SF2 ?></td>
                        <td><?php echo $C1SF3 ?></td>
                        <td><?php echo $C2CF1 ?></td>
                        <td><?php echo $C2CF2 ?></td>
                        <td><?php echo $C2CF3 ?></td>
                        <td><?php echo $C2SF1 ?></td>
                        <td><?php echo $C2SF2 ?></td>
                        <td><?php echo $C2SF3 ?></td>
                        <td><?php echo $C3CF1 ?></td>
                        <td><?php echo $C3CF2 ?></td>
                        <td><?php echo $C3CF3 ?></td>
                        <td><?php echo $C3SF1 ?></td>
                     </tr>
        <?php
    }
    $stmt = $conn->prepare('select sk_nilai_acuan from sub_kriteria');
    $stmt->execute();
    $stmt->bind_result($bobotNA);
    ?>
    <tr>
        <td colspan="2">Nilai Ideal</td>
        <?php
        while($stmt->fetch()) { ?>
        <td><?php echo $bobotNA ?></td>
        <?php } ?>
    </tr>
<?php

}

catch(Exception $e){
    $error = $e->getMessage();
}
finally{
    $stmt->close();
}
try{
$stmt = $conn->prepare('select sk_nilai_acuan from sub_kriteria');
$stmt->execute();
$stmt->bind_result($NA_nilai);
while ($stmt->fetch()){
    array_push($Nilai_NA,$NA_nilai);
}
$stmt->close();

$stmt = $conn->prepare('select * from kandidat');
$stmt->execute();
$stmt->bind_result($k_nomor, $C1CF1, $C1CF2, $C1CF3, $C1CF4, $C1CF5, $C1CF6, $C1SF1, $C1SF2, $C1SF3, $C2CF1, $C2CF2, $C2CF3, $C2SF1, $C2SF2, $C2SF3, $C3CF1, $C3CF2, $C3CF3, $C3SF1, $k_nama);
$count = $stmt->num_rows;
    while($stmt->fetch()) { ?>
        <tr>
            <td><?php echo $k_nomor?></td>
            <td><?php echo $k_nama ?></td>
            <td><?php echo $C1CF1-$Nilai_NA[0] ?></td>
            <td><?php echo $C1CF2-$Nilai_NA[1] ?></td>
            <td><?php echo $C1CF3-$Nilai_NA[2] ?></td>
            <td><?php echo $C1CF4-$Nilai_NA[3] ?></td>
            <td><?php echo $C1CF5-$Nilai_NA[4] ?></td>
            <td><?php echo $C1CF6-$Nilai_NA[5] ?></td>
            <td><?php echo $C1SF1-$Nilai_NA[6] ?></td>
            <td><?php echo $C1SF2-$Nilai_NA[7] ?></td>
            <td><?php echo $C1SF3-$Nilai_NA[8] ?></td>
            <td><?php echo $C2CF1-$Nilai_NA[9] ?></td>
            <td><?php echo $C2CF2-$Nilai_NA[10] ?></td>
            <td><?php echo $C2CF3-$Nilai_NA[11] ?></td>
            <td><?php echo $C2SF1-$Nilai_NA[12] ?></td>
            <td><?php echo $C2SF2-$Nilai_NA[13] ?></td>
            <td><?php echo $C2SF3-$Nilai_NA[14] ?></td>
            <td><?php echo $C3CF1-$Nilai_NA[15] ?></td>
            <td><?php echo $C3CF2-$Nilai_NA[16] ?></td>
            <td><?php echo $C3CF3-$Nilai_NA[17] ?></td>
            <td><?php echo $C3SF1-$Nilai_NA[18] ?></td>
        </tr>
        <?php
        array_push($nama,$k_nama);
        array_push($nomor,$k_nomor);
    }
    ?>
    <tr>
        <td colspan="22">Pembobotan Selisih</td>

    </tr>
    <?php
 }
 catch(Exception $e){
    $error = $e->getMessage();
}
finally{
    $stmt->close();
}

$stmt = $conn->prepare('select k_bobot from kriteria');
$stmt->execute();
$stmt->bind_result($k_bobot);
while ($stmt->fetch()){
    array_push($BC,$k_bobot);
}
$stmt->close();

$stmt = $conn->prepare('select sk_bobot from sub_kriteria');
$stmt->execute();
$stmt->bind_result($sk_bobot);
while ($stmt->fetch()){
    array_push($BCS,$sk_bobot);
}
$stmt->close();

    try{
    $counter = 0;
    $stmt = $conn->prepare('select * from kandidat');
    $stmt->execute();
    $stmt->bind_result($k_nomor, $C1CF1, $C1CF2, $C1CF3, $C1CF4, $C1CF5, $C1CF6, $C1SF1, $C1SF2, $C1SF3, $C2CF1, $C2CF2, $C2CF3, $C2SF1, $C2SF2, $C2SF3, $C3CF1, $C3CF2, $C3CF3, $C3SF1, $k_nama);
    $count = $stmt->num_rows;
    while($stmt->fetch()) { ?>
    <tr>
        <td><?php echo $k_nomor?></td>
        <td><?php echo $k_nama ?></td>
        <td><?php if($C1CF1-$Nilai_NA[0] == 0){
            $C1CF1=6;
            }
            else if($C1CF1-$Nilai_NA[0] == 1){
            $C1CF1=5.5;
            }
            else if($C1CF1-$Nilai_NA[0] == 2){
                $C1CF1=4.5;
            }
            else if($C1CF1-$Nilai_NA[0] == 3){
                $C1CF1=3.5;
            }
            else if($C1CF1-$Nilai_NA[0] == 4){
                $C1CF1=2.5;
            }
            else if($C1CF1-$Nilai_NA[0] == 5){
                $C1CF1=1.5;
            }
            else if($C1CF1-$Nilai_NA[0] == -1){
                $C1CF1=5;
            }
            else if($C1CF1-$Nilai_NA[0] == -2){
                $C1CF1=4;
            }
            else if($C1CF1-$Nilai_NA[0] == -3){
                $C1CF1=3;
            }
            else if($C1CF1-$Nilai_NA[0] == -4){
                $C1CF1=2;
            }
            else
            {
                $C1CF1=1;
            }
            echo $C1CF1;
            ?></td>
        <td><?php if($C1CF2-$Nilai_NA[1] == 0){
                $C1CF2=6;
            }
            else if($C1CF2-$Nilai_NA[1] == 1){
                $C1CF2=5.5;
            }
            else if($C1CF2-$Nilai_NA[1] == 2){
                $C1CF2=4.5;
            }
            else if($C1CF2-$Nilai_NA[1] == 3){
                $C1CF2=3.5;
            }
            else if($C1CF2-$Nilai_NA[1] == 4){
                $C1CF2=2.5;
            }
            else if($C1CF2-$Nilai_NA[1] == 5){
                $C1CF2=1.5;
            }
            else if($C1CF2-$Nilai_NA[1] == -1){
                $C1CF2=5;
            }
            else if($C1CF2-$Nilai_NA[1] == -2){
                $C1CF2=4;
            }
            else if($C1CF2-$Nilai_NA[1] == -3){
                $C1CF2=3;
            }
            else if($C1CF2-$Nilai_NA[1] == -4){
                $C1CF2=2;
            }
            else
            {
                $C1CF2=1;
            }
            echo $C1CF2;
            ?></td>
        <td><?php if($C1CF3-$Nilai_NA[2] == 0){
                $C1CF3=6;
            }
            else if($C1CF3-$Nilai_NA[2] == 1){
                $C1CF3=5.5;
            }
            else if($C1CF3-$Nilai_NA[2] == 2){
                $C1CF3=4.5;
            }
            else if($C1CF3-$Nilai_NA[2] == 3){
                $C1CF3=3.5;
            }
            else if($C1CF3-$Nilai_NA[2] == 4){
                $C1CF3=2.5;
            }
            else if($C1CF3-$Nilai_NA[2] == 5){
                $C1CF3=1.5;
            }
            else if($C1CF3-$Nilai_NA[2] == -1){
                $C1CF3=5;
            }
            else if($C1CF3-$Nilai_NA[2] == -2){
                $C1CF3=4;
            }
            else if($C1CF3-$Nilai_NA[2] == -3){
                $C1CF3=3;
            }
            else if($C1CF3-$Nilai_NA[2] == -4){
                $C1CF3=2;
            }
            else
            {
                $C1CF3=1;
            }
            echo $C1CF3;
            ?></td>
        <td><?php if($C1CF4-$Nilai_NA[3] == 0){
                $C1CF4=6;
            }
            else if($C1CF4-$Nilai_NA[3] == 1){
                $C1CF4=5.5;
            }
            else if($C1CF4-$Nilai_NA[3] == 2){
                $C1CF4=4.5;
            }
            else if($C1CF4-$Nilai_NA[3] == 3){
                $C1CF4=3.5;
            }
            else if($C1CF4-$Nilai_NA[3] == 4){
                $C1CF4=2.5;
            }
            else if($C1CF4-$Nilai_NA[3] == 5){
                $C1CF4=1.5;
            }
            else if($C1CF4-$Nilai_NA[3] == -1){
                $C1CF4=5;
            }
            else if($C1CF4-$Nilai_NA[3] == -2){
                $C1CF4=4;
            }
            else if($C1CF4-$Nilai_NA[3] == -3){
                $C1CF4=3;
            }
            else if($C1CF4-$Nilai_NA[3] == -4){
                $C1CF4=2;
            }
            else
            {
                $C1CF4=1;
            }
            echo $C1CF4;
            ?></td>
        <td><?php if($C1CF5-$Nilai_NA[4]  == 0){
                $C1CF5=6;
            }
            else if($C1CF5-$Nilai_NA[4] == 1){
                $C1CF5=5.5;
            }
            else if($C1CF5-$Nilai_NA[4] == 2){
                $C1CF5=4.5;
            }
            else if($C1CF5-$Nilai_NA[4] == 3){
                $C1CF5=3.5;
            }
            else if($C1CF5-$Nilai_NA[4] == 4){
                $C1CF5=2.5;
            }
            else if($C1CF5-$Nilai_NA[4] == 5){
                $C1CF5=1.5;
            }
            else if($C1CF5-$Nilai_NA[4] == -1){
                $C1CF5=5;
            }
            else if($C1CF5-$Nilai_NA[4] == -2){
                $C1CF5=4;
            }
            else if($C1CF5-$Nilai_NA[4] == -3){
                $C1CF5=3;
            }
            else if($C1CF5-$Nilai_NA[4] == -4){
                $C1CF5=2;
            }
            else
            {
                $C1CF5=1;
            }
            echo $C1CF5;
            ?></td>
        <td><?php if($C1CF6-$Nilai_NA[5] == 0){
                $C1CF6=6;
            }
            else if($C1CF6-$Nilai_NA[5] == 1){
                $C1CF6=5.5;
            }
            else if($C1CF6-$Nilai_NA[5] == 2){
                $C1CF6=4.5;
            }
            else if($C1CF6-$Nilai_NA[5] == 3){
                $C1CF6=3.5;
            }
            else if($C1CF6-$Nilai_NA[5] == 4){
                $C1CF6=2.5;
            }
            else if($C1CF6-$Nilai_NA[5] == 5){
                $C1CF6=1.5;
            }
            else if($C1CF6-$Nilai_NA[5] == -1){
                $C1CF6=5;
            }
            else if($C1CF6-$Nilai_NA[5] == -2){
                $C1CF6=4;
            }
            else if($C1CF6-$Nilai_NA[5] == -3){
                $C1CF6=3;
            }
            else if($C1CF6-$Nilai_NA[5] == -4){
                $C1CF6=2;
            }
            else
            {
                $C1CF6=1;
            }
            echo $C1CF6;
            ?></td>
        <td><?php if($C1SF1-$Nilai_NA[6] == 0){
                $C1SF1=6;
            }
            else if($C1SF1-$Nilai_NA[6] == 1){
                $C1SF1=5.5;
            }
            else if($C1SF1-$Nilai_NA[6] == 2){
                $C1SF1=4.5;
            }
            else if($C1SF1-$Nilai_NA[6] == 3){
                $C1SF1=3.5;
            }
            else if($C1SF1-$Nilai_NA[6] == 4){
                $C1SF1=2.5;
            }
            else if($C1SF1-$Nilai_NA[6] == 5){
                $C1SF1=1.5;
            }
            else if($C1SF1-$Nilai_NA[6] == -1){
                $C1SF1=5;
            }
            else if($C1SF1-$Nilai_NA[6] == -2){
                $C1SF1=4;
            }
            else if($C1SF1-$Nilai_NA[6] == -3){
                $C1SF1=3;
            }
            else if($C1SF1-$Nilai_NA[6] == -4){
                $C1SF1=2;
            }
            else
            {
                $C1SF1=1;
            }
            echo $C1SF1;
            ?></td>
        <td><?php if($C1SF2-$Nilai_NA[7] == 0){
                $C1SF2=6;
            }
            else if($C1SF2-$Nilai_NA[7] == 1){
                $C1SF2=5.5;
            }
            else if($C1SF2-$Nilai_NA[7] == 2){
                $C1SF2=4.5;
            }
            else if($C1SF2-$Nilai_NA[7] == 3){
                $C1SF2=3.5;
            }
            else if($C1SF2-$Nilai_NA[7] == 4){
                $C1SF2=2.5;
            }
            else if($C1SF2-$Nilai_NA[7] == 5){
                $C1SF2=1.5;
            }
            else if($C1SF2-$Nilai_NA[7] == -1){
                $C1SF2=5;
            }
            else if($C1SF2-$Nilai_NA[7] == -2){
                $C1SF2=4;
            }
            else if($C1SF2-$Nilai_NA[7] == -3){
                $C1SF2=3;
            }
            else if($C1SF2-$Nilai_NA[7] == -4){
                $C1SF2=2;
            }
            else
            {
                $C1SF2=1;
            }
            echo $C1SF2;
            ?></td>
        <td><?php if($C1SF3-$Nilai_NA[8] == 0){
                $C1SF3=6;
            }
            else if($C1SF3-$Nilai_NA[8] == 1){
                $C1SF3=5.5;
            }
            else if($C1SF3-$Nilai_NA[8] == 2){
                $C1SF3=4.5;
            }
            else if($C1SF3-$Nilai_NA[8] == 3){
                $C1SF3=3.5;
            }
            else if($C1SF3-$Nilai_NA[8] == 4){
                $C1SF3=2.5;
            }
            else if($C1SF3-$Nilai_NA[8] == 5){
                $C1SF3=1.5;
            }
            else if($C1SF3-$Nilai_NA[8] == -1){
                $C1SF3=5;
            }
            else if($C1SF3-$Nilai_NA[8] == -2){
                $C1SF3=4;
            }
            else if($C1SF3-$Nilai_NA[8] == -3){
                $C1SF3=3;
            }
            else if($C1SF3-$Nilai_NA[8] == -4){
                $C1SF3=2;
            }
            else
            {
                $C1SF3=1;
            }
            echo $C1SF3;
            ?></td>
        <td><?php if($C2CF1-$Nilai_NA[9] == 0){
                $C2CF1=6;
            }
            else if($C2CF1-$Nilai_NA[9] == 1){
                $C2CF1=5.5;
            }
            else if($C2CF1-$Nilai_NA[9] == 2){
                $C2CF1=4.5;
            }
            else if($C2CF1-$Nilai_NA[9] == 3){
                $C2CF1=3.5;
            }
            else if($C2CF1-$Nilai_NA[9] == 4){
                $C2CF1=2.5;
            }
            else if($C2CF1-$Nilai_NA[9] == 5){
                $C2CF1=1.5;
            }
            else if($C2CF1-$Nilai_NA[9] == -1){
                $C2CF1=5;
            }
            else if($C2CF1-$Nilai_NA[9] == -2){
                $C2CF1=4;
            }
            else if($C2CF1-$Nilai_NA[9] == -3){
                $C2CF1=3;
            }
            else if($C2CF1-$Nilai_NA[9] == -4){
                $C2CF1=2;
            }
            else
            {
                $C2CF1=1;
            }
            echo $C2CF1;
            ?></td>
        <td><?php if($C2CF2-$Nilai_NA[10] == 0){
                $C2CF2=6;
            }
            else if($C2CF2-$Nilai_NA[10] == 1){
                $C2CF2=5.5;
            }
            else if($C2CF2-$Nilai_NA[10] == 2){
                $C2CF2=4.5;
            }
            else if($C2CF2-$Nilai_NA[10] == 3){
                $C2CF2=3.5;
            }
            else if($C2CF2-$Nilai_NA[10] == 4){
                $C2CF2=2.5;
            }
            else if($C2CF2-$Nilai_NA[10] == 5){
                $C2CF2=1.5;
            }
            else if($C2CF2-$Nilai_NA[10] == -1){
                $C2CF2=5;
            }
            else if($C2CF2-$Nilai_NA[10] == -2){
                $C2CF2=4;
            }
            else if($C2CF2-$Nilai_NA[10] == -3){
                $C2CF2=3;
            }
            else if($C2CF2-$Nilai_NA[10] == -4){
                $C2CF2=2;
            }
            else
            {
                $C2CF2=1;
            }
            echo $C2CF2;
            ?></td>
        <td><?php if($C2CF3-$Nilai_NA[11] == 0){
                $C2CF3=6;
            }
            else if($C2CF3-$Nilai_NA[11] == 1){
                $C2CF3=5.5;
            }
            else if($C2CF3-$Nilai_NA[11] == 2){
                $C2CF3=4.5;
            }
            else if($C2CF3-$Nilai_NA[11] == 3){
                $C2CF3=3.5;
            }
            else if($C2CF3-$Nilai_NA[11] == 4){
                $C2CF3=2.5;
            }
            else if($C2CF3-$Nilai_NA[11] == 5){
                $C2CF3=1.5;
            }
            else if($C2CF3-$Nilai_NA[11] == -1){
                $C2CF3=5;
            }
            else if($C2CF3-$Nilai_NA[11] == -2){
                $C2CF3=4;
            }
            else if($C2CF3-$Nilai_NA[11] == -3){
                $C2CF3=3;
            }
            else if($C2CF3-$Nilai_NA[11] == -4){
                $C2CF3=2;
            }
            else
            {
                $C2CF3=1;
            }
            echo $C2CF3;
            ?></td>
        <td><?php if($C2SF1-$Nilai_NA[12] == 0){
                $C2SF1=6;
            }
            else if($C2SF1-$Nilai_NA[12] == 1){
                $C2SF1=5.5;
            }
            else if($C2SF1-$Nilai_NA[12] == 2){
                $C2SF1=4.5;
            }
            else if($C2SF1-$Nilai_NA[12] == 3){
                $C2SF1=3.5;
            }
            else if($C2SF1-$Nilai_NA[12] == 4){
                $C2SF1=2.5;
            }
            else if($C2SF1-$Nilai_NA[12] == 5){
                $C2SF1=1.5;
            }
            else if($C2SF1-$Nilai_NA[12] == -1){
                $C2SF1=5;
            }
            else if($C2SF1-$Nilai_NA[12] == -2){
                $C2SF1=4;
            }
            else if($C2SF1-$Nilai_NA[12] == -3){
                $C2SF1=3;
            }
            else if($C2SF1-$Nilai_NA[12] == -4){
                $C2SF1=2;
            }
            else
            {
                $C2SF1=1;
            }
            echo $C2SF1;
            ?></td>
        <td><?php if($C2SF2-$Nilai_NA[13] == 0){
                $C2SF2=6;
            }
            else if($C2SF2-$Nilai_NA[13] == 1){
                $C2SF2=5.5;
            }
            else if($C2SF2-$Nilai_NA[13] == 2){
                $C2SF2=4.5;
            }
            else if($C2SF2-$Nilai_NA[13] == 3){
                $C2SF2=3.5;
            }
            else if($C2SF2-$Nilai_NA[13] == 4){
                $C2SF2=2.5;
            }
            else if($C2SF2-$Nilai_NA[13] == 5){
                $C2SF2=1.5;
            }
            else if($C2SF2-$Nilai_NA[13] == -1){
                $C2SF2=5;
            }
            else if($C2SF2-$Nilai_NA[13] == -2){
                $C2SF2=4;
            }
            else if($C2SF2-$Nilai_NA[13] == -3){
                $C2SF2=3;
            }
            else if($C2SF2-$Nilai_NA[13] == -4){
                $C2SF2=2;
            }
            else
            {
                $C2SF2=1;
            }
            echo $C2SF2;
            ?></td>
        <td><?php if($C2SF3-$Nilai_NA[14] == 0){
                $C2SF3=6;
            }
            else if($C2SF3-$Nilai_NA[14] == 1){
                $C2SF3=5.5;
            }
            else if($C2SF3-$Nilai_NA[14] == 2){
                $C2SF3=4.5;
            }
            else if($C2SF3-$Nilai_NA[14] == 3){
                $C2SF3=3.5;
            }
            else if($C2SF3-$Nilai_NA[14] == 4){
                $C2SF3=2.5;
            }
            else if($C2SF3-$Nilai_NA[14] == 5){
                $C2SF3=1.5;
            }
            else if($C2SF3-$Nilai_NA[14] == -1){
                $C2SF3=5;
            }
            else if($C2SF3-$Nilai_NA[14] == -2){
                $C2SF3=4;
            }
            else if($C2SF3-$Nilai_NA[14] == -3){
                $C2SF3=3;
            }
            else if($C2SF3-$Nilai_NA[14] == -4){
                $C2SF3=2;
            }
            else
            {
                $C2SF3=1;
            }
            echo $C2SF3;
            ?></td>
        <td><?php if($C3CF1-$Nilai_NA[15] == 0){
                $C3CF1=6;
            }
            else if($C3CF1-$Nilai_NA[15] == 1){
                $C3CF1=5.5;
            }
            else if($C3CF1-$Nilai_NA[15] == 2){
                $C3CF1=4.5;
            }
            else if($C3CF1-$Nilai_NA[15] == 3){
                $C3CF1=3.5;
            }
            else if($C3CF1-$Nilai_NA[15] == 4){
                $C3CF1=2.5;
            }
            else if($C3CF1-$Nilai_NA[15] == 5){
                $C3CF1=1.5;
            }
            else if($C3CF1-$Nilai_NA[15] == -1){
                $C3CF1=5;
            }
            else if($C3CF1-$Nilai_NA[15] == -2){
                $C3CF1=4;
            }
            else if($C3CF1-$Nilai_NA[15] == -3){
                $C3CF1=3;
            }
            else if($C3CF1-$Nilai_NA[15] == -4){
                $C3CF1=2;
            }
            else
            {
                $C3CF1=1;
            }
            echo $C3CF1;
            ?></td>
        <td><?php if($C3CF2-$Nilai_NA[16] == 0){
                $C3CF2=6;
            }
            else if($C3CF2-$Nilai_NA[16] == 1){
                $C3CF2=5.5;
            }
            else if($C3CF2-$Nilai_NA[16] == 2){
                $C3CF2=4.5;
            }
            else if($C3CF2-$Nilai_NA[16] == 3){
                $C3CF2=3.5;
            }
            else if($C3CF2-$Nilai_NA[16] == 4){
                $C3CF2=2.5;
            }
            else if($C3CF2-$Nilai_NA[16] == 5){
                $C3CF2=1.5;
            }
            else if($C3CF2-$Nilai_NA[16] == -1){
                $C3CF2=5;
            }
            else if($C3CF2-$Nilai_NA[16] == -2){
                $C3CF2=4;
            }
            else if($C3CF2-$Nilai_NA[16] == -3){
                $C3CF2=3;
            }
            else if($C3CF2-$Nilai_NA[16] == -4){
                $C3CF2=2;
            }
            else
            {
                $C3CF2=1;
            }
            echo $C3CF2;
            ?></td>
        <td><?php if($C3CF3-$Nilai_NA[17] == 0){
                $C3CF3=6;
            }
            else if($C3CF3-$Nilai_NA[17] == 1){
                $C3CF3=5.5;
            }
            else if($C3CF3-$Nilai_NA[17] == 2){
                $C3CF3=4.5;
            }
            else if($C3CF3-$Nilai_NA[17] == 3){
                $C3CF3=3.5;
            }
            else if($C3CF3-$Nilai_NA[17] == 4){
                $C3CF3=2.5;
            }
            else if($C3CF3-$Nilai_NA[17] == 5){
                $C3CF3=1.5;
            }
            else if($C3CF3-$Nilai_NA[17] == -1){
                $C3CF3=5;
            }
            else if($C3CF3-$Nilai_NA[17] == -2){
                $C3CF3=4;
            }
            else if($C3CF3-$Nilai_NA[17] == -3){
                $C3CF3=3;
            }
            else if($C3CF3-$Nilai_NA[17] == -4){
                $C3CF3=2;
            }
            else
            {
                $C3CF3=1;
            }
            echo $C3CF3;
            ?></td>
        <td><?php if($C3SF1-$Nilai_NA[18] == 0){
                $C3SF1=6;
            }
            else if($C3SF1-$Nilai_NA[18] == 1){
                $C3SF1=5.5;
            }
            else if($C3SF1-$Nilai_NA[18] == 2){
                $C3SF1=4.5;
            }
            else if($C3SF1-$Nilai_NA[18] == 3){
                $C3SF1=3.5;
            }
            else if($C3SF1-$Nilai_NA[18] == 4){
                $C3SF1=2.5;
            }
            else if($C3SF1-$Nilai_NA[18] == 5){
                $C3SF1=1.5;
            }
            else if($C3SF1-$Nilai_NA[18] == -1){
                $C3SF1=5;
            }
            else if($C3SF1-$Nilai_NA[18] == -2){
                $C3SF1=4;
            }
            else if($C3SF1-$Nilai_NA[18] == -3){
                $C3SF1=3;
            }
            else if($C3SF1-$Nilai_NA[18] == -4){
                $C3SF1=2;
            }
            else
            {
                $C3SF1=1;
            }
            echo $C3SF1;
            ?></td>
    </tr>
    <?php
        array_push($rataC1CF,(($C1CF1+$C1CF2+$C1CF3+$C1CF4+$C1CF5+$C1CF6)/6));
        array_push($rataC1SF,(($C1SF1+$C1SF2+$C1SF3)/3));
        array_push($rataC2CF,(($C2CF1+$C2CF2+$C2CF3)/3));
        array_push($rataC2SF,(($C2SF1+$C2SF2+$C2SF3)/3));
        array_push($rataC3CF,(($C3CF1+$C3CF2+$C3CF3)/3));
        array_push($rataC3SF, $C3SF1);
    }
    ?>
        <tr>
            <td colspan="8">Rata-rata</td>
        </tr>
        <tr>
            <th rowspan="2">No Kandidat</th>
            <th rowspan="2" >Nama</th>
            <th colspan="2" style="text-align: center">C1</th>
            <th colspan="2" style="text-align: center">C2</th>
            <th colspan="2" style="text-align: center">C3</th>
        </tr>
        <tr>
            <td>CF (<?php echo($BCS[0]+$BCS[1]+$BCS[2]+$BCS[3]+$BCS[4]+$BCS[5])?>%)</td>
            <td>SF (<?php echo($BCS[6]+$BCS[7]+$BCS[8])?>%)</td>
            <td>CF (<?php echo($BCS[9]+$BCS[10]+$BCS[11])?>%)</td>
            <td>SF (<?php echo($BCS[12]+$BCS[13]+$BCS[14])?>%)</td>
            <td>CF (<?php echo($BCS[15]+$BCS[16]+$BCS[17])?>%)</td>
            <td>SF (<?php echo$BCS[18]?>%)</td>
        </tr>

            <?php
            for($x=0;$x<count($rataC1CF);$x++){
                array_push($C1,($rataC1CF[$x]*($BCS[0]+$BCS[1]+$BCS[2]+$BCS[3]+$BCS[4]+$BCS[5])/100)+($rataC1SF[$x]*($BCS[6]+$BCS[7]+$BCS[8])/100));
                array_push($C2,(($rataC2CF[$x]*($BCS[9]+$BCS[10]+$BCS[11])/100)+($rataC2SF[$x]*($BCS[12]+$BCS[13]+$BCS[14])/100)));
                array_push($C3,(($rataC3CF[$x]*($BCS[15]+$BCS[16]+$BCS[17])/100)+($rataC3SF[$x]*$BCS[18]/100)));
                array_push($CAkhir,(($C1[$x]*$BC[0]/100)+($C2[$x]*$BC[1]/100)+($C3[$x]*$BC[2]/100)))?>
    <tr>
        <td><?php echo $nomor[$x] ?></td>
        <td><?php echo $nama[$x] ?></td>
        <td><?php echo $rataC1CF[$x] ?></td>
        <td><?php echo $rataC1SF[$x] ?></td>
        <td><?php echo $rataC2CF[$x] ?></td>
        <td><?php echo $rataC2SF[$x] ?></td>
        <td><?php echo $rataC3CF[$x] ?></td>
        <td><?php echo $rataC3SF[$x] ?></td>
    </tr>
    <?php
            }
    }
    catch(Exception $e){
    $error = $e->getMessage();
    }
    finally{
    $stmt->close();

    }?>
    <tr>
        <td colspan="5">Perkalian persentase CF dan SF masing - masing</td>
    </tr>
    <tr>
        <th>No Kandidat</th>
        <th>Nama</th>
        <th>C1 (<?php echo$BC[0]?>%)</th>
        <th>C2 (<?php echo$BC[1]?>%)</th>
        <th>C3 (<?php echo$BC[2]?>%)</th>
    </tr>
    <?php for ($y=0;$y<count($nama);$y++){?>
    <tr>
        <td><?php echo $nomor[$y];?></td>
        <td><?php echo $nama[$y];?></td>
        <td><?php echo $C1[$y];?></td>
        <td><?php echo $C2[$y];?></td>
        <td><?php echo $C3[$y];?></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="3">Perhitungan Bobot Akhir</td>
    </tr>
    <tr>
        <th>No Kandidat</th>
        <th>Nama</th>
        <th>Hasil Akhir</th>
    </tr>
    <?php
    $stmt = $conn->prepare("DELETE FROM tampung_hasil");
    $stmt->execute();
    $stmt->close();

    for ($y=0;$y<count($nama);$y++) { ?>
        <tr>
            <td><?php echo $nomor[$y]; ?></td>
            <td><?php echo $nama[$y]; ?></td>
            <td><?php echo $CAkhir[$y]; ?></td>
        </tr>
        <?php
        $stmt = $conn->prepare("INSERT INTO tampung_hasil VALUES (?,?,?)");
        $stmt->bind_param("ssd", $nomor[$y], $nama[$y], $CAkhir[$y]);
        try{
            $stmt->execute();
        }catch(Exception $e){
            $pesan = "Proses gagal, kesalahan:".$e->getMessage();
        }finally {
            $stmt->close();
        }
    }
?>
    <tr>
        <td colspan="3">Terpilih</td>
    </tr>
    <tr>
        <th>No Kandidat</th>
        <th>Nama</th>
        <th>Hasil Akhir</th>
    </tr>
<?php

    $stmt = $conn->prepare('select * from tampung_hasil ORDER BY th_nilai DESC LIMIT 1');
    $stmt->execute();
    $stmt->bind_result($h_nomor, $h_nama, $h_nilai);

    while($stmt->fetch()) { ?>
    <tr>
        <td><?php echo $h_nomor?></td>
        <td><?php echo $h_nama?></td>
        <td><?php echo $h_nilai?></td>
    </tr>
    <?php } ?>
</table>