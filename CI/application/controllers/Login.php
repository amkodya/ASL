<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/23/16
 * Time: 3:00 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->helper(array('form'));
        $this->load->view('welcome_message');
    }

}

?>