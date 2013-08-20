<?php

/*
 * 	Scrobber lunar
 * Advanced user control center
 * Performs all or major user private functions 
 */

class Lunar extends CI_Controller {

    public function index() {
        $this->validate_login();
        $data['inbox'] = $this->get_unread_mail();
        $data['system'] = $this->get_unread_system_mail();
        $data['items'] = $this->get_items();
        $data['inactive'] = $this->get_inactive_items();
        $data['meme'] = $this->get_meme();
        $data['support'] = $this->get_pending_support();
        $data['title'] = 'Scrobber Lunar Dashboard';
        $data['main'] = 'index';

        $this->load->view('lunar/galatic', $data);
    }

    public function items() {
        $this->validate_login();
        $data['inbox'] = $this->get_unread_mail();
        $data['system'] = $this->get_unread_system_mail();
        $data['idata'] = $this->get_all_items();
        $data['title'] = 'Items | Scrobber Lunar Dashboard';
        $data['main'] = 'items';

        $this->load->view('lunar/galatic', $data);
    }

    public function mail() {
        $this->validate_login();

        if (!$this->uri->segment(3)):

            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['mail'] = $this->get_inbox();
            $data['title'] = 'S-mail | Scrobber Lunar';
            $data['main'] = 'mail';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'inbox'):

            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['mail'] = $this->get_inbox();
            $data['title'] = 'S-mail Inbox | Scrobber Lunar';
            $data['main'] = 'mail';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'outbox'):

            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'S-mail  Outbox| Scrobber Lunar';
            $data['main'] = 'mail_outbox';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'system'):

            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['sys'] = $this->get_system_mail();
            $data['title'] = 'S-mail Sys Inbox | Scrobber Lunar';
            $data['main'] = 'mail_sys';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'view'):
            $data['mail'] = $this->get_selected_mail();
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['idata'] = $this->get_r_id();
            $data['title'] = 'S-mail Read Mail | Scrobber Lunar';
            $data['main'] = 'mail_view';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'notifications'):
            $data['sys'] = $this->get_nots_mail();
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'S-mail Notifications | Scrobber Lunar';
            $data['main'] = 'nots_mail';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'archive'):
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'S-mail Archive | Scrobber Lunar';
            $data['main'] = 'archive_mail';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'trash'):
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'S-mail Trash | Scrobber Lunar';
            $data['main'] = 'mail_trash';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'misc'):
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['mail'] = $this->read_sys();
            $data['title'] = 'Read Mail | Scrobber Lunar';
            $data['main'] = 'mail_misc';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'deal'):
            // Make Deal
            echo 'Deal Made';
            $data = array(
                'status' => '2'
            );
            $this->db->where('item_owner', $this->session->userdata('user_id'));
            $this->db->where('item_id', $_GET['deal']);

            $this->db->update('item', $data);

            $this->notify_u_deal();
            $this->notify_c_deal();

            redirect(base_url('lunar/mail/' . $_GET['target']));

        elseif ($this->uri->segment(3) == 'delete'):
            // Delete Message
            $data = array(
                'nb_status' => 0
            );

            $this->db->where('nb_id', $_GET['id']);
            $this->db->where('nb_reciever', $this->session->userdata('user_id'));

            $this->db->update('msg_inbox', $data);

            redirect(base_url('lunar/mail/' . $_GET['target']));

        else:
            show_404();
        endif;
    }

    public function help() {
        $this->validate_login();

        if (!$this->uri->segment(3)):
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'Using Scrobber Lunar Dashboard';
            $data['main'] = 'help';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment('3') == 'support'):
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'Contact Support';
            $data['main'] = 'help_support';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment('3') == 'faq'):
            $data['faq'] = $this->get_faq();
            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'Frequently Asked Questions | Scrobber Lunar';
            $data['main'] = 'faq';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'bug'):

            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'Bug Log | Scrobber Lunar';
            $data['main'] = 'bug';

            $this->load->view('lunar/galatic', $data);

        elseif ($this->uri->segment(3) == 'forums'):

            $data['inbox'] = $this->get_unread_mail();
            $data['system'] = $this->get_unread_system_mail();
            $data['title'] = 'Forums | Scrobber Lunar';
            $data['main'] = 'forum';

            $this->load->view('lunar/galatic', $data);

        else:
            show_404();

        endif;
    }

    private function get_all_items() {
        $this->db->where('item_owner', $this->session->userdata('user_id'));
        $this->db->where_not_in('status', 0);
        $this->db->order_by('item_id', 'desc');

        $data = $this->db->get('item');

        return $data;
    }

    private function read_sys() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $this->db->where('thread_unique', $this->uri->segment(4));
        $data = $this->db->get('sys_inbox');

        // Update Status to read.
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $this->db->where('thread_unique', $this->uri->segment(4));
        $update = array('status' => 2);
        $this->db->update('sys_inbox', $update);

        return $data;
    }

    private function notify_c_deal() {
        //We notify client user has agreed to rent out item
        return FALSE;
    }

    private function notify_u_deal() {
        // Remind the owner he has made a deal
        $msg = " Hi, you have successfully accepted a hire deal on Scrobber.";

        $data = array(
            'subject' => 'Congratulations Deal Made with ' . $_GET['name'],
            'message' => $msg,
            'priority' => 3,
            'thread_unique' => random_string('alnum', 16),
            'reciever' => $this->session->userdata('user_id')
        );
        $this->db->insert('sys_inbox', $data);

        return true;
    }

    private function get_r_id() {
        $d = $this->get_selected_mail();
        foreach ($d->result() as $e)
            ;
        if ($e->relation == 1):
            $this->db->where('slug', $e->r_id);
            $data = $this->db->get('item');
            foreach ($data->result() as $final)
                ;
            return $final;
        else:
            return FALSE;
        endif;
        //endforeach;
    }

    private function get_selected_mail() {
        if ($this->uri->segment(4) == NULL):
            show_error('Unable to process request', '503', 'Unkown Request');
            //echo 'Unable to process request';
            exit();
        elseif (!$_GET):
            show_error('Invalid request parameters', '503', 'Unknown Request');
            //echo 'Invalid request paramenters';
            exit();
        elseif (!$_GET['token']):
            show_error('Acess denied, Use the correct path', '500', 'Acess Denied');
            exit;
        endif;

        $this->db->where('nb_reciever', $this->session->userdata('user_id'));
        $this->db->where('nb_id', $this->uri->segment('4'));
        $data = $this->db->get('msg_inbox');

        if ($data->num_rows() < 0 | $data->num_rows() > 1):
            show_error('We did not understand your request', '404', 'Ooops');
            exit();
        else:
            $this->db->where('nb_reciever', $this->session->userdata('user_id'));
            $this->db->where('nb_id', $this->uri->segment('4'));
            $update = array('nb_status' => 2);
            $this->db->update('msg_inbox', $update);

            return $data;
        endif;
    }

    private function get_inbox() {
        $this->db->where('nb_reciever', $this->session->userdata('user_id'));
        $this->db->where_not_in('nb_status', '0');
        $this->db->order_by('nb_id', 'desc');
        $inbox = $this->db->get('msg_inbox');

        return $inbox;
    }

    private function get_outbox() {
        
    }

    private function get_notifications() {
        
    }

    private function get_system_mail() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $sys_mail = $this->db->get("sys_inbox");

        return $sys_mail;
    }

    private function get_nots_mail() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $sys_mail = $this->db->get("sys_nots");

        return $sys_mail;
    }

    private function get_faq() {
        $this->db->where('faq_status', 2);
        $faq = $this->db->get('faq');

        return $faq;
    }

    private function inactive_item_reminder() {
        /**
         * We remind the user that his item has not yet been active.
         */
    }

    private function get_userdata() {
        $this->validate_login();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $userdata = $this->db->get('users');

        return $userdata;
    }

    private function get_unread_mail() {
        $this->db->where('nb_reciever', $this->session->userdata('user_id'));
        $this->db->where('nb_status', '1');
        $inbox = $this->db->get('msg_inbox');

        return $inbox;
    }

    private function get_unread_system_mail() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $this->db->where('status', '1');
        $sys = $this->db->get('sys_inbox');

        return $sys;
    }

    private function get_items() {
        $this->db->where('item_owner', $this->session->userdata('user_id'));
        $item_data = $this->db->get('item');

        return $item_data;
    }

    private function get_inactive_items() {
        $this->db->where('item_owner', $this->session->userdata('user_id'));
        $this->db->where_not_in('status', 3);
        $inactive = $this->db->get('item');

        return $inactive;
    }

    private function get_pending_support() {
        $this->db->where('status', 1);
        $this->db->where('status', 2);
        $this->db->where('q_user', $this->session->userdata('user_id'));
        $ps = $this->db->get('support');

        return $ps;
    }

    private function get_meme() {
        $this->db->order_by('meme_id', 'random');
        //$this->db->limit('1');
        $m = $this->db->get('meme');

        foreach ($m->result() as $mdata):
            return $mdata->meme;
        endforeach;
    }

    private function validate_login() {
        /*
         * Call this private function to hide pages from non logged in users
         */
        if (!$this->session->userdata('logged_in')):
            redirect(base_url('login'));
            exit();
        else:
            return TRUE;
        endif;
    }

    public function logout() {
        $newdata = array('user_id' => '', 'user_name' => '', 'user_email' => '', 'logged_in' => FALSE,);

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        //$logout_url = $this->fb_ignited->fb_logout_url();
        
        $past = time() - 3600;
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, $value, $past, '/');
        }

        redirect (base_url('?ref=logged+out'));
    }

}

?>