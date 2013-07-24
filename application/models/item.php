<?php
class Item extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
    	$this->db->where('status', '1');
		$this->db->where('status', '3');
        return $this->db->count_all("item");
    }
 
    public function fetch_items($limit, $start) {
    	$this->db->where('status', '1');
		$this->db->where('status', '3');
        $this->db->limit($limit, $start);
        $query = $this->db->get("item");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
	            }
            return $data;
        }
        return false;
   }
}

?>