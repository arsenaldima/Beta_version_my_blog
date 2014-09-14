<?php /* @var $this Controller */ ?>
<?php session_start(); $this->beginContent('//layouts/main'); ?>



    <div class="col-md-offset-2 col-lg-offset-2">

    </div>

    <div class="col-md-2 col-lg-3">
    <div class="container-stacked">
        <ul class="CatItem nav nav-pills nav-stacked ">


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <span> Категории <span class="caret"></span></span>
            </a>
            <ul class="dropdown-menu liDrop">
                <?php

                foreach(CmsCategory::menu('top') as $one)
                {
                    $a=CHtml::openTag('i',array('class'=>'fa fa-arrow-right pull-left'))."</i>".'&nbsp;'.'&nbsp;'. $one['label'].'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;'.CHtml::openTag('span',array('class'=>'badge pull-right')).$one['data']."</span>";
                    echo '<li>'.CHtml::link($a, $one['url'], array('class'=>'')).'</li>';

                    echo  CHtml::openTag('li',array('class'=>'divider'))."</li>";

                }


                ?>
            </ul>
        </li>
        </ul>
    </div>

    </div>
    <div class="col-md-8 col-lg-9">

        <div class="container-fluid">
        <?php echo $content; ?>
        </div>

    </div>


<?php $this->endContent(); ?>