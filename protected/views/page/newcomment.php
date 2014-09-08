

<?php
/* @var $this CmsCommentController */
/* @var $model CmsComment */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile('http://web/js/viewcom.js');

?>





<div class="form-horizontal" role="form" >
<?php
$flag=CmsSetting::model()->findByPk(1);
if(!Yii::app()->user->isGuest||(Yii::app()->user->isGuest && $flag->gost_com)): ?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'cms-comment-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>



    <div class="form-group">

    <?php echo $form->errorSummary($model); ?>

        <label for="content1" class="col-sm-2 control-label" id='new_kom'><h5>Новый комментарий</h5></label>

        <label for="content1" class="col-sm-2 control-label" id='otvet_kom' style="display: none"><h5>Ответ на комментарий</h5></label>

        <div class="col-sm-10">
        <br>
        <br>
        <br>

              <?php echo $form->textArea($model,'content',array('rows'=>3, 'cols'=>400, 'id'=>'content1', 'class'=>'form-control input-lg')); ?>
        <br>
        <br>
        </div>
        <?php echo $form->error($model,'content'); ?>

    </div>

<?php echo $form->hiddenField($model,'parent_id',array('id'=>'parent')); ?>
<?php echo $form->error($model,'parent_id'); ?>

    <?php if(Yii::app()->user->isGuest):?>

        <div class="form-group">

            <?php echo $form->errorSummary($model); ?>

            <label for="content1" class="col-sm-2 control-label" id='quest'><h5> <?php echo CHtml::encode("Введите свой email");?></h5></label>

            <div class="col-sm-10">
                <br>
                <br>
                <br>

                <?php echo $form->textField($model,'guest',array('size'=>60,'maxlength'=>255, 'class'=>'form-control input-lg', 'id'=>'guest')); ?>
                <br>
            </div>
            <?php echo $form->error($model,'guest'); ?>

        </div>
        <br>
        <br>
    <?php  endif ?>




    <div class="row buttons">
        <?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary btn-lg','id'=>'newCom')); ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif ?>