<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");
			  
Add2BasketByProductID(
  $_GET['id'], 
  $_GET['count']
);


 include($_SERVER['DOCUMENT_ROOT']."/include/basket.php");
   ?>
  