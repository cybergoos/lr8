<?php
class Route
{
    static function start()
    {
        // default action controller
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // get controller name
        
        /*
        if (!empty($routes[3]))
        {
            $controller_name = $routes[3];
        }
        */

        // get action name
        if (!empty($routes[3]) && empty($routes[4]))
        {
            $action_name = $routes[3];
        }
        
        if (!empty($routes[4]))
        {
            Route::ErrorPage404();
            return;
        }

        // add prefix
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // get file with class
        $model_file = strtolower($model_name).'.php';
        $model_path = 'app/models/'.$model_file;
        
        if (file_exists($model_path))
        {
            include 'app/models/'.$model_file;
        }

        // get file with controller class
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = 'app/controllers/'.$controller_file;

        if (file_exists($controller_path))
        {
            include 'app/controllers/'.$controller_file;

            // create controller
            $controller = new $controller_name;
            $action = $action_name;

            if (method_exists($controller, $action))
            {
                // get controller action
                $controller->$action();
            }
            else
            {
                Route::ErrorPage404();
            }
        }
        else
        {
            Route::ErrorPage404();
        }
    }

    // error page
    static function ErrorPage404()
    {
        include 'app/controllers/Controller_404.php';
        $controller = new Controller_404;
        $action = 'action_index';
        $controller->$action();
    }
}
?>