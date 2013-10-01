<?php 

class Api extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('active_location')):
            $this->data->get_location ();
        endif;
    }
    
    function index ()
    {
	
	//Sample request http://t.scrobber.com/app?request=cat&id=1
        if(isset($_GET['request'])):
            if($_GET['request'] == 'geolocations'):
                $this->get_locations();
            elseif($_GET['request'] == 'categories'):
                $this->get_categories ();
			elseif($_GET['request'] == 'cat'):
                $this->get_cat();
			elseif($_GET['request'] == 'product'):
                $this->get_item();
            else:
                echo 'Undefined or Unknown App request';
            endif;
        else:
            $this->app();
        endif;
    }
    
	function get_cat()
	{
		//Working with db
		$this->db->where('item_cat', $_GET['id']);
		$data = $this->db->get('item');
		$i=0;
		echo '{"items":[';
		//$response = array ();
		foreach($data -> result () as $key):
		
			echo '{"name":"'.$key->name.'", "image":"'.base_url("images/thumbnails/".$key->image).'", "price":"'.$key->item_price.'", "location":"'.$key->location.'", "city":"'.$key->city.'", "id":"'.$key->item_id.'"}';
                        
                    //$data->num_rows();
                    
                    if($i<$data->num_rows()-1){
                        echo ',';
                        $i++;
                    }
                
		endforeach;
		
		echo ']}';
	}
	
	function get_item()
	{
		//Working with db
		$this->db->where('item_id', $_GET['id']);
		$data = $this->db->get('item');
		
		
		//$response = array ();
		foreach($data -> result () as $key);
		
		echo $key->name."#";
		
		
		
	}
	
	
	
	
    function get_locations ()
    {
        
        foreach ($this->data->latest_10 ()-> result () as $data):
            if($data->lat != '0'):
                echo $data->lat.','.$data->long.',';
                echo $data->name.',';
                echo base_url('images/thumbnails/'.$data->image).'#';
            endif;
            
        endforeach;
    }
    
    function get_categories()
    {
        $data = $this->db->get('categories');
        
        foreach ($data -> result () as $d):
           echo humanize($d->cat_name).'$$'.$d->cat_id.'#';
        endforeach;
    }
    
    function app ()
    {
        
    }
    
}

?>
