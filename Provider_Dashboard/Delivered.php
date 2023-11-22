<?php
session_start();

require_once('../Connect.php');

$id = $_GET['id'];
$food_meal = $_GET['food_meal'];

    mysqli_query($dbConn,"UPDATE orders SET status_id = 4 WHERE id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$food_meal} Delivered Successfully !');
          </script>";

            echo "<script language='JavaScript'>
            document.location='Orders.php';
                    </script>";


?>