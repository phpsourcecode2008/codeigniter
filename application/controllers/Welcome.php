<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

    public function add_brand()
    {
        $data = [];
        $data['page_title'] = 'Add Brand';
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
        $this->load->view('welcome_message');
    }

    public function edit_brand($brand_id = '')
    {
        $data = [];
        $data['page_title'] = 'Edit Brand';
        if ($this->input->post('Cancel'))
        {
            $path = base_url('welcome');
            redirect($path);
        }

        if ($this->input->post('Save'))
        {
            $brand_name = $this->input->post('brand_name');

            $this->form_validation->set_rules('brand_name', 'brand name', 'trim|required|callback_check_exit_brand');
            if ($this->form_validation->run())
            {
                $update_records = array(
                    'brand_name' => $brand_name
                );
                $this->MBrand->update_brand($brand_id, $update_records);
                $path = base_url('welcome');
                redirect($path);
            }
        }

        $data['brand'] = $this->MBrand->get_brand($brand_id);
        $this->load->vars($data);
        $this->load->view('welcome_message');
    }

    public function delete_brand($brand_id = '')
    {
        $this->MBrand->delete_brand($brand_id);
        $path = base_url('welcome');
        redirect($path);
    }

    function check_exit_brand()
    {
        $brand_name = $this->input->post('brand_name');
        $brand_id = $this->input->post('brand_id');

        $brand_cnt = $this->MBrand->check_brand_exist($brand_id, $brand_name);
        if ($brand_cnt > 0)
        {
            $this->form_validation->set_message('check_exit_brand', 'This brand name is already exists.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
