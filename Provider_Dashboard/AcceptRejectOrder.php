<?php
session_start();

require_once('../Connect.php');

$id = $_GET['id'];
$accept = $_GET['accept'];

$food_meal = $_GET['food_meal'];
// $promo_code_id = $_GET['promo_code_id'];
// $meal_id = $_GET['meal_id'];

    mysqli_query($dbConn,"UPDATE orders SET status_id = '$accept' WHERE id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$food_meal} Accepted Successfully !');
          </script>";

            echo "<script language='JavaScript'>
            document.location='Orders.php';
                    </script>";



?>