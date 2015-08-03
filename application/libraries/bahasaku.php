<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Bahasaku
{

	function __construct()
	{
		$this->ci =& get_Instance();
				
		// Load required library
		$this->ci->load->helper('cookie');
		$this->ci->load->helper('language');
		
	}
	
	
	function set_to($language) {
		if(strtolower($language) === 'english')
		{
			$lang = 'en';
			$this->ci->config->item('language','english');
			//$this->ci->lang->load('sitka');
		}
		else 
		{
			$lang = 'in';
			$this->ci->config->item('language','indonesia');
			//$this->ci->lang->load('sitka');
		}

		$data_coookie = array(
						'name'	=> 'bahasa',
						'value'	=> $lang,
						'expire'=> '86500',
						'prefix'=> ''
					);
		$this->_set_cookie_lang($data_coookie);
	}

	function is_indonesia()
	{
		return strtolower(get_cookie('bahasa')) == 'in';
	}
	
	function is_english()
	{
		return strtolower(get_cookie('bahasa')) == 'en';
	}
	
	function _set_cookie_lang($data)
	{
		set_cookie($data);
	}

}

?>
