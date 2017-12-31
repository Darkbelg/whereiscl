<?php
class Service
{
    public static function new(){
      if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
        throw new \Exception('Please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
      }
      require_once __DIR__ . '/vendor/autoload.php';
    
      if (!file_exists(__DIR__ . '/Apikey.php')) {
        throw new \Exception('Please download add the Api key ' . __DIR__ .'"');
      }
      require_once __DIR__ . '/Apikey.php';
    
     $DEVELOPER_KEY = Apikey::getApikey();
      $client = new Google_Client();
      $client->setDeveloperKey($DEVELOPER_KEY);
      // Define an object that will be used to make all API requests.
      $service = new Google_Service_YouTube($client);
      return $service;
    }
}
