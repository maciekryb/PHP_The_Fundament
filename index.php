<?php
require "functions.php";

// dd($_SERVER);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



if ($uri === '/') {
    require 'controllers/index.php';
} else if ($uri === '/about') {
    require 'controllers/about.php';
} else if ($uri === '/contact') {
    require 'controllers/contact.php';
}
