<?php
/* @var $this UserPersonalController */
/* @var $data CmsPage */
?>

<div class="view">
<br>

    <div class="panel panel-info">

            <div class="panel-heading">
                <?
                 echo CHtml::link('<h3>'.$data->title.'</h3>',array('/page/view','id'=>$data->id));
                ?>
            </div>

            <div class="panel-body">
            <?
                 echo CmsSetting::carimage($data->path_img,100,100,'img-circle',1,$data->user->id);
                 echo"<br>";
                 echo"<br>";

                 if($data->status==0)
                 {
                     echo "<h4>     Статус:       Черновик</h4>";
                 }
                else
                {
                    if($data->status==2)
                        echo "<h4>     Статус:       Опубликованая</h4>";
                }
              echo"<br>";?>

            </div>
            <div class="panel-footer">
               <? echo CHtml::encode(date('j.m.Y H:i',$data->created));?>
            </div>

    </div>

</div>
