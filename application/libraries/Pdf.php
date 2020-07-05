<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'fpdf/fpdf/fpdf.php';

class Pdf extends FPDF
{
    function __construct()
    {
    	parent::__construct();
    }
}