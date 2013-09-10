<?php

function valida() {
    if (!isset($_SESSION['username'])) {
        header('HTTP/1.1 403 Forbidden');
        return false;
    }

    return authChave();
}

function authChave() {
    $headers = apache_request_headers();
    if(!isset($headers['Authorization']) || 
       $headers['Authorization'] != 'da39a3ee5e6b4b0d3255bfef95601890afd80709'
    ) {
        header('HTTP/1.1 403 Forbidden');
    }

    return true;
}