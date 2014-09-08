
<?php
/* @var $this PageController */
/* @var $model CmsPage */
/* @var $form CActiveForm */
/* @var $model1 CmsComment */

Yii::app()->clientScript->registerScriptFile('http://web/js/viewcom.js');
?>

<?php $this->breadcrumbs=array('Категории : ' . $model->category->title => array('index','id'=>$model->category_id),$model->title);
?>
    <h1 style="text-align: center">  <?php  echo $model->title; ?> </h1>

    <?php if(($model->user_id==Yii::app()->user->id)&&($model->status==0))
        echo CHtml::link('Редактировать',array('/UserPersonal/update','id'=>$model->id))?>
    <br>

    <table cellspacing="20" >

       <tr ><td><b>Дата создания  <?php echo date('j.m.Y H:i',$model->created);  ?></b></td></tr>
       <tr ><td><b>Пользователь </b>  <?php echo CHtml::link( $model->user->username,array('/UserPersonal/index','id'=>$model->user->id))  ?></td></tr>

    </table>
    <br>
    <hr />

    <?php echo $model->content;?>

    <?php
    if(($model->status!=0)&&($model->status!=1))
    {
    $this->renderPartial('_view',array('comments'=> $comments));
    $this->renderPartial('newcomment',array('model'=> $model1));}?>




