<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Orders Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li class="current"><a href="<?php echo $this->createUrl('index')?>" class="actionBtn"><span><?php echo Yii::t('admin','Go Back');?></span></a></li>
     
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<?php $this->renderPartial('_form',array('model'=>$model, 'imageList'=>$imageList, 'style'=>$style, 'order_payment'=>$order_payment,'admin_name'=>$admin_name))?>

