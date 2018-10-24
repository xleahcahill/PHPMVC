<?php
require_once 'controller.php';
require_once 'view.php';
require_once 'model.php';

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

?>
<html>
<head>
<h2><?php echo $view->output(); ?></h2>	<h4>Customer Details</h4

</head>
<body>

<table border=1>
	<thead><tr><th>First name</th><th>Last name</th><th>Email</th></tr></thead>
	<?php echo $view->DisplayTable();?>
</table>




<?php 
echo $view->template1();
echo $view->template2();
?>

</html>