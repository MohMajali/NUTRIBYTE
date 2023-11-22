<?php
session_start();

include("../Connect.php"); 

$_SESSION['U_Log']=0;
unset($_SESSION['U_Log']);
// unset($_SESSION['Adv_Log']);
// unset($_SESSION['C_Log']);
// unset($_SESSION['P_Log']);
// unset($_SESSION['N_Log']);
// unset($_SESSION['M_Log']);
// unset($_SESSION['A_Log']);
// unset($_SESSION['O_Log']);
// unset($_SESSION['U_ID']);
// unset($_SESSION['C_ID']);

echo "<script language='JavaScript'>
			  alert ('You Logout Successfully !');
      </script>";	
	  
echo '  <script language="JavaScript">
            document.location="./index.php";
        </script>';




?>


