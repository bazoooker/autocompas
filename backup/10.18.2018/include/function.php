<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
function get_code($code,$id){
    $dbRes = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 1, "!PROPERTY_".$code => false,'ID'=>$id), array("PROPERTY_".$code));
    if ($prop_fields = $dbRes->GetNext()){
        $key='PROPERTY_'.$code.'_VALUE';
        return $prop_fields[$key];
    }
}
function cart_get_prodyct_id($id)
{
    if (CModule::IncludeModule("sale"))
      {
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
                         'PRODUCT_ID'=>$id
                     ),
                 false,
                 false,
                 array("ID", "QUANTITY", "PRICE")
             );
         if ($arItems = $dbBasketItems->Fetch())
         {
             if (strlen($arItems["CALLBACK_FUNC"]) > 0)
             {
                 CSaleBasket::UpdatePrice($arItems["ID"],
                                          $arItems["QUANTITY"]);
                 $arItems = CSaleBasket::GetByID($arItems["ID"]);
             }
             // if (!(int)$arItems['QUANTITY']==0) {
             	// $arItems['QUANTITY']=1;
             // }
             return $arItems;
         }else{
         	$arItems['QUANTITY']=1;
         	return  $arItems;
         }

    }
}

function get_quality($id)
{
	$db_res = CCatalogProduct::GetList(
       array(),
       array("ID" => $id),
       false,
       false,
       array("QUANTITY")
   );
if ($ar_res = $db_res->Fetch())
  return $ar_res["QUANTITY"];
}
/**
* для отрисовки параметров
*/
class ParamsFlag
{
	private $ID;
	private $IBLOCK_ID;
	const COUNT_STRING=10;
	function __construct($result)
	{
		$this->ID=$result['ID'];
		$this->IBLOCK_ID=$result['IBLOCK_ID'];
		$this->get_all_param();
	}
	private function get_all_param()
	{
		CModule::IncludeModule("iblock");
		$resp= CIBlockElement::GetList(Array('SORT'=>'ASC'), array("IBLOCK_ID" => $this->IBLOCK_ID, "ID"=>$this->ID), false, Array("nPageSize"=>1));
		if($obs = $resp->GetNextElement()){
			$arProps = $obs->GetProperties();
			// исключить свойства
			unset($arProps['CML2_BAR_CODE']);
			unset($arProps['CML2_ARTICLE']);
			$this->replase($arProps);
		
		}
	}
	private function replase($arProps)
	{
		$i=0;
		foreach ($arProps as $value) {
			if ($value['VALUE']!='' && !is_array($value['VALUE']) && $this->del_dot($value['NAME'])) {
				if ($i<2) {
				$this->paint($value['VALUE']." ". $this->del_dot($value['NAME']));
				}
				$i++;
			}
			
		}
	}
	private  function del_dot($string)
	{
		$str=stristr($string,',',false);
		$str=str_replace(',', '', $str);

		$str=trim($str);
		// if (!$str) {
		// 	$str=$string;
		// }
		$str=rtrim($str, " \t.");
		// $str= mb_strimwidth($str, 0, self::COUNT_STRING, "..");
		// echo  $string;
		return $str;
	}
	public function paint($str)
	{
		?>
			 <span class="product-param"><?=$str?></span>                               
		<?
	}
}

?>