<?php

class MBrand extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function insert_brand($insert_data)
    {
        $this->db->insert('brands', $insert_data);
        return $this->db->insert_id();
    }

    function get_all_brands()
    {
        $res = $this->db->get('brands');
        if ($res->num_rows() > 0)
        {
            return $res->result_array();
        }
    }
    
    function get_brand($brand_id)
    {
        $this->db->where('brand_id', $brand_id);
        $res = $this->db->get('brands');
        if ($res->num_rows() > 0)
        {
            return $res->row_array();
        }
    }
    
    function update_brand($brand_id, $update_records)
    {
        $this->db->where('brand_id', $brand_id);
        $this->db->update('brands', $update_records);
    }
    
    function delete_brand($brand_id)
    {
        $this->db->where('brand_id', $brand_id);
        $this->db->delete('brands');
    }
    
    function check_brand_exist($brand_id, $brand_name)
    {
        $this->db->where('brand_id !=', $brand_id);
        $this->db->where('brand_name', $brand_name);
        $res = $this->db->get('brands');
        return $res->num_rows();
    }

}