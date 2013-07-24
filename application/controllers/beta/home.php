<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        /*
         * Uncoment to remake thumbnails
         */
        //$this->data->thumbnailer ();
    }

    public function index() {

        $data['main'] = 'main';
        $data['title'] = 'Kuhire - Discover a new way to social renting and hiring';
        $data['keywords'] = 'Kuhire, Social hiring, social renting';
        $data['description'] = 'Kuhire a new way to rent and hire out from your friends';
        //$data['categories'] = $this->data->get_categories();
        //$data['loc'] = $this->data->get_location();
        //$data['map'] = $this->data-> map_data ();
        $data['latest'] = $this->data->homepage();


        //$data['recom'] = $this->data->latest_10();

        $this->load->view('loader', $data);
    }

    function contact_us() {
        if (isset($_POST['name'])):
            $this->send_contact();
        else:
            $data['main'] = 'contact-us';
            $data['title'] = 'Contact Kuhire - Discover a new way to social renting and hiring';
            $data['keywords'] = 'Kuhire, Social hiring, social renting';
            $data['description'] = 'Kuhire a new way to rent and hire out from your friends';

            $this->load->view('loader', $data);
        endif;
    }
        function about_us() {
       
            $data['main'] = 'About-us';
            $data['title'] = 'About Kuhire - Discover a new way to social renting and hiring';
            $data['keywords'] = 'Kuhire, Social hiring, social renting';
            $data['description'] = 'Kuhire a new way to rent and hire out from your friends';

            $this->load->view('loader', $data);
        
    }
        function faqs() {
        
            $data['main'] = 'FAQ';
            $data['title'] = 'FAQ Kuhire - Discover a new way to social renting and hiring';
            $data['keywords'] = 'Kuhire, Social hiring, social renting';
            $data['description'] = 'Kuhire a new way to rent and hire out from your friends';

            $this->load->view('loader', $data);
        
    }
    function pricing() {
        $data['main'] = 'pricing';
        $data['title'] = 'Pricing Plans Kuhire - Discover a new way to social renting and hiring';
        $data['keywords'] = 'Kuhire, Social hiring, social renting';
        $data['description'] = 'Kuhire a new way to rent and hire out from your friends';

        $this->load->view('loader', $data);
    }

    function send_contact() {
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        $subject = 'Contact reguest';
        $to = 'hi@Kuhire.com';
        $return = base_url('contact-us?sent=true');

        $this->data->send_email($email, $subject, $msg, $to, $return);

        //return true;
    }

    function goodbye() {
        $data['main'] = 'proposed_goodbye';
        $data['title'] = 'Kuhire - Discover a new way to social renting and hiring';
        $data['keywords'] = 'Kuhire, Social hiring, social renting, Antony Gitonga,';
        $data['description'] = 'Kuhire a new way to rent and hire out from your friends';
        $data['categories'] = $this->data->get_categories();

        $this->load->view('beta/loader', $data);
    }

    function guide() {
        $data['main'] = 'guide';
        $data['title'] = 'Kuhire Guide - Discover a new way to social renting and hiring';
        $data['keywords'] = 'Kuhire, Social hiring, social renting, Antony Gitonga,';
        $data['description'] = 'Kuhire a new way to rent and hire out from your friends';
        $data['categories'] = $this->data->get_categories();

        $this->load->view('beta/loader', $data);
    }

    public function wanted() {
        if (!$this->uri->segment(2)):

            if (isset($_GET['s'])):
                $this->wanted_search();
            else:
                $this->wanted_front_page();
            endif;

        elseif ($this->uri->segment(2) == 'item'):

            $this->wanted_view_item();

        elseif ($this->uri->segment(2) == 'add'):

            $this->form_validation->set_rules('name', 'Want Name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
            $this->form_validation->set_rules('location', 'Want Location', 'trim|required|min_length[2]|max_length[60]|xss_clean');
            $this->form_validation->set_rules('desc', 'Want Description', 'trim|required|min_length[2]|max_length[500]|xss_clean');
            $this->form_validation->set_rules('start_data', 'Want Hire Date', 'trim|required|min_length[5]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('end_date', 'Want Return Date', 'trim|required|min_length[5]|max_length[12]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->wanted_add();
            } else {
                $this->data->wanted_add();
            } elseif ($this->uri->segment(2) == 'category'):

            $this->wanted_category_view();


        else:
            show_404();
        endif;
    }

    private function wanted_category_view() {
        $c = $this->data->get_wanted_cat();

        $data['main'] = 'wanted_cat';

        $data['title'] = 'browse ' . $c->cat_name . ' category | Kuhire';

        $data['keywords'] = 'view people looking for rentals in ' . $c->cat_name . ' category | Kuhire';
        $data['description'] = $c->cat_desc;
        $data['cat'] = $this->data->get_wanted_cat();
        $data['idata'] = $this->data->get_wanted_cat();

        $this->load->view('beta/loader', $data);
    }

    private function wanted_add() {
        $data['main'] = 'wanted_add';
        $data['title'] = 'Add Want | Kuhire';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['cat'] = $this->data->get_cat();
        $this->load->view('beta/loader', $data);
    }

    private function wanted_front_page() {
        $data['main'] = 'wanted';
        $data['title'] = 'Wanted Items | Kuhire';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['latest'] = $this->data->wanted_latest();
        $this->load->view('beta/loader', $data);
    }

    function user() {
        if ($this->uri->segment(1) == 'user'):
            $this->user->get_user();
        elseif ($this->uri->segment(1) == 'agency'):
            $this->user->agency();
        elseif ($this->uri->segment(1) == 'company'):
            $this->user->company();
        endif;
    }

    private function wanted_view_item() {
        $d = $this->data->wanted_view_item();

        $data['related'] = $this->data->wanted_related();
        $data['item'] = $this->data->wanted_view_item();
        $data['main'] = 'wanted_view';
        $data['title'] = $d->want_name . ' | Wanted Items Kuhire';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['latest'] = $this->data->wanted_latest();
        $this->load->view('beta/loader', $data);
    }

    private function wanted_search() {
        $data['results'] = $this->data->wanted_search();
        $data['main'] = 'wanted_search';
        $data['title'] = $_GET['s'] . ' | Wanted Items Kuhire';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['latest'] = $this->data->wanted_latest();
        $this->load->view('beta/loader', $data);
    }

    public function category() {
        $cat = $this->get_cat();
        $data['main'] = 'category';
        $data['title'] = $cat->cat_name . ' Category';
        $data['cat'] = $this->get_cat();
        $data['idata'] = $this->get_cat_data();
        $data['keywords'] = '';
        $data['description'] = '';
        $this->load->view('beta/loader', $data);
    }

    private function get_cat() {
        $this->db->where('cat_slug', $this->uri->segment(2));
        $data = $this->db->get('categories');
        foreach ($data->result() as $rt)
            ;
        return $rt;
    }

    private function get_cat_data() {
        if (!$this->uri->segment(3)):
            $cdata = $this->get_cat();
            $this->db->where('status', 3);
            $this->db->order_by('item_id', 'desc');
            $this->db->where('item_cat', $cdata->cat_id);

            $data = $this->db->get('item');

            return $data;
        else:
            $this->db->where('status', 3);
            $this->db->order_by('item_id', 'desc');
            $this->db->where('category', $this->uri->segment(3));

            $data = $this->db->get('item');

            return $data;
        endif;
    }

    public function legal() {
        if (!$this->uri->segment(2)):
            $data['main'] = 'legal';
            $data['title'] = 'Kuhire and You | Kuhire ';
            $data['keywords'] = '';
            $data['description'] = '';
            $this->load->view('beta/loader', $data);
        else:
            $this->data->legal();
        endif;
    }

    public function help() {
        if (!$this->uri->segment(2)):
            $data['main'] = 'help';
            $data['title'] = 'Help | Kuhire ';
            $data['keywords'] = '';
            $data['description'] = '';
            $this->load->view('beta/loader', $data);
        else:
            $this->data->help();
        endif;
    }

    public function view() {

        $write = $this->data->view_product();
        //$lat = $write->lat;
        //$long = $write->long;
        $data['row'] = $this->data->view_product();
        //$data['map'] = $this->data-> map_single ($lat, $long);

        $data['main'] = 'view';
        $data['title'] = $write->name;
        $data['single'] = $this->data->get_single_ft();
        $data['keywords'] = $write->name . ' for hire in ' . $write->region;
        $data['description'] = word_limiter($write->desc, 12);

        $this->load->view('loader', $data);
    }

    public function hire() {
        
        if (!$_POST)
            exit;

        if (!defined("PHP_EOL"))
            define("PHP_EOL", "\r\n");

        $your_email_address = $_POST['user_email'];

        /* ---------------------------------------------------------------------- */
        /* 	Do not edit the following lines
          /* ---------------------------------------------------------------------- */

        $postValues = array();
        foreach ($_POST as $name => $value) {
            $postValues[$name] = trim($value);
        }
        extract($postValues);

        /* ---------------------------------------------------------------------- */
        /* 	Important Variables
          /* ---------------------------------------------------------------------- */
        //$posted_verify = isset( $postValues['verify'] ) ? md5( $postValues['verify'] ) : '';
        $session_verify = !empty($_SESSION['jigowatt']['ajax-extended-form']['verify']) ? $_SESSION['jigowatt']['ajax-extended-form']['verify'] : '';

        $error = '';

        /* ---------------------------------------------------------------------- */
        /* Begin verification process
          /* You may add or edit lines in here.
          /* To make a field not required, simply delete the entire if statement for that field.
          /* ---------------------------------------------------------------------- */


        /* ---------------------------------------------------------------------- */
        /* 	First Name field is required
          /* ---------------------------------------------------------------------- */
        if (empty($name)) {
            $error .= '<li>Your name is required.</li>';
        }

        /* ---------------------------------------------------------------------- */
        /* 	Email field is required
          /* ---------------------------------------------------------------------- */
        if (empty($email)) {
            $error .= '<li>Your e-mail address is required.</li>';
        } elseif (!$this->isEmail($email)) {
            $error .= '<li>You have entered an invalid e-mail address.</li>';
        }

        /* ---------------------------------------------------------------------- */
        /* 	Phone field is required
          /* ---------------------------------------------------------------------- */
        if (empty($phone)) {
            $error .= '<li>Your phone number is required.</li>';
        } elseif (!is_numeric($phone)) {
            $error .= '<li>Your phone number can only contain digits. Also remove spaces</li>';
        }


        /* ---------------------------------------------------------------------- */
        /* 	Verification code is required

          if ( $session_verify != $posted_verify ) {
          $error .= '<li>The verification code you entered is incorrect.</li>';
          }
          /* ---------------------------------------------------------------------- */
        if (!empty($error)) {
            echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert"> × </button><h4>Attention! Please correct the errors below and try again.</h4>';
            echo '<ul class="error_messages">' . $error . '</ul>';
            echo '</div>';

            // Important to have return false in here.
            return false;
        }


        /* ---------------------------------------------------------------------- */
        /* Advanced Configuration Option.
          /* i.e. The standard subject will appear as, "You've been contacted by John Doe."
          /* ---------------------------------------------------------------------- */

        /* ---------------------------------------------------------------------- */
        /* Advanced Configuration Option.
          /* You can change this if you feel that you need to.
          /* Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
          /* ---------------------------------------------------------------------- */
         if ($_POST['msg'] == NULL):
            $msg = "
                            Hi " . $_POST['o_name'] . ",
                                <br>
                                Am would like to hire " . $_POST['item_name'] . " on the specified dates.
                                    Please contact me back for further information.
                            ";
        else:
            $msg = $_POST['msg'];
        endif;
        $data = array(
            'nb_sender_name' => $_POST['name'],
            'nb__sender_email' => $_POST['email'],
            'nb_sender_phone' => $_POST['phone'],
            'nb_subject' => 'Hiring &nbsp;' . $_POST['item_name'],
            'nb_msg' => $msg,
            'relation' => '1',
            'nb_reciever' => $_POST['owner'],
            'r_id' => $_POST['item'],
                //'r_sdate' => $_POST['start_date'],
                //'r_fdate' => $_POST['drop_date'],			
        );
        $this->db->insert('msg_inbox', $data);

        
        if ($this->notifications->send_hire_mail()) {

            echo "<fieldset>";
            echo "<div class='alert alert-success'>";
            echo "<h1>Email Sent Successfully.</h1>";
            echo "<p>Thank you <strong>$name</strong>, your message has been sent to ".$_POST['o_name']." .</p>";
            echo "</div>";
            echo "</fieldset>";

            // Important to have return false in here.
            return false;
        }

        /* ---------------------------------------------------------------------- */
        /* 	Do not edit below this line
          /* ---------------------------------------------------------------------- */
        echo 'ERROR! Please confirm PHP mail() is enabled.';
        return false;

        //redirect(base_url($this->uri->segment('2') . '?details=sent'), 'refresh', '300');
    }

       function isEmail($email) { // Email address verification, do not edit.
            return preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email);
        }
    
    public function add() {

        if (!$this->session->userdata('logged_in')):
            redirect(base_url('login?next=add&ref=add'));
        endif;

        if (isset($_GET['action'])):
            $this->data->delete();
            exit();
        endif;

        if (isset($_POST['edit'])):
            $edit = TRUE;
        else:
            $edit = FALSE;
        endif;

        $this->form_validation->set_rules('name', 'Item Name', 'trim|required|min_length[3]|max_length[60]');

        if ($this->form_validation->run() == FALSE) {

            if (isset($_GET['src']) | isset($_POST['edit'])):
                $data['title'] = 'Edit item | Kuhire';
            else:
                $data['title'] = 'Add new item | Kuhire';
            endif;

            if (isset($_GET['src']) | isset($_POST['edit'])):
                $data['main'] = 'edit';
            else:
                $data['main'] = 'new';
            endif;

            $data['keywords'] = '';
            $data['description'] = '';
            if (isset($_GET['src']) | isset($_POST['edit'])):
                $data['item'] = $this->data->get_item_by_slug();
            endif;
            //$data['map'] = $this->data->drag_map ();
            $this->load->view('loader', $data);
        } Else {

            //if($_POST['userfile'] != NULL):
            function do_upload() {
                
            }

            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $config['image_library'] = 'gd2';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 75;
            $config['height'] = 50;

            $this->upload->initialize($config);


            if (!$this->upload->do_upload()):

                // $error = array('error' => $this->upload->display_errors());
                if ($edit):
                    $image = $_POST['default_image'];
                else:
                    $image = "default.png";
                endif;

            //ECHO APPPATH . 'images/';
            else:
                $image_data = $this->upload->data();
                $file_name = $image_data['file_name'];
                $file_path = $image_data['full_path'];
                $this->data->create_thumbnail($file_name, $file_path);

                $image = $image_data['file_name'];

            endif;

            /* Compute Location */

            $data['location'] = $_POST['location'];
            $data['region'] = $_POST['region'];
            $data['country'] = $_POST['country'];
            if (!$edit):
                $data['slug'] = url_title($_POST['name'], '-', TRUE) . '-' . random_string('alpha', 4);
            endif;
            $data['name'] = $_POST['name'];

            if (isset($_POST['tags'])):
                $data['tags'] = $_POST['tags'];
            endif;

            $data['desc'] = $_POST['desc'];
            $data['image'] = $image;
            $data['item_cat'] = $_POST['category'];
            $data['item_price'] = $_POST['price'];
            $data['status'] = 3;
            $data['item_owner'] = $this->session->userdata('user_id');
            if (!$edit):
                $data['sess'] = $_POST['sess'];
            endif;
            if ($edit):
                $this->db->where('slug', $_POST['slug']);
                $this->db->update('item', $data);
            else:
                $this->db->insert('item', $data);
            endif;
            /*
             * 
             * For testing
              print_r('<pre>');
              print_r($_POST);
              print_r($data);
             */

            if ($this->session->userdata('logged_in')):
                $this->db->where('item_owner', $this->session->userdata('user_id'));
                if ($edit):
                    $this->db->where('slug', $_POST['slug']);
                else:
                    $this->db->where('slug', $data['slug']);
                endif;

                $this->db->limit('1');
                $user = $this->db->get('item');
                foreach ($user->result() as $us):

                    if ($edit):
                        redirect(base_url($_POST['slug'] . '?edited=true'));
                    else:
                        $this->user->notify_item_added($data);
                        redirect(base_url($data['slug'] . '?ref=add'));
                    endif;

                endforeach;
            else:
                echo 'Item Added, you will be redirected shortly. <a href="' . base_url('steps/' . $_POST['sess']) . '"> Click Here If your Browser Cannot redirect </a> ';
                redirect(base_url('steps/' . $_POST['sess']), 'refresh', 300);
            endif;
        }
    }

    public function steps() {

        $data['main'] = 'steps';
        $data['title'] = 'Complete your Item | Kuhire beta';
        $data['keywords'] = '';
        $data['description'] = '';
        $this->load->view('beta/loader', $data);
    }

    public function send() {
        $this->form_validation->set_rules('name', 'Your Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Your Valid Email', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url($this->uri->segment(3) . '?message=error-sending'));
        } else {
            $data = array(
                'nb_sender_name' => $_POST['name'],
                'nb__sender_email' => $_POST['email'],
                'nb_sender_phone' => $_POST['phone'],
                'nb_subject' => 'Message from ' . $_POST['name'],
                'nb_msg' => $_POST['msg'],
                'nb_reciever' => $_POST['owner']
            );
            $this->db->insert('msg_inbox', $data);
            // Send Email before redirect.
            $mail = $_POST['user_email'];
            $subject = 'New Message on Kuhire';

            $msg = 'Hi, ' . $_POST['user_name'] . '
                          <br>
                          <p>
                            You have recieved a new message on Kuhire from ' . $_POST['name'] . '
                                Login into your account to view this message.
                                <a href=' . base_url('lunar/?redirect_to=inbox') . '> Login </a> 
                                    alternativly, paste this link on your browser to access Kuhire
                                    ' . base_url('lunar/?redirect_to=inbox') . '
                           </p>   
                        ';



            $this->email->to($mail);
            $this->email->from('no-reply@Kuhire.com', 'Kuhire');
            $this->email->subject($subject);
            $this->email->message($msg);

            $this->email->send();

            redirect(base_url($this->uri->segment(3) . '?ref=send+contact&features=inherit&msg=sent'));
        }
    }

    public function review() {
        $this->form_validation->set_rules('name', 'Your Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Your Valid Email', 'trim|required');
        $this->form_validation->set_rules('msg', 'Your Review', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url($this->uri->segment(2) . '?error=review'));
        } else {
            $data = array(
                'item_hook' => $this->uri->segment('3'),
                'user_name' => $_POST['name'],
                'review_txt' => $this->input->post('msg'),
                'rating' => $_POST['rating'],
                'user_email' => $_POST['email']
            );

            $this->db->insert('reviews', $data);
            redirect(base_url($this->uri->segment('2') . '?ref=review&main=inherit&features=inherit'));
        }
    }

    public function join() {

        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'register_login';
            $data['title'] = 'Register | Kuhire ';
            $data['keywords'] = 'Join Kuhire, Register for Kuhire, Hire Kuhire, Kuhire Kenya';
            $data['description'] = 'Join Kuhire Kenya';
            $data['iasoc'] = 'join';

            $this->load->view('loader', $data);
        } else {
            $idata = array('password' => md5($_POST['password']), 'email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'rand' => $_POST['sess']);

            $this->db->insert('user', $idata);
            $this->notifications->sign_up();
            redirect(base_url('login/?ref=join&user=' . $_POST['first_name']));
        }
    }

    public function mobi_send() {
        $this->data->send_link_mobile();

        redirect(base_url('/?link=sent&max=off'));
    }

    public function temp_login() {
        $this->form_validation->set_rules('login', 'Username or Email', 'required|min_length[5]|max_length[60]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'temp_login';
            $data['title'] = 'Fast Login | Kuhire ';
            $data['keywords'] = '';
            $data['description'] = '';
            $data['iasoc'] = 'temp';
            $this->load->view('beta/loader', $data);
        } else {
            $user = $_POST['login'];
            $password = md5($_POST['password']);
            $this->db->where("email", $user);
            $this->db->or_where("username", $user);
            $this->db->where("password", $password);

            $query = $this->db->get("user");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $rows) {
                    //add all data to session
                    $newdata = array('user_id' => $rows->user_id, 'user_phone' => $rows->phone, 'id_no' => $rows->id_no, 'user_name' => $rows->username, 'user_email' => $rows->email, "user_status" => $rows->status, "name" => $rows->first_name . '&nbsp;' . $rows->last_name, 'logged_in' => TRUE,);
                }
                $this->session->set_userdata($newdata);
                redirect(base_url('redirect/' . $_POST['sess']));
            } else
                redirect(base_url('temp_login/' . $_POST['sess'] . '/error'));
        }
    }

    public function uregister() {
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[15]|is_unique[user.phone]');
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|is_unique[user.email]');
        $this->form_validation->set_rules('id_no', 'ID Number', 'trim|required|min_length[5]|max_length[12]|is_unique[user.id_no]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password_cnf', 'Password Confirmation', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->steps();
        } else {
            $idata = array('phone' => $_POST['phone'], 'id_no' => $_POST['id_no'], 'password' => md5($_POST['password']), 'email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name']);

            $this->db->insert('user', $idata);
            redirect(base_url('temp_login/' . $_POST['sess']));
        }
    }

    public function populate() {
        echo 'We are repopulating your previous data...<br>';
        //Update Owner
        $udata = array('item_owner' => $this->session->userdata('user_id'));
        $this->db->where('sess', $this->uri->segment('2'));
        $this->db->update('item', $udata);

        //Get the item
        $this->db->where('sess', $this->uri->segment('2'));
        $itm = $this->db->get('item');
        foreach ($itm->result() as $item) {
            $this->notifications->notify_item_added();
            redirect(base_url('suggest/' . $item->sess . '?ref=add'), 'refresh', '600');
        }
    }

    public function pay() {
        //Process Payments
        $data['main'] = 'pay';
        $data['title'] = 'Pay Now | Kuhire ';
        $data['keywords'] = '';
        $data['description'] = '';

        $this->load->view('beta/loader', $data);
    }

    public function suggest_wanted() {
        //Process Payments
        $data['main'] = 'suggestions';
        $data['title'] = 'Potential clients for your item | Kuhire ';
        $data['sg'] = $this->data->suggested();
        $data['item'] = $this->data->get_suggested_item();
        $data['cat'] = $this->data->get_suggested_category();
        $data['keywords'] = '';
        $data['description'] = '';

        $this->load->view('beta/loader', $data);
    }

    public function owner() {

        //Quick Owner Contact
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[5]|max_length[70]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[5]|max_length[70]');
        $this->form_validation->set_rules('subject', 'Message Subject', 'trim|required|min_length[5]|max_length[70]');
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required');
        $this->form_validation->set_rules('msg', 'Message', 'trim|required|min_length[5]|max_length[1000]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'owner';
            $data['title'] = 'Quick Contact | Kuhire ';
            $data['keywords'] = '';
            $data['description'] = '';

            $this->load->view('beta/loader', $data);
        } else {

            $data = array(
                'nb_sender_name' => $_POST['name'],
                'nb__sender_email' => $_POST['email'],
                'nb_sender_phone' => $_POST['phone'],
                'nb_subject' => $_POST['subject'],
                'nb_msg' => $_POST['msg'],
                'nb_reciever' => $_POST['recipient']
            );
            // Send Message
            $this->db->insert('msg_inbox', $data);

            echo 'Your Message Has been Sent, You will be redirected Shortly.';

            redirect(base_url($this->uri->segment('5')), 'refresh', '330');
        }
    }

    public function forgot() {
        if (isset($_GET['hash'])):
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[60]');
            $this->form_validation->set_rules('password_cnf', 'Password Confirmation', 'required|min_length[4]|max_length[60]');

            if ($this->form_validation->run() == FALSE) {

                $data['main'] = 'forgot';
                $data['title'] = 'Change Password | Kuhire ';
                $data['keywords'] = '';
                $data['description'] = '';

                $this->load->view('beta/loader', $data);
            } else {

                $this->notifications->reset_password();
            }
        else:
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[60]');
            if ($this->form_validation->run() == FALSE) {
                $data['main'] = 'forgot';
                $data['title'] = 'Password Reminder | Kuhire ';
                $data['keywords'] = '';
                $data['description'] = '';

                $this->load->view('beta/loader', $data);
            } else {
                $this->notifications->send_password_reminder();

                redirect(base_url('forgot?sent=true'));
            }

        endif;
    }

    public function login() {

        $this->form_validation->set_rules('login', 'Username or Email', 'required|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'register_login';
            $data['title'] = 'Login | Kuhire ';
            $data['keywords'] = '';
            $data['description'] = '';
            $data['iasoc'] = 'login';

            $this->load->view('loader', $data);
        } else {
            $user = $_POST['login'];
            $password = md5($_POST['password']);
            $this->db->where("email", $user);
            $this->db->or_where("username", $user);
            $this->db->where("password", $password);

            $query = $this->db->get("user");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $rows) {
                    //add all data to session
                    $newdata = array('user_id' => $rows->user_id, 'user_phone' => $rows->phone, 'id_no' => $rows->id_no, 'user_name' => $rows->username, 'first_name' => $rows->first_name, 'user_email' => $rows->email, "user_status" => $rows->status, "name" => $rows->first_name . '&nbsp;' . $rows->last_name, 'logged_in' => TRUE,);
                }
                $this->session->set_userdata($newdata);
                if (isset($_POST['next'])):
                    redirect(base_url($_POST['next']));
                else:
                    redirect(base_url("account"));
                endif;
            } else
                redirect(base_url('login/error'));
        }
    }

    public function logout() {
        $newdata = array('user_id' => '', 'user_name' => '', 'user_email' => '', 'logged_in' => FALSE,);

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->index();
    }

    public function alternative() {
        $this->form_validation->set_rules('name', 'Your Name', 'required|min_length[5]|max_length[60]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'alternative';
            $data['title'] = 'Alternative Registration | Kuhire';
            $data['keywords'] = '';
            $data['description'] = '';
            $this->load->view('beta/loader', $data);
        } else {
            $this->db->insert('alternative', $_POST);
            redirect(base_url('help/faq/?alternative-registration'));
            exit();
        }
    }

    public function get_started() {
        $d = $this->get_page();
        $data['main'] = 'get_started';
        $data['title'] = $d->title;
        $data['keywords'] = $d->meta;
        $data['html'] = $d->html;
        $data['description'] = $d->description;


        $this->load->view('beta/loader', $data);
    }

    private function get_page() {
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

}

?>
