<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <div class="col-md-offset-2 col-lg-offset-2">

    </div>

    <div class="col-md-2 col-lg-3">

        <?if(!Yii::app()->user->isGuest):?>
        <div class="text-center container-stacked">
            <p class="category"><b>ПРОФИЛЬ</b></p>

        </div>

        <?php



        $this->widget('bootstrap.widgets.TbMenu', array(
            'items'=>array(


                array('label'=>'изменение почту','url'=>array('/userPersonal/ChangeEmail','id'=>0)),
                array('label'=>'изменение пароль','url'=>array('/userPersonal/ChangePassword','id'=>0,'time'=>0)),
                array('label'=>'пригласить пользователя','url'=>array('/UserPersonal/PriglDruga')),
                array('label'=>'Создать статью','url'=>array('/userPersonal/create')),
                array('label'=>'Выйти','url'=>array('/site/logout')),
            ),
            'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked linkUser'),
        ));
        endif;
        ?>



    </div>
    <div class="col-md-10 col-lg-9">
        <div class="col-lg-offset-3 col-md-offset-3"></div>
        <div class="col-md-9 col-lg-9">
            <?php echo $content; ?>
        </div>

    </div>


<?php $this->endContent(); ?>

