<?php
if ( ! class_exists( 'efr_cf7_front_handler' ) ) {
	class efr_cf7_front_handler{
		function __construct(){
			$efr_cf7_setting = get_option('efr_cf7_settings','');
			if($efr_cf7_setting=='yes'){
				add_filter( 'wpcf7_mail_components',array($this,'contact_from_helper'),10,3);
			}
		}
		
		public function contact_from_helper($components,$form_args,$this_data){ //print_r($_REQUEST);die;
			$request_paramiter = $_REQUEST;
			$mail_body = '';
			
			foreach((array)$form_args as $key=>$value): 
				if(is_array($value)): 
					$mail_body= $value['mail']['body'];
					break;
				endif;
			endforeach;

			foreach($request_paramiter as $param_name=>$parma_value):
				if($parma_value==""){
					$message_array = explode('[remove]',$mail_body);
					$temp_message_array = array();
					foreach($message_array as $single_array):
						if (!(strpos($single_array, '['.$param_name.']') !== false)) {
							$temp_message_array[] = $single_array;
						}
					endforeach;
					$mail_body = implode('[remove]',$temp_message_array);
				}else{
					$param_shortcode_name = '['.$param_name.']';
					$mail_body_temp = str_replace($param_shortcode_name,$parma_value,$mail_body);
					$mail_body = $mail_body_temp;
				}
			endforeach;
			
			$mail_body = str_replace('[remove]','',$mail_body);
			$mail_body = str_replace('[/remove]','',$mail_body);
			$components['body'] = $mail_body; 
			
			return $components;
			
		}
	}
	
	new efr_cf7_front_handler();
	
}

?>
