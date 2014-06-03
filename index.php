<?php
//Has all the classes in it
require_once "classes/classes.php";

//Has all the functions in it
require_once "func/functions.php";

errors_set();

// sets the page variable
if (isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
	<meta http-equiv="cont-Type" cont="text/html; charset=UTF-8" /> 
	<title>Eve Queries | <? if ($page != ""){echo ucwords($page);}else {echo "Home";}?></title> 
	<link href="css/css.css" rel="stylesheet" type="text/css" />
	<link href="js/jquery-ui-1.8.20.custom.css" rel="stylesheet" type="text/css" />  
	<link rel="shortcut icon" href="favicon.ico"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-validate.js"></script>
</head>

<body>
	<div id="wrapper">
		<div id="head">
			<? include ('inc/head.php'); ?> 
		</div>
		
		<div id="nav">
			<? include ('inc/nav.php'); ?>
		</div>
		
		<div id="cont" >
		<? 
			//Gets the cont 
            if ($page == "")
            {
            include("cont/home.php");
            }
            else if (file_exists ("cont/".$page.".php"))
            {
            include("cont/".$page.".php");
            }
            else
            {
            include("cont/404.php");
            } 
        ?>
        </div>

	    <div id="footer">
	        <? 
	            include ('inc/footer.php'); 
	        ?>
	    </div> 
    </div>
</body>
</html>
