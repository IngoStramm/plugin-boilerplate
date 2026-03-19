<?php

/**
 * Plugin Name: Plugin Boilerplate
 * Plugin URI: https://agencialaf.com
 * Description: Descrição do Plugin Boilerplate.
 * Version: 0.0.1
 * Author: Ingo Stramm
 * Text Domain: pb
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('PB_DIR', plugin_dir_path(__FILE__));
define('PB_URL', plugin_dir_url(__FILE__));

require_once 'dependencies.php';
require_once 'classes/classes.php';
require_once 'utilities.php';
require_once 'scripts.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/plugin-boilerplate/refs/heads/master/info.json',
    __FILE__,
    'plugin-boilerplate'
);
