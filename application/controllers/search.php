<?php

class Search extends CI_Controller {

    public function index() {

        
        if (isset($_GET['s'])):

            $load = $this->get_search();
            if ($load->num_rows() == 0):
                redirect(base_url('search/nothing/?keyword=' . $_GET['s']));
            else:

                $data['main'] = 'search';
                $data['title'] = 'Search -'.$_GET['s'].' | Kuhire';
                
                $data['keywords'] = '';
                $data['description'] = '';
                $data['rt'] = $this->get_search();
                $data['count'] = $this->count_result ();
               // $data['footer'] = $this->data->latest_3 ();
                //$data['sidebar'] = $this->data->latest_4 ();
                //$data['hood'] = $this->get_locations();
                $this->load->view('loader', $data);

            endif;
        else:
            $this->u();

        endif;
        
        //$this->advanced_search();
    }

    public function filter() {
        $data['main'] = 'beta_r_search';
        $data['title'] = 'Filtered Search | Scrobber';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['rt'] = $this->get_filtered_search();
        $data['hood'] = $this->get_locations();
        $this->load->view('beta/loader', $data);
    }

    function get_filtered_search() {
        $this->db->like('desc', $_GET['s']);
        $this->db->or_like('name', $_GET['s']);
        $this->db->or_like('tags', $_GET['s']);
        $this->db->where('status', 3);
        $this->db->where('location', $_GET['location']);
        $this->db->where('hire_availabity', $_GET['availability']);
        $this->db->where('item_price', $_GET['price']);
        $rt = $this->db->get('item');

        return $rt;
    }

    function featured() {
        $this->db->where('featured', 1);
        $this->db->where('status', 3);
        $this->db->limit(3);
        $this->db->order_by('item_id', 'random');
        $ft = $this->db->get('item');
        return $ft;
    }

    public function u() {
        $data['main'] = 'search';
        $data['title'] = 'Search | Scrobber';
        $data['keywords'] = '';
        
        $data['description'] = '';
        $data['ft'] = $this->featured();
        
        //$data['footer'] = $this->data->latest_3 ();
        //$data['sidebar'] = $this->data->latest_4 ();
        
        
        $this->load->view('loader', $data);
    }

    function get_search() {
        
        $config['base_url'] = base_url('search/?s=' . $_GET['s'] . '&mask=true');
        $config['total_rows'] = $this->count_result ();
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['next_tag_open'] = '<li class="paginate_enabled_next">';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_enabled_previous">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active paginate_active"> <a href="#" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['num_links'] = 5;


        $config['per_page'] = 10;

        $this->pagination->initialize($config);
        
        $this->db->like('desc', $_GET['s']);
        $this->db->or_like('name', $_GET['s']);
        $this->db->or_like('tags', $_GET['s']);
        
        //Filter
        if(isset($_GET['filter'])):
            if($_GET['filter'] == 'Price'):
                $this->db->order_by('item_price', $_GET['order']);
            elseif ($_GET['filter'] == 'Published'):
                $this->db->order_by('item_id', $_GET['order']);
            endif;
            
        endif;
        
        //Category filter
        
        if(isset($_GET['category'])):
            
                $this->db->where('item_cat', 4);
                
        endif;
        
        
        $this->db->where('status', 3);
        
        
        if (isset($_GET['page'])):
            $this->db->limit(10, $_GET['page']);
        else:
            $this->db->limit(10, 0);
        endif;

        $rt = $this->db->get('item');
        
        $this->log_search();
        
        return $rt;
    }
    
    function count_result ()
    {
         $this->db->like('desc', $_GET['s']);
        $this->db->or_like('name', $_GET['s']);
        $this->db->or_like('tags', $_GET['s']);
        $this->db->where('status', 3);
        
        //Filter
        if(isset($_GET['filter'])):
            if($_GET['filter'] == 'Price'):
                $this->db->order_by('item_price', $_GET['order']);
            elseif ($_GET['filter'] == 'Published'):
                $this->db->order_by('item_id', $_GET['order']);
            endif;
            
        endif;
        
        //Category filter
        
        if(isset($_GET['category'])):
            $slug = $_GET['category'];
            
                $this->db->where('item_cat', $slug);
            
        endif;
        
        //Final count
        $rt = $this->db->get('item');
        
        $data = $rt->num_rows ();
        
        return $data;
    }
    
    function cat ($slug)
    {
        $data = $this->generic_category($slug);
        
        return $data;
    }
    
    function generic_category($slug)
    {
        $query = 'select * from categories where cat_slug="'.$slug.'"';
        //$this->db->where('cat_slug', $slug);
        
        $data = $this->db->get($query);
        
        foreach ($data -> result () as $d);
        
        return $d->cat_id;
    }
    
    function get_search_count() {
        $this->db->like('desc', $_GET['s']);
        $this->db->or_like('name', $_GET['s']);
        $this->db->or_like('tags', $_GET['s']);
        $this->db->where('status', 3);
        $rt = $this->db->get('item');
        $this->log_search();
        return $rt;
    }

    function get_locations() {
        $this->db->order_by('hood_name', 'asc');
        $hood = $this->db->get('hoods');

        return $hood;
    }

    function log_search() {
        if ($_GET['s'] != NULL):
            $this->db->where('s_session', $this->session->userdata('session_id'));
            $this->db->where('s_user', $this->session->userdata('user_id'));
            $this->db->where('s_term', $_GET['s']);
            $ref = $this->db->get('search_log');

            if ($ref->num_rows > 0):
                return true;
            else:

                $data = array(
                    's_term' => $_GET['s'],
                    's_user' => $this->session->userdata('user_id'),
                    's_session' => $this->session->userdata('session_id')
                );
                $this->db->insert('search_log', $data);

                return true;

            endif;

        else:
            return FALSE;

        endif;
    }
    
    function advanced_search ()
    {
        //We focus on users ability to hire around them
        if($_GET['location'] !== NULL):
            
            $l = $_GET['location'];
            
            //We check if the user has a clear location defined
            $def = explode(",", $l);

            //Verify we have a defined city and country
            if(count($def) > 1):
                $city = $def['0'];
                $country = $def['1'];

               //We generate data from database
                $this->db->where('city', $city);
                $this->db->where('country', $country);

            //Single location defined
            else:
                $this->db->where('location', $l);
                $this->db->or_where('city', $l);
                $this->db->or_where('country', $l);
            endif;

        endif;
        
        //The real Search Now
        $terms = $_GET['s'];
        
        //Send the term for sanitization
        $s = $this->sanitize($terms);
        
        $this->db->like('tags', $terms);
        $this->db->or_like('name', $terms);
        
        $data = $this->db->get('item');
        
        echo $data -> num_rows ();
    }
    
    function sanitize ($terms)
    {
        //We strip different keywords
       $ex = explode(" ", $terms);
       
       //We match with stuff from our database
       
       foreach ($ex as $key):
           $st = humanize($key);
           if($st != "The" | "A" | "Or"):
               return $st;
           endif;
       endforeach;
    }
    
    
}

?>