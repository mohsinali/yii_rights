<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
  
  <div class="row">
            <?php echo $form->labelEx($model,'first_name'); ?>
            <?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'last_name'); ?>
            <?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'email'); ?>
	</div>
        
        <?php //if($model->isNewRecord == true): ?>
	<div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'password'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'repeat_password'); ?>
            <?php echo $form->passwordField($model,'repeat_password'); ?>
            <?php echo $form->error($model,'repeat_password'); ?>
	</div>
        <?php //endif; ?>
        
        <div class="row">
            <label for="country">Country</label>
            <?php echo CHtml::dropDownList('country_id', 'country_id', 
              $this->getCountryList(),
              array(
                  'empty' => 'Select a country',
                  'value'=>'1',
                  'ajax' => array(
                      'type' => 'POST',
                      'url' => CController::createUrl('city/dynamiccities'),
                      'update' => '#city_id',
                  ),                  
              )); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'city_id'); ?>
            <?php echo CHtml::dropDownList('city_id','city_id', array() ); // , $this->getCityList(), array('empty' => 'Select a city') ?>
            <?php echo $form->error($model, 'city_id') ?>
            <!-- http ://www.yiiframework.com/wiki/24/creating-a-dependent-dropdown/ -->
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'profile_image'); ?>
            <?php echo CHtml::activeFileField($model, 'profile_image'); ?>
            <?php echo $form->error($model, 'profile_image'); ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->