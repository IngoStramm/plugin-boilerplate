<?php

add_action('wp_enqueue_scripts', 'pb_frontend_scripts');

function pb_frontend_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';
    $version = pb_version();

    if (empty($min)) :
        wp_enqueue_script('plugin-boilerplate-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    wp_register_script('plugin-boilerplate-script', PB_URL . '/assets/js/plugin-boilerplate' . $min . '.js', array('jquery'), $version, true);

    wp_enqueue_script('plugin-boilerplate-script');

    wp_localize_script(
        'plugin-boilerplate-script',
        'ajax_object',
        array(
            'ajax_url'                          => admin_url('admin-ajax.php'),
            'plugin_url'                        => PB_URL,
        )
    );

    wp_enqueue_style('plugin-boilerplate-style', PB_URL . '/assets/css/plugin-boilerplate.css', array(), $version, 'all');
}

add_action('admin_enqueue_scripts', 'pb_admin_scripts');

function pb_admin_scripts()
{
    if (!is_user_logged_in())
        return;

    $version = pb_version();

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';

    wp_register_script('plugin-boilerplate-admin-script', PB_URL . '/assets/js/plugin-boilerplate-admin' . $min . '.js', array('jquery'), $version, array('strategy' => 'defer', 'in_footer' => true));

    wp_enqueue_script('plugin-boilerplate-admin-script');

    wp_localize_script('plugin-boilerplate-admin-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
