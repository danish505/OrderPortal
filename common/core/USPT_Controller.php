<?php
defined('BASEPATH') or exit('No direct script access allowed');

class USPT_Controller extends CI_Controller
{
    public function __construct()
    {
        // Get Settings from DB
        parent::__construct();
        $this->load->vars('base_url', base_url());
    }

    private function reverseStringForEncodingAndDecoding($string)
    {
        $string_length = strlen($string);
        $part1 = substr($string, 0, ($string_length/2));
        $part2 = strrev(substr($string, $string_length/2));
        return $part1.$part2;
    }

    protected function encode($data)
    {
        return urlencode($this->reverseStringForEncodingAndDecoding(base64_encode(json_encode($data))));
    }

    protected function decode($string)
    {
        return json_decode(base64_decode($this->reverseStringForEncodingAndDecoding(urldecode($string))));
    }
}
