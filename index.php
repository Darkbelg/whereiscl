<?php

$url = explode("/",$_SERVER['REQUEST_URI']);
$url = $url[count($url)-1];

switch ($url){
    case 'robots.txt':
        header("Location: https://www.whereiscl.com/assets/robots.txt");
        break;
    case 'donate.php':
        include "donate.php";
        break;
    case 'sitemap.xml':
        header("Location: https://www.whereiscl.com/assets/sitemap.xml");
        break;
    default:
        include "presentation/index.phtml";
}
