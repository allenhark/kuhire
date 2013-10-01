<?php

/*
 * Data model
 * handles most data commutication thru the database.
 */

class Data extends CI_Model {

    function __construct() {
        parent::__construct();

        /*
          if(!$this->session->userdata('active_location')):
          $this->get_location ();
          endif;
         * 
         */
    }

    function faq_count() {
        $this->db->where('faq_status', 1);
        $result = $this->db->get('faq');

        $count = $result->num_rows();

        //Return count of all faqs
        return $count;
    }

    //GEt faqs script
    function get_faqs() {
        $config['base_url'] = base_url('site/faq?');
        $config['total_rows'] = $this->faq_count();
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

        $this->db->where('faq_status', 1);
        $this->db->order_by('faq_id', 'DESC');

        if (isset($_GET['page'])):
            $this->db->limit(10, $_GET['page']);
        else:
            $this->db->limit(10, 0);
        endif;


        $faqs = $this->db->get('faq');

        //Return final araay
        return $faqs;
    }

    function delete() {
        //Process delete action here
        echo '... deleting ...';
        $user = $this->session->userdata('user_id');
        $slug = $_GET['item'];

        //Get item info before delete
        $this->db->where('slug', $slug);
        $this->db->where('item_owner', $user);

        $info = $this->db->get('item')->result();

        foreach ($info as $key)
            ;

        //Delete Images
        // echo $key->image;
        unlink('./images/' . $key->image);
        unlink('./images/thumbnails/' . $key->image);

        //Delete from database
        $this->db->where('item_id', $key->item_id);
        $rm = $this->db->delete('item');

        //test

        redirect(base_url('account/listings/?deleted=true'));

        flush();
    }

    function homepage() {
        $config['base_url'] = base_url('?browse=true&');
        $config['total_rows'] = $this->count();
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


        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $this->db->where_not_in('image', 'default.png');
        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'DESC');

        if (isset($_GET['page'])):
            $this->db->limit(5, $_GET['page']);
        else:
            $this->db->limit(5, 0);
        endif;

        $rt = $this->db->get('item');

        return $rt;
    }

    function count() {
        $this->db->where_not_in('image', 'default.png');
        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'desc');

        return $this->db->get('item')->num_rows();
    }

    function get_item_by_slug() {
        $this->db->where('slug', $_GET['item']);
        $this->db->where('item_owner', $this->session->userdata('user_id'));

        $data = $this->db->get('item');

        return $data;
    }

    function generic_category($slug) {
        $query = 'select * from categories where cat_slug="' . $slug . '"';
        //$this->db->where('cat_slug', $slug);

        $data = $this->db->get($query);

        foreach ($data->result() as $d)
            ;

        return $d->cat_id;
    }

    function drag_map() {
        $config['center'] = 'auto';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = 'auto';
        $marker['draggable'] = true;
        //$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
    }

    function ads() {
        $this->db->order_by('ad_id', 'random');
        $data = $this->db->get('ads');

        return $data;
    }

    function get_categories() {
        $this->db->order_by('cat_name', "ASC");
        $data = $this->db->get('categories');
        return $data;
    }

    function get_categories_home() {
        $this->db->order_by('cat_name', "ASC");
        $data = $this->db->get('categories');
        return $data;
    }

    function map_single($lat, $long) {
        if ($lat != NULL & $lat != 0):

            $config['center'] = $lat . ', ' . $long;
            $config['zoom'] = '14';
            $config['map_height'] = '150px';
            //$config['cluster'] = TRUE;
            $config['pixelOffset'] = '-146, -190)';
            $this->googlemaps->initialize($config);

            //$marker = array();                

            $marker = array();

            $marker['position'] = $lat . ', ' . $long;
            $marker['icon'] = base_url() . 'realia/assets/img/markers/marker-turquiose.png';

            $this->googlemaps->add_marker($marker);
            $data = $this->googlemaps->create_map();

            return $data;

        else:
            $config['center'] = $this->session->userdata('ip_latitude') . ', ' . $this->session->userdata('ip_longitude');
            $config['zoom'] = '14';
            $config['map_height'] = '150px';

            //$config['cluster'] = TRUE;
            $config['pixelOffset'] = '-146, -190)';
            $this->googlemaps->initialize($config);

            $data = $this->googlemaps->create_map();

            return $data;
        endif;
    }

    function map_data() {
        //print_r($this->session->userdata('ip_latitude'). ', '.$this->session->userdata('ip_longitude'));
        $config['center'] = $this->session->userdata('ip_latitude') . ', ' . $this->session->userdata('ip_longitude');
        $config['zoom'] = '14';
        $config['map_height'] = '480px';
        //$config['cluster'] = TRUE;
        $config['pixelOffset'] = '-146, -190)';
        $this->googlemaps->initialize($config);

        //$marker = array();                

        $marker = array();

        foreach ($this->latest_10()->result() as $md):
            $marker['position'] = $md->lat . ', ' . $md->long;
            $marker['infowindow_content'] = '<div class="infobox" style="min-width: 180px; min-height: 220px;"><div class="image"><img src="' . base_url('images/thumbnails/' . $md->image) . '" alt="' . $md->name . '" for hire in "' . $md->region . ' " width="160px"><div class="clearfix"> </div> </div><div class="title"><a href="' . base_url($md->slug) . '">' . $md->name . '</a></div><div class="price">' . $md->item_price . '</div><div class="link"><a href="' . base_url($md->slug) . '">View listing</a></div></div>';
            $marker['icon'] = base_url() . 'realia/assets/img/markers/marker-turquiose.png';

            $this->googlemaps->add_marker($marker);
        endforeach;



        // $this->googlemaps->add_marker($marker);

        $data = $this->googlemaps->create_map();

        return $data;
    }

    function latest_6() {
        ////$region = $this->session->userdata('ip_region');
        //////$country = $this->session->userdata('ip_country');

        $this->db->where('status', 3);
        //$this->db->where('featured', 1);
        //$this->db->where('region', $region);
        ////$this->db->where('country', $country);;
        $this->db->order_by('item_id', 'random');
        $this->db->limit(5);

        $data = $this->db->get('item');

        return $data;
    }

    function latest_4() {
        ////$region = $this->session->userdata('ip_region');
        //1////$country = $this->session->userdata('ip_country');

        $this->db->where('status', 3);
        // $this->db->where('region', $region);
        // //$this->db->where('country', $country);;
        $this->db->order_by('item_id', 'random');
        $this->db->limit(3);

        $data = $this->db->get('item');

        return $data;
    }

    function latest_3() {
        //$region = $this->session->userdata('ip_region');
        ////$country = $this->session->userdata('ip_country');

        $this->db->where('status', 3);
        //$this->db->where('region', $region);
        //$this->db->where('country', $country);;
        $this->db->order_by('item_id', 'desc');
        $this->db->limit(2);

        $data = $this->db->get('item');

        return $data;
    }

    function latest_10() {
        //$region = $this->session->userdata('ip_region');
        ////$country = $this->session->userdata('ip_country');

        $this->db->where('status', 3);
        //$this->db->where('region', $region);
        //$this->db->where('country', $country);;
        $this->db->order_by('item_id', 'random');
        $this->db->limit(10);

        $data = $this->db->get('item');

        return $data;
    }

    function counties() {
        $this->db->order_by('name', 'asc');
        $data = $this->db->get('counties');

        return $data;
    }

    function locales() {
        $this->db->order_by('name', 'asc');
        $data = $this->db->get('constituencies');

        return $data;
    }

    function get_location() {
        $ipLite = $this->ip2location;
        $ipLite->setKey('e78ef066c1a1c231e6ad1e12db3babe7c38f77be480a4b59295c1113ac5433a2');

        //Get errors and locations
        $locations = $ipLite->getCity($this->getip());

        //print_r($locations);
        //Getting the result

        if (!$this->session->userdata('active_location')):

            $sess['active_location'] = TRUE;
            $sess['ip_city'] = humanize($locations['cityName']);
            $sess['ip_country_code'] = $locations['countryCode'];
            $sess['ip_country'] = humanize($locations['countryName']);
            $sess['ip_region'] = humanize($locations['cityName']);
            $sess['ip_latitude'] = $locations['latitude'];
            $sess['ip_longitude'] = $locations['longitude'];

            $this->session->set_userdata($sess);

            return true;

        endif;
    }

    function getip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function create_thumbnail($file_name, $file_path) {
        require_once APPPATH . 'libraries/thumb/ThumbLib.inc.php';

        $thumb = PhpThumbFactory::create($file_path);
        //$thumb = PhpThumbFactory::create('test.jpg');
        $thumb->resize(221, 147)->save('./images/thumbnails/' . $file_name);

        return true;
    }

    function thumbnailer() {
        $dir = './images/';

        $files2 = scandir($dir, 1);
        echo "<pre>";
        foreach ($files2 as $key):
            if ($key === '..' | $key === '.'):
                continue;
            else:
                //check if thumb exists
                $thumbcheck = base_url() . 'images/thumbnails/' . $key;
                if (file_exists($thumbcheck)):
                    continue;
                else:
                    
                    $file_path = './images/'.$key;
                    require_once APPPATH . 'libraries/thumb/ThumbLib.inc.php';


                    $thumb = PhpThumbFactory::create($file_path);
                //$thumb = PhpThumbFactory::create('test.jpg');
                //For thumbnails
                    $thumb->resize(221, 147)->save('./images/thumbnails/' . $key);
                //for slider
                //$thumb->resize(940, 340)->save('./images/slider/'.$key);
                continue;

                endif;
            endif;
        endforeach;

        // print_r($files2);

        exit();
        /*
          $map = directory_map('./images/', 1);

          echo '<pre>';
          print_r($map);

          foreach ($map as $key):

          $file_path = './images/' . $key;

          //Check for file existence
          $thumbcheck = base_url().'images/thumbnails/' . $key;
          if (file_exists($thumbcheck)):
          continue;
          else:
          require_once APPPATH . 'libraries/thumb/ThumbLib.inc.php';


          $thumb = PhpThumbFactory::create($file_path);
          //$thumb = PhpThumbFactory::create('test.jpg');
          //For thumbnails
          //  $thumb->resize(221, 147)->save('./images/thumbnails/' . $key);

          //for slider
          //$thumb->resize(940, 340)->save('./images/slider/'.$key);
          // return true;
          endif;

          endforeach;
         * 
         */
    }

    function home_main_category($id) {
        $this->db->where('item_cat', $id);
        $this->db->where('status', 3);
        $this->db->where('featured', 1);
        $this->db->order_by('item_id', 'random');
        $data = $this->db->get('item')->result();

        foreach ($data as $d)
            ;

        return $d;
    }

    function tools() {
        $this->db->where('cat_id', 2);
        $this->db->order_by('sub_cat_id', 'random');
        $this->db->limit(15);

        $data = $this->db->get('sub_categories');

        return $data;
    }

    function events() {
        $this->db->where('cat_id', 4);
        $this->db->order_by('sub_cat_id', 'random');
        $this->db->limit(15);

        $data = $this->db->get('sub_categories');

        return $data;
    }

    function get_sub_cats($id) {
        $this->db->where('cat_id', $id);
        $this->db->order_by('sub_cat_id', 'random');
        $this->db->limit(15);

        $data = $this->db->get('sub_categories');

        return $data;
    }

    function front_page_ad() {
        $this->db->where('active', 1);
        $this->db->order_by('ad_id', "random");
        $data = $this->db->get('home_ads');

        foreach ($data->result() as $key):
            return $key->html;
        endforeach;
    }

    function get_sub_cat($sub) {
        $d = $sub;

        $this->db->where('cat_id', $d);
        $this->db->order_by('sub_cat_name', 'ASC');
        $data = $this->db->get('sub_categories');

        return $data;
    }

    function suggested() {

        $d = $this->data->get_suggested_item();

        $this->db->like('want_name', $d->name);
        $this->db->or_like('want_desc', $d->name);

        $this->db->like('want_desc', $d->tags);
        $this->db->order_by('want_id', 'desc');
        $this->db->limit(6);

        $data = $this->db->get('wanted');

        return $data;
    }

    function get_single_ft() {
        $this->db->where('featured', 1);
        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'random');
        $this->db->limit(1);

        $data = $this->db->get('item');

        if ($data->num_rows() !== 0):
            foreach ($data->result() as $ft)
                ;

            return $ft;
        else:
            return false;
        endif;
    }

    function wanted_add() {
        $data['want_name'] = $_POST['name'];
        $data['want_slug'] = url_title($_POST['name'], '-', TRUE) . '-' . random_string('alpha', 4);
        $data['want_category'] = $_POST['category'];
        $data['want_status'] = 2;
        $data['want_location'] = $_POST['location'];
        $data['want_sess'] = $_POST['sess'];
        $data['want_s_day'] = $_POST['start_day'];
        $data['want_e_day'] = $_POST['end_day'];
        $data['want_desc'] = $_POST['desc'];

        $this->db->insert('wanted', $data);

        if (!$this->session->userdata('logged_in')):
            redirect(base_url('wanted/login/' . $_POST['sess']));
        else:
            redirect(base_url('wanted/suggestions/' . $_POST['sess']));
        endif;
    }

    function get_suggested_item() {
        $this->db->where('sess', $this->uri->segment(2));
        $data = $this->db->get('item');
        foreach ($data->result() as $item)
            ;

        return $item;
    }

    function get_suggested_category() {
        $d = $this->data->get_suggested_item();

        $this->db->where('cat_id', $d->item_cat);
        $data = $this->db->get('categories');

        foreach ($data->result() as $key)
            ;

        return $key;
    }

    function get_home_owners() {
        $this->db->where('user_id', $data->item_owner);
        $data = $this->db->get('user');

        foreach ($data->result() as $idata)
            ;

        return $idata->first_name;
    }

    function get_home_rentals() {
        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'desc');
        $this->db->limit(5);

        $data = $this->db->get('item');

        return $data;
    }

    function get_cat() {
        $this->db->where('cat_slug', $this->uri->segment(2));
        $data = $this->db->get('categories');

        return $data;
    }

    function get_wanted_cat() {
        $this->db->where('cat_slug', $this->uri->segment(3));
        $data = $this->db->get('categories');

        foreach ($data->result() as $idata)
            ;

        return $idata;
    }

    function view_product() {
        $this->db->where('slug', $this->uri->segment('1'));

        $q = $this->db->get('item');

        if ($q->num_rows() !== 1):
            show_404();
            exit();

        else:
            foreach ($q->result() as $data)
                ;

            return $data;
        endif;
    }

    function track_urls() {
        return true;
    }

    function get_cat_data($cat_id) {
        //Pagination first
        $config['base_url'] = base_url($this->uri->segment(1) . '?');
        $config['total_rows'] = $this->get_cat_data_count($cat_id);
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


        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'desc');
        $this->db->where('item_cat', $cat_id);
        if (isset($_GET['page'])):
            $this->db->limit(5, $_GET['page']);
        else:
            $this->db->limit(5, 0);
        endif;

        $data = $this->db->get('item');

        return $data;
    }

    function get_cat_data_count($cat_id) {
        //Pagination first


        $this->db->where('status', 3);
        $this->db->order_by('item_id', 'desc');
        $this->db->where('item_cat', $cat_id);

        $data = $this->db->get('item');

        return $data->num_rows();
    }

    function get_page() {
        $this->db->where('slug', $this->uri->segment(2));
        $cdata = $this->db->get("pages");
        if ($cdata->num_rows() !== 0):
            foreach ($cdata->result() as $data)
                ;

            return $data;
        else:
            show_404();
            exit();
        endif;
    }

    function wanted_latest() {
        $this->db->where('want_status', 2);
        $this->db->order_by('want_id', 'desc');
        $this->db->limit('6');

        $data = $this->db->get('wanted');

        return $data;
    }

    function wanted_view_item() {
        $this->db->where('want_slug', $this->uri->segment(3));
        $data = $this->db->get('wanted');

        foreach ($data->result() as $idata)
            ;

        return $idata;
    }

    function wanted_search() {
        $this->db->like('want_name', $_GET['s']);
        $this->db->or_like('want_desc', $_GET['s']);

        if (isset($_GET['location'])):
            if ($_GET['location'] !== ''):
                $this->db->like('want_location', $_GET['location']);
            endif;
        endif;

        $this->db->where('want_status', 2);

        $this->db->order_by('want_id', 'desc');

        $data = $this->db->get('wanted');

        return $data;
    }

    function wanted_related() {
        $d = $this->data->wanted_view_item();

        $this->db->like('want_name', $d->want_name);
        $this->db->or_like('want_desc', $d->want_name);

        $this->db->where('want_status', 2);
        $this->db->where_not_in('want_slug', $d->want_slug);

        $this->db->order_by('want_id', 'desc');
        $this->db->limit('3');

        $data = $this->db->get('wanted');

        return $data;
    }

    function get_latest_search() {
        $this->db->order_by('s_id', 'desc');
        $this->db->limit(5);

        $data = $this->db->get('search_log');
    }

    function help() {
        $this->db->where('slug', $this->uri->segment(2));
        $d = $this->db->get('pages');

        if ($d->num_rows == 0):
            show_404();
        else:

            foreach ($d->result() as $f)
                ;

            $data['main'] = 'help_files';
            $data['title'] = $f->title . ' | Scrobber ';
            $data['keywords'] = $f->meta;
            $data['description'] = $f->description;
            $data['desc'] = $f->html;
            $this->load->view('beta/loader', $data);

        endif;
    }

    function send_link_mobile() {
        
    }

    function legal() {
        $this->db->where('slug', $this->uri->segment(2));
        $d = $this->db->get('pages');

        if ($d->num_rows == 0):
            show_404();
        else:

            foreach ($d->result() as $f)
                ;

            $data['main'] = 'legal_files';
            $data['title'] = $f->title . ' | Scrobber ';
            $data['keywords'] = $f->meta;
            $data['description'] = $f->description;
            $data['desc'] = $f->html;
            $this->load->view('beta/loader', $data);

        endif;
    }

    function featured() {
        $this->db->where('featured', 1);
        $this->db->where('status', 3);
        $this->db->limit(3);
        $this->db->order_by('item_id', 'random');
        $ft = $this->db->get('item');
        return $ft;
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

    function get_search() {
        $this->db->like('desc', $_GET['s']);
        $this->db->or_like('name', $_GET['s']);
        $this->db->or_like('tags', $_GET['s']);
        $this->db->where('status', 3);
        $rt = $this->db->get('item');
        $this->log_search();
        return $rt;
    }

    function log_search() {
        if ($_GET != NULL):
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

    function get_locations() {
        $this->db->order_by('hood_name', 'asc');
        $hood = $this->db->get('hoods');

        return $hood;
    }

    function send_email($email, $subject, $msg, $to, $return) {

        $config['protocol'] = 'sendmail';
        $config['smtp_host'] = '54.221.194.111';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['smtp_user'] = "swift.scrobber";
        $config['port'] = '25';
        $config['pass'] = 'swiftmailer!';

        $this->email->initialize($config);

        $this->email->to($to);
        $this->email->from($email);
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();

        if ($return != null):
            redirect($return);
        else:
            return true;
        endif;
    }

}

?>
