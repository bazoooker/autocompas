<?
if(count($arResult['ITEMS']['AnDelCanBuy'])>0){
?>
<div class="basket__inner">
                            <div class="basket__goods-quantity"><?=count($arResult['ITEMS']['AnDelCanBuy'])?></div>
                              
                                <span class="basket__price"><?=$arResult['allSum_FORMATED']?></span>
                        </div>
									
<?
	} else {
?>
										<div class="basket__inner">
                        
                            
                         
                                <span class="basket__price">Корзина</span>
                               
                        </div>
										<!-- a class="order-action" href="/catalog/">Оформить заказ</a -->
<?
	}
?>
