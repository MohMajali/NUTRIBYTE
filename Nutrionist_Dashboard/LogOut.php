<?php
session_start();

include("../Connect.php"); 

$_SESSION['N_Log']=0;
unset($_SESSION['N_Log']);

echo "<script language='JavaScript'>
			  alert ('You Logout Successfully !');
      </script>";	
	  
echo '  <script language="JavaScript">
            document.location="../Nutrionistlogin.php";
        </script>';




?>


