<?php
session_start();
if (have_posts()){
        while (have_posts()){
        the_post();
        $_SESSION['acf_fields'] = get_fields();
        extract($_SESSION['acf_fields']);
        $_SESSION['permalink'] = get_permalink();
    }
}