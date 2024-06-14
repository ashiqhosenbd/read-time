<?php 
/*
Plugin Name: Read time
Plugin URI: https://devsoffice.com
Description: You can generate a dynamic reading time based on all characters
Author: Ashiq Hosen
Author URI: https://devsoffice.com
Version: 1.0.0
*/

class read_time{
    public function __construct(){
        add_action("init", array( $this,"initialize") );
    }
    function initialize(){
        add_filter("the_content", array( $this,"read_time_content") );
    }

    function read_time_content($post_content){
        $content = strip_tags($post_content) ;
        $word_count = str_word_count($content);

        $total_time = ceil($word_count/100);
        return $post_content . "<br/><br/> You need to spend total {$total_time} minutes to complete reading all {$word_count} words ";        
    
    
    }

}
new read_time();

