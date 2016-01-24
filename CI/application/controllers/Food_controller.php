<?php
/* 
 * Generated by CRUDigniter v1.3 Beta 
 * www.crudigniter.com
 */
 
class Food_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Food_model');
    }
    
    /*
     * Listing of foods
     */
    function index()
    {
        $data['foods'] = $this->Food_model->get_all_foods();
        $this->load->view('food/index',$data);
    }
    
    /*
     * Adding new foods
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name' => $this->input->post('name'),
				'expiration' => $this->input->post('expiration'),
				'price' => $this->input->post('price'),
				'cal' => $this->input->post('cal'),
				'fats' => $this->input->post('fats'),
				'protein' => $this->input->post('protein'),
				'quantity' => $this->input->post('quantity'),
				'category' => $this->input->post('category'),
            );
            
            $foods_id = $this->Food_model->add_foods($params);
            redirect('food_controller/index');
        }
        else
        {
            $this->load->view('food/add');
        }
    }
    
    /*
     * Editing foods
     */
    function edit($foodid)
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name' => $this->input->post('name'),
				'expiration' => $this->input->post('expiration'),
				'price' => $this->input->post('price'),
				'cal' => $this->input->post('cal'),
				'fats' => $this->input->post('fats'),
				'protein' => $this->input->post('protein'),
				'quantity' => $this->input->post('quantity'),
				'category' => $this->input->post('category'),
            );

            $this->Food_model->update_foods($foodid,$params);            
            redirect('food_controller/index');
        }
        else
        {   
            $data['foods'] = $this->Food_model->get_foods($foodid);
            $this->load->view('food/edit',$data);
        }
    }
    
    /*
     * Deleting foods
     */
    function remove($foodid)
    {
        $this->Food_model->delete_foods($foodid);
        redirect('food_controller/index');
    }
}