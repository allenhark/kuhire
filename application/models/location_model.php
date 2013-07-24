<?php

class Category_model extends CI_Model {

    public function get_countries() {
        $query = $this->db->get('countries');
        return $query->result_array();
    }

    public function get_cities() {
        $query = $this->db->get('cities');
        return $query->result_array();
    }

    public function get_hoods() {
        $query = $this->db->get('hoods');
        return $query->result_array();
    }

}

?>
