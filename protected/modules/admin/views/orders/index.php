<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Orders Manage');?></h3>
  <div class="searchArea">

    <div class="search right">
           <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform', 'class'=>'right '))); ?>
  选择商品
      <select name="status" id="status">
        <option value="">全部订单</option>
        <option value="1">未支付</option>
        <option value="2">已支付</option>
        <option value="3">已取消</option>
        <option value="4">支付失败</option>
      </select>
  订单号
      <input id="order_code" type="text" name="order_code" value="" class="txt" size="20"/> 
  用户/手机
      <input id="username" type="text" name="username" value="" class="txt" size="20"/> 
    
      <input name="searchsubmit" type="submit"  value="<?php echo Yii::t('admin','Query');?>" class="button "/>
      <input name="searchsubmit" type="reset"  value="<?php echo Yii::t('admin','Reset');?>" class="button "/>     
      <?php $form=$this->endWidget(); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#username").val('<?php echo Yii::app()->request->getParam('username')?>');
	$("#order_code").val('<?php echo Yii::app()->request->getParam('order_code')?>');
	$("#status").val('<?php echo Yii::app()->request->getParam('status')?>');
});
</script>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table border="0" cellpadding="0" cellspacing="0" class="content_list"> 
    <thead>
      <tr class="tb_header">
        <th width="10%">订单号</th>
        <th width="10%">用户名</th>
        <th width="16%">商品</th>
        <th width="10%">套餐</th>
        <th width="4%">单价</th>
        <th width="4%">数量</th>
        <th width="4%">总计</th>
        <th width="6%">状态</th>
        <th width="15%">预定时间</th>
        <th width="15%">联系方式</th>
        <th><?php echo Yii::t('admin','Operate');?></th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><?php echo $row->order_code?></td>
      <td ><?php echo $row->username?></td>
      <td ><?php echo $row->goods_name?></td>
      <td ><?php echo $row->plan_name?></td>
      <td ><?php echo $row->plan_price?></td>
      <td ><?php echo $row->order_num?></td>
      <td ><?php echo $row->total_price?></td>
      <td >
      <?php if($row['status']==1):?>
       <font color="red">[未支付]</font>
       <?php elseif($row['status']==2):?>
       <font color="green">[已支付]</font>
       <?php elseif($row['status']==3):?>
       <font color="blue">[已取消]</font>
       <?php elseif($row['status']==4):?>
       <font color="red">[支付失败]</font></a>
       <?php endif; ?>
      </td>
      <td ><?php echo $row->create_time; ?></td>
      <td ><?php echo $row->realname?>/<?php echo $row->mobile?></td>
      <td >
      	<a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<a href="<?php echo  $this->createUrl('batch',array('command'=>'delete','id'=>$row->id))?>" onClick="return confirm('<?php echo Yii::t('admin','Confirm Delete');?>');"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
      
      </td>
    </tr>
    <?php endforeach;?>
    <tr class="operate">
      <td colspan="6">
        <div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
       </td>
    </tr>
    
  </form>
</table>


