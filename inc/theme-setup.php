<?php

/* Theme Setup */
if(!function_exists('rei_theme_setup')){
  function rei_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo'); // Optional
  }
}

add_action('after_setup_theme', 'rei_theme_setup');