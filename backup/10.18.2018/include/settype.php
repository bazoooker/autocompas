<?
	setcookie("type",$_GET['type'], time()+3600, "/");
	Header("Location: ".$_SERVER['HTTP_REFERER']);
?>  