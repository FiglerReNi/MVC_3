<?php


namespace core\routing;


class Routing
{
    protected $currentController = '\controller\IndexController';
    protected $currentMethod = [];
    protected $params = [];
    protected $url = [];

    public function __construct()
    {
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $this->getUrl();
            $this->doController();
        }

        $this->currentController = new $this->currentController;

        if (isset($this->url[1])) {
            $this->doMethod();
            $this->doParams();
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
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
        if (file_exists('src\controller\\' . str_replace('c', 'C', ucwords($this->url[0])) . '.php')) {
            $this->currentController = '\controller\\' . str_replace('c', 'C', ucwords($this->url[0]));
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
        $this->params = $this->url ? array_values($this->url) : [];
    }
}