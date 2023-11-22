<?php
session_start();

$id = $_GET['id'];
$grantId = $_GET['grantId'];

require_once('../Connect.php');

$sql1 = mysqli_query($dbConn, "DELETE FROM grant_features WHERE id ='$id'");

echo "<script language='JavaScript'>
alert ('Feature Deleted Successfully !');
</script>";


echo "<script language='JavaScript'>
document.location='ViewFeature.php?id={$grantId}';
</script>";


?>