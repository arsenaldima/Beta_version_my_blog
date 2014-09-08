<?php
/* @var $this UserPersonalController */
/* @var $model CmsUser */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile('http://web/js/CheckEmail.js');
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>
<br>

<? if(Yii::app()->user->hasFlash('error')&&Yii::app()->user->hasFlash('success')):?>
<?php echo CHtml::form('','POST');

?>
<?php echo CHtml::encode('Введите email друга');?>
<br>
<br>
<?php echo CHtml::textField('email','',array('id'=>'text'));?>
<br>
<br>
<?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary','id'=>'sub'));?>
<?php echo CHtml::endForm();
endif;
?>

