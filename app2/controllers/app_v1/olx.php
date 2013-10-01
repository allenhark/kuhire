<?php

/**
 * 
 *  Olx Scrapper Class
 * 
 */
class Olx extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('dom/dom_parser');
    }

    //Finalizing
    function index() {
        $this->db->where('scrapped', 0);
        $data = $this->db->get('links');

        if($data-> num_rows () !== 0):
        foreach ($data->result() as $wd):

            $url = $wd->link;

            if ($this->indexer($url)):

                //Update db so we dnt index twice
                $info['scrapped'] = 1;
                $this->db->where('link_id', $wd->link_id);
                $this->db->update('links', $info);
            endif;

        endforeach;

        unset($wd, $data);
        flush();
        else:
            exit( 'We need new data here boy');
        endif;
    }
    
    function clean()
    {
        //Clean up data
        $this->db->where('link', 'link');
        $d = $this->db->get('links');
        
        foreach ($d -> result () as $data):
            $this->db->where('link_id', $data->link_id);
            $this->db->delete('links');
        endforeach;
    }

    function indexer($url) {
        //Parse a single Item and generate content
        // $url = 'http://south-b.olx.co.ke/professionals-in-public-address-system-for-hire-live-band-disqo-equipments-wedding-entertainment-masters-of-ceremony-iid-539046125';

        echo '<pre>';



        $html = $this->dom_parser->file_get_html($url);

        //Mining begins

        /*
         * Title
         * 
         */

        $inner = $html->find('div[id=olx_item_title]');

        foreach ($inner as $idata):

            //Separate title and location
            $t = trim(htmlentities(strip_tags($idata->plaintext)));

            $title = preg_replace('/\s+/', ' ', $t);

        endforeach;


        /*
         * Image
         */
        $imghtml = $html->find('div[id=big-img-1] img');

        foreach ($imghtml as $imgdata):
            $imgurl = $imgdata->src;

        endforeach;


        /*
         * Generate description
         * 
         */
        $draw = $html->find('div[id=description-text] p');

        foreach ($draw as $ddata):

            $desc = trim($ddata->innertext);

        endforeach;


        /*
         * Item Owner
         */

        $uraw = $html->find('div[class=user-wrapper]');

        foreach ($uraw as $udata):
            $user = trim($udata->innertext);

        endforeach;


        /*
         * User Phone Number
         */
        $praw = $html->find('ul[id=item-data] li[class=phone]');

        foreach ($praw as $pdata):
            $phone = strip_tags(trim($pdata->innertext));

        endforeach;


        /*
         * Item location
         */
        $lraw = $html->find('ul[id=item-data]');

        foreach ($lraw as $ldata):
            $loc = $ldata->plaintext;
            //Do some magic &exclude phone number 
            $mgc = str_replace('<li class="phone">', '', $loc);
            $mg = str_replace('</li>', ':', $mgc);
            $m = str_replace('<li>', '', $mgc);

        //echo $m;
        endforeach;

        $x = preg_replace('/\s+/', ' ', $m);

        $k = explode(",", $x);
        $char = ',';
        $location = trim(trim($k[0]), $char);
        $region = trim(trim($k[1]), $char);
        $country = 'Kenya';

        /*
         * Price
         */

        $craw = $html->find('div[class=item-highlights price] strong');

        foreach ($craw as $cdata):
            $price = trim($cdata->innertext);

        endforeach;

        //Set some options
        $md5 = md5(random_string('alnum', 32));

        //Beat annoying mysql error
        if (empty($price)):
            $pfinal = '';
        else:
            $pfinal = $price;
        endif;

        if (empty($desc)):
            $fdesc = '';
        else:
            $fdesc = htmlentities(strip_tags(trim($desc)));
        endif;

        if (empty($imgurl)):
            $fimage = 'default.png';
        else:
            $fimage = $md5 . '.jpg';
        endif;

        if (empty($phone)):
            $fphone = '';
        else:
            $fphone = $phone;
        endif;

        /*
         * Generate final data
         */

        $data['name'] = html_entity_decode(strip_tags(htmlentities($title)));
        $data['desc'] = $fdesc;
        $data['image'] = $fimage;
        $data['item_price'] = $pfinal;
        $data['status'] = 2;
        if (!empty($location)) {
            $data['location'] = $location;
        };
        if (!empty($region)) {
            $data['region'] = $region;
        };
        if (!empty($country)) {
            $data['country'] = $country;
        };
        $data['item_cat'] = 3;
        $data['item_owner'] = 118;
        $data['slug'] = url_title($title, '-', TRUE) . '-' . random_string('alpha', 4);
        $data['sess'] = $md5;
        $data['owner'] = $user;
        $data['bot'] = 1; #determine who added
        $data['phone'] = $fphone;

        if ($this->db->insert('item', $data)):
            if (!empty($imgurl)):
                $this->GetImageFromUrl($imgurl, $md5);
            endif;

            return true;
        else:
            return false;
        endif;
    }

    function loc_workrnd() {
        //Comprehesive working with location
        $url = 'http://mombasa-island.olx.co.ke/genset-for-hire-iid-538982500';
        $html = $this->dom_parser->file_get_html($url);
        echo '<pre>';

        $lraw = $html->find('ul[id=item-data]');

        foreach ($lraw as $ldata):
            $loc = $ldata->plaintext;
            //Do some magic &exclude phone number 
            $mgc = str_replace('<li class="phone">', '', $loc);
            $mg = str_replace('</li>', ':', $mgc);
            $m = str_replace('<li>', '', $mgc);

        //echo $m;
        endforeach;

        $x = preg_replace('/\s+/', ' ', $m);

        $k = explode(",", $x);
        $char = ',';
        $location = trim(trim($k[0]), $char);
        $region = trim(trim($k[1]), $char);
        $country = 'Kenya';
    }

    function links() {
        //We generate urls to parse here
        echo 'updating scrapping list ... <br>';
        $pg = '/-p-';
        $link = $_GET['link'];
        for ($counter = 0; $counter <= $_GET['total']; $counter += 1) {

            $url = $link . $pg . $counter;
            //echo "<br><hr>";
            echo 'Generating urls from ...'.$url .'<br>';
            $this->gen_urls($url);          
            
        }
    }

    function gen_urls($url) {
        //We start by parsing olx urls
        //$url = 'http://www.olx.co.ke/nf/search/hire'.$page; #testing

        $html = $this->dom_parser->file_get_html($url);

        $dm = $html->find('div[class=li] a[title]');

        echo '<pre>';

        //print_r($dm);
        //Check for item links
        foreach ($dm as $hm):
            
            //check if link exist
            $link = $hm->href;
            $this->db->where('link', $link);
            $ck = $this->db->get('links');
            
            if($ck -> num_rows () ===0):
                $data['link'] = $link;

                $this->db->insert('links', $data);
                
                continue;
           endif;

        endforeach;
    }

    function GetImageFromUrl_old($imgurl, $md5) {
        //$url = 'http://graph.facebook.com/' . $this->fb_me['id'] . '/picture?type=large';
        $image_data = file_get_contents($imgurl);
        $fileName = './images/' . $md5 . '.jpg';
        $file = fopen($fileName, 'w+');
        fputs($file, $image_data);
        fclose($file);

        //Image path
        // $file_path = $fileName;
        //Crete thumbnail
        // $this->data->create_thumbnail($file_name, $file_path);

        $image = $image_data['file_name'];

        return true;
    }

    function GetImageFromUrl($imgurl, $md5) {
        $url = $imgurl;
       // $ip = "41.87.105." . random_string("numeric", 3);

        $fp = fopen("./images/".$md5.".jpg", 'wb');
        if ($fp != null) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            //curl_setopt($ch, CURLOPT_INTERFACE, $ip);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        } else {
            exit('ERROR: Failed to open file');
        }
    }

    public function getAllHeaders($ch, $header) {
        // store header here (how about storing in a field that is an array of headers?)
        $header[] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";
        
        return strlen($header);
    }

}

?>