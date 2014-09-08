<?php
/* @var $this UserPersonalController */
/* @var $id */
/* @var  $model $CmsUser */

$this->breadcrumbs=array(
	'User Personal',
);
Yii::app()->clientScript->registerScriptFile('http://web/js/UserPersonal_index.js');
Yii::app()->clientScript->registerCssFile('http://web/css/page.css');
?>


<div>
 <br>
 <h2>Персональная страница пользователя  <?php echo CHtml::encode($model->username); ?></h2>
    <br>
    <h6>Последняя дата авторизации <?php echo date("j.m.Y.H:i",$model->data_avtor) ?></h6>
    <hr />
    <?php if($model->prigl_id!=0):?>

    <h4>Пригласил пользователь

        <?php
            $user=CmsUser::model()->findByPk($model->prigl_id);
            echo CHtml::link($user->username,array('index','id'=>$user->id));
            echo "<br>";
         endif ?>

    </h4>
    <br>

</div>

<div>

    <?php echo CHtml::link(CmsSetting::carimage($model->picture,200,150,'img-rounded',0,$id),array('/UserPersonal/avatar'));?>
    <br>
    <br>



    <?php
        if($id==Yii::app()->user->id)
        {
            ($model->podpis==1)?$dim="Отписаться":$dim="Подписаться";
                echo CHtml::button($dim,array('id'=>'but','class'=>'btn btn-primary'));}
    ?>
    <br>
    <br>
    <br>
        <a  id='metka' style="cursor: pointer">Отправить личное сообщение пользователю</a>





    <?php

        echo CHtml::form('','POST',array('id'=>'FormSms'));
        echo"<br><br>";
        echo CHtml::hiddenField('id',$id,array('id'=>'IdUser'));
        echo "<h4>Введите текстовое сообщение</h4>";
        echo CHtml::textArea('sms','',array('id'=>'SmsId'));
        echo "<br>";
        echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary', 'id'=>'sub_but'));
        echo CHtml::endForm();
    ?>

</div>


    <?php

        $model2=CmsUser::model()->findAllByAttributes(array('prigl_id'=>array($model->id),));
        if($model2!=null)
        {
            echo"<br>";
            echo"<h4>Приглашонные пользователи</h4>";
            echo"<br>";

            foreach($model2 as $one)
            {
                echo CHtml::link($one->username,array('index','id'=>$one->id));
                echo "<br>";

            }

        }

    ?>
        <br>
        <a  id='graphShow' style="cursor: pointer">Показать график активности пользователя</a>
        <br>
        <a  id='graphClose' style="cursor: pointer; display: none">Скрыть график активности пользователя</a>


    <div id="graph" style="display: none">
    <?php    $this->Widget('ext.graph.highcharts.HighchartsWidget', array(
        'options'=>array(
            'title' => array('text' => 'График активности пользователя'),
            'xAxis' => array(
                'categories' => array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август', 'Сентябрь', 'Октябрь','Ноябрь','Декабырь',)
            ),
            'yAxis' => array(
                'title' => array('text' => 'Количество статей')
            ),
            'series' => array(
                array('name' => $model->username, 'data' => CmsSetting::ar_kol($id)),

            )
        )
    ));

    ?>
    </div>

    <br>
    <a  id='PageShow' style="cursor: pointer">Показать страницы пользователя</a>
    <br>
    <a  id='PageClose' style="cursor: pointer; display: none">Скрыть страницы пользователя</a>

    <div id="MyPage">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>CmsPage::MyPages($id),
        'itemView'=>'_view_pages',
        'emptyText'=>'В данной категории нет статей',
        'sorterHeader'=>'Сортировать по :',
        'sortableAttributes'=>array('created','status'),

    )); ?>
    </div>


<br>
<a  id='CommentShow' style="cursor: pointer">Показать комментарии пользователя</a>
<br>
<a  id='CommentClose' style="cursor: pointer; display: none">Скрыть комментарии пользователя</a>

<div id="MyComment">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>CmsComment::MyComments($id),
        'itemView'=>'_view_comments',
        'emptyText'=>'В данной категории нет статей',
        'sorterHeader'=>'Сортировать по :',
        'sortableAttributes'=>array('created','page_id'),

    )); ?>
</div>

<br>
<br>
<br>