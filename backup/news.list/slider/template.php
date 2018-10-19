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
 <div class="catalog-slider bg-gray section-margin section-padding">
    <div class="container">
      <div class="swiper-container swiper-container-catalog">
        <div class="swiper-wrapper">
                        <?foreach($arResult["ITEMS"] as $arItem):?>
                        	<?
                        	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        	?>
                				 <div class="swiper-slide slide-category">
                                    <a class="category category_full-height">

                                         <div class="category__img" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div>
                                        <div class="category__info">
                                            <p><?=$arItem['NAME']?></p>
                                            <p><b><?=$arItem['PREVIEW_TEXT']?></b></p>
                                            <span><?=$arItem['DETAIL_TEXT']?></span>
                                        </div>



                					 
                                    </a>					
                				  </div>	
                        <?endforeach;?>

                                 <div class="swiper-slide slide-category">
                                <a class="category category_half-height category_thumbnail-left">
                                    <div class="category__img" style="background-image: url(/img/bg/bg-category2.jpg);"></div>
                                    <div class="category__info">
                                        <p><b>Фильтры</b></p>
                                        <p>Воздушные и масляные</p>
                                    </div>
                                </a>

                                <a class="category category_half-height category_thumbnail-left">
                                    <div class="category__img" style="background-image: url(/img/bg/bg-category2.jpg);"></div>
                                    <div class="category__info">
                                        <p><b>Масла</b></p>
                                        <p>Моторные и трансмиссионные</p>
                                    </div>
                                </a>
                            </div>
                                 <div class="swiper-slide slide-category">
                                <a class="category category_half-height category_thumbnail-bg">
                                    <div class="category__img" style="background-image: url(/img/bg/bg-category3.jpg);"></div>
                                    <div class="category__info">
                                        <p><b>Brembo</b></p>
                                        <p>Со скидкой до 30%</p>
                                    </div>
                                </a>
                                <a class="category category_half-height category_thumbnail-bg">
                                    <div class="category__img" style="background-image: url(/img/bg/bg-category3.jpg);"></div>
                                    <div class="category__info">
                                        <p><b>NGK</b></p>
                                        <p>Правильные свечи</p>
                                    </div>
                                </a>
                            </div>
           </div>
        </div>                 
        <!-- Add Arrows -->
<!--         <div class="swiper-button-next brands-slider-btn-next"></div>
        <div class="swiper-button-prev brands-slider-btn-prev"></div> -->
    </div>
</div>
