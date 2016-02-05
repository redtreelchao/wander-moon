<div id="contentHeader">
  <h3>商品套餐管理</h3>
  <div class="searchArea">
    <ul class="action left">
      <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform', 'class'=>'right '))); ?>
  选择商品
      <select name="goods_id" id="goods_id">
        <option value="">=<?php echo Yii::t('admin','All Content');?>=</option>
        <?php foreach((array) Goods::model()->findAll(array('order'=>'id desc')) as $goods):?>
        <option value="<?php echo $goods['id']?>"><?php echo $goods['goods_name']?></option>
        <?php endforeach;?>
      </select>
  套餐名称关键字
      <input id="plan_name" type="text" name="plan_name" value="" class="txt" size="15"/> 
    
      <input name="searchsubmit" type="submit"  value="<?php echo Yii::t('admin','Query');?>" class="button "/>
      <input name="searchsubmit" type="reset"  value="<?php echo Yii::t('admin','Reset');?>" class="button "/>     
      <?php $form=$this->endWidget(); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#goods_id").val('<?php echo Yii::app()->request->getParam('goods_id')?>');
	$("#plan_name").val('<?php echo Yii::app()->request->getParam('plan_name')?>');
});
</script>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table border="0" cellpadding="0" cellspacing="0" class="content_list"> 
    <thead>
      <tr class="tb_header">
        <th width="10%">ID</th>
        <th width="20%">套餐名称</th>
        <th width="20%">所属产品</th>
        <th width="8%">价格</th>
        <th width="15%"><?php echo Yii::t('admin','Add Time');?></th>
        <th><?php echo Yii::t('admin','Operate');?></th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list" <?php if($row->status=='N'):?>style=" background:#F0F7FC"<?php endif?>>
      <td >
        <?php echo $row->id?></td>
      <td >
      	<a href="<?php echo $this->createUrl('/goods/view', array('id'=>$row['goods_id']));?>" title="<?php echo $row->plan_name; ?>" target="_blank"><?php echo Helper::truncate_utf8_string($row->plan_name, 20);?></a><br />
      </td>
		
      <td ><?php echo $row->goods->goods_name; ?></td>
      <td ><?php echo $row->plan_price; ?></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td >
      	<a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<a href="<?php echo  $this->createUrl('batch',array('command'=>'delete','id'=>$row->id))?>" onClick="return confirm('<?php echo Yii::t('admin','Confirm Delete');?>');"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
      
      </td>
    </tr>
    <?php endforeach;?>
    
  </form>
</table>

<!-- //javascript开始 -->
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
	//显示推荐位列表
	$("select[name='command']").change(function(){
		var value = $(this).val();
		if(value == 'commend'){
			$("#recom_list").show();
		}else{
			$("#recom_list").hide();
		}
	});
});
</script>
<!-- //javascript结束 -->
