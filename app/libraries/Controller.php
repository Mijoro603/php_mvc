<?php

/**
 * base controller
 * loads models and views
 */

class Controller
{

    // load model
    public function model($model)
    {
        // require model file
        require_once('../app/models/' . $model . '.php');

        // instantiate the model
        return new $model();
    }

    // load view
    public function view($view, $data = [])
    {
        // require view file if exists
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else {
            // view does not exist
            die('view does not exist');
        }
    }
}
