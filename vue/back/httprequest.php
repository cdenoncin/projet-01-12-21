<?php
    class HTTPRequest {
    
        public function cookieDate($key){
    ​       return isset($_cookie[$key]) ? $_COOKIE[$key] : null;
        }

        public function cookieExists($key)  {
            return isset($_COOKIE[$key]);
        }

        public function method() {
            return $_SERVER['REQUEST_METHOD'];
        }

        public function requestURI() {
            return $_SERVER['REQUEST_URL'];
        }
    }
?>