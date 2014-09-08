<?php
/**
 * Created by JetBrains PhpStorm.
 * User: дима
 * Date: 01.08.14
 * Time: 12:17
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="panel panel-info">

    <div class="panel-heading">
        <?    echo CHtml::link('<h3>'.$data->title.'</h3>',array('view','id'=>$data->id))  ;
        ?>
    </div>
    <div class="panel-body">
    <?
            if(Yii::app()->request->getParam('data'))
            {
                echo "Категории        ";
                echo CHtml::link('   '.$data->category->title,array('index','id'=>$data->category->id));echo "<br>";}

            switch($data->user->role)
                {
                    case 1: {echo 'Пользователь      '; break;}
                    case 2: {echo 'Модератор         '; break;}
                    case 3: {echo 'Администратор     '; break;}
                }
                echo CHtml::link($data->user->username,array('UserPersonal/index','id'=>$data->user->id));
                echo "<br>";
                echo "<br>";
                echo "<b>Дата создания    ";
                echo date('j.m.Y H:i',$data->created);
                echo "</b>";
                echo "<br>";
                echo "<br>";
                echo CmsSetting::carimage($data->path_img,200,150,'img-circle',1,$data->user->id);
                echo "<br>";
                echo "<br>";
     ?>
    </div>
    <div class="panel-footer">
                <? echo CHtml::link('Читать далее...',array('view','id'=>$data->id));?>
    </div>
</div>
