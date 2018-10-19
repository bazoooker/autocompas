<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="brands-slider section-margin">
                <div class="container section-margin">
                	  <div class="swiper-container swiper-container-brands">
                        <div class="swiper-wrapper">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
				<div class="swiper-slide slide-brands">
					    <div class="brand-holder" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" >
					   </div>						
				  </div>	
<?endforeach;?>
       </div>
                    </div>
                    
                    <!-- Add Arrows -->
                    <div class="swiper-button-next brands-slider-btn-next"></div>
                    <div class="swiper-button-prev brands-slider-btn-prev"></div>
                </div>
 <div class="text-center">
     <a href="/<?=$arItem['IBLOCK_CODE']?>" class="btn btn_outline">Все производители</a>
   </div>
</div>
