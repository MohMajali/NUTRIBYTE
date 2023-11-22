<?php
session_start();


require_once('../Connect.php');
$id = $_GET['id'];

$sql1 = mysqli_query($dbConn, "SELECT * from providers WHERE id ='$id'");
$row1 = mysqli_fetch_array($sql1);

$userName = $row1['name'];
$user_type_id = $row1['user_type_id'];

if($row1['active'] == 1){

    mysqli_query($dbConn,"UPDATE providers set active = 0 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$userName} Deactivated Successfully !');
          </script>";

      echo "<script language='JavaScript'>
      document.location='Providers.php';
              </script>";



} else {
    mysqli_query($dbConn,"UPDATE providers set active = 1 where id ='$id'");

    echo "<script language='JavaScript'>
    alert ('{$userName} Deactivated Successfully !');
</script>";

      echo "<script language='JavaScript'>
      document.location='Providers.php';
              </script>";
}

?>