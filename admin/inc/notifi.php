<?php
include('../../inc/config/config.php');

$sql = "SELECT count(*) as count FROM purchase";
$qry = mysqli_query($conn,$sql);
$rowq = mysqli_fetch_assoc($qry);
echo $rowq['count'];
?>