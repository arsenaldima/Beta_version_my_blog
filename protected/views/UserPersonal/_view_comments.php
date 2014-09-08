<?php
/* @var $this UserPersonalController */
/* @var $data CmsComment */
?>

<div class="view">
    <br>

    <div class="panel panel-info">

        <div class="panel-heading">
            <?
            echo CHtml::link('<h3>'.$data->page->title.'</h3>',array('/page/view','id'=>$data->page->id));
            ?>
        </div>

        <div class="panel-body">
            <?
            echo $data->content;
            echo"<br>";?>

        </div>
        <div class="panel-footer">
            <? echo CHtml::encode(date('j.m.Y H:i',$data->created));?>
        </div>

    </div>

</div>
