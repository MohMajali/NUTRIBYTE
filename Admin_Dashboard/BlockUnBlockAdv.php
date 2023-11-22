<?php
session_start();

$id = $_GET['id'];

require_once('../Connect.php');

$sql1 = mysqli_query($dbConn, "SELECT * from advertisements WHERE id ='$id'");
$row1 = mysqli_fetch_array($sql1);

$title = $row1['title'];

if($row1['active'] == 1){

    mysqli_query($dbConn,"UPDATE advertisements set active = 0 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$title} Deactivated Successfully !');
          </script>";
          
    
        echo "<script language='JavaScript'>
    document.location='Advertisment.php';
            </script>";

} else {
    mysqli_query($dbConn,"UPDATE advertisements set active = 1 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$title} Activated Successfully !');
          </script>";
          
    
        echo "<script language='JavaScript'>
    document.location='Advertisment.php';
            </script>";
}




?>