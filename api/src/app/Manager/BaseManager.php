<?php

namespace App\Manager;


class BaseManager
{

    protected $database_connection;
    private $viewDir = "app/views/";
    private $template = "template.php";

    public function __construct($database_connection)
    {
        $this->database_connection = $database_connection;
    }

    public function render($title, $view, $args)
    {
        $view = $this->viewDir . $view . ".view.php";
        ob_start();
        require $view;
        $content = ob_get_clean();

        return require $this->viewDir . $this->template;
    }

}
