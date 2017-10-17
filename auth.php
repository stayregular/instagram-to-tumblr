<?php
if(!session_id()) {
    session_start();
}


include 'classes/class.TumblrVerify.php';
include 'config.php';

$t = new TB_Tumblr_Verify();

$t->HandleResponse();
