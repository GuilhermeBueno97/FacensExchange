<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_categories extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories()
    {
        $categories = $this->db->get('categories');

        if($categories && $categories->num_rows() > 0){
            return $categories->result();
        }

        return FALSE;
    }

    public function getCategoriesArray()
    {
        $categories = $this->db->get('categories');

        if($categories && $categories->num_rows() > 0){
            $array = array('' => '');
            
            foreach($categories->result() AS $row){
                $array[$row->category_id] = $row->category_name;
            }

            return $array;
        }

        return array();
    }

    public function addCategory($category)
    {
        $this->db->insert('categories', $category);
    }
}