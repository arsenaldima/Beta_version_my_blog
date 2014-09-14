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
<div class="row">
    <div class="container-fluid">
        <div class="panel panel-info text-center">
            <h3><?php echo CHtml::encode($model->username); ?></h3>
            <hr/>
            <div class="text-center">
                <small>Дата регистрации &nbsp;&nbsp;<i class="fa fa-calendar"></i> &nbsp; <?php echo date("j F Y",$model->created) ?></small>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-4">
               <?
                    echo CHtml::link(CmsSetting::carimage($model->picture,128,128,'img-thumbnail',0,$id),array('/UserPersonal/avatar'),array('class'=>'linkFile','enctype'=>'multipart/form-data'));

               ?>
        </div>

        <div class="col-md-7 text-center">

            <table>
                <tr>
                    <?if($model->data_avtor!=0):?>
                        <td class="text-left"><span>Заходил </span></td>
                        <td><i class="fa fa-calendar" style="margin-left: 15px"></i></td>
                        <td class="text-center"><?php echo date("j F Y H:i",$model->data_avtor) ?></td>
                    <?endif;?>
                </tr>
                <?php if($model->prigl_id!=0):
                    $user=CmsUser::model()->findByPk($model->prigl_id);
                ?>
                <tr>
                    <td class="text-left"><span>Приглосил пользователь </span></td>
                    <td><i class="fa fa-child" style="margin-left: 15px"></i></td>
                    <td class="text-center"><?php echo CHtml::link($user->username,array('index','id'=>$user->id)); endif; ?></td>

                </tr>

                <tr>
                    <td class="text-left"><span>Почта </span></td>
                    <td><i class="fa fa-at" style="margin-left: 15px"></i></td>
                    <td class="text-center"><?php echo $model->email ?></td>
                </tr>
                <tr>
                    <?
                        $criteria= new CDbCriteria;
                        $criteria->condition='user_id = :id AND status=2';
                        $criteria->params=array(':id'=>$id);

                            if(CmsPage::model()->count($criteria)!=0):
                    ?>
                                <td class="text-left"><span>Опубликовано постов </span></td>
                                <td><i class="fa fa-newspaper-o" style="margin-left: 15px"></i> </td>
                                <td class="text-center"><?php echo CmsPage::model()->count($criteria) ?></td>
                            <?endif;?>
                </tr>
                <tr>
                    <?
                        $criteria->condition='user_id=:id AND status=1';
                        $criteria->params=array(':id'=>$id);
                        $ct=CmsComment::model()->count($criteria);
                        if($ct!=0):
                    ?>
                        <td class="text-left"><span>Опубликовано комментариев </span></td>
                        <td><i class="fa fa-comment-o" style="margin-left: 15px"></i></td>
                        <td class="text-center"><?php  echo $ct;?></td>
                    <?endif;?>
                </tr>
                <tr>
                    <?
                        $criteria=new CDbCriteria();
                        $criteria->condition='user_id=:id AND status=2';
                        $criteria->params=array(':id'=>$id);
                        $criteria->order='created DESC';
                        $criteria->limit='1';
                        $page=CmsPage::model()->find($criteria);
                        if($page!=0):
                    ?>

                    <td class="text-left">
                        <span>Последняя статья</span>
                        <div>
                            <?echo date('j F Y H:i',$page->created)?>
                        </div>
                    </td>
                    <td><i class="fa fa-comment-o" style="margin-left: 15px"></i></td>
                    <td class="text-center">
                        <?echo CHtml::link($page->title,array('page/view/','id'=>$page->id));?>
                    </td>
                    <?endif;?>
                </tr>
            </table>


            </div>
        </div>

</div>


<div class="row">
    <div class="container-fluid ">
        <div class="col-md-6 btn-group-vertical">

            <br>

            <button  id='metka' class="btn btn-info btn-large btn-group-vertical" >Отправить сообщение пользователю</button>
            <br>
            <?echo CHtml::form('','POST',array('id'=>'FormSms','role'=>'form'));?>
            <div class="form-group">
                <label for="InputSms">Введите своё сообщение</label>
                <?
                echo CHtml::hiddenField('id',$id,array('id'=>'IdUser'));
                echo CHtml::textArea('sms','',array('id'=>'SmsId','class'=>'sizeKom','rows'=>'4'));

                ?>
            </div>
            <?echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary btn-large', 'id'=>'sub_but'));?>
            <?echo CHtml::endForm();?>
            <br>
            <?php
            if($id==Yii::app()->user->id)
            {
                ($model->podpis==1)?$dim="Отписаться от рассылки":$dim="Подписаться на рассылку";
                echo CHtml::button($dim,array('id'=>'but','class'=>'btn btn-info btn-large btn-group-vertical'));}
            ?>
        </div>

        <div class="col-md-6">
            <?

            $model2=CmsUser::model()->findAllByAttributes(array('prigl_id'=>array($model->id),));
            if($model2!=null)
            {
                echo"<br>";
                echo CHtml::openTag('button',array('class'=>'btn btn-info btn-large btn-group-vertical', 'id'=>'ButPol'));
                echo "Показать приглашоных пользователей";
                echo "</button>";
                echo CHtml::openTag('span',array('id'=>'idBut','class'=>'ButPolClass'));
                echo"<br>";
                echo"<br>";
                foreach($model2 as $one)
                {
                    echo CHtml::link($one->username,array('index','id'=>$one->id));
                    echo "<hr/>";

                }
                echo "</span>";

            }

            ?>
        </div>

    </div>
</div>












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
    <?
    if(Yii::app()->user->id==$id)
    {
        $a=array('created','status');

    }
    else
    {
        $a=array('created');

    }

     $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>CmsPage::MyPages($id),
        'itemView'=>'_view_pages',
        'emptyText'=>'В данной категории нет статей',
        'sorterHeader'=>'Сортировать по :',
        'sortableAttributes'=>$a,

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
        'template'=>'{items}{pager}',
        'sortableAttributes'=>array('created','page_id'),

    )); ?>
</div>

<br>
<br>
<br>