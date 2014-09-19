<?php
App::uses('Router', 'Routing');

class SimpleRouter {
    public static function connect($route, $path, $options = array()) {
        $fullPath = SimpleRouter::parsePath($path);

        return Router::connect($route, $fullPath, $options);
    }

    public static function parsePath($path) {
        // Separates prefix and controller of the action and parameters
        $path = explode('#', $path);


        // Separates prefix of the controller
        $path[0] = explode('/', $path[0]);

        // Define controller
        $controller = array_pop($path[0]);

        // Define prefixes
        $currentPrefix = array_shift($path[0]);
        //$prefixes = SimpleRouter::getPrefixes($currentPrefix);
        $prefixes = array();
        if (!empty($currentPrefix)) $prefixes[$currentPrefix] = true;
        

        // Separates action of the parameters
        $path[1] = explode('/', $path[1]);

        // Define action
        $action = array_shift($path[1]);

        // Define parameters
        $parameters = array();
        foreach ($path[1] as $parameter) {
            // If is named parameter
            if (preg_match('/(.*):(.*)/', $parameter, $matches)) {
                $parameters[$matches[1]] = $matches[2];
            } else {
                $parameters[] = $parameter;
            }
        }

        return array_merge(
            $prefixes,
            compact('controller', 'action'),
            $parameters
        );
    }

    public static function getPrefixes($current = null) {
        $prefixes = Router::prefixes();
        $tmp = array();

        // Negative all prefixes, except the current
        foreach ($prefixes as $prefix) {
            $tmp[$prefix] = ($prefix == $current) ? true : false;
        }

        return $tmp;
    }
}