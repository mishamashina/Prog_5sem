
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
    
     unset($matches[0]);
     if ($controllerAndAction[1] == 'show_comment')
     {
          unset($matches[1]);
     }
     if ($controllerAndAction[1] == 'edit_comment')
     {
          unset($matches[1]);
     }
     $action = $controllerAndAction[1];
     $controllerName = $controllerAndAction[0];
      //var_dump($controllerName);
     // var_dump($matches);
     if ($isRouteFound){
          $controller = new $controllerName;
          $controller->$action(...$matches);
     }else echo "Страница не найдена";
   
?>