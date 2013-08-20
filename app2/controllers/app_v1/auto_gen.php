<?php

/**
 * Auto gen class for seo optimization
 */

class Auto_gen extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index ()
    {
        $string = read_file('./Keywords.txt');
        
        //Read new lines
        //$x = explode('/n/r', $string);
        
        //remove new lines
        $replacer  = array("\r\n", "\n", "\r", "\t");
        $v = str_replace($replacer, "#", $string);
        
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<td>';
        echo '<b>Keyword';
        echo '</td> <td>';
        echo 'Content </b> </td>';
        echo '</tr></thead>';
        
        //Try to loop
        $s = explode('#', $v);
        
        foreach ($s as $t):
            //print_r($t.'<br>');
            
            //try braek it further
            $e = explode(',', $t);
            
            //Search for matches

            echo '<tr><td>';
            echo $e[0];
            echo '</td><td>';
            echo $e[1];
            echo '</td></tr>';   
            
        endforeach; 
        
        echo '</table>';
    }
    
}

?>