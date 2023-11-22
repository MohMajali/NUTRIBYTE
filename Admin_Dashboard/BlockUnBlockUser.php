<?php
session_start();

$id = $_GET['id'];

require_once('../Connect.php');

$sql1 = mysqli_query($dbConn, "SELECT * from users WHERE id ='$id'");
$row1 = mysqli_fetch_array($sql1);

$userName = $row1['name'];
$user_type_id = $row1['user_type_id'];

if($row1['active'] == 1){

    mysqli_query($dbConn,"UPDATE users set active = 0 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$userName} Deactivated Successfully !');
          </script>";
          
    
    if($user_type_id == 2){

      echo "<script language='JavaScript'>
      document.location='Nutrionist.php';
              </script>";
    } else if($user_type_id == 3){

      echo "<script language='JavaScript'>
      document.location='Clients.php';
              </script>";
    }


} else {
    mysqli_query($dbConn,"UPDATE users set active = 1 where id ='$id'");

    echo "<script language='JavaScript'>
    alert ('{$userName} Deactivated Successfully !');
</script>";

	  
    if($user_type_id == 2){

      echo "<script language='JavaScript'>
      document.location='Nutrionist.php';
              </script>";
    } else if($user_type_id == 3){

      echo "<script language='JavaScript'>
      document.location='Clients.php';
              </script>";
    }
}




?>