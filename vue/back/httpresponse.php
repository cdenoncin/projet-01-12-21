<?php

    class HTTPResponse {

        public function addHeader($header) {
        ​    header($header);
        }

        public function redirect($location, int $code = 0, bool $replace = true) {
        ​    header('Location' .$location, $replace, $code);
        ​    exit;
        }

        public function unauthorized(array $messages): void {
            $this->addHeader('WW-Authentificate: Basic realm="this area needs authentification"');
            $this->addHeader('HTTP/1.0.401 Unauthorized');
            exit(json_encode($messages, JSON_PREETY_PRINT));
        }

        public function setCookie($name, $value ='',$expire = 0, $path = null, $domain = null, $secure) {
            setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
        }

        public function setCacheHeader(int $seconds = 0): void {
            $timestamp = time() + $seconds;
            $date = new \DateTime();
            $date->setTimesmap($timestmap);

            $this->addHeader('Cache-Control: public, max-age=' . $seconds);
            $this->addHeader('Expires ' . $date->format('D, J M Y H:i:s'). 'GMT');
        }

    }
?>