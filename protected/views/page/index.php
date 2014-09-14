<?php
/* @var $this PageController */
/* @var $data CActiveDataProvider */
/* @var $form CActiveForm */
/* @var $category CmsCategory */
/* @var $val Yii::app()->request->getParam('data') */


Yii::app()->clientScript->registerScriptFile('http://web/js/page.js');
?>



<?php $this->breadcrumbs=array('Категории : ' . $category->title,);
		 ?>


<div class="form-group text-center">
    <label for="inputEmail3" class="col-md-4 control-label">Введите дату для поиска</label>
    <div class="col-md-3 container-fluid">
        <input type="date" id="dat" name="data" class="form-control" value="<?echo $val ?>">
        <input type="hidden" id='day' value="<?echo date('d',time())?>">
        <input type="hidden" id='month' value="<?echo date('m',time())?>">
        <input type="hidden" id='year' value="<?echo date('Y',time())?>">
        <input type="hidden" id='cat' value="<?echo Yii::app()->request->getParam('id')?>">
    </div>
</div>

<br>
<br>

<? $this->renderPartial('widget',array('data'=>$data )); ?>
