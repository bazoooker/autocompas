<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

      
      if (CModule::IncludeModule("sale"))
      {
      	$summ = 0;
         $arBasketItems = array();

         $dbBasketItems = CSaleBasket::GetList(
                 array(
                         "NAME" => "ASC",
                         "ID" => "ASC"
                     ),
                 array(
 				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL",
                         'DELAY'=>'N',
                         'CAN_BUY'=>'Y'

                     ),
                 false,
                 false,
                 array("ID", "QUANTITY", "PRICE",'NAME','CAN_BUY','CALLBACK_FUNC')
             );
         while ($arItems = $dbBasketItems->Fetch())
         {
             if (strlen($arItems["CALLBACK_FUNC"]) > 0)
             {
                 CSaleBasket::UpdatePrice($arItems["ID"], 
                                          $arItems["QUANTITY"]);
                 $arItems = CSaleBasket::GetByID($arItems["ID"]);
                
             }
           
              // $arBasketItems[] = $arItems;
         	 // echo $arItems['NAME']."--".$arItems['PRICE']."<br>";
             $arBasketItems = $arItems;
               $summ = $summ + $arBasketItems["PRICE"]*$arBasketItems["QUANTITY"];
         }
         // print_r($arBasketItems);
         
         
         
         // for ($i=0;$i<=$arResult["NUM_PRODUCTS"];$i++){      
            
          
            
         // }
   		
      }
      echo number_format($summ,0, '.', ' ')." руб";