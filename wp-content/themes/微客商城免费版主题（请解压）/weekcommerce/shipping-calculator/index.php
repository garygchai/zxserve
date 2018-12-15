<?php


global $rpship_plugin_url, $rpship_plugin_dir;

$rpship_plugin_dir = dirname(__FILE__) . "/";
$rpship_plugin_url = get_bloginfo('template_url') ."/" . basename($rpship_plugin_dir) . "/";
include_once $rpship_plugin_dir.'lib/main.php';

