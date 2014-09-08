<?php
/* @var $comments*/
Yii::app()->clientScript->registerCssFile('http://web/css/page.css');
?>

<br>

<ol  class="comments-list" type="1">
    <?php foreach($comments as $comment):?>

        <li id="<?php echo $comment->id; ?>">

            <?php if($comment->status==1):?>

            <div class="panel panel-success"">

                <div class="panel-heading">
                   <?php if($comment->user_id!=null): ?>
                   <?php echo CHtml::link(CmsUser::get_name($comment->user_id),array('UserPersonal/index','id'=>$comment->user_id)); endif; ?>
                   <?php if($comment->user_id==null): ?>
                   <?php echo CHtml::encode($comment->guest); endif ?>
                   <?php echo Yii::app()->dateFormatter->formatDateTime($comment->created);?>
                </div>

                <div class="panel-body">
                <?php echo CHtml::encode($comment->content);?>
                </div>

                <div class="panel-footer">
                <?php
                if((Yii::app()->user->id==$comment->user_id)&&(!Yii::app()->user->isGuest))
                echo CHtml::link('Удалить',array('/page/delete','id'=>$comment->id)) ?>
                <a id="<?php echo $comment->id; ?>" class="li_n">Ответить</a>
                </div>

            </div>

            <?php if(count($comment->childs) > 0 ) $this->renderPartial('_view', array('comments' => $comment->childs));
                else
                    echo"<hr />";
                ?>

            <?php endif ?>

        </li>
    <?php endforeach;?>
</ol>


