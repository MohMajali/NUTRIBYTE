<?php
session_start();

require_once('../Connect.php');

$id = $_GET['id'];

$sql1 = mysqli_query($dbConn, "SELECT * from meal_plans WHERE id ='$id'");
$row1 = mysqli_fetch_array($sql1);

$mealName = $row1['name'];
$expert_id = $row1['expert_id'];
$user_id = $row1['user_id'];

if($row1['active'] == 1){

    mysqli_query($dbConn,"UPDATE meal_plans set active = 0 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$mealName} Deactivated Successfully !');
          </script>";

            echo "<script language='JavaScript'>
            document.location='ViewFoodPlan.php?nId={$expert_id}&&uId={$user_id}';
                    </script>";

} else {
    mysqli_query($dbConn,"UPDATE meal_plans set active = 1 where id ='$id'");

	  
    echo "<script language='JavaScript'>
                  alert ('{$meal_plans} Activated Successfully !');
          </script>";

            echo "<script language='JavaScript'>
            document.location='ViewFoodPlan.php?nId={$expert_id}&&uId={$user_id}';
                    </script>";
}

?>