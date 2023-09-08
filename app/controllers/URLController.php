<?php

class URLController {
    public static function getSegments() {
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $segments = explode('/', $url);
        return $segments;
    }
    
    public static function getUrlSegments() {
        $url = $_SERVER['REQUEST_URI'];
        $segments = array_filter(explode('/', $url));
        return $segments;
    }
    
    public  static function getMetodeSegment(){
    return $_SERVER['REQUEST_METHOD'];
    }
    public static function getSegment($index) {
        $segments = self::getSegments();
        if (isset($segments[$index])) {
            return $segments[$index];
        } else {
            return null;
        }
    }
    
  public  static function getBaseUrl() {
        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $baseUrl = "$protocol://$host";
        return $baseUrl;
    }
}
