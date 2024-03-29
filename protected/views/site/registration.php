<?php
/* @var $this CmsUserController */
/* @var $model CmsUser */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
    <div class="col-md-6 container-fluid">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'cms-user-form',
            'enableAjaxValidation'=>false,
        )); ?>

        <div class="well well-lg text-center">
            <p class="text-info">Поля с <span class="required">*</span> обязательный.</p>
            <p class="text-warning"><?php echo $form->errorSummary($model,null, null,array('class'=>'text-warning er')); ?></p>
        </div>

        <div class="form-group">
            <label for="textLogin">Введите имя пользователя</label>
            <?php echo $form->textField($model,'username',array('id'=>'textLogin','placeholder'=>'Введите имя пользователя','class'=>'form-control','type'=>'text')); ?>


        </div>

        <div class="form-group">
            <label for="text">Введите email</label>
            <?php echo $form->textField($model,'email',array('id'=>'text','placeholder'=>'Введите email','class'=>'form-control','type'=>'email'));?>

        </div>
        <div class="form-group">
            <label for="textPas">Введите пароль</label>
            <?php echo $form->passwordField($model,'password',array('id'=>'textPas','placeholder'=>'Введите пароль','class'=>'form-control','type'=>'password'));?>
        </div>

        <div class="form-group">
            <label for="textPasRep">Повторите пароль</label>
            <?php echo $form->passwordField($model,'repeat_password',array('id'=>'textPasRep','placeholder'=>'Повторите пароль','class'=>'form-control','type'=>'password'));?>
        </div>
    </div>
</div>
    <div class="row-fluid">
        <div class="col-md-5 container-fluid">
            <?php if(CCaptcha::checkRequirements()): ?>
            <div class="form-group">
                <?php echo $form->labelEx($model,'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <br>
                    <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
                </div>
                <br>
                <div class="hint">
                    <?php echo $form->error($model,'verifyCode'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row-fluid center-block">
                <?php echo CHtml::submitButton('Регистрация',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>



