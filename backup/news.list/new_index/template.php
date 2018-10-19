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
 <div class="news bg-gray section-padding">
 	<div class="container section-margin">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
				<a class="news-item" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					   <div class="news-item__img" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div>						
					 <span class="news-item__heading"><?= $arItem["NAME"]?></span>
				</a>	
<?endforeach;?>
</div>
 <div class="text-center">
     <a href="/<?=$arItem['IBLOCK_CODE']?>/" class="btn btn_outline">������ ����������</a>
   </div>
</div>
