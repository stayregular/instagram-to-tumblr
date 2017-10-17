<?php

    class Instagram {
        private $user;
        private $photo;

        function __construct($user) {

            $url = 'https://www.instagram.com/'.$user.'/media/';
            $json_new = $this->getData($url);
            $this->photo = json_decode($json_new);
        }

        function getData($url) {
          //$proxy = '198.710.420.58:69';
            $ch = curl_init();
            $timeout = 3;
            curl_setopt($ch, CURLOPT_URL, $url);
          //curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
          curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }

        function getPhotos() {
            return $this->photo;
        }
    }
?>

