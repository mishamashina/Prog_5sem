
<?php
     spl_autoload_register(function ($className){
          require_once('../'.str_replace('\\', '/', $className).'.php');
     });

     $isRouteFound = false;
     $url = $_GET['route'] ?? '';
     // var_dump($url);
     $routes = require('../src/routes.php');
     foreach($routes as $pattern=>$controllerAndAction){
          preg_match($pattern, $url, $matches);
          if(!empty($matches)){
               $isRouteFound=true;
               break;
          }
     }
     //var_dump($matches);
     unset($matches[0]);
     //var_dump($matches);
     $action = $controllerAndAction[1];
     $controllerName = $controllerAndAction[0];
     //var_dump($url);
     if ($isRouteFound){
          $controller = new $controllerName;
          $controller->$action(...$matches);
     }else echo "Страница не найдена";
   
?>