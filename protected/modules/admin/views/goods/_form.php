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
    <td class="tb_title" ><?php echo Yii::t('admin','Goods Name');?>：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'goods_name',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" ><?php echo Yii::t('admin','Title Second');?>：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'goods_name_second',array('size'=>60,'maxlength'=>128)); ?>     
      </td>
  </tr>  
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Belong Category');?>：</td>
  </tr>
  <tr >
    <td ><select name="Goods[catalog_id]" id="Goods_catalog_id" onchange="changeCatalog(this)">
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>" <?php Helper::selected($catalog['id'], $model->catalog_id);?>><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select>
     </td>
  </tr>
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Cover Image');?>：</td>
  </tr>
  <tr >
    <td colspan="2" ><input name="attach" type="file" id="attach" />
      <?php if ($model->default_image):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->default_image;?>" target="_blank"><img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->default_image;?>" width="50" align="absmiddle" /></a>
      <?php endif?>
      <?php if ($model->default_thumb):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->default_thumb;?>" target="_blank"><img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->default_thumb;?>" width="50" align="absmiddle" /></a>
      <?php endif?>   
  	</td>
  </tr>
  
  <tr>
		<td class="tb_title"><?php echo Yii::t('admin','Introduce');?>：</td>
	</tr>
	<tr>
		<td><?php echo CHtml::activeTextArea($model,'introduce',array('rows'=>5, 'cols'=>90)); ?></td>
	</tr>
  
  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content'); ?>
     <?php $this->widget('application.widget.kindeditor.KindEditor',array('id'=>'Goods_content'));?>
     </td>
  </tr> 
  
  <tr>
    <td >   
    <?php echo Yii::t('model','ViewCount');?>：<?php echo $form->textField($model,'views',array('size'=>5,'maxlength'=>10)); ?>   
    </td>
  </tr>
  <tr>
    <td class="tb_title" >结束日期：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'sales_endtime',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" >推荐特性1：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_1',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" >推荐特性2：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_2',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" >推荐特性3：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_3',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" >推荐特性4：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_4',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" >推荐特性5：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_5',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  <tr>
    <td class="tb_title" >购买说明-住：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_zhu',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>

   <tr>
    <td class="tb_title" >购买说明-行：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_xing',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
   <tr>
    <td class="tb_title" >购买说明-食：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_shi',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
   <tr>
    <td class="tb_title" >购买说明-玩：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_wan',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
   <tr>
    <td class="tb_title" >购买说明-含：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_han',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>           
  <tr>
    <td class="tb_title" >购买说明-赠：</td>
  </tr>
   <tr >
    <td >
    	<?php echo $form->textField($model,'ext_zeng',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
   <tr>
    <td class="tb_title" >购买说明-享：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_xiang',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
   <tr>
    <td class="tb_title" >购买说明-免：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'ext_mian',array('size'=>30,'maxlength'=>60)); ?>     
      </td>
  </tr>
  
  <tr>
    <td class="tb_title" >购买帮助-使用说明：</td>
  </tr>
  <tr >
    	<td><?php echo CHtml::activeTextArea($model,'help_1',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>
  <tr>
    <td class="tb_title" >购买帮助-预定须知：</td>
  </tr>
  <tr >
    	<td><?php echo CHtml::activeTextArea($model,'help_2',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>
  <tr>
    <td class="tb_title" >购买帮助-退改规则：</td>
  </tr>
  <tr >
    	<td><?php echo CHtml::activeTextArea($model,'help_3',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>   
  
  <tr >
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?></td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'is_top',array('0'=>'不置顶', '1'=>'置顶')); ?></td>
  </tr>
 
  <tr class="submit">
    <td colspan="2" ><input name="oAttach" type="hidden" value="<?php echo $model->default_image ?>" />
      <input name="oThumb" type="hidden" value="<?php echo $model->default_thumb ?>" />
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