<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.10.2018
 * Time: 16:53
 */

/**
 * Шорткод
 * @return string
 */
function popUp()
{
    $dir = esc_url(plugins_url('subscription/includes/CardController.php'));

    echo '
    <button class="openModal">PREMIUM</button>

            <div class="modals">
              <div class="modal-content">           
              
              
              
              
              
                <div class="modal-wrap">
                <button class="close"></button>
                <div class="contact-info-wrap">

                <div class="custom-heading">
                    <div class="custom-heading-inner">
                        <h1 class="custom-heading-title">PREMIUM</h1>								
                            <hr class="hr-short">
                    </div> 
                </div>

                        <div class="split-box-content">
                            <form  method="post" action="' . $dir . '">
                              <div class="form-wrap">
                              <input type="hidden" name="card">
                                <input class="form-input" id="msisdn" type="text" name="msisdn">
                                <label class="form-label" for="msisdn">Ваш телефон</label>
                              </div>

                              <button class="btn btn-primary" type="submit">Получить</button>
                            </form>
                            <div class="contact-info margin-top-40">
                                <p>Стоимость услуги 300,19 рублей в месяц</p>
                            </div>
                            
                        </div>
    </div>
                </div>
              </div>
            </div>
';
}



//<section id="contact-section" class="contact-simple">
//				<div class="contact-section-inner full-height-vh">
//					<div class="full-cover bg-image" style="background-image: url(assets/img/misc/contact-bg-2.jpg); background-position: 50% 50%;"></div>
//
//					<div class="cover bg-transparent-1-dark"></div>
//
//					<div class="contact-info-wrap">
//
//						<div class="custom-heading">
//							<div class="custom-heading-inner">
//								<h1 class="custom-heading-title">24/7 Support</h1>
//
//								<hr class="hr-short">
//							</div>
//						</div>
//
//						<div class="contact-info margin-top-40">
//							<p><i class="fa fa-home"></i> address: 121 King Street, Melbourne, Australia</p>
//							<p><i class="fa fa-phone"></i> phone: +123 456 789 000</p>
//							<p><i class="fa fa-envelope"></i> email: <a href="/cdn-cgi/l/email-protection#c6a5a9abb6a7a8bf86a3aba7afaae8a5a9ab" target="_blank"><span class="__cf_email__" data-cfemail="abc8c4c6dbcac5d2ebcec6cac2c785c8c4c6">[email&#160;protected]</span></a></p>
//						</div>
//
//						<div class="social-buttons margin-top-20">
//							<ul>
//								<li><a href="#" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
//								<li><a href="#" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
//								<li><a href="#" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>
//								<li><a href="#" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
//								<li><a href="#" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>
//							</ul>
//						</div>
//
//					</div>
//
//				</div>
//			</section>








