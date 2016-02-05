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
    <td class="tb_title" >所属产品：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->dropDownList($model,'goods_id', $this->_goods); ?>     
      </td>
  </tr>

  
  <tr>
    <td class="tb_title" >套餐名称：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'plan_name',array('size'=>30,'maxlength'=>30, 'class'=>'validate[required]')); ?>     
      </td>
  </tr>

 
 <tr>
    <td class="tb_title" >套餐价格：</td>
  </tr>
  <tr >
    <td >
    	￥<?php echo $form->textField($model,'plan_price',array('size'=>5,'maxlength'=>10, 'class'=>'validate[required]')); ?>     
      </td>
  </tr> 
  
  <tr>
		<td class="tb_title">套餐说明：</td>
	</tr>
	<tr>
		<td><?php echo CHtml::activeTextArea($model,'plan_desc',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>
  
  <tr>
		<td class="tb_title">状态：</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden') )); ?>
		</td>
	</tr>
  

 
  <tr class="submit">
    <td colspan="2" >
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();
});
</script>
<?php $form=$this->endWidget(); ?>
<script>
function changeCatalog(ths){
	$.post("<?php echo $this->createUrl('ajax/attr2content')?>", {catalog:ths.value}, function(res){
		if(res.state == 'success'){
			$("#attr2cotnent").html(res.text);
			$("#attrArea").show();
		}else{
			$("#attrArea").hide();
			$("#attr2cotnent").html('');
		}
	},'json');
}
</script>