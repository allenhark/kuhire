<?php 
    /**
     * Automation php class
     * We handle some functions here
     */

class Automation extends CI_Controller {
    
    public function index ()
    {
        if($this->uri->segment(2)):
            $func = $this->uri->segment(2);
        
            if(method_exists($this, $func)):
                //echo 'it exist';
                $this-> $func ();
            endif;
        else:        
            echo 'we go on';
        endif;
    }
    
    //Start by shortening all urls
    function shorten ()
    {
        //Get all items with no shortlink
        $this->db->where('bitly', '');
        $data = $this->db->get('item');
        
        //echo $data->num_rows ();
        //Check if we need to really run this function
        if($data->num_rows () == 0):
            echo 'We dont need to run anything';
        else:
            //create and add shortlink
            foreach ($data-> result () as $key):
               $url = base_url($key->slug.'?ref=short-link');
               $update['bitly'] = $this->bitly->shorten($url);

               //Update the item
               $this->db->where('item_id', $key->item_id);
               $this->db->update('item', $update);
            endforeach;
        endif;
    }
    
    //Create product Codes
    function codes ()
    {
        //Match all products needing a code
        $this->db->where('code', '');
        $this->db->or_where('code', NULL);
        $data = $this->db->get('item');
        
        //Check if we need to run it
        if($data->num_rows != 0):
            foreach ($data -> result () as $key):
                $code = random_string('nozero', 6);
                $update['code'] = $code;
                //Update the item
                //Update the item
               $this->db->where('item_id', $key->item_id);
               $this->db->update('item', $update);
            endforeach;
        endif;
        
    }
    
}

?>
