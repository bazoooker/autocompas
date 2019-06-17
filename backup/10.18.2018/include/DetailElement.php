<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
 CModule::IncludeModule("sale");
/**
*  e1 Sergey A
*/
require_once ($_SERVER["DOCUMENT_ROOT"]."/include/function.php");
class DetailElement
{
	private $ID;
	private $element_params;
	private $arProps;
	private $arFields;
	private $img;
	function __construct($arResult)
	{
		$this->ID=(int)$arResult['ID'];
		$this->element_params=$arResult;
		$this->model();
		$this->viev();
	}

	function model()
	{
		$resp= CIBlockElement::GetList(Array(), array("IBLOCK_ID" => $this->element_params['IBLOCK_ID'], "ID"=>$this->element_params['ID']));
		if($obs = $resp->GetNextElement()){
			$this->arProps = $obs->GetProperties();
			$this->arFields = $obs->GetFields();
				$file=CFile::ResizeImageGet($this->arFields['DETAIL_PICTURE'], array('width'=>250, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT , true); 
				if(!$file['src']){
				 $this->img="/img/no-photo.png";
				}else{
				 $this->img=$file['src'];
				}
				$arBasePrice = CPrice::GetBasePrice($_REQUEST['id']);
			
 				$this->arFields['PRICE']=CurrencyFormat($arBasePrice["PRICE"], $arBasePrice["CURRENCY"]);
		}		

	}
	function viev()
	{
		?>
			
            <span class="product-detail__close"></span>
            <div class="spinner"></div>
                <h2>
                   <?=$this->arFields['NAME']?>
                </h2>

                <div class="row">
                    <div class="col-6">
                        <div class="product-detail__img" style="background-image: url(<?= $this->img?>);"></div>
                    </div>
                    <div class="col-6">

                        <div class="product-detail__price"><?=$this->arFields['PRICE']?></div>

                        <div class="product-detail__controls">
                            
                                <div class="quantity-counter">
                                    <a class="quantity-counter__minus"  rel='<?=$this->arFields['ID']?>' onclick="Quantity(<?=$this->arFields['ID']?>,1 , 'down', 1 )"></a>
                                    <div class="quantity-counter__input">
                                         <input  prodyct_id="<?=$this->arFields['ID']?>"  ids="<?=cart_get_prodyct_id($this->arFields['ID'])['ID']?>" type="text" name="QUANTITY_PRODUCT_<?=$this->arFields['ID']?>s" value="<?echo (int)cart_get_prodyct_id($this->arFields['ID'])['QUANTITY'];?>">     
                                    </div>
                                    <a class="quantity-counter__plus" rel='<?=$this->arFields['ID']?>' onclick="Quantity(<?=$this->arFields['ID']?>,1 , 'up', 1 )"></a>
                                </div>
                                <a href="#" id="<?=$this->arFields['ID']?>" class="btn btn_buy btn_add-to-cart"></a> 
                                <a href="#" class="btn btn_one-click">Заказать в 1 клик</a>                        
                            
                            

                        </div>        

						<?php foreach ($this->arProps as $key => $value): ?>
							<?php if ($value['VALUE'] && !is_array($value['VALUE'])): ?>
								<p><?=$value['NAME']?>: <?=$value['VALUE']?></p>
							<?php endif ?>
						<?php endforeach ?>                   

                    </div>
                </div>
                <div class="cta-stripe">

                    <div class="container">
                        <div class="cta-stripe__problem cta-stripe__problem_choice">
                            Не можете определиться <br/>с выбором?
                        </div>
                        <div class="cta-stripe__problem cta-stripe__problem_fit">
                            Не уверены, что деталь <br/>подойдет?
                        </div>
                        <a href="#" class="btn btn_outline-white callback-link">Задайте вопрос менеджеру!</a>
                    </div>


                </div>

            

		<?
	}
}
?>
<script>

</script>
<?
 $rsElem = CIBlockElement::GetById((int)$_REQUEST['id']); 
            $arElem = $rsElem->GetNextElement();




            $element=new DetailElement($arElem->fields);

