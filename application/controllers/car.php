<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Cars category Base controller
 */

class Car extends CI_Controller {
    
    function index ()
    {
        if(isset($_GET['s'])):
            $this->search ();
        elseif(isset($_GET['tag'])):
            $this->cars->tagged ();  
        
        else:
        $data['main'] = 'cars';
	$data['title'] = 'Hire Cars and Cabs | Scrobber';
	$data['keywords'] = 'cars for hire, wedding cars for hire, fast cabs, cabs for hire';
	$data['description'] = 'Hire cabs, exotic cars and taxis in Kenya, Scrobber';
        $data['cats'] = $this->cars->get_categories ();
        $data['recent'] = $this->cars->get_recent ();
        
	$this -> load -> view('beta/loader', $data);
        
        endif;
    }
    
    function use_filter ()
    {
        $d = $this->cars->use_filtered ();
        $data['main'] = 'cars_category';
	$data['title'] = $d->sub_cat_name.' | Scrobber';
	$data['keywords'] = $d->sub_cat_desc.' | Scrobber';
	$data['description'] = $d->sub_cat_desc;
        $data['cats'] = $this->cars->get_categories ();
        $data['sponsored'] = $this->cars->get_sponsored ();
        
	$this -> load -> view('beta/loader', $data);
    }
    
    function search ()
    {
        $data['main'] = 'cars_search';
	$data['title'] = $_GET['s'] .' search | Scrobber';
	$data['keywords'] = $_GET['s'] . ' cars for hire,'.$_GET['s'] .' wedding cars for hire, fast cabs, cabs for hire';
	$data['description'] = 'Hire cabs, exotic cars and taxis in Kenya, Scrobber';
        $data['cats'] = $this->cars->get_categories ();
        $data['search'] = $this->cars->get_searched();
        $data['sponsored'] = $this->cars->get_sponsored ();
        
	$this -> load -> view('beta/loader', $data);
    }
}
?>
