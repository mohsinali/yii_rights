<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create Salon Profile</h1>

<?php echo $this->renderPartial('_form_profile_salon', array('model'=>$model, 'model_profile_salon' => $model_profile_salon)); ?>