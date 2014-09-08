<?php
/* @var $this PageController */
/* @var $data CActiveDataProvaider */

?>

<?php $this->widget('zii.widgets.CListView', array(
    'id'=>'product-grid',
    'dataProvider'=>$data,
    'itemView'=>'_view_page',
    'emptyText'=>'В данной категории нет статей',
    'sorterHeader'=>'Сортировать по :',
    'sortableAttributes'=>array('created'),


)); ?>