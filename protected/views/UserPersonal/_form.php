<?php
/* @var $this CmsPageController */
/* @var $model CmsPage */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScriptFile('http://web/js/createPage.js');
?>
<style type="text/css">

    #InputField{
        display: none;
    }
</style>


<div class="form">


    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'cms-page-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Поля с <span class="required">*</span> обязательный.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="col-xs-4">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="col-xs-4">
        <?php echo $form->labelEx($model,'created'); ?>
        <input type="datetime-local" name="data" id="data">

    </div>

    <div class="col-xs-4">
        <?php echo $form->labelEx($model,'status'); ?>

        <?php echo $form->dropDownList($model,'status',array(0=>"Черновик",1=>"На модерацию")); ?>

        <?php echo $form->error($model,'status'); ?>
    </div>

    <div class="col-xs-4">
        <?php echo $form->labelEx($model,'category_id'); ?>
        <?php echo $form->dropDownList($model,'category_id',CmsCategory::all()); ?>
        <?php echo $form->error($model,'category_id'); ?>
    </div>



    <br>
    <div class="row">
        <?php if(CmsPage::model()->isNewRecord):?>
        <?echo CmsSetting::carimage('',200,150,'img-thumbnail ImgDef',1,$model->user_id);?>
        <? endif;
         if(!CmsPage::model()->isNewRecord):
        ?>
            <?echo CmsSetting::carimage($model->path_img,200,150,'img-thumbnail ImgDef',1,$model->user_id);?>

        <?endif;?>

        <br>
        <br>

        <?php echo $form->fileField($model,'image',array('id'=>'InputField')); ?>

        <?php echo $form->error($model,'image'); ?>
    </div>
    <br>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model' => $model, 'attribute'=>'content', 'language'=>'ru', 'editorTemplate'=>'full',

            'skin'=>'v2',
            "options" => array(
                "height"=>"400px",
                "width"=>"100%",

            ),
        )); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    <br>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->