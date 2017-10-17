<?php

    class Photo {
        private $photoURL = "";
        private $user;
        private $photo;

        function __construct($data) {
            $this->photo = $data;
        }

        function getText() {
            $this->photo->caption->text;
        }

        function getURL() {
            return $this->photo->images->standard_resolution->url;
        }

        function getPhotographer() {
            return $this->photo->user->username;
        }


        function getCaption() {
            $photo = $this->photo;

            return '<p>' . $photo->caption->text . '</p><p>via <a href="http://instagram.com/'. $photo->user->username .'">'. $photo->user->username .'</a></p>';
        }
    }
?>
