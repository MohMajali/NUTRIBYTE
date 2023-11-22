<?php
session_start();

include("../Connect.php"); 

$_SESSION['M_Log']=0;
unset($_SESSION['M_Log']);

echo "<script language='JavaScript'>
			  alert ('You Logout Successfully !');
      </script>";	
	  
echo '  <script language="JavaScript">
            document.location="../Providerlogin.php";
        </script>';




?>


