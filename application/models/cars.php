<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cars extends CI_model {
    
    function get_categories ()
    {
        $this->db->where('cat_id', 1);
        $data = $this->db->get('sub_categories');
        
        return $data;
    }
    
    function tagged ()
    {
        $data['main'] = 'car_tagged';
	$data['title'] = 'Hire Cars and Cabs | Scrobber';
	$data['keywords'] = 'cars for hire, wedding cars for hire, fast cabs, cabs for hire';
	$data['description'] = 'Hire cabs, exotic cars and taxis in Kenya, Scrobber';
        $data['cats'] = $this->cars->get_categories ();
        $data['search'] = $this->get_tagged ();;
        $data['sponsored'] = $this->cars->get_sponsored ();
        
	$this -> load -> view('beta/loader', $data);
    }
    
    function get_tagged ()
    {
        $this->db->like('tags', $_GET['tag']);
        if(isset($_GET['extra'])):
            $this->db->or_like('tags', $_GET['extra']);
        endif;
        $this->db->order_by('item_id', 'random');
        
        $data = $this->db->get('item');
        
        return $data;
    }
    
    function get_recent ()
    {
        $this->db->where('item_cat', 1);
        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'desc');        
        $this->db->limit(4);
        
        $data = $this->db->get('item');
        
        return $data;
    }
    
    function get_searched ()
    {
        $this->db->where('item_cat', 1);
        $this->db->where('status', 3);
        $this->db->like('name', $_GET['s']);
        $this->db->or_like('tags', $_GET['s']);
        $this->db->or_like('desc', $_GET['s']);
        
        if(isset($_GET['location'])):
            $this->db->where('location', $_GET['location']);
        endif;
        
        if(isset($_GET['price'])):
            $this->db->like('item_price', $_GET['price']);
        endif;
        
        if(isset($_GET['use'])):
            $this->db->where('tags', $_GET['use']);
        endif;
        $this->db->order_by('item_id', 'desc');
       // $this->db->limit(0, 20);
        
        $data = $this->db->get('item');
        
        return $data;
    }
    
    function use_filtered ()
    {
        $this->db->where('sub_cat_slug', $this->uri->segment(3));
        $dt = $this->db->get('sub_categories');
        
        if($dt->num_rows == 0):
            show_404 ('Resource not Found');
            exit ();
        else:
            foreach($dt->result () as $data);
        
            return $data;
        endif;
    }
    
    function get_sponsored ()
    {
        $this->db->where('item_cat', 1);
        $this->db->where('status', 3);
        $this->db->where('featured', 1);
        $this->db->order_by('item_id', 'rand');
        $this->db->limit(1);
        
        $dt = $this->db->get('item');
        
        foreach($dt->result () as $data);
        
        return $data;
        
    }
}
?>
