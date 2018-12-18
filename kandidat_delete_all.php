<?php
$stmt = $conn->prepare('DELETE from kandidat');
$stmt->execute();
header("Location: /spk_pm/kandidat_manage.php"); ?>