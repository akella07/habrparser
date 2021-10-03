<?php 
namespace App\Controller;

class UrlController {

	public function modify_url(string$url, $proxy_url, $victim_url)
    {

        if(strpos($url, $victim_url) !== false) {
            return str_replace($proxy_url, $victim_url, $url );
        } elseif($url == $this->GetSelfIndexUrl()) {
            return $victim_url;
        } else {
            return $victim_url . $url ;
        }

	}

	public function GetSelfIndexUrl()
    {
        return '/proxy2/';
    }
}