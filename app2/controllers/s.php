<?php

class S extends CI_Controller {

    /**
     *  Advanced Intelligent Search Platform
     * Makes it easier for the user to quickly find what they are looking for by defragmenting Seach results
     * Step Based.
     * Steps::
     * 		1. Show an empty search boy (What are you looking for)
     * 		2. Compute all available results.
     * 		3. Ask User to filter.
     * 			-> Location
     * 			-> Price
     * 			-> Hire date
     * 			-> Purpose (4 some categories)
     * 		4. Show the fine results to the user.
     */
    
    function index() {
        
            
         
         
    }
    
 
    function location() {
        
    echo '';

    }

    public function cat_index() {
        $filename = APPPATH . 'views/beta/file.php';
        $string = file_get_contents($filename);
        $sanitized = explode(':', $string);

        print_r("<pre>");
        // print_r($sanitized);
        //echo $string;

        foreach ($sanitized as $d):
            $title = trim($d);
            $url_title = url_title($title, TRUE);

            $data['cat_id'] = 4;
            $data['sub_cat_desc'] = $title . ' For hire in Kenya, Uganda, Tanzania, Nairobi, Mombassa, Westlands, Arusha, Kampala, Embakasi';
            $data['sub_cat_slug'] = $url_title;
            $data['sub_cat_name'] = $title;

            $this->db->insert('sub_categories', $data);

        endforeach;
    }

    public function calc() {
        $data['main'] = 'cac';
        $data['title'] = 'Calculator';
        $data['keywords'] = '';
        $data['description'] = '';
        $this->load->view('beta/loader', $data);
    }

    public function u() {
        $cf = $this->cat_view();
        foreach ($cf->result() as $cv):

            $data['main'] = $cv->cat_view;
            $data['title'] = $cv->cat_title;
            $data['keywords'] = $cv->cat_keywords;
            $data['description'] = $cv->cat_desc;
            $data['ct'] = $this->get_cat();
            $data['ft'] = $this->get_featured();
            $this->load->view('beta/loader', $data);
        endforeach;
    }

    function get_cat() {
        $this->db->where('cat_slug', $this->uri->segment('3'));
        $ct = $this->db->get('categories');

        return $ct;
    }

    function get_featured() {
        $ct = $this->get_cat();
        foreach ($ct->result() as $cat):
            $this->db->where('featured', 1);
            $this->db->order_by('item_id', 'random');
            $this->db->limit('1');
            $this->db->where('item_cat', $cat->cat_id);
            $ft = $this->db->get('item');
            return $ft;
        endforeach;
    }

    function cat_view() {
        $this->db->where('cat_slug', $this->uri->segment('3'));
        $cf = $this->db->get('cat_view');

        return $cf;
    }

}
?>

