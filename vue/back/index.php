<?php
    require '../../../api/src/vendor/autoload.php';

    $page = $_GET['page'] ?? '404';
        if ($page === 'test') {
            require '../../api/src/Test.php';
        }
        else if ($page === '404') {
            require 'front/errors404.php';
        }
?>