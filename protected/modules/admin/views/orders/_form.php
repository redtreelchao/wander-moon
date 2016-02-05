<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jscolor/jscolor.js"></script>

<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
<tr>
    <td class="tb_title" >订单号：<?php echo $model->order_code; ?>    </td>
  </tr>

  <tr>
    <td class="tb_title" >商品名称： <?php echo $model->goods_name; ?> </td>
  </tr>

  <tr>
    <td class="tb_title" >套餐名称： <?php echo $model->plan_name; ?> </td>
  </tr>
  
  <tr>
    <td class="tb_title" >订购数量： <?php echo $model->order_num; ?> </td>
  </tr>
  
  <tr>
    <td class="tb_title" >套餐单价： <?php echo $model->plan_price; ?> </td>
  </tr>
  
  <tr>
    <td class="tb_title" >总计费用： <?php echo $model->total_price; ?> </td>
  </tr>
  
   <tr>
    <td class="tb_title" >订购人：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'realname',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
    </td>
  </tr><tr>
    <td class="tb_title" >联系手机：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
    </td>
  </tr>
  
  <tr >
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
 <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('1'=>'未支付','2'=>'已支付','3'=>'已取消','4'=>'支付失败', )); ?></td>
  </tr>
  <tr >
    <td class="tb_title">支付记录：
	<?php if ( $order_payment ) :?>
支付了<?php echo $order_payment->amount/100;?>元
[<?php echo $order_payment->pay_code;?>]
[<?php echo date("Y-m-d H:i:s", $order_payment->add_time) ;?>]
[操作人:<?php echo $admin_name ;?>]
	<?php else: ?>
暂无！
	<?php endif ?>
</td>
  </tr>

  <tr class="submit">
  	<td colspan="2" >
   	
      	<input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
     </td>
  </tr>
</table>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();
});
</script>

<?php $form=$this->endWidget(); ?>

