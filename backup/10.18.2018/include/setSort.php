<?
	setcookie("sort",$_REQUEST['dir'], time()+3600, "/");
	Header("Location: ".$_SERVER['HTTP_REFERER']);
?>  