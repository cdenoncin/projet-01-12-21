<?php

namespace App\Manager;

use App\App;
class BaseManager
{
    private $viewDir = "app/views/";
    private $template = "template.php";
    protected $app;

    /**
     * @var UserManager
     */

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    private function renderTemplate($content) {
        $isUserConnected = $this->app->getSession()->isUserConnected();

        return require $this->viewDir . $this->template;
    }

    public function render($title, $view, $args = [])
    {
        $idUserConnected = $this->app->getSession()->getConnectedUser();
        $view = $this->viewDir . $view . ".view.php";
        ob_start();
        require $view;
        return $this->renderTemplate(ob_get_clean());
    }

    public function renderTitleText($titlePage, $title, $text)
    {
        $view = $this->viewDir . "title-text.view.php";
        ob_start();
        require $view;

        return $this->renderTemplate(ob_get_clean());
    }

    function render404 () {
        http_response_code(404);
        $this->renderTitleText("404", "Erreur 404", "La page que vous cherchez n'existe pas");
    }


    public function generateCreateQuery($object, $tableName) {
        $query = "INSERT INTO ".$tableName." {{keys}} VALUES {{values}};";

        $keys = "(";
        $values = "(";
        //echo json_encode($object->getProperties());
        foreach($object->getProperties() as $key => $var) {
            if($var !== null) {
                $keys .=  $key.",";
                $values .= "\"".$var."\",";
            }
        }
        $keys = mb_substr($keys, 0, -1).')';
        $values = mb_substr($values, 0, -1).')';

        $query = str_replace("{{keys}}", $keys, $query);
        $query = str_replace("{{values}}", $values, $query);
       // echo $query;
        return $query;

    }


    public function generateUpdateQuery($object, $tableName) {
        $query = "UPDATE ".$tableName." SET {{modifications}} WHERE id=" . $object->getId().";";

        $modifications = "";

        //echo json_encode($object->getProperties());
        foreach($object->getProperties() as $key => $var) {
            if($var !== null && $key !== "id") {
                $modifications .= $key ."=\"". $var."\",";
            }
        }
        $modifications = mb_substr($modifications, 0, -1);
        $query = str_replace("{{modifications}}", $modifications, $query);

       // echo $query;
        return $query;

    }

}
