<?php 

class App extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('active_location')):
            $this->data->get_location ();
        endif;
    }

    public function index()
    {
     $mail_sent = false;
      if ($this->input->post(‘q’))
     {
        # Loading email library of Codeigniter
        $this->load->library(‘email’);
        # Loading configuration file mail_config.php
        $this->config->load(‘mail_config’,true);
        # Setting email address and name of the person sending the email
        $this->email->from($this->input->post(‘from’),$this->input->post(‘name’));
        # Setting email address of the recipient
        $this->email->to($this->config->item(‘to’,‘mail_config’));
        # Setting email subject
        $this->email->subject($this->input->post(‘subject’));
        # Setting email message body
        $this->email->message($this->input->post(‘message’,true));
        # If mail sending successful
          if ($this->email->send())
            {
                # If $mail_sent = true; it will show a success message.
                $mail_sent = true;
             }
        }
           # Showing Contact Form
           $this->load->view(‘contact_form’,array(‘mail_sent’=>$mail_sent));
}
    
    function indexses ()
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
