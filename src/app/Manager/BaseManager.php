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

    public function generateCreateQuery(Object $object, $tableName) {
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

    
    public function generateUpdateQuery(Object $object, $tableName) {
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
