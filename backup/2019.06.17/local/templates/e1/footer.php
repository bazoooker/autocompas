<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
</main>
<!-- PAGE CONTENT END -->

        <footer class="page-footer">
            <div class="container">
                <a href="#" class="logo animated"></a>

                <div class="contacts">
                    <div class="location">
                        Барнаул
                    </div>
                    <div class="phone">
                        <a href="tel:+73852464700">
                            <span class="phone__city-code">+7(3852)</span> 46-47-00
                        </a><br/>
                        <a href="tel:+73852469809">
                            <span class="phone__city-code">+7(3852)</span> 46-98-09
                        </a><br/>
                        <a href="tel:+73852469888">
                            <span class="phone__city-code">+7(3852)</span> 46-98-88
                        </a><br/>
                        <a href="tel:+73852464409">
                            <span class="phone__city-code">+7(3852)</span> 46-44-09
                        </a><br/>                        
                    </div>
                </div>
            </div>

            <div class="made-by text-center">
                Разработка сайта - <a class="e1media-link" href="http://e1media.ru/">e1media</a>
            </div>
            
        </footer>







        
        <!-- MOBILE SLIDE-IN MENU BEGIN-->
        <div class="main-menu main-menu_narrow-right">
            <span class="main-menu__btn-close js-open-menu"></span>
                <div class="main-menu__header">
                    <a href="/" class="logo" style="width: 100%;"></a>
                    <div class="company-info">
                        <a href="tel:+73852464700" class="phone">
                            <span class="phone__city-code">+7(3852)</span> 46-47-00
                        </a>
                        <a href="tel:+73852464700" class="phone">
                            <span class="phone__city-code">+7(3852)</span> 46-98-09
                        </a>
                        <a href="tel:+73852464700" class="phone">
                            <span class="phone__city-code">+7(3852)</span> 46-98-88
                        </a>
                        <a href="tel:+73852464700" class="phone">
                            <span class="phone__city-code">+7(3852)</span> 46-44-09
                        </a>
                    </div>
                    <a href="/personal/cart/" class="basket">
                        <?
                            include($_SERVER['DOCUMENT_ROOT']."/include/basket.php");
                        ?>
                    </a>
                    <a href="/catalog/" class="btn-catalog">
                        <div class="btn-burger js-open-menu">
                            <i class="btn-burger__bar"></i>
                            <i class="btn-burger__bar"></i>
                            <i class="btn-burger__bar"></i>
                        </div>
                        Каталог товаров
                    </a>
                </div>
                <div class="main-menu__nav">
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

                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:search.title", 
                        "search", 
                        array(
                            "CATEGORY_0" => array(
                                0 => "iblock_1c_catalog",
                            ),
                            "CATEGORY_0_TITLE" => "",
                            "CATEGORY_0_iblock_1c_catalog" => array(
                                0 => "1",
                            ),
                            "CHECK_DATES" => "N",
                            "CONTAINER_ID" => "title-search",
                            "INPUT_ID" => "title-search-input",
                            "NUM_CATEGORIES" => "1",
                            "ORDER" => "date",
                            "PAGE" => "/catalog/search/",
                            "SHOW_INPUT" => "Y",
                            "SHOW_OTHERS" => "N",
                            "TOP_COUNT" => "7",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "COMPONENT_TEMPLATE" => "search"
                        ),
                        false
                    );
                    ?>
                    <div class="legal">
                        <p>Оставляя данные на этом сайте вы соглашаетесь с поилиткой обработки персональных данных.</p>
                        <p><a href="">Ознакомиться с политикой</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay overlay-menu js-open-menu"></div>
        <div class="overlay overlay-modal js-modal-controls"></div>
        <!-- MOBILE SLIDE-IN MENU END-->


         <!-- "PRODUCT" MODAL BEGIN -->
        <div class="product-detail test-test" style="display: none;">




<!--             <span class="product-detail__close modal-close"></span>
            <div class="spinner"></div>

                <h2>
                    Бензонасос ВАЗ-2101 (Ульяновск) Шанс+
                </h2>

                <div class="flex-row">
                    <div class="col-6">
                        <div class="product-detail__img" style="background-image: url(/img/bg/bg-category.jpg);"></div>
                    </div>
                    <div class="col-6">

                        <div class="product-detail__price">655 р.</div>

                        <div class="product-detail__controls">
                                            <div class="btn-group btn-group_cart-counter">
                                                    <div class="counter">
                                                        <a class="counter-control counter-minus" onclick="Quantity(1,1 , 'down', 1 )">
                                                            <div class="control-option"></div>
                                                        </a>
                                                        <div class="counter-input-holder">
                                                            <?
                                                            ?>
                                                        <input readonly="" prodyct_id="<?=$arItem['ID']?>"  ratio="1" float="true"  type="text" size="3"  name="QUANTITY_PRODUCT_<?=$arItem['ID']?>" maxlength="18" class="counter-input" value="1">                                                           
                                                        </div>
                                                        <a class="counter-control counter-plus" onclick="Quantity(1,1 , 'up', 1 )">
                                                            <div class="control-option"></div>
                                                        </a>
                                                    </div>
                                                    <a href="#" id="1" class="btn btn_add-to-cart"></a>
                                            </div>


                                <a href="#" class="btn btn_one-click">  
                                    <span>Купить в 1 клик</span>
                                </a>
                            </div>        



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
                </div> -->

                
            </div>



        </div>
       
        <!-- MODAL WINDOW BEGIN -->
        <div class="modal" id="callback-window" style="display: none;">
            <a class="modal-close" href="#">
            </a>
            <div class="spinner">
            </div>
            <div class="modal-content">
                <h2>
                    Позвоним в течение 10 минут
                </h2>
                <div class="">
                    <form action="" data-file="callback" method="post">
                        <input autofocus="" name="name" placeholder="Ваше имя *" type="text">
                            <input name="phone" placeholder="Номер телефона *" type="text">
                                <textarea name="text" placeholder="Здесь вы можете оставить комментарий">
                                </textarea>
                                <div class="modal-controls">
                                    <button class="btn btn_gradient btn_x-small" type="submit">
                                        Отправить
                                    </button>
                                </div>
                                <div class="modal-errors">
                                </div>
                                <div class="modal-result">
                                </div>
                            </input>
                        </input>
                    </form>
                </div>
            </div>
            <div class="modal-content-copy">
            </div>
        </div>
        <!-- MODAL WINDOW END -->


        <div id="basket-added-window" class="modal" style="display: none;"> 
            <a class="modal-close"></a>
                <div class="spinner"></div>
                <div class="modal-content">
                    <h2>Товар добавлен в корзину</h2>
                    <!-- <div class="text-center section-padding">
                        <img src="/img/icons/i-success.png" alt="" width='80'>
                    </div> -->
                    <div class="">
                        <div class="modal-controls">
                            <button type="submit" onclick="location.href='/personal/cart/'" class="btn btn_main modal-controls__btn">Перейти к заказу</button>
                            <button type="submit" onclick="$('#basket-added-window').find('.modal-close').click();$('.overlay2').hide();" class="btn btn_outline modal-controls__btn">Продолжить покупки</button>
                        </div>
                        <div class="modal-errors">
                        </div>
                        <div class="modal-result">
                        </div>
                    </div>
                </div>
                <div class="modal-content-copy" style="display: none;">
                    <h2>Товар добавлен в корзину</h2>
                    <div class="">
                        <div class="modal-controls">
                            <button type="submit" onclick="location.href='/personal/cart/'" class="btn btn_main modal-controls__btn">Перейти к заказу</button>
                            <button type="submit" onclick="$('#basket-added-window').find('.modal-close').click();$('.overlay2').hide();" class="btn btn_outline modal-controls__btn">Продолжить покупки</button>
                        </div>
                        <div class="modal-errors">
                        </div>
                        <div class="modal-result">
                        </div>
                    </div>
                </div>
            </div>
            
              <div class="modal" id="oneclickorder-window" style="display: none;">
            <a class="modal-close">
            </a>
            <div class="spinner">
            </div>
            <div class="modal-content">
                <h2>
                    Заказ в один клик
                </h2>
                <div class="">
                    <form action="" data-file="oneclickorder" method="post">
                        <input autofocus="" name="name" placeholder="Ваше имя *" type="text">
                            <input name="phone" placeholder="Номер телефона *" type="text">
                            <input name="reason" class="reason" placeholder="Товар *" type="text">
                                <textarea name="text" placeholder="Здесь вы можете оставить комментарий"></textarea>
                                <div class="modal-controls">
                                    <button class="btn btn_main btn_big" type="submit">
                                        Отправить
                                    </button>
                                </div>
                                <div class="modal-errors">
                                </div>
                                <div class="modal-result">
                                </div>
                            </input>
                        </input>
                    </form>
                </div>
            </div>
            <div class="modal-content-copy">
            </div>
        </div>
        
        <!-- SCROLL-TO-TOP BEGIN -->
        <div class="to-top js-scroll-to-top">
            <span class="to-top__text"></span>
        </div>
        <!-- SCROLL-TO-TOP END -->

                <div class="sticky-header">
            <div class="container">
                <a href="/" class="logo logo_static"></a>

                <div class="company-info">
                    <div class="location">
                        Барнаул
                    </div>
                    <a href="tel:+73852464700" class="phone">
                        <span class="phone__city-code">3852</span> 46-47-00 
                    </a>
                </div>

                <a href="/personal/cart/" class="basket">
                    <?
                        include($_SERVER['DOCUMENT_ROOT']."/include/basket.php");
                    ?>
                </a>
            </div>
        </div>
        
        

        <!-- scripts -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/modernizr.custom.62035.js" type="text/javascript"></script>
        <script src="/js/jquery.form.min.js"></script>
        <script src="/js/swiper.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/jquery.nice-select.min.js"></script>
        <script src="/js/script.js"></script>



    </body>
</html>