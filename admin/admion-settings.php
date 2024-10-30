<?php
if ( ! class_exists( 'efr_cf7_admin' ) ) {
	class efr_cf7_admin{
			
		public function add_wcals_admin_menu(){
			add_submenu_page( 'wpcf7', ' Empty Fields Remover For CF7', ' Empty Fields Remover For CF7', 'manage_options', 'efr_cf7_settings', array('efr_cf7_admin','efr_cf7_settings') ); 
		}
		
		public function efr_cf7_settings(){
			
			/* Save Settings */
			if(isset($_REQUEST['do_save_enable_efr_cf7_option']) && $_REQUEST['do_save_enable_efr_cf7_option']=='yes'){
				$option_val = $_REQUEST['enable_efr_cf7_option']==''?'no':$_REQUEST['enable_efr_cf7_option'];
				update_option('efr_cf7_settings',$option_val);
			}
			
			$efr_cf7_setting = get_option('efr_cf7_settings','');
			
			?>
				<div class="" id="efr_cf7_admin">
					<div class="" style="border-bottom:1px solid #f1f1f1; margin-bottom:10px;">
						<h2>Empty Fields Label Remover On Contact Form Email Setting</h2>
					</div>
					<form action="" method="post">
						<table class="setting_efr_cf7_admin">
							<tr>
								<td><label style="font-weight:bold;" for="enable_efr_cf7_option">Enable / Disable</label></td>
								<td><input type="checkbox" name="enable_efr_cf7_option" <?php if($efr_cf7_setting=="yes"): echo 'checked'; endif; ?> id="enable_efr_cf7_option" value="yes">  </td>
							</tr>
							<!--<tr>
								<td><label style="font-weight:bold;" for="enable_efr_cf7_option"> <label style="font-weight:bold;" for="enable_efr_cf7_option">Enter Start Line With Tags Name</label></label></td>
								<td><input type="text" name="line_start_efr_cf7_option" id="line_start_efr_cf7_option" value="<div>"> </td>
							</tr>
							<tr>
								<td><label style="font-weight:bold;" for="enable_efr_cf7_option"> <label style="font-weight:bold;" for="enable_efr_cf7_option">Enter End Line With Tags Name</label></label></td>
								<td><input type="text" name="line_start_efr_cf7_option" id="line_end_efr_cf7_option" value="</div>"> </td>
							</tr>-->
						</table>
						
						<input type="hidden" name="do_save_enable_efr_cf7_option" id="do_save_enable_efr_cf7_option" value="yes"> 
						<button style="margin-top:10px; margin-bottom:20px;" class="button-primary">Save Setting</button>
					</form>
				</div>
				
				<div class="efr_box_shadow" id="efr_cf7_admin" style="margin-top:25px;">
					<div class="" style="border-bottom:1px solid #f1f1f1; margin-bottom:10px;">
						<h2>Our Other Paid Services</h2>
					</div>
					<div id="the-list">
						
						<?php 
							$author = array(
								'link'=>'https://codecanyon.net/user/nbgoyani/portfolio',
								'name'=>'NBGoyani'
							);
							$plugins = array(
								'0'=>array(
									'name'=>'Woocommerce next order offer',
									'link'=>'https://codecanyon.net/item/woocommerce-next-order-offer/15223927?ref=nbgoyani',
									'image'=>'next-order-offer.jpg',
									'content'=>'Next Order offer for WooCommerce enables shop owners to attract n’th order purchases from their customers after give percentage or fixed order discount.',
									'price'=>20,
									'rating'=>'5',
								),
								'1'=>array(
									'name'=>'WooCommerce Advanced Email Customizer',
									'link'=>'https://codecanyon.net/item/woocommerce-advanced-email-customizer/15878636?ref=nbgoyani',
									'image'=>'advanced-email.jpg',
									'content'=>'WooCommerce Advanced Email Customizer allows you to customize email subject & visually modify the look and style of woocommerce order emails like New Order, Processing Order, Completed Order, Cancelled Order, Failed Order & Refunded Order Emails.',
									'price'=>20,
									'rating'=>'4',
								),
								'2'=>array(
									'name'=>'WooCommerce Manage Pages Layout With Unlimited Owl Slider',
									'link'=>'https://codecanyon.net/item/woocommerce-manage-pages-layout-with-unlimited-owl-slider/15590920?ref=nbgoyani',
									'image'=>'manage-layouts.jpg',
									'content'=>'You can build grid, list, mationary, boxed( 9 diffrent style available) layouts with infinite scroll & unlimited owl carousel product slider.',
									'price'=>19,
									'rating'=>'',
								),
								'3'=>array(
									'name'=>'Payment & Shipping Method Based On Country / State',
									'link'=>'https://codecanyon.net/item/payment-shipping-method-based-on-country-state/17504856?ref=nbgoyani',
									'image'=>'payment-method.jpg',
									'content'=>'User Was Easily Manage Payment And Shipping Method Based on country. if one payment method is enable one country and this payment method is disable other country, so this situation user have manage easily by using this plugin.',
									'price'=>17,
									'rating'=>'',
								),
								'4'=>array(
									'name'=>'WP & Woocommerce Advanced Live Search',
									'link'=>'http://codecanyon.net/item/wp-woocommerce-advanced-live-search/16096933?ref=nbgoyani',
									'image'=>'advanced-search.png',
									'content'=>'WP & WooCommerce Advanced Live Search delivers users instant changing results as they typed and selected options like min-max price range, product type & product category.',
									'price'=>17,
									'rating'=>'',
								),
								'5'=>array(
									'name'=>'WooCommerce Addon Bundle',
									'link'=>'https://codecanyon.net/item/woocommerce-addon-bundle/17116982?ref=nbgoyani',
									'image'=>'bundle.jpg',
									'content'=>'Bundle Includes Payment & Shipping Method Based On Country / State ($17) , WP & Woocommerce Advanced Live Search ($17) , WooCommerce Advanced Email Customizer ($20) , WooCommerce Manage Pages Layout With Unlimited Owl Slider ($19) , Woocommerce next order offer ($20)',
									'price'=>49,
									'rating'=>'',
								),
							);
							
						 ?>
						
						<?php foreach($plugins as $single_plugin): ?>
								<div class="plugin-card" style="background:#f5f5f5;">
									<div class="plugin-card-top">
										<div class="name column-name">
											<a style="text-decoration:none;" class="thickbox open-plugin-details-modal" target="_blank" href="<?php echo $single_plugin['link']; ?>">
												<img alt="" class="plugin-icon" src="<?php echo efr_cf7_url.'admin/assets/'.$single_plugin['image']; ?>">
											</a>
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li><a style="text-decoration:none;" target="_blank" data-name="<?php echo $single_plugin['name']; ?>" aria-label="Install <?php echo $single_plugin['name']; ?>" href="<?php echo $single_plugin['link']; ?>" data-slug="<?php echo $single_plugin['name']; ?>" class="install-now button">Purchase Now</a></li>
												<li>
													<?php if($single_plugin['rating']!=""): ?>
														<?php for($i=1; $i<=$single_plugin['rating'];$i++): ?>
															<span class="dashicons dashicons-star-filled" style="color:#ffb900; width:15px; height:15px; font-size:16px;"></span>
														<?php endfor; ?>
													<?php else: ?>
														<span style="color:#ccc; font-size:15px;">No Rating</span>
													<?php endif; ?>
												</li>
												<li><div class="efr_cf7_plugin_price">$<?php echo $single_plugin['price']; ?></div></li>
												<li><a style="text-decoration:none;" target="_blank" data-title="" aria-label="" class="thickbox open-plugin-details-modal" href="<?php echo $author['link']; ?>">More Details</a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p style="margin-top:0;"><?php echo wp_trim_words($single_plugin['content'],24); ?></p>
											<p class="authors"><cite>By <a style="text-decoration:none;" class="thickbox open-plugin-details-modal" target="_blank" href="<?php echo $author['link']; ?>"><?php echo $author['name']; ?></a></cite></p>
										</div>
									</div>
									<div class="plugin-card-bottom" style="background:#f1f1f1;">
										<h3>
											<a style="text-decoration:none;" class="thickbox open-plugin-details-modal" target="_blank" href="<?php echo $single_plugin['link']; ?>">
											<?php echo $single_plugin['name']; ?>
											</a>
										</h3>
									</div>
								</div>
						<?php endforeach; ?>
						
						<div style="clear:both; overflow:hidden;"></div>
						

					</div>
				</div>
				<style>
					#efr_cf7_admin{ border-radius:5px; background: #ffffff none repeat scroll 0 0;    border-left: 4px solid #ffffff;    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);    margin: 5px 15px 2px;    padding: 1px 12px; }
					.efr_cf7_plugin_price {  font-size: 17px;  font-weight: bold;}
					.setting_efr_cf7_admin tr{ }
					.setting_efr_cf7_admin tr td{ padding:7px; }
					.efr_box_shadow{  }
				</style>
			<?php 
		}
	}
	new efr_cf7_admin();
}
?>
