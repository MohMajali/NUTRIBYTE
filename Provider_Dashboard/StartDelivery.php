<?php
session_start();

require_once '../Connect.php';

$id = $_GET['id'];
$food_meal = $_GET['food_meal'];

mysqli_query($dbConn, "UPDATE orders SET status_id = 5 WHERE id ='$id'");

echo "<script language='JavaScript'>
                  alert ('{$id} Started To Deliver Successfully !');
          </script>";

echo "<script language='JavaScript'>
            document.location='Orders.php';
                    </script>";
