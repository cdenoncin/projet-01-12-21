<?php

    class HTTPResponse {

        public function addHeader($header) {
        ​    header($header);
        }

        public function redirect($location, int $code = 0, bool $replace = true) {
        ​    header('Location' .$location, $replace, $code);
        ​    exit;
        }
    }
?>