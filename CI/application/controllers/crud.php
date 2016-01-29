<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/24/16
 * Time: 12:53 AM
 */
class Crud extends CI_Controller {

    function index() {
        // Check if form is submitted
        if ($this->input->post('submit')) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $expiration = $this->security->xss_clean($this->input->post('expiration'));
            $price = $this->security->xss_clean($this->input->post('price'));
            $cal = $this->security->xss_clean($this->input->post('cal'));
            $fats = $this->security->xss_clean($this->input->post('fats'));
            $protein = $this->security->xss_clean($this->input->post('protein'));
            $quantity = $this->security->xss_clean($this->input->post('quantity'));
            $category = $this->security->xss_clean($this->input->post('category'));

            $data['foods'] = array(

               /* $name, $expiration, $price, $cal,
                $fats, $protein, $quantity, $category */

                'name' => 'Name',
                'expiration' => 'Expiration',
                'price' => 'Price',
                'cal' => 'Calories',
                'fats' => 'Fats',
                'protein' => 'Protein',
                'Quantity' => 'Quantity',
                'Category' => 'Category'
            );

            $data = array();

            $this->load->model('food_model');
            $data['foods'] = $this->food_model->getFoods();

            // Add the post
            $this->load-> helper(array('form','url'));
            $this->load->model('food_model');
            $this->food_model->addFood($name, $expiration, $price, $cal, $fats, $protein, $quantity, $category);
            //$data['foods'] = $this->food_model->getFoods();
            //$this->load->view('header');
          //  $this->load->view('foodView', $data);
        }

        $data = array();
        $this->load->model('food_model');
        $data['foods'] = $this->food_model->getFoods();

        $user = array();
        $this->load->model('SignupformModel');
        $user['login'] = $this->SignupformModel->getName();

     //   $this->load->view('header');
        $this->load->view('foodView', $data);

    }


    function update() {
        $foodid = $this->uri->segment(3);

        if ($this->input->post('submit')) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $expiration = $this->security->xss_clean($this->input->post('expiration'));
            $price = $this->security->xss_clean($this->input->post('price'));
            $cal = $this->security->xss_clean($this->input->post('cals'));
            $fats = $this->security->xss_clean($this->input->post('fats'));
            $protein = $this->security->xss_clean($this->input->post('protein'));
            $quantity = $this->security->xss_clean($this->input->post('quantity'));
            $category = $this->security->xss_clean($this->input->post('category'));

            $data = array();

            $this->load->model('food_model');
            $data['foods'] = $this->food_model->getFoods();

            // Add the post
            $this->load-> helper(array('form','url'));
            $this->load->model('food_model');
            $this->food_model->addFood($name, $expiration, $price, $cal, $fats, $protein, $quantity, $category);
            $data['foods'] = $this->food_model->getFoods();
        //    $this->load->view('header');
            $this->load->view('foodView');
        }

        $data = array();
        $this->load->model('food_model');
        $data['foods'] = $this->food_model->getFoods();
        $this->load->view('updatefood', $data);
    }

    function delete() {
        $foodid = $this->uri->segment(3);
        $this->Food_model->deleteFood($foodid);

        $data['posts'] = $this->posts_model->getPosts();
        $this->load->view('crud_view', $data);
    }

    function grocery() {

        $this->load->model('food_model');
        $data['foods'] = $this->food_model->getFoods();
        $this->load->view('grocery_view', $data);

    }

    function home() {
        $this->load->view('foodView');
    }

    function nutrition() {

        $this->load->model('food_model');
        $data['foods'] = $this->food_model->getFoods();
        $this->load->view('nutrition', $data);

    }



}


