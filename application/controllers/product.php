<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('MBrand');
    }

    public function index()
    {
        $data = [];
        $data['brands'] = $this->MBrand->get_all_brands();
        $this->load->vars($data);
        $this->load->view('manage_brand');
    }

    public function add_product()
    {
        $data = [];
        $data['page_title'] = 'Add Product';
        if ($this->input->post('Cancel'))
        {
            $path = base_url('welcome');
            redirect($path);
        }

        if ($this->input->post('Save'))
        {
            $brand_name = $this->input->post('brand_name');

            $this->form_validation->set_rules('brand_name', 'brand name', 'trim|required|is_unique[brands.brand_name]');
            if ($this->form_validation->run())
            {
                $insert_brand = array(
                    'brand_name' => $brand_name
                );
                $this->MBrand->insert_brand($insert_brand);
                $path = base_url('welcome');
                redirect($path);
            }
        }
        $this->load->vars($data);
        $this->load->view('add_product');
    }

}
