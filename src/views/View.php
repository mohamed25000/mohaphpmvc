<?php

namespace Sectheater\views;

class View
{
    public static function make($view, $params = [])
    {
        $baseContent = self::getBaseContent();
        $viewcontent = self::getViewContent($view, params: $params);
        echo str_replace('{{content}}', $viewcontent, $baseContent);
    }

    protected static function getBaseContent()
    {
        ob_start();
        include base_path() . "views/layouts/main.php";
        return ob_get_clean();
    }

    protected static function getViewContent($view, $isError = false, $params = [])
    {
        $path = $isError ? view_path() . 'errors/' : view_path();

        if(str_contains($view, '.')) {
            $views = explode(".", $view);
            var_dump($views);
            foreach ($views as $view) {
                if(is_dir($path . $view)) {
                    $path = $path . $view . "/" ;
                }
            }
            $view = $path . end($views) . ".php";
        } else {
            $view = $path . $view . ".php";
        }

        /*echo "<pre>";
        var_dump($view);
        echo "</pre>"; */
        //exit;

        foreach ($params as $param => $value) {
            $$param = $value;
        }

        if($isError) {
            include $view;
        } else {
            ob_start();
            include $view;
            return ob_get_clean();
        }

    }

    public static function makeError($error)
    {
        View::getViewContent($error, true);
    }
}