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
    
    function thumbnail_index ()
    {
        $dir = './images/';

        $files2 = scandir($dir, 1);
        echo "<pre>";
        foreach ($files2 as $key):
            //Insert thumbs into db for indexing
            $this->db->where('image', $key);
            $data = $this->db->get('thumbs');
            
            if($data->num_rows () === 0):
                $info['image'] = $key;
                $this->db->insert('thumbs', $info);
            else:
                continue;
            endif;
        endforeach;
    }
    
    function rebuild_thumbs ()
    {
        $this->db->where('thumbnailed', 0);
        $data = $this->db->get('thumbs');
        
        if($data -> num_rows () !== 0):
            require_once APPPATH . 'libraries/thumb/ThumbLib.inc.php';
            //start loop
            $i=0;
            
               
                   $max_count = 5;
                    $counter = 0;
                    foreach ($data -> result () as $key) {
                    $file_path = './images/'.$key->image;
                    $file_name = $key->image;

                    $thumb = PhpThumbFactory::create($file_path);

                    //$thumb = PhpThumbFactory::create('test.jpg');
                    $thumb->resize(221, 147)->save('./images/thumbnails/' . $file_name);

                    //update db
                    $info['thumbnailed'] = 1;
                    $this->db->where('id', $key->id);
                    $this->db->update('thumbs', $info);
                        if($counter == $max_count){
                            break;
                        }
                        $counter++;
                    } 
                    
                    unset($counter);
                    
//                    for($counter=0;$counter<6;$counter++){
//                        foreach ($data -> result () as $key):
//                        echo 'guy '.$counter;
////                    $file_path = './images/'.$key->image;
////                    $file_name = $key->image;
////
////                    $thumb = PhpThumbFactory::create($file_path);
////
////                    //$thumb = PhpThumbFactory::create('test.jpg');
////                    $thumb->resize(221, 147)->save('./images/thumbnails/' . $file_name);
////
////                    //update db
////                    $info['thumbnailed'] = 1;
////                    $this->db->where('id', $key->id);
////                    $this->db->update('thumbs', $info);
////                    return true;
//                        endforeach;
//                    }
                   
            
                       

        else:
            echo 'We are done';
        endif;
    }
    
    function search ()
    {
        $this->db->where('s_term', '');
        $this->db->or_where('s_term', NULL);
        $data = $this->db->get('search_log');
        
        //Check if run needed
        if($data->num_rows () != 0):
            foreach ($data -> result () as $key):
                $this->db->where('s_id', $key->s_id);
                $this->db->delete('search_log'); 
            endforeach;
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