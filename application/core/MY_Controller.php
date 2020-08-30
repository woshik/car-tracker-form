<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $config;

    public function __construct()
    {
        parent::__construct();

        $lang = array(
            "en" => "english",
            "nl" => "dutch",
            "de" => "german"
        );

        if (array_key_exists($this->uri->segment(1), $lang)) {
            $this->lang->load($lang[$this->uri->segment(1)], $lang[$this->uri->segment(1)]);
        } else {
            $this->lang->load($lang['en'], $lang['en']);
        }
    }

    public function debug($result)
    {
        echo "<pre>";
        print_r($result);
        die;
    }
}
