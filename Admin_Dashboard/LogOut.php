<?php
session_start();

include("../Connect.php"); 

$_SESSION['A_Log']=0;
unset($_SESSION['A_Log']);

echo "<script language='JavaScript'>
			  alert ('You Logout Successfully !');
      </script>";	
	  
echo '  <script language="JavaScript">
            document.location="../Adminlogin.php";
        </script>';




?>


