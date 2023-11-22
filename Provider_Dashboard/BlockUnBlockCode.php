<?php
session_start();

require_once('../Connect.php');

$id = $_GET['id'];

$sql1 = mysqli_query($dbConn, "SELECT * from promo_codes WHERE id ='$id'");
$row1 = mysqli_fetch_array($sql1);

$code = $row1['code'];

if($row1['active'] == 1){

    mysqli_query($dbConn,"UPDATE promo_codes set active = 0 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$code} Deactivated Successfully !');
          </script>";

            echo "<script language='JavaScript'>
            document.location='Promo_Codes.php';
                    </script>";

} else {
    mysqli_query($dbConn,"UPDATE promo_codes set active = 1 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$code} Activated Successfully !');
          </script>";

            echo "<script language='JavaScript'>
            document.location='Promo_Codes.php';
                    </script>";
}

?>