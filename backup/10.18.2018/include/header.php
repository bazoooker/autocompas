
<!DOCTYPE html>
<html lang="ru">


    <head>
        <!-- initial -->
        <meta charset="windows-1251" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <!-- title -->
        <title>
              Снабмастер
        </title>

        <!-- favicon -->
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffc40d">
        <meta name="theme-color" content="#ffffff">

        <!-- meta -->
        <meta content="Снабмастер" name="description" />
        <meta content="Снабмастер" name="keywords" />

        <!-- styles -->
        <link href="/css/swiper.min.css" rel="stylesheet"/>            
        <link href="/css/main.css" rel="stylesheet"/>        <!-- gulp -->
        <link href="/css/custom.css" rel="stylesheet"/>      <!-- css no preprocessor -->
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
    </head>





    <body class="page-wrapper <?=($APPLICATION->GetCurPage()=="/index.php"||$APPLICATION->GetCurPage()=="/")?"page-home":"page-inner"?>" >
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
            
        <!-- HEADER BEGIN --> 
        <header class="page-header">


            <div class="page-header__top-bar">
                <div class="container">
                    <div class="btn-burger js-open-mobile-menu">
                        <i class="btn-burger__bar"></i>
                        <i class="btn-burger__bar"></i>
                        <i class="btn-burger__bar"></i>
                        <span>меню</span>
                    </div>
                    <nav class="nav">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "mainmenu", Array(
				"ROOT_MENU_TYPE" => "top",
				"MAX_LEVEL" => "1"
			),
				false
			);?>
                    </nav>

                    <div class="user-options">
                        <div class="user-options__group">
                            <a href="/personal/" class="user-options__link user-options__cabinet">Личный кабинет</a>
                            <?if (!$USER->IsAuthorized()){?>
                            <a href="/auth/?register=yes" class="user-options__link user-options__signup">Регистрация</a>    
                            <?}else{?>
                             <a href="/?logout=yes" class="user-options__link user-options__signup">Выйти</a>   
                            <?}?>
                        </div>
                        
                        <div class="user-options__group">
                            <a href="/catalog/compare/" class="user-options__link user-options__compare">Список сравнения</a>
                            <a href="/personal/cart/?delay=Y" class="user-options__link user-options__postponed">Отложенные</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="page-header__content">
                <div class="container">
                    <a href="/" class="logo animated"></a>


                    <div class="search">
                        <?$APPLICATION->IncludeComponent("bitrix:search.title", "smart_search", Array(
	"CATEGORY_0" => array(	// Ограничение области поиска
			0 => "iblock_1c_catalog",
		),
		"CATEGORY_0_TITLE" => "",	// Название категории
		"CATEGORY_0_iblock_1c_catalog" => array(	// Искать в информационных блоках типа "iblock_1c_catalog"
			0 => "1",
		),
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"CONTAINER_ID" => "title-search",	// ID контейнера, по ширине которого будут выводиться результаты
		"INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
		"NUM_CATEGORIES" => "1",	// Количество категорий поиска
		"ORDER" => "date",	// Сортировка результатов
		"PAGE" => "/catalog/search/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
		"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
		"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
		"TOP_COUNT" => "5",	// Количество результатов в каждой категории
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
	),
	false
);?>
              <!--           <form action="/catalog/search/">
                            <div class="search-form">                                            
                                <input type="text" placeholder="Например, генератор" value="<?=$_GET['q']?>" id="search-text" name="q">
                                <input type="submit" id="search-submit" value="">
                            </div>
                        </form> -->
                    </div>

                    

                    <div class="company-info">
                        <div class="location">
                            Барнаул
                        </div>
                        <a href="tel:+73852503516" class="phone">
                            <span class="phone__city-code">3852</span> 50-35-16
                        </a>
                    </div>

                    <a href="/personal/cart/" class="basket">
<?
	include($_SERVER['DOCUMENT_ROOT']."/include/basket.php");
?>
                    </a>



            <div class="nav-left">
                <div href="/catalog/" class="nav-left__heading">
                   <div class="btn-burger">
                        <i class="btn-burger__bar"></i>
                        <i class="btn-burger__bar"></i>
                        <i class="btn-burger__bar"></i>
                    </div>
                    Каталог
                </div>

                <!--ul class="catalog-nav">
                    <li class="dropdown">
                        <a href="#" class="catalog-nav__link">
                            Автотовары                        
                        </a>
                        <div class="dropdown__nav" style="display: none;">
                            <a href="#" class="dropdown__link">Фильры</a>
                            <a href="#" class="dropdown__link">Масла</a>
                            <a href="#" class="dropdown__link">Антифриз</a>
                            <a href="#" class="dropdown__link">Расходники</a>
                            <a href="#" class="dropdown__link">Чехлы</a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="catalog-nav__link">Бетон</a>
                        <div class="dropdown__nav" style="display: none;">
                            <a href="#" class="dropdown__link">Качественный бетон</a>
                            <a href="#" class="dropdown__link">Дешевый бетон</a>
                            <a href="#" class="dropdown__link">Российский бетон</a>
                            <a href="#" class="dropdown__link">Особопрочный бетон</a>
                            <a href="#" class="dropdown__link">Бетонные смеси</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Виброоборудование</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Вышки-туры</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Геодезия</a>
                    </li>

                    <li>
                        <a href="#" class="catalog-nav__link">Автотовары</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Бетон</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Виброоборудование</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Вышки-туры</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Геодезия</a>
                    </li>

                    <li>
                        <a href="#" class="catalog-nav__link">Автотовары</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Бетон</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Виброоборудование</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Вышки-туры</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Геодезия</a>
                    </li>

                    <li>
                        <a href="#" class="catalog-nav__link">Автотовары</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Бетон</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Виброоборудование</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Вышки-туры</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Геодезия</a>
                    </li>

                    <li>
                        <a href="#" class="catalog-nav__link">Автотовары</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Бетон</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Виброоборудование</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Вышки-туры</a>
                    </li>
                    <li>
                        <a href="#" class="catalog-nav__link">Геодезия</a>
                    </li>
                </ul -->
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"left_menu",
		array(
			"ADD_SECTIONS_CHAIN" => "Y",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COUNT_ELEMENTS" => "N",
			"IBLOCK_ID" => "1",
			"IBLOCK_TYPE" => "",
			"SECTION_CODE" => "",
			"SECTION_FIELDS" => array(
				0 => "",
				1 => "",
			),
			"SECTION_ID" => "",
			"SECTION_URL" => "/catalog/#SECTION_CODE#/",
			"SECTION_USER_FIELDS" => array(
				0 => "",
				1 => "",
			),
			"SHOW_PARENT_NAME" => "Y",
			"TOP_DEPTH" => "1",
			"VIEW_MODE" => "LIST",
			"COMPONENT_TEMPLATE" => "left_menu"
		),
		false
	);?>

            </div>



                </div>
            </div>



            
        </header>
        <!-- HEADER END --> 
