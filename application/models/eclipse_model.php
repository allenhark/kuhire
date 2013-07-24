<?php
class Eclipse_model extends CI_Model {

	function get_text_ads ()
	{
		$this->db->where('hook', 1);
		$this->db->order_by('ad_id', 'random');
		$this->db->limit('1');


		$data = $this->db->get('text_ads');

		foreach ($data->result () as $idata);
		return $idata;
	}

	function get_cat ()
	{
		$this->db->where('cat_slug', $this->uri->segment(2));
		$data = $this->db->get('categories');
		foreach ($data->result () as $rt);
		return $rt;
	}

	function get_cat_data ()
	{
		$cdata = $this->get_cat ();
		$this->db->where('status', 3);
		$this->db->order_by('item_id', 'desc');
		$this->db->where('item_cat', $cdata->cat_id);

		$data = $this->db->get('item');

		return $data;
	}

	function get_page () {
		$this->db->where('slug', $this->uri->segment(2));
		$cdata = $this->db->get("pages");
		if($cdata->num_rows () !== 0):
			foreach($cdata -> result () as $data);

			return $data;
		else:
			show_404 ();
			exit ();
		endif;
	}

	
}

?>