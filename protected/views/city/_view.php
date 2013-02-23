<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b>City:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country->name); ?>
	<br />


</div>