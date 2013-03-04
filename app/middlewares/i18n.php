<?php
use Symfony\Component\Yaml\Yaml;

class I18N extends \Slim\Middleware
{
    public function call()
    {
        $app = $this->app;
        $route = $app->router()->getCurrentRoute();
        $lang = explode('/', $app->request()->getResourceUri());
        $lang = $lang[2];
        $localeFile = $app->config('localePath') .'/'. $lang .'.yml';

        if(!file_exists($localeFile)) {

            $localeFile = $app->config('localePath') .'/en.yml';
        }
        $trans = Yaml::parse($localeFile);
        $app->view()->appendData(array('i' => $trans));
        $this->next->call();
    }
}