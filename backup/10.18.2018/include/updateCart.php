<?
// require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

									CModule::IncludeModule("sale");
									CModule::IncludeModule("catalog");
									$arFields = array("QUANTITY" => $_REQUEST['qty']);
									CSaleBasket::Update($_REQUEST['id'], $arFields);
?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket",
    "top",
    Array(
        "ACTION_VARIABLE" => "action",
        "AUTO_CALCULATION" => "Y",
        "TEMPLATE_THEME" => "blue",
        "COLUMNS_LIST" => array("NAME"),
        "COMPONENT_TEMPLATE" => ".default",
        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
        "GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
        "GIFTS_CONVERT_CURRENCY" => "N",
        "GIFTS_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_HIDE_NOT_AVAILABLE" => "N",
        "GIFTS_MESS_BTN_BUY" => "Выбрать",
        "GIFTS_MESS_BTN_DETAIL" => "Подробнее",
        "GIFTS_PAGE_ELEMENT_COUNT" => "4",
        "GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
        "GIFTS_PRODUCT_QUANTITY_VARIABLE" => "",
        "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
        "GIFTS_SHOW_IMAGE" => "Y",
        "GIFTS_SHOW_NAME" => "Y",
        "GIFTS_SHOW_OLD_PRICE" => "Y",
        "GIFTS_TEXT_LABEL_GIFT" => "Подарок",
        "GIFTS_PLACE" => "BOTTOM",
        "HIDE_COUPON" => "N",
        "PATH_TO_ORDER" => "/personal/order.php",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "QUANTITY_FLOAT" => "N",
        "SET_TITLE" => "Y",
        "TEMPLATE_THEME" => "blue",
        "USE_GIFTS" => "N",
        "USE_PREPAYMENT" => "N"
    )
);
?>
  