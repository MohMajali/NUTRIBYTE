<?php
session_start();

$id = $_GET['id'];

require_once('../Connect.php');

$sql1 = mysqli_query($dbConn, "SELECT * from providers WHERE id ='$id'");
$row1 = mysqli_fetch_array($sql1);

$providerName = $row1['name'];

if($row1['active'] == 1){

    mysqli_query($dbConn,"UPDATE providers set active = 0 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$providerName} Deactivated Successfully !');
          </script>";
          
    
        echo "<script language='JavaScript'>
    document.location='Providers.php';
            </script>";

} else {
    mysqli_query($dbConn,"UPDATE providers set active = 1 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$providerName} Activated Successfully !');
          </script>";
          
    
        echo "<script language='JavaScript'>
    document.location='Providers.php';
            </script>";
}




?>