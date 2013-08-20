<?php 

/**
 * Default site cms controller
 * @author Antony Gtionga <antony@scrobber.com>
 * @package  Site CMS
 */

class Cms extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->driver ();
        
        exit();
    }
    
    function driver ()
    {
        if($this->uri->segment(2)):
            $func = $this->uri->segment(2);
        
            if(method_exists($this, $func)):
                //echo 'it exist';
                $this-> $func ();
            else:
                $this->home ();
            endif;
        else:        
            $this->home ();
        endif;
    }
    
    function home ()
    {
        echo 'site Homepage';
    }
    
    function faq ()
    {
        
        //Get FAQ's
        $data['faqs'] = $this->data->get_faqs ();
        $data['main'] = 'c';
        $data['title'] = 'Frequently asked questions - Kuhire.com';
        
        $this->load->view('loader', $data);
        
       
    }
    
    function search ()
    {
        echo 'we are searching wilson';
    }
    
}


?>
