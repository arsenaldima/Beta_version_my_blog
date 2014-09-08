<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">

    <div class="span2">




        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Изменение профиля',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>array(

                    array('label'=>'изменение аватар','url'=>array('/userPersonal/avatar'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'изменение почту','url'=>array('/userPersonal/ChangeEmail','id'=>0),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'изменение пароль','url'=>array('/userPersonal/ChangePassword','id'=>0,'time'=>0),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'пригласить пользователя','url'=>array('/UserPersonal/PriglDruga'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Создать статью','url'=>array('/userPersonal/create'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Выйти','url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest),
                ),
                'htmlOptions'=>array('class'=>'operations'),

            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->


    </div>


    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>