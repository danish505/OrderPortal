<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class USPT_Controller extends CI_Controller {

	public function __construct()
	{
		// Get Settings from DB
		parent::__construct();

		$this->load->model('setting_model');
	}

	function view($view_name, $data){

	  // $header_data = $this->getHeaderData();
		// $footer_data = $this->getFooterData();
		// $this->load->view('common/header.php',
		// 									isset($data['header']) ? array_merge($header_data, $data['header']) : $header_data
		// 								);
		//
		// $this->load->view($view_name,$data['view']);
		//
		// $this->load->view('common/footer.php',
		// 									isset($data['footer']) ? array_merge($footer_data, $data['footer']) : $footer_data
		// 									);
	}

	private function getHeaderData(){
		// $data['meta_title'] = 'Find Your Dream Job'.' - '.$this->setting_model->get('site_title');
		// $data['maintenance_mode'] = $this->setting_model->get('maintenance_mode');
		// $data['site_title'] = $this->setting_model->get('site_title');
		//
		// return $data;
	}

	private function getFooterData(){
		return [];
	}

	private function reverseStringForEncodingAndDecoding($string){
		$string_length = strlen($string);
		$part1 = substr($string, 0, ($string_length/2));
		$part2 = strrev(substr($string, $string_length/2));
		return $part1.$part2;
	}

	protected function encode($data){
		return urlencode($this->reverseStringForEncodingAndDecoding(base64_encode(json_encode($data))));
	}

	protected function decode($string){
		return json_decode(base64_decode($this->reverseStringForEncodingAndDecoding(urldecode($string))));
	}
}
