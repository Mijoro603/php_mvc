<?php
/* app core class
 * creates url and loads core controller
 * url format: /Controller/methods/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        // print_r($this->getUrl());
        $url = $this->getUrl();

        // look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // set as controller
            $this->currentController = ucwords($url[0]);

            // unset index 0
            unset($url[0]);
        }

        // require the controller
        require_once('../app/controllers/' . $this->currentController . '.php');

        // instantiate controller class
        $this->currentController = new $this->currentController;

        // check for second part of url
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];

                // unset index 1
                unset($url[1]);
            }
        }

        // get parameters
        $this->params = ($url) ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
