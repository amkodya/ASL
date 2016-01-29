<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/23/16
 * Time: 10:22 PM
 */
class LoginForm extends CI_Controller {

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('welcome_message');
        }
        else
        {

            $user = array();
            $this->load->model("SignupformModel");

            $data = array();
            $this->load->model('food_model');

            $data['foods'] = $this->food_model->getFoods();
            $user['login'] = $this->SignupformModel->getName();
            $this->load->view('foodView', $data, $user);

        }
    }

    public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
?>