<?php
/* @var $this UserPersonalController */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile('http://web/js/CheckEmail.js');
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
       <h3> <?php echo Yii::app()->user->getFlash('success'); ?></h3>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('error')):?>
<div class="info">
    <h3><?php echo Yii::app()->user->getFlash('error'); ?></h3>
</div>
<?php endif ?>


<?php if($flag): ?>

<?php echo CHtml::form('','POST'); ?>
<?php echo CHtml::encode('Введите новый email');?>
<br>
<br>
<?php echo CHtml::textField('email','',array('id'=>'text'));?>
<br>
<br>
<?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary','id'=>'sub'));?>
<?php echo CHtml::endForm()?>
<?php endif ?>



