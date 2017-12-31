<?php
class Apikey{
    static public function getApikey()
    {
        return $_ENV["Apikey"];    
    }
}