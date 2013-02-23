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

	<?php echo $form->errorSummary(array($model, $model_profile_salon)); ?>

	<div class="row">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
	</div>
  
  <div class="row">
            <?php echo $form->labelEx($model, 'first_name'); ?>
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
            <?php echo CHtml::dropDownList('country_id', 1, // $model->city->country->id 
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
            <?php echo CHtml::dropDownList('city_id',1, array() ); // , $this->getCityList(), array('empty' => 'Select a city') ?>
            <?php echo $form->error($model, 'city_id') ?>
            <!-- http ://www.yiiframework.com/wiki/24/creating-a-dependent-dropdown/ -->
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'profile_image'); ?>
            <?php echo CHtml::activeFileField($model, 'profile_image'); ?>
            <?php echo $form->error($model, 'profile_image'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'salon_name'); ?>
            <?php echo $form->textField($model_profile_salon,'salon_name'); ?>
            <?php echo $form->error($model_profile_salon,'salon_name'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'phone'); ?>
            <?php echo $form->textField($model_profile_salon,'phone'); ?>
            <?php echo $form->error($model_profile_salon,'phone'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'address1', array('label' => 'Address')); ?>
            <?php echo $form->textField($model_profile_salon,'address1'); ?>
            <?php echo $form->error($model_profile_salon,'address1'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'address2', array('label' => 'Address Line 2')); ?>
            <?php echo $form->textField($model_profile_salon,'address2'); ?>
            <?php echo $form->error($model_profile_salon,'address2'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'contact_person'); ?>
            <?php echo $form->textField($model_profile_salon,'contact_person'); ?>
            <?php echo $form->error($model_profile_salon,'contact_person'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'contact_email'); ?>
            <?php echo $form->textField($model_profile_salon,'contact_email'); ?>
            <?php echo $form->error($model_profile_salon,'contact_email'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'salon_type'); ?>
            <?php echo $form->dropDownList($model_profile_salon,'salon_type', CHtml::listData(SalonType::model()->findAll(), 'id', 'name'), array('empty'=>'---Select salon type---')); ?>
            <?php echo $form->error($model_profile_salon,'salon_type'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'business_description'); ?>
            <?php echo $form->textArea($model_profile_salon,'business_description', array('maxlength' => 1000, 'rows' => 5, 'cols' => 35)); ?>
            <br />(max 1000 characters)
            <?php echo $form->error($model_profile_salon,'business_description'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'services_offered'); ?>
            <?php echo $form->textArea($model_profile_salon,'services_offered', array('maxlength' => 1000, 'rows' => 5, 'cols' => 35)); ?>
            <br />(max 1000 characters)
            <?php echo $form->error($model_profile_salon,'services_offered'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'lattitude'); ?>
            <?php echo $form->textField($model_profile_salon,'lattitude'); ?>
            <?php echo $form->error($model_profile_salon,'lattitude'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model_profile_salon,'longitude'); ?>
            <?php echo $form->textField($model_profile_salon,'longitude'); ?>
            <?php echo $form->error($model_profile_salon,'longitude'); ?>
	</div>
        
        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->