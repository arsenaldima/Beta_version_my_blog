<?php
/* @var $this PageController */
/* @var $data CActiveDataProvider */
/* @var $form CActiveForm */
/* @var $category CmsCategory */
/* @var $val Yii::app()->request->getParam('data') */

Yii::app()->clientScript->registerScriptFile('http://web/js/Page.js');

?>


<h4>Введите дату для сортировки</h4>
<?php $this->breadcrumbs=array('Категории : ' . $category->title,);
		 ?>



<form>
    <input type="date" name="data" id="dat" value="<?echo $val ?>" >
    <? echo CHtml::hiddenField('id',Yii::app()->request->getParam('id'),array('id'=>'CatId'));?>
</form>

<? $this->renderPartial('widget',array('data'=>$data )); ?>

