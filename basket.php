  <?php 
    // template Name: Basket;
?>

<?php get_header(); ?>


	
	<!-- ================ HEADER-TITLE ================ -->
	<section class="s-header-title">
		<div class="container">
			<h1>Оформление заказа</h1>
			<ul class="breadcrambs">
				<li><a href="index.html">Главная</a></li>
				<li>Корзина</li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	

	

	<!--================== S-TOP-SALE ==================-->
	<section class="s-top-sale my-s-top-sale">
        

        <div id="content" class="checkout-page-content"> 
            <div class="checkout-hero">
                <div class="checkout-hero__content">
                    <span class="checkout-hero__eyebrow">Безопасное оформление</span>
                    <h2>Проверьте заказ и оставьте контакты</h2>
                    <p>Мы уточним детали, подтвердим наличие товаров и подберём удобный способ получения.</p>
                </div>
                <ul class="checkout-hero__steps" aria-label="Этапы оформления заказа">
                    <li><span>1</span>Корзина</li>
                    <li><span>2</span>Доставка</li>
                    <li><span>3</span>Подтверждение</li>
                </ul>
            </div>

            <div class="checkout-benefits" aria-label="Преимущества заказа">
                <div class="checkout-benefit">
                    <span class="checkout-benefit__icon">✓</span>
                    <div>
                        <strong>Быстрая связь</strong>
                        <p>Менеджер подтвердит заказ после отправки формы.</p>
                    </div>
                </div>
                <div class="checkout-benefit">
                    <span class="checkout-benefit__icon">BYN</span>
                    <div>
                        <strong>Прозрачная сумма</strong>
                        <p>Итоговая стоимость всегда видна перед оформлением.</p>
                    </div>
                </div>
                <div class="checkout-benefit">
                    <span class="checkout-benefit__icon">i</span>
                    <div>
                        <strong>Помощь с доставкой</strong>
                        <p>Подскажем оптимальный вариант получения товара.</p>
                    </div>
                </div>
            </div>

            <div class="empty-basket">
                КОРЗИНА ПУСТА
            </div>   
   
            <div class="simple-content tttt none">        
                    <div id="simplecheckout_form_0">
                    <div class="simplecheckout checkout-redesign">
                                        
                            
                            
                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                            <div class="simplecheckout-step" style="display: block;"><div class="simplecheckout-block" id="simplecheckout_cart">
                                <div class="table-responsive">
                                    <table class="simplecheckout-cart">
                                        <colgroup>
                                            <col class="image">
                                            <col class="name">
                                            <col class="model">
                                            <col class="quantity">
                                            <col class="price">
                                            <col class="total">
                                            <col class="remove">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th class="image">Фото</th>
                                                <th class="name">Наименование товара</th>
                                      
                                                <th class="quantity"><span title="Количество">Кол-во</span></th>
                                                <th class="price">Цена</th>
                                                <th class="total">Итого</th>
                                                <th class="remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="t-body-basket">
                                            
                                                
                                                
                                                
                                        </tbody>
                                    </table>



                                </div>

                                <div class="simplecheckout-cart-total" id="total_sub_total">
                                    <span><b>Стоимость товаров:</b></span>
                                    <span class="simplecheckout-cart-total-value"><span class='subtotal-sum'>0.00</span> BYN</span>
                                    <span class="simplecheckout-cart-total-remove">
                                                                        </span>
                                </div>
                                <div class="simplecheckout-cart-total" id="total_total">
                                    <span><b>Всего:</b></span>
                                    <span class="simplecheckout-cart-total-value"><span class='total-sum'> 0.00</span> BYN</span>
                                    <span class="simplecheckout-cart-total-remove">
                                                                        </span>
                                </div>
                              
                               

                            <div class="simplecheckout-block" id="simplecheckout_customer">
                                <div class="checkout-heading panel-heading"><span>Покупатель</span></div>
                                <div class="simplecheckout-block-content">
                                    <fieldset class="form-horizontal">
                                    

                                    <div class="form-group required row-customer_firstname">
                                <label class="control-label col-sm-4" for="customer_firstname">ФИО</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="text" name="customer[firstname]" id="customer_firstname" value="" placeholder="">
                                                <div class="simplecheckout-rule-group" data-for="customer_firstname">
                                                <div style="display:none;" data-for="customer_firstname" data-for-type="text" data-rule="byLength" class="simplecheckout-error-text simplecheckout-rule" data-length-min="1" data-length-max="32" data-required="true">Имя должно быть от 1 до 32 символов!</div>
                                            </div>
                                            </div>
                            </div>

                                    <div class="form-group required row-customer_email">
                                <label class="control-label col-sm-4" for="customer_email">Email</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="email" name="customer[email]" id="customer_email" value="" placeholder="">
                                                <div class="simplecheckout-rule-group" data-for="customer_email">
                                                <div style="display:none;" data-for="customer_email" data-for-type="email" data-rule="api" class="simplecheckout-error-text simplecheckout-rule" data-method="checkEmailForUniqueness" data-filter="customer_register" data-filter-type="radio" data-filter-value="0" data-required="true">Адрес уже зарегистрирован!</div>
                                                <div style="display:none;" data-for="customer_email" data-for-type="email" data-rule="regexp" class="simplecheckout-error-text simplecheckout-rule" data-regexp="[^@ \t\r\n]+@[^@ \t\r\n]+.[^@ \t\r\n]+" data-required="true">Некорректный адрес электронной почты!</div>
                                            </div>
                                            </div>
                            </div>

                                    <div class="form-group required row-customer_telephone">
                                <label class="control-label col-sm-4" for="customer_telephone">Телефон</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="tel" name="customer[telephone]" id="customer_telephone" value="" placeholder="" data-onchange="reloadAll">
                                                <div class="simplecheckout-rule-group" data-for="customer_telephone">
                                                <div style="display:none;" data-for="customer_telephone" data-for-type="tel" data-rule="byLength" class="simplecheckout-error-text simplecheckout-rule" data-length-min="3" data-length-max="32" data-required="true">Телефон должен быть от 3 до 32 символов!</div>
                                            </div>
                                            </div>
                            </div>


                                            <div class="personal-data-consent">
                                                <p>Нажимая кнопку «Оформить заказ», Вы даете согласие на обработку персональных данных.</p>
                                                <a target="_blank" href="https://mbio.bas-net.by/pers-policy/">Политика в отношении обработки персональных данных</a>
                                                
                                            </div>    

                                    </fieldset>
                                </div>
                            </div><div class="simplecheckout-block" id="simplecheckout_shipping">
                                        <div class="checkout-heading panel-heading">Способ доставки</div>
                                    <div class="alert alert-danger simplecheckout-warning-block" style="display:none">Вы должны выбрать способ доставки!</div>
                                <div class="simplecheckout-block-content">
                                                 <p><b>Доставка</b></p>
                                                        <div class="radio">
                                                            <label for="revship2.revship2">
                                                                <input type="radio" data-onchange="reloadAll" name="shipping_method" value="revship2.revship2" id="revship2.revship2">
                                                                Доставка Европочта - по тарифу Европочты
                                                            </label>
                                                        </div>                                                        
                                                        <p><b>Самовывоз</b></p>
                                                        <div class="radio">
                                                            <label for="pickup.pickup">
                                                                <input checked="checked" type="radio" data-onchange="reloadAll" name="shipping_method" value="pickup.pickup" id="pickup.pickup">
                                                                Самовывоз из магазина
                                                            </label>
                                                        </div>
                                                                                                                                                
                                                    <input type="hidden" name="shipping_method_current" value="revship.revship">
                                        <input type="hidden" name="shipping_method_checked" value="">
                                                        </div>
                            </div><div class="simplecheckout-left-column"><div class="simplecheckout-block none" id="simplecheckout_shipping_address">
                                <div class="checkout-heading panel-heading">Адрес доставки</div>
                                <div class="simplecheckout-block-content">
                                    <fieldset class="form-horizontal">
                                    <div class="form-group required row-shipping_address_address_1">
                                <label class="control-label col-sm-4" for="shipping_address_address_1">Адрес</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="text" name="shipping_address[address_1]" id="shipping_address_address_1" value="" placeholder="" autocomplete="street-address">
                                                <div class="simplecheckout-rule-group" data-for="shipping_address_address_1">
                                                <div style="display:none;" data-for="shipping_address_address_1" data-for-type="text" data-rule="byLength" class="simplecheckout-error-text simplecheckout-rule" data-length-min="3" data-length-max="128" data-required="true">Адрес должен быть от 3 до 128 символов!</div>
                                            </div>
                                            </div>
                            </div>

                                    </fieldset>
                                        <input type="hidden" name="shipping_address[country_id]" id="shipping_address_country_id" value="">
                                    <input type="hidden" name="shipping_address[zone_id]" id="shipping_address_zone_id" value="">
                                    <input type="hidden" name="shipping_address[city]" id="shipping_address_city" value="">
                                    <input type="hidden" name="shipping_address[postcode]" id="shipping_address_postcode" value="">
                                    <input type="hidden" name="shipping_address[current_address_id]" id="shipping_address_current_address_id" value="0">
                                </div>
                            </div></div><div class="simplecheckout-right-column"><div class="simplecheckout-block" id="simplecheckout_payment">
                                        <div class="checkout-heading panel-heading">Способ оплаты</div>
                                    <div class="alert alert-danger simplecheckout-warning-block" style="display:none">Вы должны выбрать способ оплаты!</div>
                                <div class="simplecheckout-block-content">
                                                                                    <div class="radio">
                                                    <label for="revpay1">
                                                        <input type="radio" data-onchange="reloadAll" name="payment_method" value="revpay1" id="revpay1" checked="checked">
                                                        Оплата наличными
                                                                                </label>
                                                </div>
                                                                                                        <div class="radio">
                                                    <label for="revpay2">
                                                        <input type="radio" data-onchange="reloadAll" name="payment_method" value="revpay2" id="revpay2">
                                                        Оплата банковской картой
                                                                                </label>
                                                </div>
                                                                                                        <div class="radio">
                                           
                                                                                                            <input type="hidden" name="payment_method_current" value="revpay1">
                                        <input type="hidden" name="payment_method_checked" value="">
                                                        </div>
                            </div><div class="simplecheckout-block" id="simplecheckout_payment_form" style="margin: 0px; padding: 0px;"></div></div><div class="simplecheckout-block" id="simplecheckout_comment">
                                    <div class="checkout-heading panel-heading">Комментарий к заказу </div>
                                    <div class="simplecheckout-block-content">
                                <textarea class="form-control" name="comment" id="comment" placeholder="Необязательно*" data-reload-payment-form="true"></textarea>
                                </div>
                            </div></div>
                                            
                                            <div id="simplecheckout_bottom" style="width:100%;height:1px;clear:both;"></div>
                                            <div class="simplecheckout-proceed-payment" id="simplecheckout_proceed_payment" style="display:none;">Подождите... Происходит переход к оплате</div>
                                            
                                            

                                            <div class="simplecheckout-button-block buttons" id="buttons">
                                                <div class="simplecheckout-button-right">
                                                                    
                                                                            <a class="button btn-primary button_oc btn" data-onclick="createOrder" id="simplecheckout_button_confirm"><span>Оформить заказ</span></a>
                                                </div>
                                                <div class="simplecheckout-button-left">
                                                                                                </div>
                                            </div>

                                           

                                                            
                                                    
                                        
                                                </div>
                                </div>
                            </div>

                                <div class="rev_slider">
                            


                            </div>
        </div>

        <form class="checkout-summary-overlay" id="checkout_summary_overlay" aria-hidden="true">
            <div class="checkout-summary-panel" role="dialog" aria-modal="true" aria-labelledby="checkout_summary_title">
                <button class="checkout-summary-panel__close" type="button" id="checkout_summary_close" aria-label="Закрыть окно">×</button>
                <p class="checkout-summary-panel__eyebrow">Проверьте данные</p>
                <h3 class="checkout-summary-panel__title" id="checkout_summary_title">Подтверждение заказа</h3>
                <div class="checkout-summary-panel__content" id="checkout_summary_content"></div>
                <button class="checkout-summary-panel__submit" type="submit" id="checkout_summary_submit">Заказать</button>
            </div>
        </form>


	</section>
	<!--================ S-TOP-SALE END ================-->



	<!--================== S-CONTACTS ==================-->
	<section id="contacts" class="s-subscribe contacts-section" style="background-image: url(assets/my-img/12.png);">
		<span class="mask"></span>
		<div class="container contacts-container">
			<div class="contacts-panel wow fadeInLeftBlur lazy" data-wow-duration=".8s" data-wow-delay=".1s">
				<p class="contacts-eyebrow">Связаться с нами</p>
				<h2 class="title contacts-title"><span>Контакты</span></h2>
				<p class="contacts-lead">Получите консультацию по препаратам, условиям заказа и сотрудничеству с Институтом микробиологии НАН Беларуси.</p>

				<div class="contacts-list">
					<div class="contact-card">
						<span class="contact-card-icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
						<div>
							<span class="contact-card-label">Телефон</span>
							<a href="tel:+375447507890">+375 (44) 750-78-90</a>
						</div>
					</div>

					<div class="contact-card">
						<span class="contact-card-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<div>
							<span class="contact-card-label">Email</span>
							<a href="mailto:inmisale@mail.ru">inmisale@mail.ru</a>
						</div>
					</div>

					<div class="contact-card">
						<span class="contact-card-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
						<div>
							<span class="contact-card-label">Адрес</span>
							<span>г. Минск, ул. Академика Купревича, 2</span>
						</div>
					</div>
				</div>

				<div class="contacts-schedule">
					<span class="contact-card-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
					<div>
						<span class="contact-card-label">График работы</span>
						<p>Пн-Чт: 9:00 - 18:00, обед: 13:00 - 13:35</p>
						<p>Пт: 9:00 - 15:55, обед: 13:00 - 13:35</p>
						<p>Сб-Вс: выходной</p>
					</div>
				</div>
			</div>

			<div class="contacts-map wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".2s">
				<div class="contacts-map-top">
					<div>
						<span class="contact-card-label">Мы на карте</span>
						<p>Институт микробиологии НАН Беларуси</p>
					</div>
					<a class="contacts-map-link" href="https://www.google.com/maps/search/?api=1&query=%D0%B3.+%D0%9C%D0%B8%D0%BD%D1%81%D0%BA,+%D1%83%D0%BB.+%D0%90%D0%BA%D0%B0%D0%B4%D0%B5%D0%BC%D0%B8%D0%BA%D0%B0+%D0%9A%D1%83%D0%BF%D1%80%D0%B5%D0%B2%D0%B8%D1%87%D0%B0,+2" target="_blank" rel="noopener">Открыть маршрут</a>
				</div>
				<div class="contacts-map-frame">
					<iframe title="Институт микробиологии НАН Беларуси на карте" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18794.367081731318!2d27.683449!3d53.926487!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcebb4d6f6d2b%3A0x1c24ca875beb668c!2z0JjQvdGB0YLQuNGC0YPRgiDQvNC40LrRgNC-0LHQuNC-0LvQvtCz0LjQuCDQndCQ0J0g0JHQtdC70LDRgNGD0YHQuA!5e0!3m2!1sru!2sby!4v1737573509389!5m2!1sru!2sby" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</section>
	<!--================ S-CONTACTS END ================-->



	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>

<?php get_footer(); ?>