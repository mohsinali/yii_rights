<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Signup'=>array('index'),
	'Become a Member',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Become a Member</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>