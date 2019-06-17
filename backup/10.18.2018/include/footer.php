        <footer class="page-footer">
            <div class="container">
                <a href="/" class="logo logo_filled"></a>
                <nav class="nav">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "mainmenu", Array(
				"ROOT_MENU_TYPE" => "top",
				"MAX_LEVEL" => "1"
			),
				false
			);?>
                </nav>

                <div class="company-info">
                    <div>
                        <div class="location">
                            Барнаул
                        </div>
                        <a href="tel:+73852503516" class="phone">
                            <span class="phone__city-code">3852</span> 50-35-16
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <div class="legal">
            <div class="container">
                <div>
                    <p class="legal__policy">Оставляя сведения на данном веб-сайте, вы соглашаетесь с <a href="#">политикой обработки персональных данных</a></p>
                    <p class="legal__disclaimer">Все материалы, представленные на сайте, носят исключительно информационный характер и не явлются публичной офертой. <br/>Продавец оставляет за собой право на возможность пересмотра цен, согласно ст.485 п.3 ГК РФ. </p>
                </div>
                <div class="made-by">
                    Разработка сайта - <a class="e1media-link" href="http://e1media.ru/" target="_blank">e1media</a>
                </div>

            </div>

            <div class="container">
                
            </div>
        </div>








        <div class="nav-mobile">

            <div class="nav-mobile__wrapper">
                <nav class="nav-mobile__links">
                    <a href="/" class="logo"></a>
                    <a class="nav-left__heading js-show-mobile-catalog">
                       <div class="btn-burger">
                            <i class="btn-burger__bar"></i>
                            <i class="btn-burger__bar"></i>
                            <i class="btn-burger__bar"></i>
                        </div>
                        Каталог
                    </a>
                    <a href="/personal/cart/" class="basket">
                        <?
                            include($_SERVER['DOCUMENT_ROOT']."/include/basket.php");
                        ?>
                    </a>
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

                       <div class="search">
                            <div id="title-search">
                            <form action="/catalog/search/" class="search-form">
                                <input id="title-search-input" type="text" name="q" value="" size="40" maxlength="50" autocomplete="off">&nbsp;<input name="s" type="submit" value="">
                                <!-- Поиск -->
                            </form>
                            </div>
                        <script>
                            BX.ready(function(){
                                new JCTitleSearch({
                                    'AJAX_PAGE' : '/',
                                    'CONTAINER_ID': 'title-search',
                                    'INPUT_ID': 'title-search-input',
                                    'MIN_QUERY_LEN': 2
                                });
                            });
                        </script>
                    </div>
                </nav>
                <nav class="nav-mobile__catalog">

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
                    

                    <div class="close js-show-mobile-catalog"></div>

                </nav>

            </div>



            <div class="nav-mobile__close js-open-mobile-menu"></div>
            
        </div>








        <!-- MOBILE SLIDE-IN MENU BEGIN-->
        <div class="sticky-header">
            <div class="container">
                <a href="/" class="logo logo_static"></a>

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
            </div>
            <div id="progress"></div>
        </div>

        <div class="overlay"></div>
        <!-- MOBILE SLIDE-IN MENU END-->


            

	   <div id="overlay"></div>

        <!-- MODAL WINDOW BEGIN -->
        <div class="modal" id="callback-window" style="display: none;">
            <a class="modal-close">
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
							<button type="submit" onClick="location.href='/personal/cart/'" class="btn btn_main modal-controls__btn">Перейти к заказу</button>
							<button type="submit" onClick="$('#basket-added-window').find('.modal-close').click();$('#overlay').hide();" class="btn btn_outline modal-controls__btn">Продолжить покупки</button>
						</div>
						<div class="modal-errors">
						</div>
						<div class="modal-result">
						</div>
					</div>
				</div>
				<div class="modal-content-copy"></div>
			</div>
			<div id="delay-window" class="modal" style="display: none;"> 
                <a class="modal-close"></a>
				<div class="spinner"></div>
				<div class="modal-content">
					<h2>Товар отложен</h2>
					<div class="">
						<div class="modal-controls">
							<button type="submit" onClick="location.href='/personal/cart/?delay=Y" class="btn btn_main modal-controls__btn">Перейти к списку</button>
							<button type="submit" onClick="$('#delay-window').find('.modal-close').click();$('#overlay').hide();" class="btn btn_outline modal-controls__btn">Продолжить</button>
						</div>
						<div class="modal-errors">
						</div>
						<div class="modal-result">
						</div>
					</div>
				</div>
				<div class="modal-content-copy"></div>
			</div>


			<div id="compare-window" class="modal"> <a class="modal-close" href="#"></a>
				<div class="spinner"></div>
				<div class="modal-content">
					<h2 id="title_ajax">Список сравнения</h2>
					<div class="">
					<div id="data_ajax"></div>
						<div class="modal-controls">
							<a href="/catalog/compare/" id="button_ajax" type="submit" class="btn btn_main modal-controls__btn">Перейти к сравнению</a>
							<button type="submit" onClick="$('#compare-window').find('.modal-close').click();$('#overlay').hide();" class="btn btn_outline modal-controls__btn">Продолжить</button>
						</div>
						<div class="modal-errors">
						</div>
						<div class="modal-result">
						</div>					
					</div>
				</div>
				<div class="modal-content-copy"></div>
			</div>



        <!-- MODAL WINDOW END -->




        
        <!-- SCROLL-TO-TOP BEGIN -->
        <div class="to-top js-scroll-to-top">
            <span class="to-top__text">Наверх</span>
        </div>
        <!-- SCROLL-TO-TOP END -->
        
          



        <!-- scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/jquery.cookie.js" type="text/javascript"></script>
        <script src="/js/modernizr.custom.62035.js" type="text/javascript"></script>
        <script src="/js/swiper.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/jquery.nice-select.min.js"></script>
        <script src="/js/script.js"></script>


    </body>
</html>
