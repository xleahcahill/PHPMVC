<?php 
require_once 'controller.php';
require_once 'view.php';
require_once 'model.php';



$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);
echo $view->template1();

?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title></title>
 </head>
 <h1> Template Title Page </h1>
 <body>
  <h1><?php echo $intro; ?></h1>
 </body>
</html>