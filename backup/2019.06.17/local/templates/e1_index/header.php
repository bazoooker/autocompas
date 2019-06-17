<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<!DOCTYPE html>
<html>
    <head>
        <?$APPLICATION->ShowHead();?>
        <title><?$APPLICATION->ShowTitle();?></title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" 
        crossorigin="anonymous">
        <link href="/css/swiper.min.css" rel="stylesheet"/>            
        <link href="/css/main.css" rel="stylesheet"/>        <!-- gulp -->
        <link href="/css/custom.css" rel="stylesheet"/>      <!-- css no preprocessor -->                                     	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body class="page-wrapper">
        <div id="panel">
            <?$APPLICATION->ShowPanel();?>
        </div>

        <!-- HEADER BEGIN -->
        <header class="page-header">

            <div class="page-header__top-bar">
                <div class="container">                 

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu", 
                        "menu", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "menu"
                        ),
                        false
                    );?>
                    <div class="btn-burger js-open-menu">
                        <i class="btn-burger__bar"></i>
                        <i class="btn-burger__bar"></i>
                        <i class="btn-burger__bar"></i>
                    </div>

            </div>
        </div>



             <div class="page-header__content">
                <div class="container">
                    <a href="/" class="logo animated"></a>
                    <a href="/personal/cart/" class="basket">
                        <?
                            include($_SERVER['DOCUMENT_ROOT']."/include/basket.php");
                        ?>
                    </a>
                    <div class="company-info">
                        <div class="location">
                            Барнаул
                        </div>
                        <div class="phone">
                            <!-- <a href="tel:+73852464700">ff</a> -->
                            <span class="phone__city-code">+7(3852)</span> 46-47-00
                            <div class="phone__accordeon">
                                <a href="tel:+73852464700">
                                    <span class="phone__city-code">+7(3852)</span> 46-47-00
                                </a>
                                <a href="tel:+73852469809">
                                    <span class="phone__city-code">+7(3852)</span> 46-98-09
                                </a>
                                <a href="tel:+73852469888">
                                    <span class="phone__city-code">+7(3852)</span> 46-98-88
                                </a>
                                <a href="tel:+73852464409">
                                    <span class="phone__city-code">+7(3852)</span> 46-44-09
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="page-header__bottom-bar">
                <div class="container">
                    <a href="/catalog/" class="btn-catalog">
                        <div class="btn-burger js-open-menu">
                            <i class="btn-burger__bar"></i>
                            <i class="btn-burger__bar"></i>
                            <i class="btn-burger__bar"></i>
                        </div>
                        Каталог товаров
                    </a>                    
                    <?
                        $APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"smart_search", 
	array(
		"CATEGORY_0" => array(
			0 => "iblock_1c_catalog",
		),
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "8",
		),
		"CHECK_DATES" => "N",
		"CONTAINER_ID" => "title-search",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "rank",
		"PAGE" => "/catalog/search/",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"TOP_COUNT" => "7",
		"USE_LANGUAGE_GUESS" => "Y",
		"COMPONENT_TEMPLATE" => "smart_search"
	),
	false
);
                     ?>
        <a href="/made/" class="btn-catalog-brand">Каталог производителей</a>                  
     </div>


  </div>

            <!-- <div id="progress"></div> -->

        </header>
        <!-- HEADER END -->




        <!-- PAGE CONTENT BEGIN -->
        <main class="page-content <?if(!CSite::InDir('/index.php')){?>inner-page<?}?>" role="main">
                  