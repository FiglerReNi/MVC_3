<?php


namespace core\routing;


class Routing
{
    private $currentController = '\controller\IndexController';
    private $currentMethod = [];
    private $params = [];
    private $url = [];

    public function __construct()
    {
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $this->getUrl();
            $this->doController();
        }

        $this->currentController = new $this->currentController();

        if (isset($this->url[1])) {
            $this->doMethod();
            $this->doParams();
            if(!empty($this->currentMethod))
                call_user_func_array([$this->currentController, $this->currentMethod], array($this->params));
        }
    }

    public function getUrl()
    {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $this->url = explode('/', $url);
    }

    public function doController()
    {
        $path = '\controller\\' . str_replace('c', 'C', ucwords($this->url[0])) . '.php';
        if (file_exists('src' . $path)) {
            $this->currentController = rtrim($path, '.php');
            unset($this->url[0]);
        }
    }

    public function doMethod()
    {
        if (method_exists($this->currentController, $this->url[1])) {
            $this->currentMethod = $this->url[1];
            unset($this->url[1]);
        }
    }

    public function doParams()
    {
        $this->params = $this->url ? $this->url : [];
    }
}

