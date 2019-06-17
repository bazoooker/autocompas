			<?
			if (CModule::IncludeModule("sale"))
			{
				$arBasketItems = array();
				$dbBasketItems = CSaleBasket::GetList(
					array(
						"NAME" => "ASC",
						"ID" => "ASC"
					),
					array(
						"FUSER_ID" => CSaleBasket::GetBasketUserID(),
						"DELAY" => "N",
						"CAN_BUY" => "Y",
						"LID" => SITE_ID,
						"ORDER_ID" => "NULL"
					),
					false,
					false,
					array("ID", "QUANTITY", "PRICE")
				);
				while ($arItems = $dbBasketItems->Fetch())
				{
					if (strlen($arItems["CALLBACK_FUNC"]) > 0)
					{
						CSaleBasket::UpdatePrice($arItems["ID"],
							$arItems["QUANTITY"]);
						$arItems = CSaleBasket::GetByID($arItems["ID"]);
					}
					$arBasketItems[] = $arItems;
				}
				$summ = 0.00;
				foreach ($arBasketItems as $bascet) {

					$summ = $summ + $bascet["PRICE"]*$bascet["QUANTITY"];
				}
			}
			$summa = number_format($summ, 0, '.', ' ');
			if($summ>0) {
			?>
                        <div class="basket__inner"> 
                            <span class="basket__contents">В Вашей корзине <?= count ($arBasketItems) ?> товар(ов)</span>
                            <span class="basket__price">на <?=$summa?>р.</span>
                        </div>
			<?
			} else {
			?>
                        <div class="basket__inner">
                              <span class="basket__contents">Ваша корзина пуста</span>
                        </div>

			<?
			}
			?>
